<?php

namespace AppBundle\Service\Defaults\Index;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManager;

class FetchMsgSql {

    protected $entityManager;
    protected $qb;
    protected $parameters;
    private $requestStack;

    public function __construct(EntityManager $em, RequestStack $requestStack) {
        $this->requestStack = $requestStack;
        $this->entityManager = $em;
        $this->qb = $em->createQueryBuilder();
    }

    public function getSql() {
        $this->qb->select('a')->from('AppBundle:Cars', 'a');
        $this->qb->setParameters($this->build_condition());
        $dql = $this->qb->getQuery()->getDQL();
        foreach ($this->qb->getParameters() as $index => $param) {
            $dql = str_replace(":" . $param->getName(), $param->getValue(), $dql);
            $dql = str_replace("LIKE " . $param->getValue(), "LIKE '" . $param->getValue() . "'", $dql);
        }
        $query = $this->entityManager->createQuery($dql);
        return $query;
    }

    public function build_condition() {
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

}
