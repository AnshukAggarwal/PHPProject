<?php


class CompanyProfile
{
    private $id;
    private $name;
    private $description;
    private $head_office;
    private $lob;
    private $website;
    private $employees;
    private $status;

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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getHeadOffice()
    {
        return $this->head_office;
    }

    /**
     * @param mixed $head_office
     */
    public function setHeadOffice($head_office)
    {
        $this->head_office = $head_office;
    }

    /**
     * @return mixed
     */
    public function getLob()
    {
        return $this->lob;
    }

    /**
     * @param mixed $lob
     */
    public function setLob($lob)
    {
        $this->lob = $lob;
    }

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param mixed $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * @return mixed
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * @param mixed $employees
     */
    public function setEmployees($employees)
    {
        $this->employees = $employees;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


}