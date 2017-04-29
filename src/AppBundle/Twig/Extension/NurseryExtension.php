<?php

namespace AppBundle\Twig\Extension;

use Doctrine\Bundle\DoctrineBundle\Registry;
use AppBundle\Entity\Nursery;

/**
 * Class NurseryExtension
 */
class NurseryExtension extends \Twig_Extension
{
    /**
     * @var Registry
     */
    private $doctrine;

    /**
     * @var Nursery
     */
    private $nursery;

    /**
     * @param Registry $doctrine
     */
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_Function('get_nursery_phonenumbers', [$this, 'getPhoneNumbers']),
            new \Twig_Function('get_nursery_owner', [$this, 'getOwner']),
            new \Twig_Function('get_nursery_email', [$this, 'getEmail']),
            new \Twig_Function('get_nursery_address', [$this, 'getAddress']),
            new \Twig_Function('get_nursery_id', [$this, 'getNurseryId']),
        ];
    }

    /**
     * @return array
     */
    public function getPhoneNumbers()
    {
        $this->findNursery();

        return [$this->nursery->getPhone(), $this->nursery->getCellPhone()];
    }

    public function getEmail()
    {
        $this->findNursery();

        return $this->nursery->getEmail();
    }

    public function getOwner()
    {
        $this->findNursery();

        return $this->nursery->getOwner();
    }

    public function getAddress()
    {
        $this->findNursery();

        return $this->nursery->getAdress();
    }

    public function getNurseryId()
    {
        $this->findNursery();

        return $this->nursery->getIdNursery();
    }

    private function findNursery()
    {
        if ($this->nursery === null) {
            $nurseries = $this->doctrine->getRepository('AppBundle:Nursery')->findAll();
            $this->nursery = $nurseries[0];
        }
    }
}
