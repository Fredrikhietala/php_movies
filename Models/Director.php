<?php

class Director
{
    private $id;
    private $name;
    private $birthYear;
    private $nationality;

    public function __construct($director_data = [])
    {
        if (isset($director_data['id'])) {
            $this->id = $director_data['id'];
            $this->name = @$director_data['name'];
            $this->birthYear = @$director_data['birth_year'];
            $this->nationality = @$director_data['nationality'];
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getBirthYear()
    {
        return $this->birthYear;
    }

    /**
     * @param mixed $birthYear
     */
    public function setBirthYear($birthYear)
    {
        $this->birthYear = $birthYear;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }
}