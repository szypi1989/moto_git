<?php

namespace AppBundle\Service\Edit\Edit;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Cars;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ImageMdE {

    protected $entityManager;
    private $requestStack;
    protected $user_active;
    protected $container;
    public $errmove = array();

    public function __construct(EntityManager $em, RequestStack $requestStack, ContainerInterface $container) {
        $this->entityManager = $em;
        $this->requestStack = $requestStack;
        $this->container = $container;
        $this->user_active = $container->get('security.token_storage')->getToken()->getUser();
    }

    public function getNameImages(){
         if (is_dir("../web/images/" . $id_add)) {
            $dir = "../web/images/" . $id_add;
            $files1 = scandir($dir);
            $files1 = array_slice($files1, 2);
        } else {
            $files1 = NULL;
        }    
    }
}
