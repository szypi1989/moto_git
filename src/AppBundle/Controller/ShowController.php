<?php

namespace AppBundle\Controller;
use AppBundle\Form\Type\SearchType;
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

class ShowController extends Controller
{
    /**
    * @Route("/menu")
    * @Template()
    */
    public function menuAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('AppBundle:Cars')->findAll(array('distinct' => true));
        return array('entities' => $entities);
    }
    /**
    * @Route("/search")
    * @Template()
    */
    public function searchAction()
    {
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
    public function viewAction(Request $request,$page)
    {
        $em = $this->getDoctrine()->getEntityManager();   
        $entities = $em->getRepository('AppBundle:Cars')->findById($page);
            foreach ($entities as $prop) {
            $id_user=$prop->getId_user() . "\n";
            }
        if(is_dir("../web/images/".$page)){
            $dir    = "../web/images/".$page;
            $files1 = scandir($dir);  
            $files1=array_slice($files1,2);
        }else{
            $files1=NULL;    
        }    
        $user_info = $em->getRepository('AppBundle:Userinfo')->findOneBy((array('id_user' => $id_user)));
        $user_ad = $em->getRepository('AppBundle:User')->findOneBy((array('id' => $id_user)));
        if($files1==NULL){
            return array('userinfo' => $user_info,'entities' => $entities,'user' => $user_ad);   
        }else{ 
            return array('userinfo' => $user_info,'entities' => $entities,'user' => $user_ad,'gallery' => $files1);
        }
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
}
