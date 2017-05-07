<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DogTitles
 *
 * @ORM\Table(name="dog_titles", indexes={@ORM\Index(name="id_dogs", columns={"id_dogs"}), @ORM\Index(name="id_titles", columns={"id_titles"})})
 * @ORM\Entity
 */
class DogTitles
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_dog_tit", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDogTit;

    /**
     * @var \AppBundle\Entity\Titles
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Titles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_titles", referencedColumnName="id_titles")
     * })
     */
    private $titles;

    /**
     * @var \AppBundle\Entity\Dogs
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dogs", inversedBy="dogTitles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dogs", referencedColumnName="id_dogs")
     * })
     */
    private $idDogs;



    /**
     * Set description
     *
     * @param string $description
     *
     * @return DogTitles
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
     * Get idDogTit
     *
     * @return integer
     */
    public function getIdDogTit()
    {
        return $this->idDogTit;
    }

    /**
     * Set titles
     *
     * @param \AppBundle\Entity\Titles $titles
     *
     * @return DogTitles
     */
    public function setTitles(\AppBundle\Entity\Titles $titles = null)
    {
        $this->titles = $titles;

        return $this;
    }

    /**
     * Get titles
     *
     * @return \AppBundle\Entity\Titles
     */
    public function getTitles()
    {
        return $this->titles;
    }

    /**
     * Set idDogs
     *
     * @param \AppBundle\Entity\Dogs $idDogs
     *
     * @return DogTitles
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
}
