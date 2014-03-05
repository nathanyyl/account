<?php
namespace Acme\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Acme\UserBundle\Repository\PostRepository")
 * @ORM\Table(name="post")
 * @ORM\HasLifecycleCallbacks
 */
class Post {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer $id
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string $title
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string $slug
     */
    protected $slug;

    /**
     * @ORM\Column(type="text")
     *
     * @var string $content
     */
    protected $content;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     *
     * @var DateTime $createdAt
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     *
     * @var DateTime $updatedAt
     */
    protected $updatedAt;

//    /**
//     * @ORM\ManyToOne(targetEntity="Category")
//     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
//     *
//     * @var Category $category
//     */
//    protected $category;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="posts")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *
     * @var User $user
     */
    protected $user;

//    /**
//     * @ORM\ManyToMany(targetEntity="Tag")
//     * @ORM\JoinTable(name="post_tag",
//     *     joinColumns={@ORM\JoinColumn(name="post_id", referencedColumnName="id")},
//     *     inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
//     * )
//     *
//     * @var ArrayCollection $tags
//     */
//    protected $tags;


    /**
     * Constructs a new instance of Post. 
     */
    public function __construct() {
        $this->createdAt = new \DateTime();
        $this->tags = new ArrayCollection();
    }

    /**
     * Invoked before the entity is updated.
     *
     * @ORM\PreUpdate
     */
    public function preUpdate() {
        $this->updatedAt = new \DateTime();
    }
}
    