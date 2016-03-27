<?php

namespace NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 */
class News
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $shortNews;

    /**
     * @var string
     */
    private $AllNews;

    /**
     * @var \DateTime
     */
    private $dateNews;


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
     * Set shortNews
     *
     * @param string $shortNews
     * @return News
     */
    public function setShortNews($shortNews)
    {
        $this->shortNews = $shortNews;

        return $this;
    }

    /**
     * Get shortNews
     *
     * @return string 
     */
    public function getShortNews()
    {
        return $this->shortNews;
    }

    /**
     * Set AllNews
     *
     * @param string $allNews
     * @return News
     */
    public function setAllNews($allNews)
    {
        $this->AllNews = $allNews;

        return $this;
    }

    /**
     * Get AllNews
     *
     * @return string 
     */
    public function getAllNews()
    {
        return $this->AllNews;
    }

    /**
     * Set dateNews
     *
     * @param \DateTime $dateNews
     * @return News
     */
    public function setDateNews($dateNews)
    {
        $this->dateNews = $dateNews;

        return $this;
    }

    /**
     * Get dateNews
     *
     * @return \DateTime 
     */
    public function getDateNews()
    {
        return $this->dateNews;
    }
    /**
     * @var string
     */
    private $newsTitle;


    /**
     * Set newsTitle
     *
     * @param string $newsTitle
     * @return News
     */
    public function setNewsTitle($newsTitle)
    {
        $this->newsTitle = $newsTitle;

        return $this;
    }

    /**
     * Get newsTitle
     *
     * @return string 
     */
    public function getNewsTitle()
    {
        return $this->newsTitle;
    }
}
