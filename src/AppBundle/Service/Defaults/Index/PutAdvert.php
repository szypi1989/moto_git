<?php

namespace AppBundle\Service\Defaults\Index;

use Doctrine\ORM\EntityManager;
use AppBundle\Service\Defaults\Index\FetchPaginer;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

// class for the generation of car ads
// generates the results of advertisements according to the data from the request table
class PutAdvert {

    protected $entityManager;
    protected $qb;
    protected $pagination;
    private $requestStack;
    public $container;
    public $paginer;

    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function getTransSort() {
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

    public function getTransArr() {
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

    // provide a paginer object, which is responsible for the generated results from the request table, which is associated with the object generating results from the database
    public function getPagination() {
        $this->paginer = $this->container->get(FetchPaginer::Class);
        return $this->paginer->createPagination();
    }

}
