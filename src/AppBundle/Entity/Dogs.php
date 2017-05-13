<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Dogs
 *
 * @ORM\Table(name="dogs", indexes={@ORM\Index(name="id_litter", columns={"id_litter"}), @ORM\Index(name="id_nursery", columns={"id_nursery"})})
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Dogs
{
    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="photo_image", fileNameProperty="photo")
     * 
     * @var File
     */
    private $photoFile;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Nursery
     */
    public function setPhotoFile(File $image = null)
    {
        $this->photoFile = $image;
        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getPhotoFile()
    {
        return $this->photoFile;
    }

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="name_en", type="string", length=100, nullable=false)
     */
    private $nameEn;

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
     * @ORM\Column(name="description_en", type="text", length=65535, nullable=false)
     */
    private $descriptionEn;

    function getNameEn()
    {
        return $this->nameEn;
    }

    function getDescriptionEn()
    {
        return $this->descriptionEn;
    }

    function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;
    }

    function setDescriptionEn($descriptionEn)
    {
        $this->descriptionEn = $descriptionEn;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=300, nullable=true)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="quality", type="string", length=100, nullable=true)
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
    private $state = 0;

    /**
     * @var \AppBundle\Entity\Dogs
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DogsPhotos", mappedBy="idDogs", cascade={"ALL"}, orphanRemoval=true)
     */
    private $dogsPhotos = [];

    /**
     * @var \AppBundle\Entity\Dogs
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Videos", mappedBy="idDogs", cascade={"ALL"}, orphanRemoval=true)
     */
    private $videos = [];

//    /**
//     * @var \AppBundle\Entity\Comments
//     *
//     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Comments", mappedBy="idDogs", onDelete="SET NULL", orphanRemoval=true)
//     */
//    private $comments = [];
//
//    /**
//     * @var \AppBundle\Entity\Litters
//     *
//     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Litters", mappedBy="mother", onDelete="SET NULL", orphanRemoval=true)
//     */
//    private $motherInLitters = [];
//
//    /**
//     * @var \AppBundle\Entity\Litters
//     *
//     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Litters", mappedBy="father", onDelete="SET NULL", orphanRemoval=true)
//     */
//    private $fatherInLitters = [];

    /**
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DogTitles", mappedBy="idDogs", cascade={"ALL"}, orphanRemoval=true)
     */
    private $dogTitles = [];

    /**
     * @var \AppBundle\Entity\Dogs
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DogVaccinations", mappedBy="idDogs", cascade={"ALL"}, orphanRemoval=true)
     */
    private $dogVaccinations = [];

    function getDogsPhotos()
    {
        return $this->dogsPhotos;
    }

    function getVideos()
    {
        return $this->videos;
    }

    function getDogVaccinations()
    {
        return $this->dogVaccinations;
    }

    function setDogsPhotos($dogsPhotos)
    {
        foreach ($dogsPhotos as $photo) {
            $photo->setIdDogs($this);
        }
        $this->dogsPhotos = $dogsPhotos;
    }

    public function setDogVaccinations($dogVaccinations)
    {
        foreach ($dogVaccinations as $dogVaccination) {
            $dogVaccination->setIdDogs($this);
        }

        $this->dogVaccinations = $dogVaccinations;
    }

    public function setDogTitles(array $dogTitles)
    {
        foreach ($dogTitles as $dogTitle) {
            $dogTitle->setIdDogs($this);
        }

        $this->dogTitles = $dogTitles;
    }

    public function setVideos($videos)
    {
        foreach ($videos as $video) {
            $video->setIdDogs($this);
        }

        $this->videos = $videos;
    }

    function getState()
    {
        return $this->state;
    }

    function getDogTitles()
    {
        return $this->dogTitles;
    }

    function setState($state)
    {
        $this->state = $state;
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

    function setLitters($litters)
    {
        $this->litters = $litters;
    }

    function getLitters()
    {
        return $this->litters;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Dogs
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set bdate
     *
     * @param \DateTime $bdate
     *
     * @return Dogs
     */
    public function setBdate($bdate)
    {
        $this->bdate = $bdate;

        return $this;
    }

    /**
     * Get bdate
     *
     * @return \DateTime
     */
    public function getBdate()
    {
        return $this->bdate;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Dogs
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
     * Set photo
     *
     * @param string $photo
     *
     * @return Dogs
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set quality
     *
     * @param string $quality
     *
     * @return Dogs
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Get quality
     *
     * @return string
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set sex
     *
     * @param string $sex
     *
     * @return Dogs
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Get idDogs
     *
     * @return integer
     */
    public function getIdDogs()
    {
        return $this->idDogs;
    }

    /**
     * Set nursery
     *
     * @param \AppBundle\Entity\Nursery $nursery
     *
     * @return Dogs
     */
    public function setNursery(\AppBundle\Entity\Nursery $nursery = null)
    {
        $this->nursery = $nursery;

        return $this;
    }

    /**
     * Get nursery
     *
     * @return \AppBundle\Entity\Nursery
     */
    public function getNursery()
    {
        return $this->nursery;
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
        $dogtitle->setIdDogs($this);
        $this->dogTitles->add($dogtitle);

        return $this;
    }

    /**
     * Remove dogtitle
     *
     * @param \AppBundle\Entity\DogTitles $dogtitle
     */
    public function removeDogtitle(\AppBundle\Entity\DogTitles $dogtitle)
    {
        $this->dogTitles->removeElement($dogtitle);
    }

    /**
     * Add dogVaccinations
     *
     * @param \AppBundle\Entity\DogTitles $dogVaccinations
     *
     * @return Dogs
     */
    public function addDogVaccination(\AppBundle\Entity\DogVaccinations $dogVaccinations)
    {
        $dogVaccinations->setIdDogs($this);
        $this->dogVaccinations->add($dogVaccinations);

        return $this;
    }

    /**
     * Remove dogVaccinations
     *
     * @param \AppBundle\Entity\dogVaccinations $dogVaccination
     */
    public function removeDogVaccination(\AppBundle\Entity\DogVaccinations $dogVaccination)
    {
        $this->dogVaccinations->removeElement($dogVaccination);
    }

    /**
     * Remove DogsPhotos
     *
     * @param \AppBundle\Entity\DogsPhotos $dogphoto
     */
    public function removeDogsphoto(\AppBundle\Entity\DogsPhotos $dogphoto)
    {
        $this->dogsPhotos->removeElement($dogphoto);
    }

    /**
     * Add $dogphoto
     *
     * @param \AppBundle\Entity\DogsPhotos $dogphoto
     *
     * @return Dogs
     */
    public function addDogsphoto(\AppBundle\Entity\DogsPhotos $dogphoto)
    {
        $dogphoto->setIdDogs($this);
        $this->dogsPhotos->add($dogphoto);

        return $this;
    }

    /**
     * Remove Videos
     *
     * @param \AppBundle\Entity\Videos $videos
     */
    public function removeVideo(\AppBundle\Entity\Videos $videos)
    {
        $this->videos->removeElement($videos);
    }

    /**
     * Add Videos
     *
     * @param \AppBundle\Entity\Videos $videos
     *
     * @return Dogs
     */
    public function addVideo(\AppBundle\Entity\Videos $videos)
    {
        $videos->setIdDogs($this);
        $this->videos->add($videos);

        return $this;
    }

    public function __construct()
    {
        $this->dogsPhotos = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->dogTitles = new ArrayCollection();
        $this->dogVaccinations = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->updatedAt = new \DateTime();
    }

    public function __toString()
    {
        return $this->name;
    }
}
