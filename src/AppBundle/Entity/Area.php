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
}
