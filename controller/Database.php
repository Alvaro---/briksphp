<?php
class Database
{        
    private $_connection;
    private static $_instance; //The single instance
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_database = "briks";
 
    /*
    OBTENER INSTANCIA
    @return Instance
    */
    public static function getInstance(){
        if(!self::$_instance) // SI NO EXISTE LA CREA
        { 
            self::$_instance = new self();
        }
        return self::$_instance;
    }
 
    // Constructor
    private function __construct(){
        $this->_connection = new mysqli($this->_host, $this->_username,$this->_password, $this->_database);
        // ERROR
        if(mysqli_connect_error())
        {
            trigger_error("FALLO AL CONECTAR: " . mysql_connect_error(),E_USER_ERROR);
        }
    }
 
    // VACIAR EL MOTODO DE CLONAR PARA PREVENIR LA CLONACION
    private function __clone() { }
 
    // OBTENER LA CONECCION MYSQLI
    private function getConnection(){
        return $this->_connection;
    }
    // OBTIENE LOS DATOS. (CONSULTAS SELECT) 
    public function get_data($sql){
        $ret = array('STATUS'=>'ERROR','ERROR'=>'','DATA'=>array());
        $mysqli = $this->getConnection();
        $res = $mysqli->query($sql);
         
        if($res){
            $ret['STATUS'] = "OK";
            while($row = $res->fetch_array(MYSQLI_ASSOC))
            {
                $ret['DATA'][] = $row;
                //echo $row['materia'].' ';
            }   
            
        }
        else// ADERIDO PARAMETRO DE MISQLI_ERROR
            $ret['ERROR'] = mysqli_error($mysqli);            
        return $ret;
    }
    // EJECUTA QUERRY (INSERT, UPDATE, DELETE,...)
    public function exec($sql){
        $ret = array('STATUS'=>'ERROR','ERROR'=>'');
 
        $mysqli = $this->getConnection();
        $res = $mysqli->query($sql);
         
        if($res)
            $ret['STATUS'] = "OK";
        else
            $ret['ERROR'] = mysqli_error($mysqli);
         
        return $ret;
    }
 
}
?>