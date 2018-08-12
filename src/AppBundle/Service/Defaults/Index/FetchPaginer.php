<?php

namespace AppBundle\Service\Defaults\Index;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use AppBundle\Service\Defaults\Index\FetchMsgSql;
class FetchPaginer {

    protected $entityManager;
    protected $qb;
    private $requestStack;
    protected $paginator;
    protected $query;
    public function __construct(EntityManager $em, RequestStack $requestStack, ContainerInterface $container,FetchMsgSql $fetchmsgsql) {
        $this->requestStack = $requestStack;
        $this->paginator = $container->get('knp_paginator');
        $this->query=$fetchmsgsql->getSql();
        $trans_sort = array(
            "year" => "rok produkcji",
            "price" => "cena",
            "enginetype" => "typ silnika",
            "model" => "model",
            "mark" => "marka",
            "bodytype" => "typ nadwozia",
            "engine" => "pojemność silnika",
            "power" => "moc"
        );
        $trans_arr = array(
            "yearfrom" => "rok od",
            "yearto" => "rok do",
            "pricefrom" => "cena od",
            "priceto" => "cena do",
            "enginetype" => "typ silnika",
            "model" => "model",
            "mark" => "marka",
            "bodytype" => "typ_nadwozia",
            "enginez" => "pojemność"
        );
    }

    public function createPagination() {
        $pagination = $this->paginator ->paginate(
                $this->query, /* query NOT result */ $this->requestStack->getCurrentRequest()->query->getInt('page', 1)/* page number */, 5/* limit per page */, array('defaultSortFieldName' => 'a.model', 'defaultSortDirection' => 'asc')
        );
        return $pagination;
    }
}
