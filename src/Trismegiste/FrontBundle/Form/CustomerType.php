<?php

/*
 * TodayBlog
 */

namespace Trismegiste\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * CustomerType is ...
 *
 */
class CustomerType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('subdomain');
        $builder->add('password', 'password');
    }

    public function getName()
    {
        return 'customer';
    }

    public function getParent()
    {
        return 'magic_form';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('class_key' => $this->getName()));
    }

}