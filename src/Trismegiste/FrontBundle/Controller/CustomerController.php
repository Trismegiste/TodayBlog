<?php

/*
 * TodayBlog
 */

namespace Trismegiste\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * CustomerController is ...
 *
 * @author flo
 */
class CustomerController extends Template
{

    protected function getTopMenu()
    {
        return array();
    }

    public function indexAction()
    {
        $customer = $this->get('dokudoki.collection')->find(array('-class' => 'customer'));
        $newCustomer = $this->createForm(new \Trismegiste\FrontBundle\Form\CustomerType());

        return $this->render('TrismegisteFrontBundle:Customer:index.html.twig', array(
                    'listing' => $customer, 'form' => $newCustomer->createView()));
    }

    public function createAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $customer = $this->createForm(new \Trismegiste\FrontBundle\Form\CustomerType());
            $customer->bind($request);
            if ($customer->isValid()) {
                $this->get('dokudoki.repository')->persist($customer->getData());
            }
        }
        return $this->indexAction();
    }

}