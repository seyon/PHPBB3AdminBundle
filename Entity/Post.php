<?

namespace Seyon\PHPBB3\AdminBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="posts")
 */
class Post {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $post_id;

    /**
     * @ORM\Column(type="integer", length=8, options={"default":0}, nullable=false)
     */
    public $topic_id = 0;

    /**
     * @ORM\Column(type="integer", length=8, options={"default":0}, nullable=false)
     */
    public $forum_id = 0;

    /**
     * @ORM\Column(type="integer", length=8, options={"default":0}, nullable=false)
     */
    public $poster_id = 0;

    /**
     * @ORM\Column(type="integer", length=8, options={"default":0}, nullable=false)
     */
    public $icon_id = 0;

    /**
     * @ORM\Column(type="string", length=40, nullable=false)
     */
    public $poster_ip = '';

    /**
     * @ORM\Column(type="integer", length=11, options={"default":0}, nullable=false)
     */
    public $post_time = 0;

    /**
     * @ORM\Column(type="integer", length=1, options={"default":1}, nullable=false)
     */
    public $post_approved = 1;

    /**
     * @ORM\Column(type="integer", length=1, options={"default":0}, nullable=false)
     */
    public $post_reported = 0;

    /**
     * @ORM\Column(type="integer", length=1, options={"default":1}, nullable=false)
     */
    public $enable_bbcode = 1;

    /**
     * @ORM\Column(type="integer", length=1, options={"default":1}, nullable=false)
     */
    public $enable_smilies = 1;

    /**
     * @ORM\Column(type="integer", length=1, options={"default":1}, nullable=false)
     */
    public $enable_magic_url= 1;

    /**
     * @ORM\Column(type="integer", length=1, options={"default":1}, nullable=false)
     */
    public $enable_sig= 1;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    public $post_username = '';

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    public $post_subject = '';

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    public $post_text = '';

    /**
     * @ORM\Column(type="string", length=32, nullable=false)
     */
    public $post_checksum = '';

    /**
     * @ORM\Column(type="integer", length=1, options={"default":0}, nullable=false)
     */
    public $post_attachment = 0;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    public $bbcode_bitfield = '';

    /**
     * @ORM\Column(type="integer", length=8, nullable=false)
     */
    public $bbcode_uid = '';

    /**
     * @ORM\Column(type="integer", length=1, options={"default":1}, nullable=false)
     */
    public $post_postcount = 1;

    /**
     * @ORM\Column(type="integer", length=11, options={"default":0}, nullable=false)
     */
    public $post_edit_time = 0;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    public $post_edit_reason = '';

    /**
     * @ORM\Column(type="integer", length=8, options={"default":0}, nullable=false)
     */
    public $post_edit_user = 0;

    /**
     * @ORM\Column(type="integer", length=4, options={"default":0}, nullable=false)
     */
    public $post_edit_count = 0;

    /**
     * @ORM\Column(type="integer", length=1, options={"default":0}, nullable=false)
     */
    public $post_edit_locked = 0;
    
}