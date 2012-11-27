<?php

namespace IDCI\Bundle\SimpleScheduleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use IDCI\Bundle\SimpleScheduleBundle\Form\DataTransformer\MetaToStringTransformer;

class MetaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('namespace', 'text', array('required' => false))
            ->add('key', 'text', array('required' => false))
            ->add('value', 'text', array('required' => false))
        ;

        $transformer = new MetaToStringTransformer();
        $builder->addModelTransformer($transformer);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        //$resolver->setDefaults();
    }

    public function getParent()
    {
        return 'field';
    }

    public function getName()
    {
        return 'meta';
    }
}