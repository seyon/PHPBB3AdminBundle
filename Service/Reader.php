<?
namespace Seyon\PHPBB3\AdminBundle\Service;

class Reader {
    
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    protected $container;

    public function __construct($container) {
        $this->container    = $container;
        $this->em           = $container->getDoctrine()->getEntityManager();
    }
    
    public function getPosts($topic){
        
        $prefix = $this->container->get('seyon_phpbb3_admin.table_prefix');
        var_dump($prefix);
        die();
        $query = $this->em->createNativeQuery('SELECT id, name, discr FROM users WHERE name = ?', $rsm);
        $query->setParameter(1, 'romanb');

        $users = $query->getResult();
        
    }
    
}