<?php
namespace Seyon\PHPBB3\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
    public function findPostsByForum($forumId, $limit) 
    {
        $ids = array();
        $this->findByChildsRecursive($forumId, $ids);
        
        $query = 'SELECT 
                      p 
                 FROM 
                    SeyonPHPBB3AdminBundle:Post p 
                 WHERE
                    p.forum_id IN ('.  implode(',', $ids).')
                 ORDER BY 
                 p.time DESC';
        
        
        return $this->getEntityManager()
            ->createQuery($query)
            ->setMaxResults($limit)
            ->getResult();
    }
    
    protected function findByChildsRecursive($forumId, &$ids){
        $ids[]  = $forumId;
        $childs = $this->findByChildForums($forumId);
        foreach($childs as $child){
            $childId = $child->forum_id;
            $this->findByChildsRecursive($childId, $ids);
        }
    }

    protected function findByChildForums($forumId){
        
        $childs = $this->getEntityManager()
            ->createQuery(
                'SELECT 
                      f 
                 FROM 
                    SeyonPHPBB3AdminBundle:Forum f 
                 WHERE
                    f.parent_id = '.(int)$forumId.'
                 ORDER BY 
                    f.forum_name DESC'
            )
            ->getResult();
        
        return $childs;
    }
}