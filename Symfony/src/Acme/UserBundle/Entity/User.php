<?php

namespace Acme\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Acme\UserBundle\Repository\UserRepository") 
 * @ORM\Table(name="user")
 */
class User {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     * @var integer $id
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255, name="first_name")
     * @var string $firstName
     */
    public $firstName;

    /**
     * @ORM\Column(type="string", length=255, name="last_name")
     *
     * @var string $lastName
     */
    public $lastName;

    /**
     * @ORM\Column(type="string", length=255, name="email")
     *
     * @var string $email
     */
    public $email;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     *
     * @var DateTime $createdAt
     */
    public $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="user")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     *
     * @var ArrayCollection $posts
     */
    public $posts;
    
    /**
      * Constructs a new instance of User
      */ 
    public function __construct() 
    { 
        $this->posts = new ArrayCollection(); 
        $this->createdAt = new \DateTime(); 
    }
    
    

}
