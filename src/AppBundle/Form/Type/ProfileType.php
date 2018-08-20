<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Service\User\profileinfo\ProfileSql;

class ProfileType extends AbstractType {
    
    protected $profilesql;

    /**
     * Constructor
     *
     * @param Container $container
     * @param EntityManager $em
     */
    public function __construct(ProfileSql $profilesql) {
        $this->profilesql = $profilesql;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('address', TextType::class, array('data' => (is_object($this->profilesql->getUserEntity())) ? $this->profilesql->getUserEntity()->getAddress() : NULL))
                ->add('phonenumber', NumberType::class, array("error_bubbling" => true,
                    'constraints' => array(new Type("Numeric")), 'data' => (($this->profilesql->getUserEntity()) ? $this->profilesql->getUserEntity()->getPhone_number() : NULL)))
                ->add('save', SubmitType::class, array('label' => 'Dodaj ogłoszenie'));
    }

    public function getBlockPrefix() {
        return "form";
    }

}
