<?php

namespace Trismegiste\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * Example a simple controller with an About page
 *
 * Modify, override or subclass it
 */
class BlogController extends Template
{

    protected function getSubdomain()
    {
        preg_match('#^([a-z0-9]+)\.#', $this->getRequest()->getHost(), $match);
        return $match[1];
    }

    public function aboutAction()
    {
        return $this->render('TrismegisteFrontBundle:Blog:about.html.twig');
    }

    public function indexAction()
    {
        $filter = $this->getSubdomain();
        $blog = $this
                ->get('dokudoki.collection')
                ->find(array(
            '-class' => 'article',
            'subdomain' => $filter
        ));
        $blog->sort(array('publishedAt' => -1));

        $formType = new \Trismegiste\FrontBundle\Form\ArticleType();
        $obj = null;
        $target = $this->generateUrl('trismegiste_homepage');

        $request = $this->getRequest();

        if ($request->query->has('id')) {
            $pk = $request->query->get('id');
            $obj = $this->get('dokudoki.repository')->findByPk($pk);
            $target = $this->generateUrl('trismegiste_homepage', array('id' => $pk));
        }

        $article = $this->createForm($formType, $obj);

        if ($request->getMethod() == 'POST') {
            $article->bind($request);
            if ($article->isValid()) {
                $publish = $article->getData();
                $publish->setPublishedAt(time());
                $publish->setSubdomain($this->getSubdomain());
                $this->get('dokudoki.repository')->persist($publish);
                $this->get('session')->getFlashBag()->add('notice', 'Saved');

                return $this->redirect($this->generateUrl('trismegiste_homepage'));
            }
        }

        return $this->render('TrismegisteFrontBundle:Blog:write.html.twig', array(
                    'blog' => $blog,
                    'form' => $article->createView(),
                    'target' => $target
        ));
    }

    protected function getTopMenu()
    {
        return array('About' => 'trismegiste_about');
    }

    public function removeAction($id)
    {
        $this->get('dokudoki.collection')->remove(array('_id' => new \MongoId($id)));
        $this->get('session')->getFlashBag()->add('notice', 'Removed');

        return $this->redirect($this->generateUrl('trismegiste_homepage'));
    }

}
