<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Services
 *  
 * @ORM\Table(name="services")
 * @ORM\Entity
 */
class Services
{
    /**
     * @var string
     *   
     * @ORM\Column(name="services", type="string", length=200, nullable=false)
     */
    private $services;

    /**
     * @var string
     *   
     * @ORM\Column(name="description", type="string", length=200, nullable=false)
     */
    private $description;

    /**
     * @var string
     *      
     * @ORM\Column(name="price", type="string", length=200, nullable=false)
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_services", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
