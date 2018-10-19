<?php

namespace AppBundle\Service\Defaults\Index;

use AppBundle\Service\RequestControl as RequestControl;
use Doctrine\ORM\QueryBuilder as QueryBuilder;

class CarCriteriaRequest {

    public $requestcntrl;
    public $qb;
    public function __construct(RequestControl $requestscntrl) {
        $this->requestcntrl = $requestscntrl;
    }
    
 
    public function build_condition(QueryBuilder $qb) {
        $this->qb=$qb;
        $array_par = array();
        $array_par = ($this->requestcntrl->requeststack->getCurrentRequest()->getRealMethod() == 'POST') ? $this->putDataPost() : $this->pushDataGet();
        return $array_par;
    }

    // generates conditions from the $_POST request table
    public function putDataPost() {
        $array_par = array();
        if ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['yearfrom'] != NULL) {
            $this->qb->where('a.year  >= :yearfrom');
            $array_par['yearfrom'] = ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['yearfrom']);
        }
        if ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['yearto'] != NULL) {
            $this->qb->andwhere('a.year <= :yearto');
            $array_par['yearto'] = ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['yearto']);
        }

        if ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['pricefrom'] != NULL) {
            $this->qb->andwhere('a.price >= :pricefrom');
            $array_par['pricefrom'] = trim($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['pricefrom']);
        }

        if ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['priceto'] != NULL) {
            $this->qb->andwhere('a.price <= :priceto');
            $array_par['priceto'] = trim($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['priceto']);
        }

        if ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['enginetype'] != NULL) {
            $this->qb->andwhere('a.enginetype LIKE :enginetype');
            $array_par['enginetype'] = ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['enginetype']);
        }

        if ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['model'] != NULL) {
            $this->qb->andwhere('a.model LIKE :model');
            $array_par['model'] = trim($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['model']);
        }

        if ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['mark'] != NULL) {
            $this->qb->andwhere('a.mark LIKE :mark');
            $array_par['mark'] = trim($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['mark']);
        }

        if ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['bodytype'] != NULL) {
            $this->qb->andwhere('a.bodytype LIKE :bodytype');
            $array_par['bodytype'] = ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['bodytype']);
        }

        if (($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['enginea'] != '0') || ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['engineb'] != '0')) {
            $this->qb->andwhere('a.engine = :enginez');
            if ((($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['enginea']) == '0')) {
                $array_par['enginez'] = ('0.' . $this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['engineb']);
            } elseif ((($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['engineb']) == '0')) {
                $array_par['enginez'] = (integer) ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['enginea'] . '.0');
            } else {
                $array_par['enginez'] = ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['enginea']) . '.' . ($this->requestcntrl->requeststack->getCurrentRequest()->request->get('form')['engineb']);
            }
        }
        return $array_par;
    }

    // generates conditions from the $ _GET request table
    // the function is run when the knppagination object stores data from the search results
    public function pushDataGet() {
        $array_par = array();
        if ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('yearfrom') != NULL) {
            $this->qb->where('a.year  >= :yearfrom');
            $array_par['yearfrom'] = ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('yearfrom'));
        }
        if ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('yearto') != NULL) {
            $this->qb->andwhere('a.year <= :yearto');
            $array_par['yearto'] = ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('yearto'));
        }

        if ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('pricefrom') != NULL) {
            $this->qb->andwhere('a.price >= :pricefrom');
            $array_par['pricefrom'] = trim($this->requestcntrl->requeststack->getCurrentRequest()->query->get('pricefrom'));
        }

        if ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('priceto') != NULL) {
            $this->qb->andwhere('a.price <= :priceto');
            $array_par['priceto'] = trim($this->requestcntrl->requeststack->getCurrentRequest()->query->get('priceto'));
        }

        if ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('enginetype') != NULL) {
            $this->qb->andwhere('a.enginetype LIKE :enginetype');
            $array_par['enginetype'] = ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('enginetype'));
        }

        if ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('model') != NULL) {
            $this->qb->andwhere('a.model LIKE :model');
            $array_par['model'] = trim($this->requestcntrl->requeststack->getCurrentRequest()->query->get('model'));
        }

        if ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('mark') != NULL) {
            $this->qb->andwhere('a.mark LIKE :mark');
            $array_par['mark'] = trim($this->requestcntrl->requeststack->getCurrentRequest()->query->get('mark'));
        }

        if ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('bodytype') != NULL) {
            $this->qb->andwhere('a.bodytype LIKE :bodytype');
            $array_par['bodytype'] = ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('bodytype'));
        }

        if (($this->requestcntrl->requeststack->getCurrentRequest()->query->get('enginea') != '0') || ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('engineb') != '0')) {
            $this->qb->andwhere('a.engine = :enginez');
            if ((($this->requestcntrl->requeststack->getCurrentRequest()->query->get('enginea')) == '0')) {
                $array_par['enginez'] = ('0.' . $this->requestcntrl->requeststack->getCurrentRequest()->query->get('engineb'));
            } elseif ((($this->requestcntrl->requeststack->getCurrentRequest()->query->get('engineb')) == '0')) {
                $array_par['enginez'] = (integer) ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('enginea') . '.0');
            } else {
                $array_par['enginez'] = ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('enginea')) . '.' . ($this->requestcntrl->requeststack->getCurrentRequest()->query->get('engineb'));
            }
        }
        return $array_par;
    }

}
