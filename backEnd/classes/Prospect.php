<?php


class Prospect extends Dbh {

    public function __construct(){

    }

    public function getOneProspect($raisonSocial){

        $raisonSocial = strtolower($raisonSocial);

        $stmt = $this->connect()->prepare('select * from "Prospect" where "raisonSocial" = ?;');

        if (!$stmt->execute(array($raisonSocial))) {
            $stmt = null;
            header("location: ./?error=404");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllProspect(){
        $stmt = $this->connect()->prepare('select * from "Prospect";');

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ./?error=404");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addOneProspect($nom,$prenom,$siret,$score,$raisonSocial){
        $stmt = $this->connect()->prepare('insert into "Prospect"(nom,prenom,siret,score,raisonSocial) values (?,?,?,?,?)');

        $array[] = strtolower(array($nom,$prenom,$siret,$score,$raisonSocial));

        if (!$stmt->execute($array)) {
            $stmt = null;
            header("location: ./?error=404");
            exit();
        }
        $stmt = null;
    }
}