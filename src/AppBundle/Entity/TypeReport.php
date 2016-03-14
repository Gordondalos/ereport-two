<?php

namespace AppBundle\Entity;

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
}
