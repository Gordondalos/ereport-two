<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseClass;

/**
 * User
 */
class User extends BaseClass
{
    /**
     * @var integer
     */
    protected $id;

    protected $username;

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
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $phone;


    /**
     * Set description
     *
     * @param string $description
     * @return User
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
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * @var string
     */
    private $inn;

    /**
     * @var string
     */
    private $numberSocialnFond;

    /**
     * @var string
     */
    private $bank;

    /**
     * @var string
     */
    private $bankAccount;

    /**
     * @var string
     */
    private $bankBik;

    /**
     * @var string
     */
    private $director;

    /**
     * @var string
     */
    private $directorPhone;

    /**
     * @var string
     */
    private $buhgalter;

    /**
     * @var string
     */
    private $buhgalterphone;

    /**
     * @var string
     */
    private $phisicalAdress;

    /**
     * @var string
     */
    private $urAdress;

    /**
     * @var string
     */
    private $mailAdress;

    /**
     * @var string
     */
    private $site;

    /**
     * @var string
     */
    private $fullNameOrganization;

    /**
     * @var string
     */
    private $shortNameOrganization;

    /**
     * @var string
     */
    private $timeJob;

    /**
     * @var string
     */
    private $gns;

    /**
     * @var string
     */
    private $okpo;


    /**
     * Set inn
     *
     * @param string $inn
     * @return User
     */
    public function setInn($inn)
    {
        $this->inn = $inn;

        return $this;
    }

    /**
     * Get inn
     *
     * @return string 
     */
    public function getInn()
    {
        return $this->inn;
    }

    /**
     * Set numberSocialnFond
     *
     * @param string $numberSocialnFond
     * @return User
     */
    public function setNumberSocialnFond($numberSocialnFond)
    {
        $this->numberSocialnFond = $numberSocialnFond;

        return $this;
    }

    /**
     * Get numberSocialnFond
     *
     * @return string 
     */
    public function getNumberSocialnFond()
    {
        return $this->numberSocialnFond;
    }

    /**
     * Set bank
     *
     * @param string $bank
     * @return User
     */
    public function setBank($bank)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank
     *
     * @return string 
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Set bankAccount
     *
     * @param string $bankAccount
     * @return User
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;

        return $this;
    }

    /**
     * Get bankAccount
     *
     * @return string 
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * Set bankBik
     *
     * @param string $bankBik
     * @return User
     */
    public function setBankBik($bankBik)
    {
        $this->bankBik = $bankBik;

        return $this;
    }

    /**
     * Get bankBik
     *
     * @return string 
     */
    public function getBankBik()
    {
        return $this->bankBik;
    }

    /**
     * Set director
     *
     * @param string $director
     * @return User
     */
    public function setDirector($director)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get director
     *
     * @return string 
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set directorPhone
     *
     * @param string $directorPhone
     * @return User
     */
    public function setDirectorPhone($directorPhone)
    {
        $this->directorPhone = $directorPhone;

        return $this;
    }

    /**
     * Get directorPhone
     *
     * @return string 
     */
    public function getDirectorPhone()
    {
        return $this->directorPhone;
    }

    /**
     * Set buhgalter
     *
     * @param string $buhgalter
     * @return User
     */
    public function setBuhgalter($buhgalter)
    {
        $this->buhgalter = $buhgalter;

        return $this;
    }

    /**
     * Get buhgalter
     *
     * @return string 
     */
    public function getBuhgalter()
    {
        return $this->buhgalter;
    }

    /**
     * Set buhgalterphone
     *
     * @param string $buhgalterphone
     * @return User
     */
    public function setBuhgalterphone($buhgalterphone)
    {
        $this->buhgalterphone = $buhgalterphone;

        return $this;
    }

    /**
     * Get buhgalterphone
     *
     * @return string 
     */
    public function getBuhgalterphone()
    {
        return $this->buhgalterphone;
    }

    /**
     * Set phisicalAdress
     *
     * @param string $phisicalAdress
     * @return User
     */
    public function setPhisicalAdress($phisicalAdress)
    {
        $this->phisicalAdress = $phisicalAdress;

        return $this;
    }

    /**
     * Get phisicalAdress
     *
     * @return string 
     */
    public function getPhisicalAdress()
    {
        return $this->phisicalAdress;
    }

    /**
     * Set urAdress
     *
     * @param string $urAdress
     * @return User
     */
    public function setUrAdress($urAdress)
    {
        $this->urAdress = $urAdress;

        return $this;
    }

    /**
     * Get urAdress
     *
     * @return string 
     */
    public function getUrAdress()
    {
        return $this->urAdress;
    }

    /**
     * Set mailAdress
     *
     * @param string $mailAdress
     * @return User
     */
    public function setMailAdress($mailAdress)
    {
        $this->mailAdress = $mailAdress;

        return $this;
    }

    /**
     * Get mailAdress
     *
     * @return string 
     */
    public function getMailAdress()
    {
        return $this->mailAdress;
    }

    /**
     * Set site
     *
     * @param string $site
     * @return User
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string 
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set fullNameOrganization
     *
     * @param string $fullNameOrganization
     * @return User
     */
    public function setFullNameOrganization($fullNameOrganization)
    {
        $this->fullNameOrganization = $fullNameOrganization;

        return $this;
    }

    /**
     * Get fullNameOrganization
     *
     * @return string 
     */
    public function getFullNameOrganization()
    {
        return $this->fullNameOrganization;
    }

    /**
     * Set shortNameOrganization
     *
     * @param string $shortNameOrganization
     * @return User
     */
    public function setShortNameOrganization($shortNameOrganization)
    {
        $this->shortNameOrganization = $shortNameOrganization;

        return $this;
    }

    /**
     * Get shortNameOrganization
     *
     * @return string 
     */
    public function getShortNameOrganization()
    {
        return $this->shortNameOrganization;
    }

    /**
     * Set timeJob
     *
     * @param string $timeJob
     * @return User
     */
    public function setTimeJob($timeJob)
    {
        $this->timeJob = $timeJob;

        return $this;
    }

    /**
     * Get timeJob
     *
     * @return string 
     */
    public function getTimeJob()
    {
        return $this->timeJob;
    }

    /**
     * Set gns
     *
     * @param string $gns
     * @return User
     */
    public function setGns($gns)
    {
        $this->gns = $gns;

        return $this;
    }

    /**
     * Get gns
     *
     * @return string 
     */
    public function getGns()
    {
        return $this->gns;
    }

    /**
     * Set okpo
     *
     * @param string $okpo
     * @return User
     */
    public function setOkpo($okpo)
    {
        $this->okpo = $okpo;

        return $this;
    }

    /**
     * Get okpo
     *
     * @return string 
     */
    public function getOkpo()
    {
        return $this->okpo;
    }

    /**
     * @var string
     */
    private $directorPost;


    /**
     * Set directorPost
     *
     * @param string $directorPost
     * @return User
     */
    public function setDirectorPost($directorPost)
    {
        $this->directorPost = $directorPost;

        return $this;
    }

    /**
     * Get directorPost
     *
     * @return string 
     */
    public function getDirectorPost()
    {
        return $this->directorPost;
    }
    /**
     * @var string
     */
    private $dateRegistration;


    /**
     * Set dateRegistration
     *
     * @param string $dateRegistration
     * @return User
     */
    public function setDateRegistration($dateRegistration)
    {
        $this->dateRegistration = $dateRegistration;

        return $this;
    }

    /**
     * Get dateRegistration
     *
     * @return string 
     */
    public function getDateRegistration()
    {
        return $this->dateRegistration;
    }
    /**
     * @var string
     */
    private $okved;


    /**
     * Set okved
     *
     * @param string $okved
     * @return User
     */
    public function setOkved($okved)
    {
        $this->okved = $okved;

        return $this;
    }

    /**
     * Get okved
     *
     * @return string 
     */
    public function getOkved()
    {
        return $this->okved;
    }
}
