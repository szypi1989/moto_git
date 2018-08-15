<?php

namespace AppBundle\Service\Defaults\Index;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use AppBundle\Service\Defaults\Index\FetchMsgSql;

// class builds results from the database using the KnpPaginatorBundle extension
class FetchPaginer {

    protected $entityManager;
    protected $qb;
    private $requestStack;
    protected $paginator;
    public $FetchMsgSql;

    public function __construct(EntityManager $em, RequestStack $requestStack, ContainerInterface $container, FetchMsgSql $fetchmsgsql) {
        $this->requestStack = $requestStack;
        $this->paginator = $container->get('knp_paginator');
        $this->FetchMsgSql = $fetchmsgsql;
    }

    // create a pagination object using the FetchMsgSql and KnpPaginatorBundle object
    public function createPagination() {
        $pagination = $this->paginator->paginate(
                $this->FetchMsgSql->getSql(), /* query NOT result */ $this->requestStack->getCurrentRequest()->query->getInt('page', 1)/* page number */, 5/* limit per page */, array('defaultSortFieldName' => 'a.model', 'defaultSortDirection' => 'asc')
        );
        return $pagination;
    }

}
