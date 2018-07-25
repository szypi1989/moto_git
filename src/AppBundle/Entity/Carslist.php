<?php

namespace AppBundle\Entity;  

use Doctrine\ORM\Mapping as ORM;

/**
 * Carslist
 *
 * @ORM\Table(name="cars_list")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarslistRepository")
 */
class Carslist
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
     * @ORM\Column(name="mark", type="string", length=255)
     */
    private $mark;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var int
     *
     * @ORM\Column(name="version", type="integer")
     */
    private $version;

    /**
     * @var decimal 
     *
     * @ORM\Column(name="engine_code", type="decimal")
     */
    private $engine_code;
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
     * @return Carslist
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
     * @return Carslist
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
     * Set version
     *
     * @param string $version
     * @return Carslist
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->price;
    }

    /**
     * Set engine_code
     *
     * @param string $engine
     * @return Carslist
     */
    public function setEngine_code($engine_code)
    {
        $this->engine_code = $engine_code;

        return $this;
    }

    /**
     * Get engine_code
     *
     * @return string 
     */
    public function getEngine_code()
    {
        return $this->engine_code;
    }
    
}
