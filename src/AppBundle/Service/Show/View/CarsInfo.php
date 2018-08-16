<?php

namespace AppBundle\Service\Show\View;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RequestStack;
class CarsInfo {

    public $entityManager;

    public function __construct(EntityManager $em, RequestStack $requestStack) {
        $this->entityManager = $em;
        $this->page = $this->requestStack->getCurrentRequest()->attributes->get('page');
    }

    public function generateResultToId() {
        $cars_inf =  $this->entityManager->getRepository('AppBundle:Cars')->findById($this->page);
        return $cars_inf;
    }

}
