<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Status
 */
class Status
{




    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $statusName;


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
     * Set statusName
     *
     * @param string $statusName
     * @return Status
     */
    public function setStatusName($statusName)
    {
        $this->statusName = $statusName;

        return $this;
    }

    /**
     * Get statusName
     *
     * @return string 
     */
    public function getStatusName()
    {
        return $this->statusName;
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
     * @return Status
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
