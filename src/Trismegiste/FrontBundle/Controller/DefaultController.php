<?php

namespace Trismegiste\FrontBundle\Controller;

/**
 * Example a simple controller with an About page
 *
 * Modify, override or subclass it
 */
class DefaultController extends Template
{

    public function aboutAction()
    {
        return $this->render('TrismegisteFrontBundle:Default:about.html.twig');
    }

    protected function getTopMenu()
    {
        return array('About' => 'trismegiste_about');
    }

}
