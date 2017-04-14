<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Litters
 *
 * @ORM\Table(name="litters", indexes={@ORM\Index(name="id_mother", columns={"id_mother"}), @ORM\Index(name="id_father", columns={"id_father"})})
 * @ORM\Entity
 */
class Litters
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ldate", type="date", nullable=false)
     */
    private $ldate;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_litters", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLitters;

    /**
     * @var \AppBundle\Entity\Dogs
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dogs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_mother", referencedColumnName="id_dogs")
     * })
     */
    private $mother;

    /**
     * @var \AppBundle\Entity\Dogs
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dogs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_father", referencedColumnName="id_dogs")
     * })
     */
    private $father;

    /**
     * @var ArrayCollection|AppBundle\Entity\Dogs[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Dogs", mappedBy="litters")
     */
    private $dogs;

    public function __construct() {
        $this->dogs = new ArrayCollection();
    }

    /**
     * Set ldate
     *
     * @param \DateTime $ldate
     *
     * @return Litters
     */
    public function setLdate($ldate)
    {
        $this->ldate = $ldate;

        return $this;
    }

    /**
     * Get ldate
     *
     * @return \DateTime
     */
    public function getLdate()
    {
        return $this->ldate;
    }

    /**
     * Get idLitters
     *
     * @return integer
     */
    public function getIdLitters()
    {
        return $this->idLitters;
    }

    /**
     * Set idMother
     *
     * @param \AppBundle\Entity\Dogs $Mother
     *
     * @return Litters
     */
    public function setMother(\AppBundle\Entity\Dogs $Mother = null)
    {
        $this->mother = $Mother;

        return $this;
    }

    /**
     * Get Mother
     *
     * @return \AppBundle\Entity\Dogs
     */
    public function getMother()
    {
        return $this->mother;
    }

    /**
     * Set Father
     *
     * @param \AppBundle\Entity\Dogs $father
     *
     * @return Litters
     */
    public function setFather(\AppBundle\Entity\Dogs $father = null)
    {
        $this->father = $father;

        return $this;
    }

    /**
     * Get father
     *
     * @return \AppBundle\Entity\Dogs
     */
    public function getFather()
    {
        return $this->father;
    }

    /**
     * @return string
     */
    public function __toString() {
        return sprintf('%s + %s (%s)',
                $this->getFather()->getName(),
                $this->getMother()->getName(),
                $this->ldate->format('d.m.Y'));
    }

    /**
     * Set dogs
     *
     * @param ArrayCollection $dogs
     *
     * @return Litters
     */
    public function setDogs(ArrayCollection $dogs)
    {
        $this->dogs = $dogs;

        return $this;
    }

    /**
     * Get dogs
     *
     * @return ArrayCollection
     */
    public function getDogs()
    {
        return $this->dogs;
    }
}
