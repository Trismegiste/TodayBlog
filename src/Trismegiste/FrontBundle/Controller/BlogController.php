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

    public function aboutAction()
    {
        return $this->render('TrismegisteFrontBundle:Blog:about.html.twig');
    }

    public function indexAction()
    {
        $blog = array(array('title' => 'Ze title', 'body' => 'lorem ipsum'));
        $article = $this->createForm(new \Trismegiste\FrontBundle\Form\ArticleType());

        return $this->render('TrismegisteFrontBundle:Blog:write.html.twig', array('blog' => $blog, 'form' => $article->createView()));
    }

    protected function getTopMenu()
    {
        return array('About' => 'trismegiste_about');
    }

    public function editAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $article = $this->createForm(new \Trismegiste\FrontBundle\Form\ArticleType());
            $article->bind($request);
            if ($article->isValid()) {
                print_r($article->getData());
            }
        }
        return $this->indexAction();
    }

}
