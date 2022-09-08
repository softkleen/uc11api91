<?php 
// conexão com banco de dados da app mobile ionic
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json; charset=utf-8');

// dados do servidor local 
$banco = 'controledb';
$host = 'localhost'; // 127.0.0.1
$usuario = 'root';
$senha = '';

/*
// dados do servidor remoto/hospedado
$banco = 'wellington_91';
$host = 'softkleen.com.br'; 
$usuario = 'apiti9111';
$senha = '';
*/

try{
    $pdo = new PDO("mysql:dbname=$banco;host=$host","$usuario", "$senha");
} catch (Exception $e) { 
    echo 'Erro ao conectar com o banco!';
}



?>