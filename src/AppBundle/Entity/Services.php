<?php

namespace AppBundle\Entity;

/**
 * Services
 */
class Services
{
    /**
     * @var string
     */
    private $services;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $price;

    /**
     * @var integer
     */
    private $idServices;


    /**
     * Set services
     *
     * @param string $services
     *
     * @return Services
     */
    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * Get services
     *
     * @return string
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Services
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Services
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get idServices
     *
     * @return integer
     */
    public function getIdServices()
    {
        return $this->idServices;
    }
}
