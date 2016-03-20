<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organization
 */
class Organization
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $organizationName;

    /**
     * @var string
     */
    private $organizationPhone;

    /**
     * @var string
     */
    private $description;


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
     * Set organizationName
     *
     * @param string $organizationName
     * @return Organization
     */
    public function setOrganizationName($organizationName)
    {
        $this->organizationName = $organizationName;

        return $this;
    }

    /**
     * Get organizationName
     *
     * @return string 
     */
    public function getOrganizationName()
    {
        return $this->organizationName;
    }

    /**
     * Set organizationPhone
     *
     * @param string $organizationPhone
     * @return Organization
     */
    public function setOrganizationPhone($organizationPhone)
    {
        $this->organizationPhone = $organizationPhone;

        return $this;
    }

    /**
     * Get organizationPhone
     *
     * @return string 
     */
    public function getOrganizationPhone()
    {
        return $this->organizationPhone;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Organization
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
     * @var string
     */
    private $organizationShortName;


    /**
     * Set organizationShortName
     *
     * @param string $organizationShortName
     * @return Organization
     */
    public function setOrganizationShortName($organizationShortName)
    {
        $this->organizationShortName = $organizationShortName;

        return $this;
    }

    /**
     * Get organizationShortName
     *
     * @return string 
     */
    public function getOrganizationShortName()
    {
        return $this->organizationShortName;
    }
    /**
     * @var string
     */
    private $organizationDescription;


    /**
     * Set organizationDescription
     *
     * @param string $organizationDescription
     * @return Organization
     */
    public function setOrganizationDescription($organizationDescription)
    {
        $this->organizationDescription = $organizationDescription;

        return $this;
    }

    /**
     * Get organizationDescription
     *
     * @return string 
     */
    public function getOrganizationDescription()
    {
        return $this->organizationDescription;
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
     * @return Organization
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
