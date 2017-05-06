<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * News
 *
 * @ORM\Table(name="news", indexes={@ORM\Index(name="news_type", columns={"news_type"}), @ORM\Index(name="ndate", columns={"ndate"})})
 * @ORM\Entity
  * @Vich\Uploadable
 */
class News
{/**
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
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ndate", type="date", nullable=false)
     */
    private $ndate;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=300, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="newsdesc", type="text", length=65535, nullable=false)
     */
    private $newsdesc;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=300, nullable=true)
     */
    private $photo;
  /**
     * Set photo
     * 
     * @param string $photo
     *
     * @return Nursery
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     * 
     * @return string|null
     */
    public function getPhoto()
    {
        return $this->photo;
    }

        /**
     * @var string
     *
     * @ORM\Column(name="news_type", type="string", length=50, nullable=false)
     */
    private $newsType;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_news", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNews;

/**
     * @var string
     *
     * @ORM\Column(name="title_en", type="string", length=300, nullable=false)
     */
    private $titleEn;
    
     /**
     * @var \AppBundle\Entity\News
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DogsPhotos", mappedBy="idNews", cascade={"ALL"}, orphanRemoval=true)
     */
    private $dogsPhotos = [];
    /**
     * @var \AppBundle\Entity\Videos
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Videos", mappedBy="idNews", cascade={"ALL"}, orphanRemoval=true)
     */
    private $videos = [];
    
    /**
     * @var string
     *
     * @ORM\Column(name="newsdesc_en", type="text", length=65535, nullable=false)
     */
    private $newsdescEn;
    
    function getUpdatedAt() {
        return $this->updatedAt;
    }

    function getDogsPhotos() {
        return $this->dogsPhotos;
    }

    function getVideos() {
        return $this->videos;
    }
    
    function setUpdatedAt(\DateTime $updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    function setDogsPhotos($dogsPhotos) {
        foreach($dogsPhotos as $photo) {
            $photo->setIdNews($this);
            
        }
        $this->dogsPhotos = $dogsPhotos;
    }    
    function setVideos($videos) {
        foreach($videos as $video) {
            $video->setIdNews($this);
        }
        
        $this->videos = $videos;
    }
    
    public function removeVideos(Videos $video)
    {
        $this->videos->removeElement($video);
    }
    
    function getTitleEn() {
        return $this->titleEn;
    }

    function getNewsdescEn() {
        return $this->newsdescEn;
    }

    function setTitleEn($titleEn) {
        $this->titleEn = $titleEn;
    }

    function setNewsdescEn($newsdescEn) {
        $this->newsdescEn = $newsdescEn;
    }



    /**
     * Set ndate
     *
     * @param \DateTime $ndate
     *
     * @return News
     */
    public function setNdate($ndate)
    {
        $this->ndate = $ndate;

        return $this;
    }

    /**
     * Get ndate
     *
     * @return \DateTime
     */
    public function getNdate()
    {
        return $this->ndate;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return News
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set newsdesc
     *
     * @param string $newsdesc
     *
     * @return News
     */
    public function setNewsdesc($newsdesc)
    {
        $this->newsdesc = $newsdesc;

        return $this;
    }

    /**
     * Get newsdesc
     *
     * @return string
     */
    public function getNewsdesc()
    {
        return $this->newsdesc;
    }

    /**
     * Set newsType
     *
     * @param string $newsType
     *
     * @return News
     */
    public function setNewsType($newsType)
    {
        $this->newsType = $newsType;

        return $this;
    }

    /**
     * Get newsType
     *
     * @return string
     */
    public function getNewsType()
    {
        return $this->newsType;
    }

    /**
     * Get idNews
     *
     * @return integer
     */
    public function getIdNews()
    {
        return $this->idNews;
    }
    
    public function __construct() {
        $this->dogsPhotos = new ArrayCollection();
        $this->videos = new ArrayCollection();
    }
}
