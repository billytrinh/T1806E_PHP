<?php
/**
 * Created by PhpStorm.
 * User: quanghoa
 * Date: 6/4/19
 * Time: 6:36 PM
 */

class User
{
    protected $table = "user";
    public $id;
    public $username;
    public $email;
    public $password;


    public function getAllUser(){
        $servername = "localhost";
        $userDB = "root";
        $passDB = "root";
        $dbName = 'T1806E';

        $conn = new mysqli($servername,$userDB,$passDB,$dbName);

        if($conn->connect_error){
            die("connection error");
        }
        $sql = "SELECT * FROM ".$this->table;

        $result = $conn->query($sql);

        $list = [];
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $u = new User();
                $list[] = $u->setData($row);
            }
        }
        return $list;

    }

    public function getDetail($user_id){
        $servername = "localhost";
        $userDB = "root";
        $passDB = "root";
        $dbName = 'T1806E';

        $conn = new mysqli($servername,$userDB,$passDB,$dbName);

        if($conn->connect_error){
            die("connection error");
        }
        $sql = "SELECT * FROM ".$this->table
            ." WHERE id = ".$user_id." LIMIT 1";

        $result = $conn->query($sql);

        $list = [];
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $u = new User();
                return $u->setData($row);
            }
        }
        return null;
    }

    public function setData($data){
        foreach ($data as $key=>$value){
            $this->$key = $value;
        }
        return $this;
    }

    public function getMark(){
        return "<a href='ListController.php?user_id=".$this->id.
            "'>View Detail</a>";
    }
}