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
        return $this->render('TrismegisteFrontBundle:Blog:write.html.twig', array('blog' => $blog));
    }

    protected function getTopMenu()
    {
        return array('About' => 'trismegiste_about');
    }

}
