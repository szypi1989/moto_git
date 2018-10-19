<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Cars;
use Doctrine\ORM\EntityManager;
use AppBundle\Service\Defaults\Index\PutAdvert;
use AppBundle\Service\Defaults\Index\CarCriteriaRequest;
use AppBundle\Service\RequestControl as RequestControl;
use AppBundle\Service\Defaults\Index\FetchPaginer;
use AppBundle\Service\Defaults\Index\FetchMsgSql;
class DefaultController extends Controller {

    /**
     * @Route("/", name="index")
     * @Template()
     */
    public function indexAction(Request $request, PutAdvert $putadvert,EntityManager $em,CarCriteriaRequest $criteria,RequestControl $requestcntrl,FetchPaginer $paginer,FetchMsgSql $fetchmsgsql) {
        if ($request->getMethod() == 'POST') {
            // put search module
            return array('pagination' => $putadvert->getPagination(), 'filtr' => $putadvert->paginer->FetchMsgSql->criteriarequest->putDataPost(), "transfiltr" => $putadvert->getTransArr(), "transsort" => $putadvert->getTransSort());
        } else {
            // append data post 
            if ($request->query->get('search') == "1") {
                return array('pagination' => $putadvert->getPagination(), 'filtr' => $putadvert->paginer->FetchMsgSql->criteriarequest->pushDataGet(), "transfiltr" => $putadvert->getTransArr(), "transsort" => $putadvert->getTransSort());
            } else {
                // put all data cars
                return array('pagination' => $putadvert->getPagination(), "transsort" => $putadvert->getTransSort());
            }
        }
    }

}
