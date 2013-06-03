<?

namespace Seyon\PHPBB3\AdminBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="forums")
 */
class Forum { 

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $forum_id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    public $parent_id = 0;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    public $forum_name = '';

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    public $forum_desc = '';

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    public $forum_posts = 0;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    public $forum_topics = 0;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    public $forum_last_post_id = 0;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    public $forum_last_poster_id = 0;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    public $forum_last_post_subject = '';

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    public $forum_last_post_time = 0;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    public $forum_last_poster_name = '';


    
}