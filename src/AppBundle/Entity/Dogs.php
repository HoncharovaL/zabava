<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Dogs
 *
 * @ORM\Table(name="dogs", indexes={@ORM\Index(name="id_litter", columns={"id_litter"}), @ORM\Index(name="id_nursery", columns={"id_nursery"})})
 * @ORM\Entity
 */
class Dogs {

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bdate", type="date", nullable=false)
     */
    private $bdate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=300, nullable=false)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="quality", type="string", length=100, nullable=false)
     */
    private $quality;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=10, nullable=false)
     */
    private $sex;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer")
     */
    private $state;
    function getState() {
        return $this->state;
    }

    function getDogtitles() {
        return $this->dogtitles;
    }

    function setState($state) {
        $this->state = $state;
    }

    function setDogtitles(ArrayCollection $dogtitles) {
        $this->dogtitles = $dogtitles;
    }

        /**
     * @var integer
     *
     * @ORM\Column(name="id_dogs", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDogs;

    /**
     * @var \AppBundle\Entity\Nursery
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Nursery")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_nursery", referencedColumnName="id_nursery")
     * })
     */
    private $nursery;

    /**
     * @var \AppBundle\Entity\Litters
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Litters", inversedBy="dogs")
     * @ORM\JoinColumn(name="id_litter", referencedColumnName="id_litters")
     */
    private $litters;

    function setLitters($litters) {
        $this->litters = $litters;
    }

    function getLitters() {
        return $this->litters;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Dogs
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set bdate
     *
     * @param \DateTime $bdate
     *
     * @return Dogs
     */
    public function setBdate($bdate) {
        $this->bdate = $bdate;

        return $this;
    }

    /**
     * Get bdate
     *
     * @return \DateTime
     */
    public function getBdate() {
        return $this->bdate;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Dogs
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Dogs
     */
    public function setPhoto($photo) {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto() {
        return $this->photo;
    }

    /**
     * Set quality
     *
     * @param string $quality
     *
     * @return Dogs
     */
    public function setQuality($quality) {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Get quality
     *
     * @return string
     */
    public function getQuality() {
        return $this->quality;
    }

    /**
     * Set sex
     *
     * @param string $sex
     *
     * @return Dogs
     */
    public function setSex($sex) {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string
     */
    public function getSex() {
        return $this->sex;
    }

    /**
     * Get idDogs
     *
     * @return integer
     */
    public function getIdDogs() {
        return $this->idDogs;
    }

    /**
     * Set nursery
     *
     * @param \AppBundle\Entity\Nursery $nursery
     *
     * @return Dogs
     */
    public function setNursery(\AppBundle\Entity\Nursery $nursery = null) {
        $this->nursery = $nursery;

        return $this;
    }

    /**
     * Get nursery
     *
     * @return \AppBundle\Entity\Nursery
     */
    public function getNursery() {
        return $this->nursery;
    }
 /**
     * @var ArrayCollection|AppBundle\Entity\DogTitles[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DogTitles", mappedBy="dogtitles")
     */
    private $dogtitles;

    public function __construct() {
        $this->dogtitles = new ArrayCollection();
    }

    /**
     * Add dogtitle
     *
     * @param \AppBundle\Entity\DogTitles $dogtitle
     *
     * @return Dogs
     */
    public function addDogtitle(\AppBundle\Entity\DogTitles $dogtitle)
    {
        $this->dogtitles[] = $dogtitle;

        return $this;
    }

    /**
     * Remove dogtitle
     *
     * @param \AppBundle\Entity\DogTitles $dogtitle
     */
    public function removeDogtitle(\AppBundle\Entity\DogTitles $dogtitle)
    {
        $this->dogtitles->removeElement($dogtitle);
    }
}
