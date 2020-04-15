<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$bd = 'bdrelatorios';

$con = new mysqli($server,$user,$pass,$bd);



if(mysqli_connect_errno()){
	echo 'Não conectado', mysqli_connect_error();
	exit();
}
/*
else{
	echo 'Conectado ao banco de dados!';
}*/