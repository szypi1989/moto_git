<?php

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AjaxController extends Controller
{
   
     /**
     * @Route("/ajax/isset/{value}", name="ajaxede")
     * @Template()
     */
    public function issetsAction(Request $request,$value)
    {

       $array_result[0]=$value;
        echo json_encode($array_result);
        die();
    } 
    
     /**
     * @Route("/ajax/selectmodel/{value}", name="selectmodel")
     * @Template()
     */
    public function selectmodelAction(Request $request,$value)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c.model')
        ->from('AppBundle:Carslist', 'c');  
        $qb->andwhere('c.mark LIKE :mark');  
        $qb->distinct();
        $array_par['mark']=trim($value);
        $qb->setParameters($array_par); 
        $entities=$qb->getQuery()->getArrayResult();
        echo json_encode($entities);
        die();
    } 
    
     /**
     * @Route("/ajax/issetmodel/{mark}/{model}", name="issetmodel")
     * @Template()
     */
    public function issetmodelAction(Request $request,$mark,$model)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c.model')
        ->from('AppBundle:Carslist', 'c');  
        $qb->andwhere('c.mark LIKE :mark');  
        $qb->andwhere('c.model LIKE :model'); 
        $qb->distinct();
        $array_par['mark']='%'.trim($mark).'%';
        $array_par['model']='%'.trim($model).'%';
        $qb->setParameters($array_par); 
        $entities=$qb->getQuery()->getArrayResult();
        echo json_encode($entities);
        die();
    } 
    
    /**
     * @Route("/ajax/issetmark/{mark}", name="issetmark")
     * @Template()
     */
    public function issetmarkAction(Request $request,$mark)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c.mark')
        ->from('AppBundle:Carslist', 'c');  
        $qb->andwhere('c.mark LIKE :mark');  
        $qb->distinct();
        $array_par['mark']='%'.trim($mark).'%';
        $qb->setParameters($array_par); 
        $entities=$qb->getQuery()->getArrayResult();
        echo json_encode($entities);
        die();
    } 
    /**
     * @Route("/ajax/issetlogin/{login}", name="issetlogin")
     * @Template()
     */
    public function issetloginAction(Request $request,$login)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c.id')
        ->from('AppBundle:User', 'c');  
        $qb->andwhere('c.username = :login');   
        $qb->distinct();
        $array_par['login']=$login;
        $qb->setParameters($array_par); 
        $entities=$qb->getQuery()->getArrayResult();
        echo json_encode($entities);
        die();
    } 
     /**
     * @Route("/ajax/issetemail/{email}", name="issetemail")
     * @Template()
     */
     public function issetemailAction(Request $request,$email)
    {
        // $sql="SELECT id FROM fos_user WHERE username= '".$_GET["field"]."'";
        $em = $this->getDoctrine()->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c.id')
        ->from('AppBundle:User', 'c');  
        $qb->andwhere('c.email = :email');   
        $qb->distinct();
        $array_par['email']=$email;
        $qb->setParameters($array_par); 
        $entities=$qb->getQuery()->getArrayResult();
        echo json_encode($entities);
        die();
    } 
}
