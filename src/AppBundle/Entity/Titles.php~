<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Titles
 *  
 * @ORM\Table(name="titles")
 * @ORM\Entity
 */
class Titles
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=200, nullable=false)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_titles", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTitles;


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Titles
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
     * Get idTitles
     *
     * @return integer
     */
    public function getIdTitles()
    {
        return $this->idTitles;
    }
}
