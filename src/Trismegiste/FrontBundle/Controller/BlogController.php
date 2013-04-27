<?php

namespace Trismegiste\FrontBundle\Controller;

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

}
