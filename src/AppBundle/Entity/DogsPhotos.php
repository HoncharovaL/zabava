<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DogsPhotos
 *
 * @ORM\Table(name="dogs_photos", indexes={@ORM\Index(name="id_dogs", columns={"id_dogs"}), @ORM\Index(name="id_news", columns={"id_news"})})
 * @ORM\Entity
 */
class DogsPhotos
{
    /**
     * @var string
     *
     * @ORM\Column(name="photos", type="string", length=300, nullable=false)
     */
    private $photos;

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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dogs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dogs", referencedColumnName="id_dogs")
     * })
     */
    private $idDogs;

    /**
     * @var \AppBundle\Entity\News
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\News")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_news", referencedColumnName="id_news")
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
    public function setPhotos($photos)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Get photos
     *
     * @return string
     */
    public function getPhotos()
    {
        return $this->photos;
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
