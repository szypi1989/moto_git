<?php

namespace AppBundle\Service\Defaults\Index;

use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManager;

// class generates results based on data from the request table
class FetchMsgSql {
    
    protected $entityManager;
    protected $qb;
    protected $parameters;
    protected $array_par;
    private $requestStack;

    public function __construct(EntityManager $em, RequestStack $requestStack) {
        $this->requestStack = $requestStack;
        $this->entityManager = $em;
        $this->qb = $em->createQueryBuilder();
    }

    // create results based on data from the request table
    // converting data to the form of query
    public function getSql() {
        $this->qb->select('a')->from('AppBundle:Cars', 'a');
        // starts the build_condition function if a query was sent from the searchAction action and the knppaginaton object uses the search function
        // search == 1 -> when you view the pages by knppagination and knppagination is supposed to store the results
        // search == 1 -> results from the request table are attached during the search engine save in the sortable_link.html view
        (($this->requestStack->getCurrentRequest()->query->get('search') == "1") || ($this->requestStack->getCurrentRequest()->getRealMethod() == 'POST') ) ? $this->qb->setParameters($this->build_condition()) : NULL;
        $dql = $this->qb->getQuery()->getDQL();
        //< convert the dql object to the query form
        foreach ($this->qb->getParameters() as $index => $param) {
            $dql = str_replace(":" . $param->getName(), $param->getValue(), $dql);
            $dql = str_replace("LIKE " . $param->getValue(), "LIKE '" . $param->getValue() . "'", $dql);
        }
        // >
        $query = $this->entityManager->createQuery($dql);
        return $query;
    }

    public function build_condition() {
        $array_par = array();
        $array_par = ($this->requestStack->getCurrentRequest()->getRealMethod() == 'POST') ? $this->putDataPost() : $this->pushDataGet();
        return $array_par;
    }

    // generates conditions from the $_POST request table
    public function putDataPost() {
        $array_par = array();
        if ($this->requestStack->getCurrentRequest()->request->get('form')['yearfrom'] != NULL) {
            $this->qb->where('a.year  >= :yearfrom');
            $array_par['yearfrom'] = ($this->requestStack->getCurrentRequest()->request->get('form')['yearfrom']);
        }
        if ($this->requestStack->getCurrentRequest()->request->get('form')['yearto'] != NULL) {
            $this->qb->andwhere('a.year <= :yearto');
            $array_par['yearto'] = ($this->requestStack->getCurrentRequest()->request->get('form')['yearto']);
        }

        if ($this->requestStack->getCurrentRequest()->request->get('form')['pricefrom'] != NULL) {
            $this->qb->andwhere('a.price >= :pricefrom');
            $array_par['pricefrom'] = trim($this->requestStack->getCurrentRequest()->request->get('form')['pricefrom']);
        }

        if ($this->requestStack->getCurrentRequest()->request->get('form')['priceto'] != NULL) {
            $this->qb->andwhere('a.price <= :priceto');
            $array_par['priceto'] = trim($this->requestStack->getCurrentRequest()->request->get('form')['priceto']);
        }

        if ($this->requestStack->getCurrentRequest()->request->get('form')['enginetype'] != NULL) {
            $this->qb->andwhere('a.enginetype LIKE :enginetype');
            $array_par['enginetype'] = ($this->requestStack->getCurrentRequest()->request->get('form')['enginetype']);
        }

        if ($this->requestStack->getCurrentRequest()->request->get('form')['model'] != NULL) {
            $this->qb->andwhere('a.model LIKE :model');
            $array_par['model'] = trim($this->requestStack->getCurrentRequest()->request->get('form')['model']);
        }

        if ($this->requestStack->getCurrentRequest()->request->get('form')['mark'] != NULL) {
            $this->qb->andwhere('a.mark LIKE :mark');
            $array_par['mark'] = trim($this->requestStack->getCurrentRequest()->request->get('form')['mark']);
        }

        if ($this->requestStack->getCurrentRequest()->request->get('form')['bodytype'] != NULL) {
            $this->qb->andwhere('a.bodytype LIKE :bodytype');
            $array_par['bodytype'] = ($this->requestStack->getCurrentRequest()->request->get('form')['bodytype']);
        }

        if (($this->requestStack->getCurrentRequest()->request->get('form')['enginea'] != '0') || ($this->requestStack->getCurrentRequest()->request->get('form')['engineb'] != '0')) {
            $this->qb->andwhere('a.engine = :enginez');
            if ((($this->requestStack->getCurrentRequest()->request->get('form')['enginea']) == '0')) {
                $array_par['enginez'] = ('0.' . $this->requestStack->getCurrentRequest()->request->get('form')['engineb']);
            } elseif ((($this->requestStack->getCurrentRequest()->request->get('form')['engineb']) == '0')) {
                $array_par['enginez'] = (integer) ($this->requestStack->getCurrentRequest()->request->get('form')['enginea'] . '.0');
            } else {
                $array_par['enginez'] = ($this->requestStack->getCurrentRequest()->request->get('form')['enginea']) . '.' . ($this->requestStack->getCurrentRequest()->request->get('form')['engineb']);
            }
        }
        return $array_par;
    }

    // generates conditions from the $ _GET request table
    // the function is run when the knppagination object stores data from the search results
    public function pushDataGet() {
        $array_par = array();
        if ($this->requestStack->getCurrentRequest()->query->get('yearfrom') != NULL) {
            $this->qb->where('a.year  >= :yearfrom');
            $array_par['yearfrom'] = ($this->requestStack->getCurrentRequest()->query->get('yearfrom'));
        }
        if ($this->requestStack->getCurrentRequest()->query->get('yearto') != NULL) {
            $this->qb->andwhere('a.year <= :yearto');
            $array_par['yearto'] = ($this->requestStack->getCurrentRequest()->query->get('yearto'));
        }

        if ($this->requestStack->getCurrentRequest()->query->get('pricefrom') != NULL) {
            $this->qb->andwhere('a.price >= :pricefrom');
            $array_par['pricefrom'] = trim($this->requestStack->getCurrentRequest()->query->get('pricefrom'));
        }

        if ($this->requestStack->getCurrentRequest()->query->get('priceto') != NULL) {
            $this->qb->andwhere('a.price <= :priceto');
            $array_par['priceto'] = trim($this->requestStack->getCurrentRequest()->query->get('priceto'));
        }

        if ($this->requestStack->getCurrentRequest()->query->get('enginetype') != NULL) {
            $this->qb->andwhere('a.enginetype LIKE :enginetype');
            $array_par['enginetype'] = ($this->requestStack->getCurrentRequest()->query->get('enginetype'));
        }

        if ($this->requestStack->getCurrentRequest()->query->get('model') != NULL) {
            $this->qb->andwhere('a.model LIKE :model');
            $array_par['model'] = trim($this->requestStack->getCurrentRequest()->query->get('model'));
        }

        if ($this->requestStack->getCurrentRequest()->query->get('mark') != NULL) {
            $this->qb->andwhere('a.mark LIKE :mark');
            $array_par['mark'] = trim($this->requestStack->getCurrentRequest()->query->get('mark'));
        }

        if ($this->requestStack->getCurrentRequest()->query->get('bodytype') != NULL) {
            $this->qb->andwhere('a.bodytype LIKE :bodytype');
            $array_par['bodytype'] = ($this->requestStack->getCurrentRequest()->query->get('bodytype'));
        }

        if (($this->requestStack->getCurrentRequest()->query->get('enginea') != '0') || ($this->requestStack->getCurrentRequest()->query->get('engineb') != '0')) {
            $this->qb->andwhere('a.engine = :enginez');
            if ((($this->requestStack->getCurrentRequest()->query->get('enginea')) == '0')) {
                $array_par['enginez'] = ('0.' . $this->requestStack->getCurrentRequest()->query->get('engineb'));
            } elseif ((($this->requestStack->getCurrentRequest()->query->get('engineb')) == '0')) {
                $array_par['enginez'] = (integer) ($this->requestStack->getCurrentRequest()->query->get('enginea') . '.0');
            } else {
                $array_par['enginez'] = ($this->requestStack->getCurrentRequest()->query->get('enginea')) . '.' . ($this->requestStack->getCurrentRequest()->query->get('engineb'));
            }
        }
        return $array_par;
    }

}
