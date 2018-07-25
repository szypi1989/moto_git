<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\ParameterBag;
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
use Symfony\Component\Validator\Constraints\Type;
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

class UserController extends Controller
{
   /**
     * @Route("/editinfo/{user}", name="edit_info")
     * @Template()
     */
    public function profileinfoAction(Request $request,$user)
    {
        $user_active = $this->get('security.token_storage')->getToken()->getUser();
        if($user_active!='anon.'){
            if(($user_active)==$user){
            $em = $this->getDoctrine()->getManager();
            $status= $em->getRepository('AppBundle:Userinfo')->findOneBy(array('id_user' => $user_active->getId()));
            $append = new Profileinfo();
            $form = $this->createFormBuilder($append)
            ->add('address', TextType::class, array('data'=> ($status)?$status->getAddress():NULL)) 
            ->add('phonenumber',  NumberType::class,array("error_bubbling" => true,
            'constraints' => array(new Type("Numeric")),'data'=> (($status)?$status->getPhone_number():NULL)))
            ->add('save', SubmitType::class, array('label' => 'Dodaj ogłoszenie'))
            ->getForm();
            $form->handleRequest($request);
            if ($request->getMethod() == 'POST'){
                $em = $this->getDoctrine()->getManager();
                $status= $em->getRepository('AppBundle:Userinfo')->findOneBy(array('id_user' => $user_active->getId()));
                if($status){
                $status->setAddress($request->request->get('form')['address']);
                $status->setPhone_number($request->request->get('form')['phonenumber']);
                $em->persist($status);  
                }else{
                $profile_info = new Userinfo();
                $profile_info->setId_user($user_active->getId());
                $profile_info->setAddress($request->request->get('form')['address']); 
                $profile_info->setPhone_number($request->request->get('form')['phonenumber']); 
                $em->persist($profile_info);    
                }
                $em->flush(); 
                return array(
                'form' => $form->createView(),'parameters' => array('success' => 'true'));   
            }      
        return array(
        'form' => $form->createView(),'parameters' => array('success' => 'false'));        
            }else{
                return $this->forward('AppBundle:User:profileinfo', array(
                    'user' => $this->get('security.token_storage')->getToken()->getUser(),
                ));
            }
        }
         return $this->forward('AppBundle:Default:Index');
    }
    
    /**
    * @Route("/myadd", name="my_add")
    * @Template()
    */
    public function myaddAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user_active = $this->get('security.token_storage')->getToken()->getUser();
        $entities = $em->getRepository('AppBundle:Cars')->findBy(array('id_user' =>$user_active->getId()));
        return array('entities' => $entities);    
    }
}
