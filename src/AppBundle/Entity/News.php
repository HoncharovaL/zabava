<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="news", indexes={@ORM\Index(name="news_type", columns={"news_type"}), @ORM\Index(name="ndate", columns={"ndate"})})
 * @ORM\Entity
 */
class News
{
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
     * @ORM\Column(name="news_photo", type="string", length=300, nullable=false)
     */
    private $newsPhoto;

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
     * Set newsPhoto
     *
     * @param string $newsPhoto
     *
     * @return News
     */
    public function setNewsPhoto($newsPhoto)
    {
        $this->newsPhoto = $newsPhoto;

        return $this;
    }

    /**
     * Get newsPhoto
     *
     * @return string
     */
    public function getNewsPhoto()
    {
        return $this->newsPhoto;
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
}
