<?php

namespace AppBundle\Entity;




use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * BaseForms
 * @Vich\Uploadable
 */
class BaseForms
{

    private $typeReport;

    private $formReport;

    /**
     * @var integer
     */
    private $id;

     /**
     * @var string
     */
    private $description;

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
     * Get typeReport
     *
     * @return integer 
     */
    public function getTypeReport()
    {
        return $this->typeReport;
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




    /**
     * @var integer
     */
    private $typeReportId;

    /**
     * Set typeReportId
     *
     * @param integer $typeReportId
     * @return BaseForms
     */
    public function setTypeReportId($typeReportId)
    {
        $this->typeReportId = $typeReportId;

        return $this;
    }

    /**
     * Get typeReportId
     *
     * @return integer 
     */
    public function getTypeReportId()
    {
        return $this->typeReportId;
    }



    /**
     * @var integer
     */
    private $formReportId;


    /**
     * Set formReportId
     *
     * @param integer $formReportId
     * @return BaseForms
     */
    public function setFormReportId($formReportId)
    {
        $this->formReportId = $formReportId;

        return $this;
    }

    /**
     * Get formReportId
     *
     * @return integer
     */
    public function getFormReportId()
    {
        return $this->formReportId;
    }









    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     *
     * @return Product
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }



    /**
     * @var integer
     */
    private $organizationId;

    /**
     * @var \AppBundle\Entity\Organization
     */
    private $organization;


    /**
     * Set organizationId
     *
     * @param integer $organizationId
     * @return BaseForms
     */
    public function setOrganizationId($organizationId)
    {
        $this->organizationId = $organizationId;

        return $this;
    }

    /**
     * Get organizationId
     *
     * @return integer 
     */
    public function getOrganizationId()
    {
        return $this->organizationId;
    }

    /**
     * Set organization
     *
     * @param \AppBundle\Entity\Organization $organization
     * @return BaseForms
     */
    public function setOrganization(\AppBundle\Entity\Organization $organization = null)
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * Get organization
     *
     * @return \AppBundle\Entity\Organization 
     */
    public function getOrganization()
    {
        return $this->organization;
    }
    /**
     * @var integer
     */
    private $createUserId;

    /**
     * @var \UserBundle\Entity\User
     */
    private $createUser;


    /**
     * Set createUserId
     *
     * @param integer $createUserId
     * @return BaseForms
     */
    public function setCreateUserId($createUserId)
    {
        $this->createUserId = $createUserId;

        return $this;
    }

    /**
     * Get createUserId
     *
     * @return integer 
     */
    public function getCreateUserId()
    {
        return $this->createUserId;
    }

    /**
     * Set createUser
     *
     * @param \UserBundle\Entity\User $createUser
     * @return BaseForms
     */
    public function setCreateUser(\UserBundle\Entity\User $createUser = null)
    {
        $this->createUser = $createUser;

        return $this;
    }

    /**
     * Get createUser
     *
     * @return \UserBundle\Entity\User
     */
    public function getCreateUser()
    {
        return $this->createUser;
    }
    /**
     * @var integer
     */
    private $areaId;

    /**
     * @var \AppBundle\Entity\area
     */
    private $area;


    /**
     * Set areaId
     *
     * @param integer $areaId
     * @return BaseForms
     */
    public function setAreaId($areaId)
    {
        $this->areaId = $areaId;

        return $this;
    }

    /**
     * Get areaId
     *
     * @return integer 
     */
    public function getAreaId()
    {
        return $this->areaId;
    }

    /**
     * Set area
     *
     * @param \AppBundle\Entity\area $area
     * @return BaseForms
     */
    public function setArea(\AppBundle\Entity\area $area = null)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return \AppBundle\Entity\area 
     */
    public function getArea()
    {
        return $this->area;
    }
}
