<?php
namespace Acme\UserBundle\Repository; 
use Doctrine\ORM\EntityRepository as EntityRepository; 

class UserRepository extends EntityRepository 
{ 
    public function findAllOrderedByName() 
    { 
        return $this->getEntityManager() 
                    ->createQuery('SELECT u FROM Acme\UserBundle\Entity\User u ORDER BY u.firstName ASC') 
                    ->getResult(); 
    } 
    
    public function delete($id){
        return $this->getEntityManager() 
                    ->createQuery('DELETE FROM Acme\UserBundle\Entity\User u WHERE u.id='.$id) 
                    ->getResult();
    }
} 