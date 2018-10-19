<?php

namespace AppBundle\Service\Defaults\Index;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use AppBundle\Service\Defaults\Index\FetchMsgSql;
use AppBundle\Service\RequestControl as RequestControl;

// class builds results from the database using the KnpPaginatorBundle extension
class FetchPaginer {

    protected $entityManager;
    protected $qb;
    public $requestStack;
    protected $paginator;
    public $FetchMsgSql;
    public $container;
    public $requestcntrl;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    // create a pagination object using the FetchMsgSql and KnpPaginatorBundle object
    public function createPagination() {
        $this->paginator = $this->container->get('knp_paginator');
        $this->FetchMsgSql = $this->container->get(FetchMsgSql::Class);
        $this->requestcntrl = $this->container->get(RequestControl::Class);
        $pagination = $this->paginator->paginate(
                $this->FetchMsgSql->getSql(),($this->requestcntrl->isRequest())?$this->requestcntrl->requeststack->getMasterRequest()->query->getInt('page', 1):1, 5/* limit per page */, array('defaultSortFieldName' => 'a.model', 'defaultSortDirection' => 'asc')
        );
        return $pagination;
    }

}
