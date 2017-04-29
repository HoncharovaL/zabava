<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vaccinations
 *  
 * @ORM\Table(name="vaccinations")
 * @ORM\Entity
 */
class Vaccinations
{
    /**
     * @var string
     *      
     * @ORM\Column(name="vaccinations", type="string", length=200, nullable=false)
     */
    private $vaccinations;
    /**
     * @var string
     *      
     * @ORM\Column(name="vaccinations_eng", type="string", length=200, nullable=false)
     */
    private $vaccinationsEng;
    function getVaccinationsEng() {
        return $this->vaccinationsEng;
    }

    function setVaccinationsEng($vaccinationsEng) {
        $this->vaccinationsEng = $vaccinationsEng;
    }

        /**
     * @var string
     */
    private $ageVac;

    /**
     * @var integer
     * 
     * @ORM\Column(name="id_vaccinations", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVaccinations;


    /**
     * Set vaccinations
     *
     * @param string $vaccinations
     *
     * @return Vaccinations
     */
    public function setVaccinations($vaccinations)
    {
        $this->vaccinations = $vaccinations;

        return $this;
    }

    /**
     * Get vaccinations
     *
     * @return string
     */
    public function getVaccinations()
    {
        return $this->vaccinations;
    }

    /**
     * Set ageVac
     *
     * @param string $ageVac
     *
     * @return Vaccinations
     */
    public function setAgeVac($ageVac)
    {
        $this->ageVac = $ageVac;

        return $this;
    }

    /**
     * Get ageVac
     *
     * @return string
     */
    public function getAgeVac()
    {
        return $this->ageVac;
    }

    /**
     * Get idVaccinations
     *
     * @return integer
     */
    public function getIdVaccinations()
    {
        return $this->idVaccinations;
    }
}
