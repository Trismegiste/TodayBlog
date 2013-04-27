<?php

/*
 * TodayBlog
 */

namespace Trismegiste\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * ArticleType is a form for a blog article
 */
class ArticleType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title');
        $builder->add('body', 'textarea');
    }

    public function getName()
    {
        return 'article';
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