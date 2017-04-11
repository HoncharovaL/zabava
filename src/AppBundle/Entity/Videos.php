<?php

namespace AppBundle\Entity;

/**
 * Videos
 */
class Videos
{
    /**
     * @var string
     */
    private $video;

    /**
     * @var integer
     */
    private $idVideo;

    /**
     * @var \AppBundle\Entity\Dogs
     */
    private $idDogs;

    /**
     * @var \AppBundle\Entity\News
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
