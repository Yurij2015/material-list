<?php
/**
 * Created by PhpStorm.
 * File: MaterialForm.php
 * Date: 12.02.2019
 * Time: 21:56
 */

class MaterialForm
{
    private $material_name;
    private $notice;
    private $count;
    private $price;
    private $storehouse_idstorehouse;
    private $adoptiondate;
    private $responsible_person;


    /**
     * @param array $data
     */
    function __construct(Array $data)
    {
        $this->material_name = isset($data['material_name']) ? $data['material_name'] : null;
        $this->notice = isset($data['notice']) ? $data['notice'] : null;
        $this->count = isset($data['count']) ? $data['count'] : null;
        $this->price = isset($data['price']) ? $data['price'] : null;
        $this->storehouse_idstorehouse = isset($data['storehouse_idstorehouse']) ? $data['storehouse_idstorehouse'] : null;
        $this->adoptiondate = isset($data['adoptiondate']) ? $data['adoptiondate'] : null;
        $this->responsible_person = isset($data['responsible_person']) ? $data['responsible_person'] : null;


    }

    public function validate()
    {
        return !empty($this->material_name) && !empty($this->notice) && !empty($this->count) && !empty($this->price) && !empty($this->storehouse_idstorehouse) && !empty($this->adoptiondate) && !empty($this->responsible_person);
    }

    /**
     * @return mixed
     */
    public function getMaterialName()
    {
        return $this->material_name;
    }

    /**
     * @param mixed $material_name
     */
    public function setMaterialName($material_name)
    {
        $this->material_name = $material_name;
    }

    /**
     * @return mixed
     */
    public function getNotice()
    {
        return $this->notice;
    }

    /**
     * @param mixed $notice
     */
    public function setNotice($notice)
    {
        $this->notice = $notice;
    }


    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getStorehouse_idstorehouse()
    {
        return $this->storehouse_idstorehouse;
    }

    /**
     * @param mixed $storehouse_idstorehouse
     */
    public function setStorehouse_idstorehouse($storehouse_idstorehouse)
    {
        $this->storehouse_idstorehouse = $storehouse_idstorehouse;
    }

    /**
     * @return mixed
     */
    public function getAdoptiondate()
    {
        return $this->adoptiondate;
    }

    /**
     * @param mixed $adoptiondate
     */
    public function setAdoptiondate($adoptiondate)
    {
        $this->adoptiondate = $adoptiondate;
    }

    /**
     * @return mixed
     */
    public function getResponsible_person()
    {
        return $this->responsible_person;
    }

    /**
     * @param mixed $responsible_person
     */
    public function setResponsible_person($responsible_person)
    {
        $this->responsible_person = $responsible_person;
    }


}