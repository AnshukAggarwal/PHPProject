<?php

class JobDB
{
    private $dbcon;
    public function __construct($dbcon)
    {
        $this->dbcon=$dbcon;
    }

    public function listJobs($key){
//        $sql = "SELECT * from Jobs where title LIKE '%".$key."%'";
        $sql = "SELECT * from Jobs where title like :key";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->bindValue(':key','%'.$key.'%');
        $pdostm->execute();
        $jobs = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $jobs;
    }


    public function getJobByID($jobId){
        $sql = "SELECT * from Jobs where id=:jobid";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->bindValue(':jobid', $jobId);
        $pdostm->execute();
        $jobs = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $jobs;
    }

    public function getJobByLocation($location, $title){
        $sql = "select * from Jobs where location = :location AND title LIKE :title";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->bindValue(':location', $location);
        $pdostm->bindValue(':title', '%'.$title.'%');
        $pdostm->execute();
        $jobs = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $jobs;
    }


    public function addJob(Job $j)
    {
        $query = "INSERT INTO Jobs (title, company_id, location, salary, description, date) VALUES(:title, :company_id, :location, :salary, :description , NOW())";
        $statement = $this->dbcon->prepare($query);
        $statement->bindValue(':title', $j->getTitle());
        $statement->bindValue(':company_id', $j->getCompanyId());
        $statement->bindValue(':location', $j->getLocation());
        $statement->bindValue(':salary', $j->getSalary());
        $statement->bindValue(':description', $j->getDescription());
        if($statement->execute()){
            header('location: Index.php');
        }
        else
        {
            echo "Error in Adding Job";
        }
    }

    public function deleteJob($id)
    {

        $query = "delete from Jobs where id = :id";
        $statement = $this->dbcon->prepare($query);
        $statement->bindParam(':id',$id);
        $statement->execute();
        header("location:ListJobs.php");
    }

    public function updateJob(Job $j)
    {
        $sql = "UPDATE Jobs SET title=:title,company_id=:company_id,location=:location,salary=:salary,description=:description where id = :jobid";
        $statement = $this->dbcon->prepare($sql);

        $statement->bindValue(':title', $j->getTitle());
        $statement->bindValue(':company_id', $j->getCompanyId());
        $statement->bindValue(':location', $j->getLocation());
        $statement->bindValue(':salary', $j->getSalary());
        $statement->bindValue(':description', $j->getDescription());
        $statement->bindValue(':jobid', $j->getId());

        if ($statement->execute()) {
            header('location:listJobs.php');
        } else {
            echo "Error Updating";
        }
    }


}
?>
