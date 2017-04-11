<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DogVaccinations
 *
 * @ORM\Table(name="dog_vaccinations", indexes={@ORM\Index(name="id_dogs", columns={"id_dogs"}), @ORM\Index(name="id_vaccinations", columns={"id_vaccinations"})})
 * @ORM\Entity
 */
class DogVaccinations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_dog_vac", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDogVac;

    /**
     * @var \AppBundle\Entity\Dogs
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dogs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dogs", referencedColumnName="id_dogs")
     * })
     */
    private $idDogs;

    /**
     * @var \AppBundle\Entity\Vaccinations
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vaccinations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_vaccinations", referencedColumnName="id_vaccinations")
     * })
     */
    private $idVaccinations;



    /**
     * Get idDogVac
     *
     * @return integer
     */
    public function getIdDogVac()
    {
        return $this->idDogVac;
    }

    /**
     * Set idDogs
     *
     * @param \AppBundle\Entity\Dogs $idDogs
     *
     * @return DogVaccinations
     */
    public function setIdDogs(\AppBundle\Entity\Dogs $idDogs = null)
    {
        $this->idDogs = $idDogs;

        return $this;
    }

    /**
     * Get idDogs
     *
     * @return \AppBundle\Entity\Dogs
     */
    public function getIdDogs()
    {
        return $this->idDogs;
    }

    /**
     * Set idVaccinations
     *
     * @param \AppBundle\Entity\Vaccinations $idVaccinations
     *
     * @return DogVaccinations
     */
    public function setIdVaccinations(\AppBundle\Entity\Vaccinations $idVaccinations = null)
    {
        $this->idVaccinations = $idVaccinations;

        return $this;
    }

    /**
     * Get idVaccinations
     *
     * @return \AppBundle\Entity\Vaccinations
     */
    public function getIdVaccinations()
    {
        return $this->idVaccinations;
    }
}
