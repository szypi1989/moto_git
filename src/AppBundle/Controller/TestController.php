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
//use AppBundle\Entity\User;

class TestController extends Controller
{

       /**
     * @Route("/searchs")
     * @Template()
     */
     public function searchAction()
     {
        $str='0';
        for ($i = 0; $i <= 9; $i++) {
        $array_it[]=$i;
        }
        //$array_year[NULL]=NULL;
        for ($i = 2017; $i >= 1920; $i--) {   
        $array_year[$i]=$i;
        }
        $array_mark=array();
        $task = new Search();
        $em = $this->getDoctrine()->getManager();
       // $entities = $em->getRepository('AppBundle:Carslist')->findAll();
        //var_dump($entities['mark']);
       $qb = $em->createQueryBuilder();
       $qb->select('c.mark')
       ->from('AppBundle:Carslist', 'c');  
        $entities=$qb->distinct()->getQuery()->getResult();
        foreach ($entities as $prop) {
        $array_mark[]=$prop['mark'];
        }
    
     }
          
}
