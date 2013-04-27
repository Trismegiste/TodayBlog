<?php

/*
 * sf2ffbp
 */

namespace Trismegiste\FrontBundle\Controller;

use Trismegiste\DokudokiBundle\Tests\Form\CartType;
use Trismegiste\DokudokiBundle\Magic\Document;

/**
 * Controller for simple CRUD
 *
 * @author flo
 */
class CRUDController extends DefaultController
{

    public function getTopMenu()
    {
        $menu = parent::getTopMenu();
        $menu['Create'] = 'trismegiste_sample_create';
        //      $menu['Edit'] = 'trismegiste_sample_edit';

        return $menu;
    }

    public function createAction()
    {
        $obj = new Document('cart');
        $obj->setAddress('aaa');

        $form = $this->createForm(new CartType(), $obj);

        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $this->get('dokudoki.repository')->persist($obj);
            }
        }

        return $this->render('TrismegisteFrontBundle:CRUD:create.html.twig', array('form' => $form->createView()));
    }

}
