<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Nursery
 *
 * @ORM\Table(name="nursery")
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Nursery
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


    /**
     * @var string
     *
     * @ORM\Column(name="name_nur", type="string", length=200,nullable=true)
     */
    private $nameNur;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name_nur_en", type="string", length=200,nullable=true)
     */
    private $nameNurEn;
    

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bdate", type="date",nullable=true)
     */
    private $bdate;

    /**
     * @var string
     *
     * @ORM\Column(name="owner", type="string", length=200,nullable=true)
     */
    private $owner;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_en", type="string", length=200,nullable=true)
     */
    private $ownerEn;
    
    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=200,nullable=true)
     */
    private $adress;
    
    /**
     * @var string
     *
     * @ORM\Column(name="adress_en", type="string", length=200,nullable=true)
     */
    private $adressEn;
     

        /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=50,nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="cellphone", type="string", length=50,nullable=true)
     */
    private $cellphone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100,nullable=true)
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
     * 
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;
    
     /**
     * @var string
     *
     * @ORM\Column(name="about",  type="text", length=65535,nullable=true)
     */
    private $about;
    
     /**
     * @var string
     *
     * @ORM\Column(name="about_en",  type="text", length=65535,nullable=true)
     */
    private $aboutEn;
     public function getAboutEn() {
        return $this->aboutEn;
    }

     public function setAboutEn($aboutEn) {
        $this->aboutEn = $aboutEn;
    }

        public function getAbout() {
        return $this->about;
    }

    public function setAbout($about) {
        $this->about = $about;
    }


    public function getSite() {
        return $this->site;
    }

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
     * Get nameNurEn
     *
     * @return string
     */
    public function getNameNurEn() {
        return $this->nameNurEn;
    }
    /**
     * Set nameNurEn
     *
     * @param string $nameNurEn
     *
     * @return Nursery
     */
     public function setNameNurEn($nameNurEn) {
        $this->nameNurEn = $nameNurEn;
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
     * Get ownerEn
     *
     * @return string
     */
    public function getOwnerEn() {
        return $this->ownerEn;
    }
    /**
     * Set ownerEn
     *
     * @param string $ownerEn
     *
     * @return Nursery
     */
    public function setOwnerEn($ownerEn) {
        $this->ownerEn = $ownerEn;
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
     * Get adressEn
     *
     * @return string
     */
    public function getAdressEn() {
        return $this->adressEn;
    }
    /**
     * Set adressEn
     *
     * @param string $adressEn
     *
     * @return Nursery
     */
     public function setAdressEn($adressEn) {
        $this->adressEn = $adressEn;
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
        return $this->nameNur;
    }
}
