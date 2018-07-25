<?php

namespace AppBundle\Entity;  

use Doctrine\ORM\Mapping as ORM;

/**
 * Cars
 *
 * @ORM\Table(name="cars")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarsRepository")
 */
class Cars 
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
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="mark", type="string", length=255)
     */
    private $mark;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var decimal 
     *
     * @ORM\Column(name="engine", type="decimal")
     */
    private $engine;

    /**
     * @var int
     *
     * @ORM\Column(name="power", type="integer")
     */
    private $power;

    /**
     * @var string
     *
     * @ORM\Column(name="enginetype", columnDefinition="ENUM('diesel','benzyna','benzynalpg','inny')")
     */
    private $enginetype;
      /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer", length=255)
     */
    private $year;
   /**
     * @var string
     *
     * @ORM\Column(name="bodytype", columnDefinition="ENUM('kombi','sedan','hatchcback','suv','inny')")
     */
    private $bodytype;
    
    /**
    * @var int
    *
    * @ORM\Column(name="id_user",  type="integer", length=255)
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
     * Set model
     *
     * @param string $model
     * @return Cars
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set mark
     *
     * @param string $mark
     * @return Cars
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return string 
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Cars
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set engine
     *
     * @param float $engine
     * @return Cars
     */
    public function setEngine($engine)
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * Get engine
     *
     * @return float 
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * Set power
     *
     * @param integer $power
     * @return Cars
     */
    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }

    /**
     * Get power
     *
     * @return integer 
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Cars
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return integer 
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Set year
     *
     * @param integer $year
     * @return Cars
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }
    /**
     * Set enginetype
     *
     * @param string $enginetype
     * @return Cars
     */
    public function setEnginetype($enginetype)
    {
        $this->enginetype = $enginetype;

        return $this;
    }

    /**
     * Get enginetype
     *
     * @return string 
     */
    public function getEnginetype()
    {
        return $this->enginetype;
    }
    /**
     * Set bodytype
     *
     * @param string $bodytype
     * @return Cars
     */
     public function setBodytype($bodytype)
    {
        $this->bodytype= $bodytype;

        return $this;
    }

    /**
     * Get bodytype
     *
     * @return string 
     */
    public function getBodytype()
    {
        return $this->bodytype;
    }
    /**
    * Set image
    *
    * @param string $image
    * @return Cars
    */
     public function setImage($image)
    {
        $this->image= $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }
    
     /**
     * Set id_user
     *
     * @param integer $id_user
     * @return Cars
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
