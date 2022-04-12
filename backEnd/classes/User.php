<?php


class User extends Dbh {

    public function __construct(){

    }

    public function getOneUser($email){
        $stmt = $this->connect()->prepare('select * from "UserApp" where email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ./?error=404");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllUser(){
        $stmt = $this->connect()->prepare('select * from "UserApp";');

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ./?error=404");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addOneUser($email,$password,$nom,$prenom){
        $stmt = $this->connect()->prepare('insert into UserApp(email,password,nom,prenom) values (?,?,?,?)');

        if (!$stmt->execute(array($email,$password,$nom,$prenom))) {
            $stmt = null;
            header("location: ./?error=404");
            exit();
        }
        $stmt = null;
    }

}