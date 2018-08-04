<?php
namespace AppBundle\Service\Edit\Edit;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Cars;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;
class PushSqlE
{
    protected $entityManager;
    private $requestStack;
    protected $user_active;
    protected $container;
    
    public function __construct(EntityManager $em,RequestStack $requestStack,ContainerInterface $container)
    {
    $this->entityManager = $em;
    $this->requestStack = $requestStack;
    $this->container = $container;
    $this->user_active = $container->get('security.token_storage')->getToken()->getUser();
    }

    public function pushCars()
    {
        $year_ln=date("Y")-(integer)$this->requestStack->getCurrentRequest()->request->get('form')['year']; 
        $entities = $this->entityManager->getRepository('AppBundle:Cars')->findAll();
        $count_before=count($entities);
        $cars = new Cars();
        $cars->setModel($this->requestStack->getCurrentRequest()->request->get('form')['model']);
        $cars->setMark($this->requestStack->getCurrentRequest()->request->get('form')['mark']);
        $cars->setPrice((integer)$this->requestStack->getCurrentRequest()->request->get('form')['price']);
        $cars->setPower((integer)$this->requestStack->getCurrentRequest()->request->get('form')['power']);
        $cars->setEngine($this->requestStack->getCurrentRequest()->request->get('form')['enginea'].".".$this->requestStack->getCurrentRequest()->request->get('form')['engineb']);
        $cars->setEnginetype($this->requestStack->getCurrentRequest()->request->get('form')['enginetype']);
        $cars->setYear($this->requestStack->getCurrentRequest()->request->get('form')['year']);
        $cars->setBodytype($this->requestStack->getCurrentRequest()->request->get('form')['bodytype']);
        $cars->setYear($year_ln);
        $cars->setDescription($this->requestStack->getCurrentRequest()->request->get('form')['description']);
        $cars->setId_user($this->user_active->getId());
        $this->entityManager->persist($cars);
        $this->entityManager->flush();
    }
}
