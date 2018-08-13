<?php

$qb = $em->createQueryBuilder();
$qb->select('a')
        ->from('AppBundle:Cars', 'a');
if ($request->query->get('yearfrom') != NULL) {
    $qb->where('a.year  >= :yearfrom');
    $array_par['yearfrom'] = ($request->query->get('yearfrom'));
}
if ($request->query->get('yearto') != NULL) {
    $qb->andwhere('a.year <= :yearto');
    $array_par['yearto'] = ($request->query->get('yearto'));
}

if ($request->query->get('pricefrom') != NULL) {
    $qb->andwhere('a.price >= :pricefrom');
    $array_par['pricefrom'] = trim($request->query->get('pricefrom'));
}

if ($request->query->get('priceto') != NULL) {
    $qb->andwhere('a.price <= :priceto');
    $array_par['priceto'] = trim($request->query->get('priceto'));
}

if ($request->query->get('enginetype') != NULL) {
    $qb->andwhere('a.enginetype LIKE :enginetype');
    $array_par['enginetype'] = ($request->query->get('enginetype'));
}

if ($request->query->get('model') != NULL) {
    $qb->andwhere('a.model LIKE :model');
    $array_par['model'] = trim($request->query->get('model'));
}

if ($request->query->get('mark') != NULL) {
    $qb->andwhere('a.mark LIKE :mark');
    $array_par['mark'] = trim($request->query->get('mark'));
}

if ($request->query->get('bodytype') != NULL) {
    $qb->andwhere('a.bodytype LIKE :bodytype');
    $array_par['bodytype'] = ($request->query->get('bodytype'));
}

if (($request->query->get('enginea') != '0') || ($request->query->get('engineb') != '0')) {
    $qb->andwhere('a.engine = :enginez');
    if ((($request->query->get('enginea')) == '0')) {
        $array_par['enginez'] = ('0.' . $request->query->get('engineb'));
    } elseif ((($request->query->get('engineb')) == '0')) {
        $array_par['enginez'] = (integer) ($request->query->get('enginea') . '.0');
    } else {
        $array_par['enginez'] = ($request->query->get('enginea')) . '.' . ($request->query->get('engineb'));
    }
}

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
$qb->setParameters($array_par);
$querys = $qb->getQuery()->getDQL();
foreach ($qb->getParameters() as $index => $param) {
    $querys = str_replace(":" . $param->getName(), $param->getValue(), $querys);
    $querys = str_replace("LIKE " . $param->getValue(), "LIKE '" . $param->getValue() . "'", $querys);
}
$query = $em->createQuery($querys);
$paginator = $this->get('knp_paginator');
$pagination = $paginator->paginate(
        $query, /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 5/* limit per page */, array('defaultSortFieldName' => 'a.model', 'defaultSortDirection' => 'asc')
);
return array('pagination' => $pagination, 'filtr' => $array_par, "transfiltr" => $trans_arr, "transsort" => $trans_sort);
