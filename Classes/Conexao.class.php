<?php
	class Conexao{
	
	protected $id;
	protected $con;
	
	function __construct(){
	
	$local 		= "localhost";
	$dbname 	= "bancodedados";
	$usuario 	= "root";
	$password 	= "root"; 
	


		
		if(!($this->id = mysql_connect($local, $usuario, $password))) { 
			echo "N&atilde;o foi poss&iacute;vel estabelecer uma conex&atilde;o com o Gerenciador MySQL. Favor contatar o administrador!";
			
			exit;
		}
		
		if(!($this->con = mysql_select_db($dbname, $this->id))) { 
			echo "N&atilde;o foi poss&iacute;vel estabelecer uma conex&atilde;o com o Banco de Dados. Favor contatar o administrador!";	
			
			exit;
		}
		
	}
	/* function __destruct(){
		mysql_close($this->id);
	} */
}
?>
