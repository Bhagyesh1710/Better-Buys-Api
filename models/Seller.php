<?php

$ds = DIRECTORY_SEPERATOR;
$base_dir =realpath(dirname(__FILE__).ds . '..') . $ds;

require_once("{$base_dir}includes{$ds}Database.php");

class Seller{
    private $table = 'sellers'; 

    public id;
    public name;
    public email;
    public password;
    public image;
    public address;
    public description;

    //Constructor

    public function __construc(){}

    //Validating if params exist or not
    public function validate_params($value){
        return (!empty($value));
    }

    public function register_seller(){
        global $database;

        $this->name = trim(htmlspecialchars(strip_tags($this->name)));
        $this->email = trim(htmlspecialchars(strip_tags($this->email)));
        $this->password = trim(htmlspecialchars(strip_tags($this->password)));
        $this->image = trim(htmlspecialchars(strip_tags($this->image)));
        $this->address = trim(htmlspecialchars(strip_tags($this->address)));
        $this->description = trim(htmlspecialchars(strip_tags($this->description)));
        
        $sql = "Insert into $this->table(name,email,password,image,address,description) values (
            '".$database->escape_value($this->name)."',
            '".$database->escape_value($this->email)."',
            '".$database->escape_value($this->password)."',
            '".$database->escape_value($this->image)."',
            '".$database->escape_value($this->address)."',
            '".$database->escape_value($this->description)."'
        )";

        $seller_saved = $database->query($sql);

        if($seller_saved){
            return $database->last_insert_id();
        }else{
            return false;

        } 
    }

}

$seller = new Seller();