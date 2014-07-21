<?

namespace Seyon\PHPBB3\AdminBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Seyon\PHPBB3\AdminBundle\Entity\PostRepository")
 * @ORM\Table(name="posts") 
 */
class Post {

    /**
     * @ORM\Id
     * @ORM\Column(name="post_id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", length=8, options={"default":0}, nullable=false)
     */
    protected $topic_id = 0;

    /**
     * @ORM\Column(type="integer", length=8, options={"default":0}, nullable=false)
     */
    protected $forum_id = 0;

    /**
     * @ORM\Column(type="integer", length=8, options={"default":0}, nullable=false)
     */
    protected $poster_id = 0;

    /**
     * @ORM\Column(type="integer", length=8, options={"default":0}, nullable=false)
     */
    protected $icon_id = 0;

    /**
     * @ORM\Column(type="string", length=40, nullable=false)
     */
    protected $poster_ip = '';

    /**
     * @ORM\Column(name="post_time", type="integer", length=11, options={"default":0}, nullable=false)
     */
    protected $time = 0;

    /**
     * @ORM\Column(name="post_approved", type="integer", length=1, options={"default":1}, nullable=false)
     */
    protected $approved = 1;

    /**
     * @ORM\Column(name="post_reported", type="integer", length=1, options={"default":0}, nullable=false)
     */
    protected $reported = 0;

    /**
     * @ORM\Column(type="integer", length=1, options={"default":1}, nullable=false)
     */
    protected $enable_bbcode = 1;

    /**
     * @ORM\Column(type="integer", length=1, options={"default":1}, nullable=false)
     */
    protected $enable_smilies = 1;

    /**
     * @ORM\Column(type="integer", length=1, options={"default":1}, nullable=false)
     */
    protected $enable_magic_url= 1;

    /**
     * @ORM\Column(type="integer", length=1, options={"default":1}, nullable=false)
     */
    protected $enable_sig= 1;

    /**
     * @ORM\Column(name="post_username", type="string", length=255, nullable=false)
     */
    protected $username = '';

    /**
     * @ORM\Column(name="post_subject", type="string", length=255, nullable=false)
     */
    protected $subject = '';

    /**
     * @ORM\Column(name="post_text", type="text", nullable=false)
     */
    protected $text = '';

    /**
     * @ORM\Column(name="post_checksum", type="string", length=32, nullable=false)
     */
    protected $checksum = '';

    /**
     * @ORM\Column(name="post_attachment", type="integer", length=1, options={"default":0}, nullable=false)
     */
    protected $attachment = 0;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $bbcode_bitfield = '';

    /**
     * @ORM\Column(type="string", length=8, nullable=false)
     */
    protected $bbcode_uid = '';

    /**
     * @ORM\Column(name="post_postcount", type="integer", length=1, options={"default":1}, nullable=false)
     */
    protected $postcount = 1;

    /**
     * @ORM\Column(name="post_edit_time", type="integer", length=11, options={"default":0}, nullable=false)
     */
    protected $edit_time = 0;

    /**
     * @ORM\Column(name="post_edit_reason", type="string", length=255, nullable=false)
     */
    protected $edit_reason = '';

    /**
     * @ORM\Column(name="post_edit_user", type="integer", length=8, options={"default":0}, nullable=false)
     */
    protected $edit_user = 0;

    /**
     * @ORM\Column(name="post_edit_count", type="integer", length=4, options={"default":0}, nullable=false)
     */
    protected $edit_count = 0;

    /**
     * @ORM\Column(name="post_edit_locked", type="integer", length=1, options={"default":0}, nullable=false)
     */
    protected $edit_locked = 0;
    
    
    public function getId(){
        return $this->id;
    }
    
    public function getTopicId(){
        return $this->topic_id;
    }
    
    public function getForumId(){
        return $this->forum_id;
    }
    
    public function getPosterId(){
        return $this->poster_id;
    }
    
    public function getPosterIp(){
        return $this->poster_ip;
    }
    
    public function getAttachment(){
        return $this->attachment;
    }
    
    public function getBbbcodeBitfield(){
        return $this->bbcode_bitfield;
    }
    
    public function getBbcodeUid(){
        return $this->bbcode_uid;
    }
    
    public function getChecksum(){
        return $this->checksum;
    }
    
    public function getEditCount(){
        return $this->edit_count;
    }
    
    public function getEditLocked(){
        return $this->edit_locked;
    }
    
    public function getEditReason(){
        return $this->edit_reason;
    }
    
    public function getEditTime(){
        return $this->edit_time;
    }
    
    public function getEditUser(){
        return $this->edit_user;
    }
    
    public function getEnableBbcode(){
        return $this->enable_bbcode;
    }
    
    public function getEnableMagicUrl(){
        return $this->enable_magic_url;
    }
    
    public function getEnableSig(){
        return $this->enable_sig;
    }
    
    public function getEnableSmilies(){
        return $this->enable_smilies;
    }
    
    public function getIconId(){
        return $this->icon_id;
    }
    
    public function getPostCount(){
        return $this->postcount;
    }
    
    public function getReported(){
        return $this->reported;
    }
    
    public function getApproved(){
        return $this->approved;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function getSubject(){
        return $this->subject;
    }
    
    public function getTime(){
        $time = new \DateTime();
        $time->setTimestamp($this->time);
        return $time;
    }
    
    public function getText(){
        return $this->text;
    }
    
    public function setTime($time){
        if($time instanceof \DateTime){
            $this->time = $time->getTimestamp();
        } else {
            $this->time = $time;
        }
    }
    
    public function setTopicId($value){
        $this->topic_id = $value;
    }
    
    public function setForumId($value){
        $this->forum_id = $value;
    }
    
    public function setPosterId($value){
        $this->poster_id = $value;
    }
    
    public function setSubject($value){
        $this->subject = $value;
    }
    
    public function setText($value){
        $this->text = $value;
    }
    
    public function getTextWithoutBBCode(){
        $text = $this->getText();
        $text = preg_replace('/\[.*\]/', '', $text);
        $text = preg_replace('/\[\/.*\]/', '', $text);
        trim($text);
        return $text;
    }

}
