<?php

namespace IDCI\Bundle\SimpleScheduleBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class ArrayToStringTransformer implements DataTransformerInterface
{
    /**
     * Transforms a string (data) to an array.
     *
     * @param  string $week_days
     * @return array
     */
    public function transform($data)
    {
        if (null === $data) {
            return array();
        }

        return json_decode($data, true);
    }

    /**
     * Transforms an array (data) to a string.
     *
     * @param  array $data
     * @return string
     */
    public function reverseTransform($data)
    {
        return json_encode($data);
    }
}
