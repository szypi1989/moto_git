<?php

namespace AppBundle\Service\Show\View;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RequestStack;
use AppBundle\Service\Show\View\UserAdvert;

class Advert {

    protected $useradvert;
    protected $requestStack;
    
    public function __construct(RequestStack $requestStack, UserAdvert $useradvert) {
        $this->useradvert = $useradvert;
        $this->requestStack=$requestStack;
    }

    public function getAdvert() {
        return $this->useradvert->getInfoAdvert();
    }

    public function getImg() {
        if (is_dir("../web/images/" . $this->requestStack->getCurrentRequest()->attributes->get('page'))) {
            $dir = "../web/images/" . $this->requestStack->getCurrentRequest()->attributes->get('page');
            $imgcars = scandir($dir);
            $imgcars = array_slice($files1, 2);
        } else {
            $imgcars = NULL;
        }

        return $imgcars;
    }
    public function generateView(){
        $view=array('userinfo' => $this->useradvert->getUserInfo(),);
        $view["userinfo"]=$this->useradvert->getUserInfo();
        $view["entities"]=$this->getAvert()->carsdata;
        $view["user"]=$this->useradvert->getUserAdd();
        ($advert->getImg()!=NULL)?$view["gallery"]=$this->getImg():NULL;
        return $view;
    }

}
