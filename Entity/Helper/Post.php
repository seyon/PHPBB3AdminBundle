<?

namespace Seyon\PHPBB3\AdminBundle\Entity\Helper;

class Post {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    protected $container;
    protected $securityContext;
    /**
     * @var \Seyon\PHPBB3\AdminBundle\Entity\Post 
     */
    protected $entity;
    
    protected static $accessCache = array();


    public function __construct(\Seyon\PHPBB3\AdminBundle\Entity\Post $post, $em, $container, $securityContext) {
        $this->entity = $post;
        $this->em = $em;
        $this->container = $container;
        $this->securityContext = $securityContext;
    }

    public function checkAccess(){
        
        $config = $this->container->getParameter('seyon_phpbb3_admin');
        $prefix = $config['table_prefix'];

        
        $forum = $this->entity->getForumId();
        
        $query = " SELECT * FROM `".$prefix."acl_groups` WHERE forum_id = ? GROUP BY `group_id`";
        $stmt = $this->em->getConnection()->prepare($query);
        $stmt->bindParam(1, $forum, \PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach($results as $result){
            
            $cacheKey = $result['auth_role_id'].'_'.$result['group_id'];
            
            // check cache
            if(isset(self::$accessCache[$cacheKey])){
                return self::$accessCache[$cacheKey];
            }
            
            // check if the forum/group combination has an acl role with "read" access
            $query = " SELECT * FROM `".$prefix."acl_roles_data` WHERE role_id = ? AND `auth_option_id` = 20";
            $stmt = $this->em->getConnection()->prepare($query);
            $stmt->bindParam(1, $result['auth_role_id'], \PDO::PARAM_INT);
            $stmt->execute();
            $acls = $stmt->fetchAll();
            
            if(!empty($acls)){
                // search the group
                $query = " SELECT * FROM `".$prefix."groups` WHERE group_id = ?";
                $stmt = $this->em->getConnection()->prepare($query);
                $stmt->bindParam(1, $result['group_id'], \PDO::PARAM_INT);
                $stmt->execute();
                $group = $stmt->fetchAll();

                if(!empty($group)){
                    $group = reset($group);
                    $group = $group['group_name'];
                    $group = strtoupper($group);
                    // check group access
                    if (true === $this->securityContext->isGranted('ROLE_PHPBB3_'.$group) || $group == 'GUESTS') {
                        self::$accessCache[$cacheKey] = true;
                        return true;
                    }
                }
            }
            
            self::$accessCache[$cacheKey] = false; 
            
        }
        
        return false;
    }
    
}