<?php

namespace IDCI\Bundle\SimpleScheduleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use IDCI\Bundle\SimpleScheduleBundle\Form\DataTransformer\ArrayToStringTransformer;
use IDCI\Bundle\SimpleScheduleBundle\Entity\Recur;

class WeekDaysType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new ArrayToStringTransformer();
        $builder->addModelTransformer($transformer);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'choices'         => Recur::getWeekDays(),
            'multiple'        => true,
            'expanded'        => false,
            'invalid_message' => 'The selected week days does not exist',
        ));
    }

    public function getParent()
    {
        return 'choice';
    }

    public function getName()
    {
        return 'week_days';
    }
}
