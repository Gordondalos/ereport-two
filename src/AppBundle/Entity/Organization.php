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
}
