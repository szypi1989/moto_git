<?php

namespace AppBundle\Service\Show\View;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;

// class generates information about a given advertisement retrieved from the database
class CarsInfo {

    public $entityManager;
    public $reqdataview;
    public $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        // get the advertisement identifier
        $this->reqdataview = $this->container->get(ReqDataView::Class);
        $this->entityManager = $this->container->get('doctrine.orm.entity_manager');
        $this->page = $this->reqdataview->data['page'];
    }

    // get information about a given ad by identifier
    public function generateResultToId() {
        $cars_inf = $this->entityManager->getRepository('AppBundle:Cars')->findById($this->page);
        return $cars_inf;
    }

}
