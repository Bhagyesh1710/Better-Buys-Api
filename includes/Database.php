<?php

define('Host','localhost');
define('USER_NAME','root');
define('PASSWORD','');
define('DB_NAME','better_buys');

//

class Database{
    private $connection;

    //Constructor
    public __construc(){
        $this->open_db_connection();
    }
    
    //Create Connection with DB
    public function open_db_connection(){
        $this->connection = mysqli_connect(HOST, USER_NAME, PASSWORD,DB_NAME);
        
        if(mysqli_connect_error()){
            die('Connection Error:',mysqli_connect_error());
        }

    }
    
    //Executing Sql Query
    public function query($sql){
        $result = $this->connection->query($sql);
        if(!$result){
            die('Query Fails:',$sql);
        }

        return $result;
    }

    //Fetching List of data from the sql query result
    public function fetch_array($result){
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $result_array[] = $row;
            }
            return $result_array;
        }
    }

    //Fetching single row pf data from the sql query
    public function fetch_row($result){
        if($result->num_rows > 0)
        return $result->fetch_assoc();
    }

    //Check Proper format of data
    public function escape_value($value){
        return $this->connection->real_escape_string($value);
    }

    //Close Connection the sql
    public function close_connection(){
        $this->connection->close();
    }


}


$database = new Database();