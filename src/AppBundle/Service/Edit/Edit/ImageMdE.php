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


}
