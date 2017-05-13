<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Videos
 *
 * @ORM\Table(name="videos", indexes={@ORM\Index(name="id_video", columns={"id_video"}), @ORM\Index(name="id_news", columns={"id_news"})})
 * @ORM\Entity
 */
class Videos
{
     /**
     * @var string
     *
     * @ORM\Column(name="video",  type="text", length=65535,nullable=true)
     */
    private $video;

/**
     * @var integer
     *
     * @ORM\Column(name="id_video", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVideo;

    /**
     * @var \AppBundle\Entity\Dogs
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dogs", inversedBy="videos")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_dogs", referencedColumnName="id_dogs")
     * })
     */
    private $idDogs;

    /**
     * @var \AppBundle\Entity\News
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\News", inversedBy="videos")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_news", referencedColumnName="id_news")
     * })
     */
    private $idNews;


    /**
     * Set video
     *
     * @param string $video
     *
     * @return Videos
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Get idVideo
     *
     * @return integer
     */
    public function getIdVideo()
    {
        return $this->idVideo;
    }

    /**
     * Set idDogs
     *
     * @param \AppBundle\Entity\Dogs $idDogs
     *
     * @return Videos
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
     * @return Videos
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
