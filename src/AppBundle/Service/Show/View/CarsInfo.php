<?php

namespace AppBundle\Service\Show\View;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RequestStack;

// class generates information about a given advertisement retrieved from the database
class CarsInfo {

    public $entityManager;
    public $requestStack;

    public function __construct(EntityManager $em, RequestStack $requestStack) {
        $this->entityManager = $em;
        $this->requestStack = $requestStack;
    // get the advertisement identifier
        $this->page = $this->requestStack->getCurrentRequest()->attributes->get('page');
    }

    // get information about a given ad by identifier
    public function generateResultToId() {
        $cars_inf = $this->entityManager->getRepository('AppBundle:Cars')->findById($this->page);
        return $cars_inf;
    }

}
