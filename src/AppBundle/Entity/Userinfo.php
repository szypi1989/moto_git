<?php

namespace AppBundle\Entity;  

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Userinfo
 *
 * @ORM\Table(name="user_info")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserinfoRepository")
 * @UniqueEntity("id_user")
 */
class Userinfo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="integer")
     */
    private $phone_number;
     
    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $id_user;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Userinfo
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone_number
     *
     * @param integer $phone_number
     * @return Userinfo
     */
    public function setPhone_number($phone_number)
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    /**
     * Get phone_number
     *
     * @return integer
     */
    public function getPhone_number()
    {
        return $this->phone_number;
    }
    
     /**
     * Set id_user
     *
     * @param integer $id_user
     * @return Userinfo
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get id_user
     *
     * @return integer
     */
    public function getId_user()
    {
        return $this->id_user;
    }

}
