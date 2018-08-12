<?php

namespace AppBundle\Service\Defaults\Index;

use Doctrine\ORM\EntityManager;
use AppBundle\Service\Defaults\Index\FetchPaginer;
use Symfony\Component\HttpFoundation\RequestStack;
class PushSearch {

    protected $entityManager;
    protected $qb;
    protected $pagination;
    private $requestStack;

    public function __construct(EntityManager $em, RequestStack $requestStack, FetchPaginer $paginer) {

        $this->paginer = $paginer;
        }
        public function getTransSort(){
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
        return $trans_sort;

    }
    public function getTransArr(){
             $trans_arr = array(
            "yearfrom" => "rok od",
            "yearto" => "rok do",
            "pricefrom" => "cena od",
            "priceto" => "cena do",
            "enginetype" => "typ silnika",
            "model" => "model",
            "mark" => "marka",
            "bodytype" => "typ_nadwozia",
            "enginez" => "pojemność",
        );   
             return $trans_arr;
    }

    public function getPagination() {
        return $this->paginer->createPagination();
    }
    
    
}
