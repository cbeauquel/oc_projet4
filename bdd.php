<?php 
try{
$mysqlClient=new PDO(
    'mysql:host=localhost,dbname=artbox',
    'root'
    ''
);
}
catch (Exception $e)
{
    die('Erreur : '. $e->getMessage());
}