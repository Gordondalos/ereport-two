<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormReport
 */
class FormReport
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $formName;


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
     * Set formName
     *
     * @param string $formName
     * @return FormReport
     */
    public function setFormName($formName)
    {
        $this->formName = $formName;

        return $this;
    }

    /**
     * Get formName
     *
     * @return string 
     */
    public function getFormName()
    {
        return $this->formName;
    }
}
