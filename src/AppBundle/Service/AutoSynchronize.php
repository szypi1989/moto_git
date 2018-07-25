<?php
namespace AppBundle\Service ;
use Doctrine\ORM\EntityManager;

class AutoSynchronize
{
    protected $entityManager;
    protected $marklist;
    
    public function __construct(EntityManager $em)
    {
    $this->entityManager = $em;
    }

    public function getMarks()
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb->select('c.mark')
        ->from('AppBundle:Carslist', 'c');  
        $entities=$qb->distinct()->getQuery()->getResult();
        foreach ($entities as $prop) {
        $this->marklist[$prop['mark']]=$prop['mark'];
        }
        return $this->marklist;
    }
}
