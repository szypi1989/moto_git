<?php

  $qb = $em->createQueryBuilder();
        $qb->select('a')
        ->from('AppBundle:Cars', 'a');  
                if($request->request->get('form')['yearfrom']!=NULL){
                $qb->where('a.year  >= :yearfrom');   
                $array_par['yearfrom']=($request->request->get('form')['yearfrom']);    
                }   
                if($request->request->get('form')['yearto']!=NULL){
                $qb->andwhere('a.year <= :yearto'); 
                $array_par['yearto']=($request->request->get('form')['yearto']);
                } 

                if($request->request->get('form')['pricefrom']!=NULL){
                $qb->andwhere('a.price >= :pricefrom');  
                $array_par['pricefrom']=trim($request->request->get('form')['pricefrom']);
                }     

                if($request->request->get('form')['priceto']!=NULL){
                $qb->andwhere('a.price <= :priceto');   
                $array_par['priceto']=trim($request->request->get('form')['priceto']);
                }

                if($request->request->get('form')['enginetype']!=NULL){
                $qb->andwhere('a.enginetype LIKE :enginetype');
                $array_par['enginetype']=($request->request->get('form')['enginetype']);
                } 

                if($request->request->get('form')['model']!=NULL){
                $qb->andwhere('a.model LIKE :model');     
                $array_par['model']=trim($request->request->get('form')['model']);
                } 

                if($request->request->get('form')['mark']!=NULL){
                $qb->andwhere('a.mark LIKE :mark');    
                $array_par['mark']=trim($request->request->get('form')['mark']);
                } 

                if($request->request->get('form')['bodytype']!=NULL){
                $qb->andwhere('a.bodytype LIKE :bodytype');    
                $array_par['bodytype']=($request->request->get('form')['bodytype']);
                }

                if(($request->request->get('form')['enginea']!='0') || ($request->request->get('form')['engineb']!='0')){
                $qb->andwhere('a.engine = :enginez');   
                    if((($request->request->get('form')['enginea'])=='0') ){
                    $array_par['enginez']=('0.'.$request->request->get('form')['engineb']);
                    }elseif((($request->request->get('form')['engineb'])=='0') ){
                    $array_par['enginez']=(integer)($request->request->get('form')['enginea'].'.0'); 
                    }else{
                    $array_par['enginez']=($request->request->get('form')['enginea']).'.'.($request->request->get('form')['engineb']);  
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
                "enginez" => "pojemność"
                );               
                $qb->setParameters($array_par); 
                $querys=$qb->getQuery()->getDQL();
                    foreach ($qb->getParameters() as $index => $param){  
                        $querys = str_replace(":".$param->getName(), $param->getValue(),$querys);  
                        $querys = str_replace("LIKE ".$param->getValue(), "LIKE '".$param->getValue()."'",$querys);  
                    } 
                $query = $em->createQuery($querys); 
                $paginator  = $this->get('knp_paginator');
                $pagination = $paginator->paginate(
                $query, /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                5/*limit per page*/,array('defaultSortFieldName' => 'a.model', 'defaultSortDirection' => 'asc')
                );    
                return array('pagination' => $pagination,'filtr' => $array_par,"transfiltr" => $trans_arr,"transsort" => $trans_sort);  