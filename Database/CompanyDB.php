<?php


class CompanyDB
{
    private $dbcon;
    public function __construct($dbcon)
    {
        $this->dbcon=$dbcon;
    }

    public function addCompany(CompanyProfile $c)
    {
        $query = "INSERT INTO Company (id,name, description, head_office, lob, website, employees, status) VALUES(:id, :name, :description, :head_office, :lob, :website, :employees, :status)";
        $statement = $this->dbcon->prepare($query);
        $statement->bindValue(':id', $c->getId());
        $statement->bindValue(':name', $c->getName());
        $statement->bindValue(':description', $c->getDescription());
        $statement->bindValue(':head_office', $c->getHeadOffice());
        $statement->bindValue(':lob', $c->getLob());
        $statement->bindValue(':website', $c->getWebsite());
        $statement->bindValue(':employees', $c->getEmployees());
        $statement->bindValue(':status', $c->getStatus());
        if(!$statement->execute()){
            echo "Error in Adding Company";
        }
    }

    public function listCompanies(){
        $sql = "SELECT * from Company";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->execute();
        $companies = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $companies;
    }

    public function findCompany($id){

        $sql = "SELECT * from Company where id=:jobid";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->bindValue(':jobid', $id);
        $pdostm->execute();
        $company = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $company;
    }
}

?>