<?php
/**
 * @author Wellington Ribeiro
 * @version 1.0
 * @since 2010-02-09
 */

header('Content-type: text/html; charset=UTF-8');//cria o header/cabelha no padrão UTF-8 (caracteres especiais)

include_once("../Classes/Conexao.class.php");

$conn 	= new Conexao();	//new instancia��o


if( isset( $_REQUEST['query'] ) && $_REQUEST['query'] != "" )
{
    $q = mysql_real_escape_string( $_REQUEST['query'] );
    
    /*/*aqui iniciamos o primeiro preenchimento autocomplete - para saber qual impot soliita e recebe o dado
    *é preciso capturar o "identifier" $_REQUEST['identifier']
    */
    if( isset( $_REQUEST['identifier'] ) && $_REQUEST['identifier'] == "imputUm")
    {
	$sql = "SELECT * FROM Cidades where locate('$q',CidadesNome) > 0 order by locate('$q',CidadesNome) limit 20";
	$r = mysql_query( $sql );
	if ( $r )
	{
	    echo '<ul>'."\n";
	    while( $l = mysql_fetch_array( $r ) )
	    {
		$p = $l['CidadesNome'];
		$p = preg_replace('/(' . $q . ')/i', '<span style="font-weight:bold;">$1</span>', $p);
		echo "\t".'<li id="autocomplete_'.$l['idCidades'].'" rel="'.$l['idCidades'].'_' . $l['idCidades'] . '">'. utf8_encode( $p ) .'</li>'."\n";
	    }
	    echo '</ul>';
	}
    }
    /*/*aqui iniciamos o segundo preenchimento autocomplete - para saber qual impot soliita e recebe o dado
    *é preciso capturar o "identifier" $_REQUEST['identifier']
    */
    if( isset( $_REQUEST['identifier'] ) && $_REQUEST['identifier'] == "imputDois")
    {
	//nose-se que para o autocomplete funcione apenas com filhos do primeiro autocomplete,usamos extraParam, que nada mais é do que
        //a FK que identifica os filhos
        //$sql = isset( $_REQUEST['extraParam'] ) ? " and idCidades = " . mysql_real_escape_string( $_REQUEST['extraParam'] ) . " " : "";
	$sql = "SELECT * FROM Bairros where locate('$q',BairrosNome) > 0 and idCidades = " . mysql_real_escape_string( $_REQUEST['extraParam'] )." order by locate('$q',BairrosNome) limit 100";
	$r = mysql_query( $sql );
	if ( count( $r ) > 0 )
	{
	    echo '<ul>'."\n";
	    while( $l = mysql_fetch_array( $r ) )
	    {
		$p = $l['BairrosNome'];
		$p = preg_replace('/(' . $q . ')/i', '<span style="font-weight:bold;">$1</span>', $p);
		echo "\t".'<li id="autocomplete_'.$l['idBairros'].'" rel="'.$l['idBairros'].'_' . $l['idBairros'] . '">'. utf8_encode( $p ) .'</li>'."\n";
	    }
	    echo '</ul>';
	}
    }
    /*/*aqui poderiamos iniciar o primeiro preenchimento autocomplete - para saber qual impot soliita e recebe o dado
    *é preciso capturar o "identifier" $_REQUEST['identifier']
    */
}

?>