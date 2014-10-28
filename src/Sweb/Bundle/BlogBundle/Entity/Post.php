<?php
/**
 * @file: Post.php
 * @creator: Sindre Njøsen 
 * @description:
 * Date: 28.10.2014
 */
 

namespace Sweb\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sweb\Bundle\BlogBundle\Entity\User;

/**
 * @ORM\Entity
 * @ORM\Table(name="post")
 */
class Post {

	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string", length=40)
	 */
	protected $title;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $summary;

	/**
	 * @ORM\Column(type="string", length=200)
	 */
	protected $content;

	/**
	 * @ORM\ManyToOne(targetEntity="User", cascade={"all"}, fetch="EAGER")
	 */
	protected $author;


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
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Post
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set author
     *
     * @param \Sweb\Bundle\BlogBundle\Entity\User $author
     * @return Post
     */
    public function setAuthor(User $author = null)
    {
        $this->author = $author;
 
        return $this;
    }

    /**
     * Get author
     *
     * @return \Sweb\Bundle\BlogBundle\Entity\User
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
