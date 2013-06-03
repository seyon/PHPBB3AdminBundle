<?

namespace Seyon\PHPBB3\AdminBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="topics")
 */
class Topic { 

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $topic_id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    public $forum_id = 0;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    public $topic_title = '';

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    public $topic_poster = 0;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    public $topic_time = 0;
    
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    public $topic_first_post_id = 0;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    public $topic_first_poster_name = '';
    
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    public $topic_last_post_id = 0;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    public $topic_last_poster_name = '';
    
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    public $topic_last_poster_id = 0;
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    public $topic_last_post_time = 0;
    
    
}