<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nursery
 *
 * @ORM\Table(name="nursery")
 * @ORM\Entity
 */
class Nursery
{
    /**
     * @var string
     *
     * @ORM\Column(name="name_nur", type="string", length=200, nullable=false)
     */
    private $nameNur;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name_nur_en", type="string", length=200, nullable=false)
     */
    private $nameNur_en;
    function getNameNur_en() {
        return $this->nameNur_en;
    }

    function setNameNur_en($nameNur_en) {
        $this->nameNur_en = $nameNur_en;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bdate", type="date", nullable=false)
     */
    private $bdate;

    /**
     * @var string
     *
     * @ORM\Column(name="owner", type="string", length=200, nullable=false)
     */
    private $owner;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_en", type="string", length=200, nullable=false)
     */
    private $owner_en;
    function getOwner_en() {
        return $this->owner_en;
    }

    function setOwner_en($owner_en) {
        $this->owner_en = $owner_en;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=200, nullable=false)
     */
    private $adress;
    
    /**
     * @var string
     *
     * @ORM\Column(name="adress_en", type="string", length=200, nullable=false)
     */
    private $adress_en;
    function getAdress_en() {
        return $this->adress_en;
    }

    function setAdress_en($adress_en) {
        $this->adress_en = $adress_en;
    }

        /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=50, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="cellphone", type="string", length=50, nullable=false)
     */
    private $cellphone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_nursery", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNursery;

 /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=50)
     */
    private $photo;
    
     /**
     * @var string
     *
     * @ORM\Column(name="about",  type="text", length=65535)
     */
    private $about;
    
     /**
     * @var string
     *
     * @ORM\Column(name="about_en",  type="text", length=65535)
     */
    private $about_en;
    function getAbout_en() {
        return $this->about_en;
    }

    function setAbout_en($about_en) {
        $this->about_en = $about_en;
    }

        public function getAbout() {
        return $this->about;
    }

    public function setAbout($about) {
        $this->about = $about;
    }

        public function getPhoto() {
        return $this->photo;
    }

    public function getSite() {
        return $this->site;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function setSite($site) {
        $this->site = $site;
    }

        /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=100)
     */
    private $site;

    /**
     * Set nameNur
     *
     * @param string $nameNur
     *
     * @return Nursery
     */
    public function setNameNur($nameNur)
    {
        $this->nameNur = $nameNur;

        return $this;
    }

    /**
     * Get nameNur
     *
     * @return string
     */
    public function getNameNur()
    {
        return $this->nameNur;
    }

    /**
     * Set bdate
     *
     * @param \DateTime $bdate
     *
     * @return Nursery
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
     * Set owner
     *
     * @param string $owner
     *
     * @return Nursery
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return Nursery
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Nursery
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set cellphone
     *
     * @param string $cellphone
     *
     * @return Nursery
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    /**
     * Get cellphone
     *
     * @return string
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Nursery
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get idNursery
     *
     * @return integer
     */
    public function getIdNursery()
    {
        return $this->idNursery;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->nameNur;;
    }
}
