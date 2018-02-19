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
	    $('#nomeItem').simpleAutoComplete('js/ajax_query_single.php',{
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

  </head>
  <body>
		<?php 
			include_once("Classes/Conexao.class.php");

						
						
					
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
				
	</form>
	</body>
</html>
