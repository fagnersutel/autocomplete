<?php
/**
 * @author Fagner Sutel
 * @adaptado de Wellington Ribeiro
 * @version 1.0
 * @since 2016-12-11
 */
//echo 'ok ok';
header('Content-type: text/html; charset=UTF-8');
include_once '../Classes/dbconfig.php';
$db = $DB_con;
if( isset( $_REQUEST['query'] ) && $_REQUEST['query'] != "" ){

    $att = $db->prepare('SELECT idProprietario, ProprietarioNome, ProprietarioCpf FROM Proprietario WHERE LOCATE(?,ProprietarioNome) > 0 ORDER BY ProprietarioNome LIMIT 25');
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
?>
