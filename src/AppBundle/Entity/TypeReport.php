<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TypeReport
 */
class TypeReport
{


       /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $typeName;


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
     * Set typeName
     *
     * @param string $typeName
     * @return TypeReport
     */
    public function setTypeName($typeName)
    {
        $this->typeName = $typeName;

        return $this;
    }

    /**
     * Get typeName
     *
     * @return string 
     */
    public function getTypeName()
    {
        return $this->typeName;
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
     * @return TypeReport
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
