<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BaseForms
 */
class BaseForms
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $formReport;

    /**
     * @var integer
     */
    private $typeReport;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $organization;

    /**
     * @var string
     */
    private $fileAdress;

    /**
     * @var \DateTime
     */
    private $dateAccepted;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set formReport
     *
     * @param integer $formReport
     * @return BaseForms
     */
    public function setFormReport($formReport)
    {
        $this->formReport = $formReport;

        return $this;
    }

    /**
     * Get formReport
     *
     * @return integer 
     */
    public function getFormReport()
    {
        return $this->formReport;
    }

    /**
     * Set typeReport
     *
     * @param integer $typeReport
     * @return BaseForms
     */
    public function setTypeReport($typeReport)
    {
        $this->typeReport = $typeReport;

        return $this;
    }

    /**
     * Get typeReport
     *
     * @return integer 
     */
    public function getTypeReport()
    {
        return $this->typeReport;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return BaseForms
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set organization
     *
     * @param integer $organization
     * @return BaseForms
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * Get organization
     *
     * @return integer 
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Set fileAdress
     *
     * @param string $fileAdress
     * @return BaseForms
     */
    public function setFileAdress($fileAdress)
    {
        $this->fileAdress = $fileAdress;

        return $this;
    }

    /**
     * Get fileAdress
     *
     * @return string 
     */
    public function getFileAdress()
    {
        return $this->fileAdress;
    }

    /**
     * Set dateAccepted
     *
     * @param \DateTime $dateAccepted
     * @return BaseForms
     */
    public function setDateAccepted($dateAccepted)
    {
        $this->dateAccepted = $dateAccepted;

        return $this;
    }

    /**
     * Get dateAccepted
     *
     * @return \DateTime 
     */
    public function getDateAccepted()
    {
        return $this->dateAccepted;
    }
}
