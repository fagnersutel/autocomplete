<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>simpleAutoComplete JQuery Plugin</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Language" content="pt-BR en">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/simpleAutoComplete.js"></script>
    <link rel="stylesheet" type="text/css" href="css/simpleAutoComplete.css" />
	<style>
		legend {
		  padding: 0.6em 1.5em;
		  border:1px solid #2696B8;
		  color:#2696B8;
		  font-size:100%;
		  text-align:left;
		  background-color: #FFF;

		}

		fieldset {
		  background-color: #FFF;
		  background: url("images/htmlbg.jpg") repeat scroll 0 0 transparent;
		  border: 1px solid #2696B8;
		  width: 950px;
		  text-decoration:none;
		  font-size:100%;
		  color: black;
		}
	</style>
	<!-- ************************ -->
	<script type="text/javascript">
	$(document).ready(function()
	{
	    $('#nomeItem').simpleAutoComplete('js/ajax_query_single_pdo.php',{
		autoComplClassName: 'autocomplete',
		selectedClassName: 'sel',
		attrCall: 'rel',
		atrCalifier: 'sinal'
	    },sinalCallback);
        });
	
	function sinalCallback( par )
	{
	    $("#complementoItem").val( par[0] );
	    $("#complementoItem2").val( par[1] );
		}
    </script>
	<!-- ************** -->
    <script type="text/javascript">
	$(document).ready(function()
	{
	    $('#id2').simpleAutoComplete('js/ajax_query_dual_pdo.php',{
		autoCompleteClassName: 'autocomplete',
		selectedClassName: 'sel',
		attrCallBack: 'rel',
		identifier: 'imputUm'
	    },estadoCallback);

	    $('#id5').simpleAutoComplete('js/ajax_query_dual_pdo.php',{
		autoCompleteClassName: 'autocomplete',
		selectedClassName: 'sel',
		identifier: 'imputDois',
		extraParamFromInput: '#id3'
	    },cidadeCallback);
        });
	
	function estadoCallback( par )
	{
	    $("#id3").val( par[0] );//chave primeria que serve de parametro extra para localizar registros dependentes deste
	    $("#id1").val( par[1] );//parametro que irá preencher o autocomplete sob foco
	    $("#id5").removeAttr("disabled");//habilita o imput dependente para receber foco e selecionar o item por meio de autocomplete
	    $("#id4, #id5, #id6").val("");//linpa todos valuer do autocomplete dependente para que este receba parametros após selecionado o item desejado pelo autocomplete
	}

	function cidadeCallback( par )
	{
	    $("#id6").val( par[0] );
	    $("#id4").val( par[1] );
	}
	
    </script>
  </head>
  <body>
		<?php 
			?>
	<!--<form name="Logradouros" action="testaEnvio.php" method="POST">-->
	<form name="Logradouros" action="inventario-p.php" method="POST">
		<fieldset>
			<legend>Um </legend>
				</p></br>
					<div style="margin-left:10px;">
						<label>A<input type="text" id="nomeItem" name="nomeItem16" value="" autocomplete="off" style="width: 250px; height: 20px;" /></label> <!-- nomeItem16 -->
						<label>B<input type="text" name="complementoItem2" id="complementoItem2" value="" style="width: 150px; height: 20px;" disable: disabled /></label>
                                                <label>C<input type="text" name="complementoItem"  id="complementoItem" value="" style="width: 150px; height: 20px;" disable: disabled /></label></p></br><!-- DISABLED -->
			
					</div>
				</p></br>
		</fieldset>
		<fieldset>
			<legend>Dois</legend>
				</p></br>
					<div style="margin-left:10px;">
						<label>A<input type="text" name="id1" id="id1" value="..." style="width: 30px; height: 20px;" disabled />
                                                <input type="text" id="id2" name="imputUm" value="" autocomplete="off" style="width: 250px; height: 20px;" /></label>
						<input type="text" id="id3" name="id3"  value="" disable: disabled/><!-- type="hidden" -->
					</div>
				<br>
						<label>B<input type="text" name="id4" id="id4" value="" style="width: 30px; height: 20px;" disabled />
                                                    <input type="text" id="id5" name="imputDois" value="" autocomplete="off" disabled style="width: 250px; height: 20px;" /></label>
						<!--<input type="text" name="id4" value="<?php echo $h;?>" id="id4"  /> -->
						<input type="text" name="id6" id="id6" value="" disable: disabled />
		</fieldset>
	</form>
	</body>
</html>