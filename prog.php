<?php

    class MySql{

        public $end;
        public $log;
        public $pass;

        public function __construct($end, $log, $pass){
            $bd = mysqli_connect($end, $log, $pass);
        }

        public function findFirst($table, $where){
            $sql = "SELECT * FROM $table $where LIMIT 1";
            $var = $sql->fetch(PDO::FETCH_ASSOC);

            function __get($var){
                if(array_key_exists($var,$this->$sql->$var)){
                    return $this->$sql[$var];
                }
                function __set($var, $tes){
                    return $this->$sql[$var] = $tes; 
                }
                
            }
        }
     
                
    }
?>