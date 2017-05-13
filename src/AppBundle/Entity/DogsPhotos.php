<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * DogsPhotos
 *
 * @ORM\Table(name="dogs_photos", indexes={@ORM\Index(name="id_dogs", columns={"id_dogs"}), @ORM\Index(name="id_news", columns={"id_news"})})
 * @ORM\Entity
 * @Vich\Uploadable
 */
class DogsPhotos
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
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=300, nullable=true)
     */
    private $photo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_dog_ph", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDogPh;

    /**
     * @var \AppBundle\Entity\Dogs
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dogs", inversedBy="dogsPhotos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dogs", referencedColumnName="id_dogs")
     * })
     */
    private $idDogs;

    /**
     * @var \AppBundle\Entity\News
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\News", inversedBy="dogsPhotos")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_news", referencedColumnName="id_news")
     * })
     */
    private $idNews;



    /**
     * Set photos
     *
     * @param string $photos
     *
     * @return DogsPhotos
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photos
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Get idDogPh
     *
     * @return integer
     */
    public function getIdDogPh()
    {
        return $this->idDogPh;
    }

    /**
     * Set idDogs
     *
     * @param \AppBundle\Entity\Dogs $idDogs
     *
     * @return DogsPhotos
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
     * Set idNews
     *
     * @param \AppBundle\Entity\News $idNews
     *
     * @return DogsPhotos
     */
    public function setIdNews(\AppBundle\Entity\News $idNews = null)
    {
        $this->idNews = $idNews;

        return $this;
    }

    /**
     * Get idNews
     *
     * @return \AppBundle\Entity\News
     */
    public function getIdNews()
    {
        return $this->idNews;
    }
}
