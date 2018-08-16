<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Search;
use AppBundle\Service\Show\View\Advert;

class ShowController extends Controller {

    /**
     * @Route("/menu")
     * @Template()
     */
    public function menuAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('AppBundle:Cars')->findAll(array('distinct' => true));
        return array('entities' => $entities);
    }

    /**
     * @Route("/search")
     * @Template()
     */
    public function searchAction() {
        //creating a form for the search engine
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search, array(
            'action' => $this->generateUrl('index'),
        ));

        return array(
            'form' => $form->createView());
    }

    /**
     * @Route("/view/{page}", name="view", defaults={"page": "1"})
     * @Template()
     */
    public function viewAction(Request $request, $page, Advert $advert) {
        // using the $advert service to generate an advertisement view 
        return $advert->generateView();
    }

}
