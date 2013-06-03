<?
namespace Seyon\PHPBB3\AdminBundle\Service;

use Doctrine\ORM\Query\ResultSetMapping;

class Reader {
    
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    protected $container;

    protected $securityContext;

    public function __construct($em, $container, $securityContext) {

        $this->container        = $container;
        $this->em               = $em;
        $this->securityContext  = $securityContext;
    }
    
    /**
     * create Query and get all Posts
     * @param integer $limit
     * @param integer $forum
     * @param integer $topic
     * @return array
     */
    public function getPosts($limit = 10, $forum = 0, $topic = 0){
        $config = $this->container->getParameter('seyon_phpbb3_admin');
        $prefix = $config['table_prefix'];
        
        $where = array();
        
        if($forum > 0){
            $where['forum_id'] = $forum;
        }
        
        if($topic > 0){
            $where['topic_id'] = $topic;
        }
        
        $repo       = $this->em->getRepository('SeyonPHPBB3AdminBundle:Post');
        $results    = $repo->findBy($where, array('post_time' => 'DESC'), $limit);
        
        return $results;
    }
    
    public function checkReadAccess($post){
        $helper = new \Seyon\PHPBB3\AdminBundle\Entity\Helper\Post($post, $this->em, $this->container, $this->securityContext);
        return $helper->checkAccess();
    }
    
    /**
     * get all posts by topic id
     * @param integer $topic
     * @param integer $limit
     * @return array
     */
    public function getPostsByTopic($topic, $limit = 10){

        $posts = $this->getPosts($limit, 0, $topic);
        
        return $posts;
    }
    
}