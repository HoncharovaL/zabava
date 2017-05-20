<?php

namespace AppBundle\Twig\Extension;

class AgeCalculatorExtension extends \Twig_Extension
{

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_Function('calculate_age', [$this, 'calculateAge']),
        ];
    }

    public function calculateAge(\DateTime $bdate)
    {
        $currentDate = new \DateTime();
        $interval = $currentDate->diff($bdate);
        return $interval;
    }

}
