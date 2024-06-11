<?php 
class DbConnexion
{
    public ?PDO $mysqlClient = null;
    
    public function getConnexion(): PDO
    {
        if ($this->mysqlClient === null){
            $this->mysqlClient = new PDO ('mysql:host=localhost;dbname=artbox','root', '',);
        }
        return $this->mysqlClient;
    }
}