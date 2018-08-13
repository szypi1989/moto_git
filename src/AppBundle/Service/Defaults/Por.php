<?php

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
