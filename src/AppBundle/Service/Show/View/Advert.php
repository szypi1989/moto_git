<?php

namespace AppBundle\Service\Show\View;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RequestStack;
use AppBundle\Service\Show\View\UserAdvert;

// class builds an ad
// the class uses the User Advert service to generate information
class Advert {

    protected $useradvert;
    protected $requestStack;

    public function __construct(RequestStack $requestStack, UserAdvert $useradvert) {
        $this->useradvert = $useradvert;
        $this->requestStack = $requestStack;
    }

    // generate information from the UserAdvert service and return the packed object with information
    public function getAdvert() {
        return $this->useradvert->getInfoAdvert();
    }

    // retrieves pictures through the page identifier
    public function getImg() {
        if (is_dir("../web/images/" . $this->requestStack->getCurrentRequest()->attributes->get('page'))) {
            $dir = "../web/images/" . $this->requestStack->getCurrentRequest()->attributes->get('page');
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
