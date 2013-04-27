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
        $article = array(array('title' => 'Ze title', 'article' => 'lorem ipsum'));
        return $this->render('TrismegisteFrontBundle:Blog:index.html.twig', $article);
    }

    protected function getTopMenu()
    {
        return array('About' => 'trismegiste_about');
    }

}
