<?php
class DaB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    
    public function __construct(){
        $this->host     = 'ejemplo';
        $this->db       = 'bd_inscripcion01';
        $this->user     = 'usuarioejemplo';
        $this->password = "ejemplo";
        $this->charset  = 'latin';
     
    }
    public function connect(){
    
      
        try{
            
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset =" . $this->charset;
            $options = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            );
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $pdo->exec("set names utf8mb4");
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
}
?>