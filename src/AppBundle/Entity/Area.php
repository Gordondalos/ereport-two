<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Area
 */
class Area
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $nameArea;


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
     * Set nameArea
     *
     * @param integer $nameArea
     * @return Area
     */
    public function setNameArea($nameArea)
    {
        $this->nameArea = $nameArea;

        return $this;
    }

    /**
     * Get nameArea
     *
     * @return integer 
     */
    public function getNameArea()
    {
        return $this->nameArea;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $baseForms;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->baseForms = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add baseForms
     *
     * @param \AppBundle\Entity\BaseForms $baseForms
     * @return Area
     */
    public function addBaseForm(\AppBundle\Entity\BaseForms $baseForms)
    {
        $this->baseForms[] = $baseForms;

        return $this;
    }

    /**
     * Remove baseForms
     *
     * @param \AppBundle\Entity\BaseForms $baseForms
     */
    public function removeBaseForm(\AppBundle\Entity\BaseForms $baseForms)
    {
        $this->baseForms->removeElement($baseForms);
    }

    /**
     * Get baseForms
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBaseForms()
    {
        return $this->baseForms;
    }
}
