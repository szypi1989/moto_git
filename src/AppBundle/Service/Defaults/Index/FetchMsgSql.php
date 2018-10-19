<?php

namespace AppBundle\Service\Defaults\Index;

use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManager;
use AppBundle\Service\RequestControl as RequestControl;
use AppBundle\Service\Defaults\Index\CarCriteriaRequest;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

// class generates results based on data from the request table
class FetchMsgSql {

    public $entityManager;
    protected $qb;
    protected $parameters;
    protected $array_par;
    public $requestcntrl;
    public $criteriarequest;
    public $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }

    // create results based on data from the request table
    // converting data to the form of query
    public function getSql() {
        $this->entityManager = $this->container->get('doctrine.orm.entity_manager');
        $this->criteriarequest = $this->container->get(CarCriteriaRequest::Class);
        $this->requestcntrl = $this->container->get(RequestControl::Class);
        $this->qb = $this->entityManager->createQueryBuilder();
        //$container->get(PutAdvert::class);
        $this->qb->select('a')->from('AppBundle:Cars', 'a');
        // starts the build_condition function if a query was sent from the searchAction action and the knppaginaton object uses the search function
        // search == 1 -> when you view the pages by knppagination and knppagination is supposed to store the results
        // search == 1 -> results from the request table are attached during the search engine save in the sortable_link.html view
        if ($this->requestcntrl->isRequest()) {
            (($this->requestcntrl->requeststack->getCurrentRequest()->query->get('search') == "1") || ($this->requestcntrl->requeststack->getCurrentRequest()->getRealMethod() == 'POST') ) ? $this->qb->setParameters($this->criteriarequest->build_condition($this->qb)) : NULL;
        }
        $dql = $this->qb->getQuery()->getDQL();
        //< convert the dql object to the query form
        foreach ($this->qb->getParameters() as $index => $param) {
            $dql = str_replace(":" . $param->getName(), $param->getValue(), $dql);
            $dql = str_replace("LIKE " . $param->getValue(), "LIKE '" . $param->getValue() . "'", $dql);
        }
        // >
        $query = $this->entityManager->createQuery($dql);
        return $query;
    }
}
