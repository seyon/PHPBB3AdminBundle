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
            $where[] = ' `forum_id` = ? ';
        }
        
        if($topic > 0){
            $where[] = ' `topic_id` = ? ';
        }
        
        if(!empty($where)){
            $where = ' WHERE '.implode(' AND ', $where);
        } else {
            $where = '';
        }
        
        $query = 'SELECT 
                        *
                    FROM 
                        `'.$prefix.'posts` 
                    '.$where.'
                    ORDER BY 
                        `post_time` DESC 
                    ';
        
        
        if($limit > 0){
            $query .= ' LIMIT ?';
        }
    
        $stmt = $this->em->getConnection()->prepare($query);
        
        $i = 1;
        if($forum > 0){
            $stmt->bindParam($i, $forum, \PDO::PARAM_INT);
            $i++;
        }
        if($topic > 0){
            $stmt->bindParam($i, $topic, \PDO::PARAM_INT);
            $i++;
        }
        if($limit > 0){
            $stmt->bindParam($i, $limit, \PDO::PARAM_INT);
            $i++;
        }

        $stmt->execute();
        $results = $stmt->fetchAll();
        
        $posts = array();
        foreach($results as $result){
            $posts[] = new \Seyon\PHPBB3\AdminBundle\Entity\Helper\Post($result, $this->em, $this->container, $this->securityContext);
        }
        
        return $posts;
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