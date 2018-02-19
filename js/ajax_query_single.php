<?php
/**
 * @author Wellington Ribeiro
 * @version 1.0
 * @since 2010-02-09
 */

header('Content-type: text/html; charset=UTF-8');

include_once("../Classes/Conexao.class.php");//cria o header/cabelha no padrão UTF-8 (caracteres especiais)

$conn 	= new Conexao();	//new instanciação

if( isset( $_REQUEST['query'] ) && $_REQUEST['query'] != "" )
{
    $q = mysql_real_escape_string( $_REQUEST['query'] );

	$sql = "SELECT * FROM Proprietario where locate('$q',ProprietarioNome) > 0 order by locate('$q',ProprietarioNome) limit 20";
	$r = mysql_query( $sql );
	if ( $r )
	{
	    echo '<ul>'."\n";
	    while( $l = mysql_fetch_array( $r ) )
	    {
		$p = $l['ProprietarioNome'];
     		echo "\t".'<li codigoSinal="autocomplete_'.$l['idProprietario'].'" rel="'.$l['idProprietario'].'_' . $l['ProprietarioCpf'] . '">'. utf8_encode( $p ) .'</li>'."\n";
	    }
	    echo '</ul>';
	}
}

?>
