<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Report
 */
class Report
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nameReport;

    /**
     * @var \DateTime
     */
    private $dateIn;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $organization;

    /**
     * @var integer
     */
    private $status;

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
     * Set nameReport
     *
     * @param string $nameReport
     * @return Report
     */
    public function setNameReport($nameReport)
    {
        $this->nameReport = $nameReport;

        return $this;
    }

    /**
     * Get nameReport
     *
     * @return string 
     */
    public function getNameReport()
    {
        return $this->nameReport;
    }

    /**
     * Set dateIn
     *
     * @param \DateTime $dateIn
     * @return Report
     */
    public function setDateIn($dateIn)
    {
        $this->dateIn = $dateIn;

        return $this;
    }

    /**
     * Get dateIn
     *
     * @return \DateTime 
     */
    public function getDateIn()
    {
        return $this->dateIn;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Report
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
     * @return Report
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
     * Set status
     *
     * @param integer $status
     * @return Report
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set dateAccepted
     *
     * @param \DateTime $dateAccepted
     * @return Report
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
    /**
     * @var string
     */
    private $formReport;

    /**
     * @var string
     */
    private $typeReport;

    /**
     * @var string
     */
    private $fileAdress;

    /**
     * @var integer
     */
    private $area;


    /**
     * Set formReport
     *
     * @param string $formReport
     * @return Report
     */
    public function setFormReport($formReport)
    {
        $this->formReport = $formReport;

        return $this;
    }

    /**
     * Get formReport
     *
     * @return string 
     */
    public function getFormReport()
    {
        return $this->formReport;
    }

    /**
     * Set typeReport
     *
     * @param string $typeReport
     * @return Report
     */
    public function setTypeReport($typeReport)
    {
        $this->typeReport = $typeReport;

        return $this;
    }

    /**
     * Get typeReport
     *
     * @return string 
     */
    public function getTypeReport()
    {
        return $this->typeReport;
    }

    /**
     * Set fileAdress
     *
     * @param string $fileAdress
     * @return Report
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
     * Set area
     *
     * @param integer $area
     * @return Report
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return integer 
     */
    public function getArea()
    {
        return $this->area;
    }
}
