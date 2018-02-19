<?php
/**
 * @author Wellington Ribeiro
 * @version 1.0
 * @since 2010-02-09
 */

header('Content-type: text/html; charset=UTF-8');//cria o header/cabelha no padrão UTF-8 (caracteres especiais)
include_once '../Classes/dbconfig.php';
$db = $DB_con;
if( isset( $_REQUEST['query'] ) && $_REQUEST['query'] != "" )
{
    //$q = mysql_real_escape_string( $_REQUEST['query'] );
    if( isset( $_REQUEST['identifier'] ) && $_REQUEST['identifier'] == "imputUm")
    {
	$att = $db->prepare('SELECT idCidades, CidadesNome, CidadesControl FROM Cidades WHERE LOCATE(?,CidadesNome) > 0 ORDER BY CidadesNome LIMIT 25');
        $att->bindParam(1, $_REQUEST['query']);
        $att->execute();
        $att->bindColumn(1, $ide);
        $att->bindColumn(2, $nom);
        $att->bindColumn(3, $cpf);
        $row = $att->rowCount();
        if ($row > 0)
        {
            echo '<ul>'."\n";
            while($att->fetch(PDO::FETCH_BOUND)){ 
               $p = utf8_encode($nom); 
               $p = preg_replace('/(' . $a . ')/i', '<span style="font-weight:bold;">$1</span>', $nom);
               echo "\t".'<li codigoSinal="autocomplete_'.$ide.'" rel="'.$ide.'_' . $cpf. '">'. utf8_encode( $nom ) .'</li>'."\n";
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
        $att = $db->prepare('SELECT idBairros, BairrosNome, BairrosControl FROM Bairros where locate(?,BairrosNome) > 0 and idCidades = ? order by BairrosNome limit 100');
        $att->bindParam(1, $_REQUEST['query']);
        $att->bindParam(2, $_REQUEST['extraParam']);
        $att->execute();
        $att->bindColumn(1, $ide);
        $att->bindColumn(2, $nom);
        $att->bindColumn(3, $cpf);
        $row = $att->rowCount();
        if ($row > 0)
        {
            echo '<ul>'."\n";
            while($att->fetch(PDO::FETCH_BOUND)){ 
               $p = utf8_encode($nom); 
               $p = preg_replace('/(' . $a . ')/i', '<span style="font-weight:bold;">$1</span>', $nom);
               echo "\t".'<li id="autocomplete_'.$ide.'" rel="'.$ide.'_' . $cpf. '">'. utf8_encode( $nom ) .'</li>'."\n";
            }
            echo '</ul>';
        }
	
    }
    /*/*aqui poderiamos iniciar o primeiro preenchimento autocomplete - para saber qual impot soliita e recebe o dado
    *é preciso capturar o "identifier" $_REQUEST['identifier']
    */
}

?>