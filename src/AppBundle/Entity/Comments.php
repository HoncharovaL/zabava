<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments", indexes={@ORM\Index(name="id_dogs", columns={"id_dogs"}), @ORM\Index(name="id_services", columns={"id_services"})})
 * @ORM\Entity
 */
class Comments
{
    /**
     * @var string
     *
     * @ORM\Column(name="klname", type="string", length=100, nullable=false)
     */
    private $klname;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=100, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="text", length=65535, nullable=false)
     */
    private $question;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_comments", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idComments;

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
     * @var \DateTime
     *
     * @ORM\Column(name="cdate", type="date", nullable=false)
     */
    private $cdate;
    
    /* function setIdNursery($idNursery) {
        $this->idNursery = $idNursery;
    }*/
        /**
     * @var \AppBundle\Entity\Services
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Services")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_services", referencedColumnName="id_services")
     * })
     */
    private $idServices;

 /**
     * @var \AppBundle\Entity\Nursery
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Nursery")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_nursery", referencedColumnName="id_nursery")
     * })
     */
    private $idNursery;

    /**
     * Set klname
     *
     * @param string $klname
     *
     * @return Comments
     */
    
    function getIdDogs() {
        return $this->idDogs;
    }

    function getIdServices() {
        return $this->idServices;
    }

    function getIdNursery() {
        return $this->idNursery;
    }

    function setIdDogs(\AppBundle\Entity\Dogs $idDogs) {
        $this->idDogs = $idDogs;
    }

    function setIdServices(\AppBundle\Entity\Services $idServices) {
        $this->idServices = $idServices;
    }

    function setIdNursery(\AppBundle\Entity\Nursery $idNursery) {
        $this->idNursery = $idNursery;
    }
   
    public function setKlname($klname)
    {
        $this->klname = $klname;

        return $this;
    }

    /**
     * Get klname
     *
     * @return string
     */
    public function getKlname()
    {
        return $this->klname;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Comments
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
     * Set email
     *
     * @param string $email
     *
     * @return Comments
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
     * Set question
     *
     * @param string $question
     *
     * @return Comments
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Get idComments
     *
     * @return integer
     */
    public function getIdComments()
    {
        return $this->idComments;
    }
     /**
     * Set cdate
     *
     * @param \DateTime $cdate
     *
     * @return Comments
     */
    public function setCdate($cdate) {
        $this->cdate = $cdate;

        return $this;
    }

    /**
     * Get cdate
     *
     * @return \DateTime
     */
    public function getCdate() {
        return $this->cdate;
    }

    
}
