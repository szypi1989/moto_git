<?php

namespace AppBundle\Service\Show\View;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;

// class builds an ad
// the class uses the User Advert service to generate information
class Advert {

    public $useradvert;
    public $reqdataview;
    public $container;
    public $path_img="../web/images/";
    public function __construct(ContainerInterface $container) {
        $this->container=$container;
        $this->reqdataview = $this->container->get(ReqDataView::Class);
        $this->useradvert = $this->container->get(UserAdvert::Class);
    }

    // generate information from the UserAdvert service and return the packed object with information
    public function getAdvert() {
        return $this->useradvert->getInfoAdvert();
    }

    // retrieves pictures through the page identifier
    public function getImg() {
        if (is_dir($this->path_img . $this->reqdataview->data['page'])) {
            $dir = $this->path_img . $this->reqdataview->data['page'];
            $imgcars = scandir($dir);
            $imgcars = array_slice($imgcars, 2);
        } else {
            $imgcars = NULL;
        }
        return $imgcars;
    }

    // generates a view by retrieving information from the Advert object and UserAdvert
    public function generateView() {
        $view = array('userinfo' => $this->useradvert->getUserInfo(),);
        $view["userinfo"] = $this->useradvert->getUserInfo();
        $view["entities"] = $this->getAdvert()->carsdata;
        ($this->getImg() != NULL) ? $view["gallery"] = $this->getImg() : NULL;
        return $view;
    }

}
