<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Service\ValidRequest;
use AppBundle\Service\CarsEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;
use AppBundle\Listener\Inf_add_advert;
use AppBundle\Entity\Cars;
use AppBundle\Entity\Carslist;
use AppBundle\Entity\Search;
use AppBundle\Entity\Test;
use AppBundle\Entity\Append;
use AppBundle\Entity\Login;
use AppBundle\Entity\Profileinfo;
use AppBundle\Entity\Userinfo;
use AppBundle\service\FileUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;
use AppBundle\Module\Session;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Validator\Constraints\Email as EmailConstraint;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Collection;
use Doctrine\ORM\EntityManager;
use AppBundle\Form\Type\EditType;
use AppBundle\Form\Type\AppendType;
use AppBundle\Service\Edit\Append\PushSql;
class EditController extends Controller
{    
     /**
     * @Route("/append", name="append")
     * @Template()
     */
    public function appendAction(Request $request,ValidRequest $validrequest,EntityManager $em,PushSql $pushsql)
    {
    //<building information to create a form
    //downloading the logged-in user
    $user_active = $this->get('security.token_storage')->getToken()->getUser();
    //>< creating a form for adding an advertisement
    $append = new Append();
    $form = $this->createForm(AppendType::class, $append, array(
            'action' => $this->generateUrl('append'),
    ));
    ///$ddd=$this->container->get('pushsql');
    //>< performing actions after sending the form
    if ($request->getMethod() == 'POST'){
        //<< when the data sent corresponds to the size of the maximum data size limit,
        // a service is started that validates the data using the service provided validrequest
        $size = $_SERVER['CONTENT_LENGTH'];
        $maxPost = ini_get('post_max_size');
        if($this->return_bytes($maxPost)<$size){
            $val_errors['post']['fail']='Ograniczenia serwera. Wysyłane dane mają zbyt dużo pojemności.'
                    . 'Nie można wysyłać na raz tyle plików. Zmniejsz ilość zdjęć ( doślesz je później). !!!'
                    . ' Maksymalna zawartość wszystkich danych wysyłanych to '.$this->return_bytes($maxPost).' bajtów';    
        }else{
            $val_errors=array();   
            //services validrequest defect the request table by pattern 
            $val_errors = $validrequest -> getErrors ($request,"../web/json/validate_cars.json"); 
        }
        //>>
        //<< creating shares after error-free validation
        if(count($val_errors)==0){ 
        //push data request to table cars database    
        $pushsql->pushCars();
        $entities = $em->getRepository('AppBundle:Cars')->findAll();
            try {
            rename($request->files->get('form')['avatar']->getPathname(), "../web/images/".count($entities).'.jpg'); 
            } catch (Exception $e) {
            $val_errors['upload']['fail']='nie można przenieść zdjęć na serwer !!!';
            }
    //<<< creating and sorting photo files
    if(isset($request->files->get('form')['image'])){
        if(!is_dir("../web/images/".count($entities))){
            if (mkdir("../web/images/".count($entities),777)) {  
                chmod ("../web/images/".count($entities),0777);
                $arr=$request->files->get('form')['image'];
                foreach ($arr as $key => $value) {
                    try {
                        if(!empty($value)){     
                        rename($value->getPathname(), "../web/images/".count($entities)."/".$key.'.jpg');   
                        }
                    } catch (Exception $e) {
                    $val_errors['upload']['fail']='nie można przenieść zdjęć na serwer !!!';
                    }
                } 
            } else {
            $val_errors['upload']['fail']='nie można przenieść zdjęć na serwer !!!';   
            }
        }else{
        chmod ("../web/images/".count($entities),0777);
        $arr=$request->files->get('form')['image'];
                foreach ($arr as $key => $value) {
                   try {
                        if(!empty($value)){    
                        rename($value->getPathname(), "../web/images/".count($entities)."/".$key.'.jpg'); 
                        }
                    } catch (Exception $e) {
                    $val_errors['upload']['fail']='nie można przenieść zdjęć na serwer !!!';
                    }
                }        
        }
    }
    //>>>
    // variable {success} with the value {false} means the form with errors of defects
            if(isset($val_errors['upload']['fail'])){
             return $this->render('AppBundle:Edit:append.html.twig', array('form' => $form->createView(),'parameters' => array('success' => 'false'),'err_validate' => $val_errors,'id_message' => count($entities)));     
            }
        return $this->render('AppBundle:Edit:append.html.twig', array('form' => $form->createView(),'parameters' => array('success' => 'true'),'err_validate' => $val_errors,'id_message' => count($entities))); 
        //>>
        }else{
        return $this->render('AppBundle:Edit:append.html.twig', array('form' => $form->createView(),'parameters' => array('success' => 'false'),'err_validate' => $val_errors));    
        }
        return $this->render('AppBundle:Edit:append.html.twig', array('form' => $form->createView(),'parameters' => array('success' => 'false'),'err_validate' => $val_errors));
        
    }
    //>
    return array(
    'form' => $form->createView());     
    }
        
   /**
     * @Route("/editadd/{id_add}", name="edit_add")
     * @Template()
     */
    public function editaddAction(Request $request,$id_add,ValidRequest $validrequest,Inf_add_advert $inf_add_advert)
    {
    //action action very similar to controller action {appendAction}
    //Inf_add_advert = object listener event that sends an email confirming the update of the advertisement
    if(is_dir("../web/images/".$id_add)){
    $dir    = "../web/images/".$id_add;
    $files1 = scandir($dir);  
    $files1=array_slice($files1,2);
    }else{
    $files1=NULL;    
    }     
    $user_active = $this->get('security.token_storage')->getToken()->getUser();
    if($user_active==".anon"){
    return $this->forward('AppBundle:Default:Index');     
    }
    $em = $this->getDoctrine()->getManager();   
    $id_user_add = $em->getRepository('AppBundle:Cars')->findOneBy(array('id_user' => $user_active->getId(),'id'=>$id_add));
    if($id_user_add){ 
        $year_ln=(integer)$request->request->get('form')['year']+1919; 
        $user_active = $this->get('security.token_storage')->getToken()->getUser();
        $append = new Append();
        $form = $this->createForm(EditType::class, $append, array(
            'action' => $this->generateUrl('edit_add',array('id_add' => $id_add)),
        ));
            if ($request->getMethod() == 'POST'){  
            $size = $_SERVER['CONTENT_LENGTH'];
            $maxPost = ini_get('post_max_size');
                if($this->return_bytes($maxPost)<$size){
                    $val_errors['post']['fail']='Ograniczenia serwera. Wysyłane dane mają zbyt dużo pojemności.'
                            . 'Nie można wysyłać na raz tyle plików. Zmniejsz ilość zdjęć ( doślesz je później). !!!'
                            . 'Maksymalna zawartość wszystkich danych wysyłanych to '.$this->return_bytes($maxPost).' bajtów';    
                }else{
                    $val_errors=array();   
                    //services validrequest defect the request table by pattern 
                    $val_errors = $validrequest -> getErrors ($request,"../web/json/validate_cars.json"); 
                    //delete image checked
                    if(isset($request->request->get('form')['deleteimage'])){
                            if(is_dir("../web/images/".$id_add)){
                                $arr=$request->request->get('form')['deleteimage'];
                                foreach ($arr as $key => $value) {
                                unlink ("../web/images/".$id_add."/".$key.'.jpg');
                                }
                                $dir    = "../web/images/".$id_add;
                                $files1 = scandir($dir);  
                                $files1=array_slice($files1,2);
                                foreach ($files1 as $key => $value) {
                                rename("../web/images/".$id_add."/".$value, "../web/images/".$id_add."/".($key+1).'.jpg'); 
                                }
                            $dir    = "../web/images/".$id_add;
                            $files1 = scandir($dir);  
                            $files1=array_slice($files1,2);
                            }
                        }
        
                }
            if(count($val_errors)==0){        
            $year_ln=(integer)$request->request->get('form')['year']+1919; 
            $em = $this->getDoctrine()->getManager();
            $cars= $em->getRepository('AppBundle:Cars')->findOneBy(array('id' => $id_add));
                if ($cars){
                try {
                    $cars->setModel($request->request->get('form')['model']);
                    $cars->setMark($request->request->get('form')['mark']);
                    $cars->setPrice((integer)$request->request->get('form')['price']);
                    $cars->setPower((integer)$request->request->get('form')['power']);
                    $cars->setEngine($request->request->get('form')['enginea'].".".$request->request->get('form')['engineb']);
                    $cars->setEnginetype($request->request->get('form')['enginetype']);
                    $cars->setYear($request->request->get('form')['year']);
                    $cars->setBodytype($request->request->get('form')['bodytype']);
                    $cars->setYear($year_ln);
                    $cars->setDescription($request->request->get('form')['description']);
                    $cars->setId_user($user_active->getId());
                    $em->persist($cars);
                    $em->flush();
                    //The {EventDispatcher} component launches an event when the ad is properly edited,
                    // retrieving the record object, which is sent to the service managed 
                    // by the event that sends the confirmation emily.
                    $dispatcher = new EventDispatcher();
                    $dispatcher->addListener('appbundle.callusers.action', array($inf_add_advert, 'Call_raport'));
                    $cars_event=new CarsEvent($cars);
                    $dispatcher->dispatch('appbundle.callusers.action',$cars_event);
                } catch (Exception $e) {

                }
                $entities = $em->getRepository('AppBundle:Cars')->findAll();
                    if(isset($request->files->get('form')['avatar'])){
                        try {
                        rename($request->files->get('form')['avatar']->getPathname(), "../web/images/".$id_add.'.jpg');
                        } catch (Exception $e) {
                        $val_errors['upload']['fail']='nie można przenieść zdjęć na serwer !!!';
                        }
                    }
                    $arr=NULL;
                    if(isset($request->files->get('form')['image'])){
                        if(!is_dir("../web/images/".$id_add)){
                            if (mkdir("../web/images/".$id_add,777)) {   
                            chmod ("../web/images/".$id_add,0777);
                            $arr=$request->files->get('form')['image'];
                            $dir    = "../web/images/".$id_add;
                            $files1 = scandir($dir);  
                            $files1=array_slice($files1,2);
                            foreach ($arr as $key => $value) {
                            try {
                                if(!empty($value)){    
                                rename($value->getPathname(), "../web/images/".$id_add."/".($key+1+count($files1)).'.jpg');    
                                }
                            } catch (Exception $e) {
                            $val_errors['upload']['fail']='nie można przenieść zdjęć na serwer !!!';
                            }
                            } 
                            } else {
                            $val_errors['upload']['fail']='nie można przenieść zdjęć na serwer !!!';   
                            }
                        }else{
                        $dir    = "../web/images/".$id_add;
                        $files1 = scandir($dir);  
                        $files1=array_slice($files1,2);
                        $arr=$request->files->get('form')['image'];
                            foreach ($arr as $key => $value) {
                                try {
                                    if(!empty($value)){
                                    rename($value->getPathname(), "../web/images/".$id_add."/".($key+1+count($files1)).'.jpg');                                  
                                    }
                                } catch (Exception $e) {
                                $val_errors['upload']['fail']='nie można przenieść zdjęć na serwer !!!';
                                }
                            }        
                        }
                    }

                if(@count($files1)==0){  
                return $this->render('AppBundle:Edit:editadd.html.twig', array('form' => $form->createView(),'parameters' => array('success' => 'true'),'err_validate' => $val_errors,'append_image'=>$arr));   
                }else{
                return $this->render('AppBundle:Edit:editadd.html.twig', array('form' => $form->createView(),'parameters' => array('success' => 'true'),'err_validate' => $val_errors,'allow_image' => $files1,'append_image'=>$arr));                 
                }
                }             
            }else{
            return $this->render('AppBundle:Edit:editadd.html.twig', array('form' => $form->createView(),'parameters' => array('success' => 'false'),'err_validate' => $val_errors,'allow_image' => $files1));    
            }
        }

        if($files1==NULL){
        return $this->render('AppBundle:Edit:editadd.html.twig', array('form' => $form->createView()));    
        }else{ 
        return $this->render('AppBundle:Edit:editadd.html.twig', array('form' => $form->createView(),'allow_image' => $files1));
        }
    }
    return $this->forward('AppBundle:Default:Index');       
        
    }
    
     public function EnumPossibleValue($field = 'bodytype'){
        $em = $this->getDoctrine()->getEntityManager();
        $metadata = $em->getClassMetadata('AppBundle:Cars');
        $myPropertyMapping = $metadata->getFieldMapping($field);
        $value=substr($myPropertyMapping['columnDefinition'], 5, -1);   
        $pieces = explode(",", $value);
        $arr_value;
        for ($i = 0; $i < count($pieces); $i++) {
        $arr_value[substr($pieces[$i], 1, -1)]=substr($pieces[$i], 1, -1);
        }
        return $arr_value;
     }
   
    function return_bytes($val)
    {
    $val  = trim($val);
    $last = strtolower($val[strlen($val)-1]);
    $val  = substr($val, 0, -1);
        switch($last) {
        case 'g':
            $val *= 1024;
        case 'm':
            $val *= 1024;
        case 'k':
            $val *= 1024;
        }
    return $val;
    }                
}
