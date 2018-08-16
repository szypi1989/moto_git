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

use  AppBundle\Service\Show\View\Advert;

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
    public function viewAction(Request $request,$page,Advert $advert)
    {
      return  $advert->generateView(); 
    }               
}
