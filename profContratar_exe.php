<!DOCTYPE html>
<!--
Oficina Desenvolvimento Web
PUCPR
Profa. Cristina V. P. B. Souza
01/11/2018
-->
<html>
	<head>

	  <title>IE - Instituição de Ensino</title>
	  <link rel="icon" type="image/png" href="imagens/IE_favicon.png" />
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <style>
		.w3-theme {color:#ffff !important;background-color:#380077 !important}
		.w3-code{border-left:4px solid #380077}
		.myMenu {margin-bottom:150px}
      </style>
	</head>
<body onload="w3_show_nav('menuProf')">
<!-- Inclui MENU.PHP  -->
<?php require 'menu.php';?>

<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

<div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
  <h1 class="w3-xxlarge">Registro de Professor</h1>

  <p class="w3-large">
  <div class="w3-code cssHigh notranslate">
  <!-- Acesso em:-->
	<?php

	date_default_timezone_set("America/Sao_Paulo");
	$data = date("d/m/Y H:i:s",time());
	echo "<p class='w3-small' > ";
	echo "Acesso em: ";
	echo $data;
	echo "</p> "
	?>

	<!-- Acesso ao BD-->
	<?php
		
		$servername = "localhost:3306";
		$username = "usu@IE_Exe";
		$password = "php@PUCPR";
		$database = "teste";
		
		
		$nome    = $_POST['Nome'];
		$Numero = $_POST['Numero'];
		$Acomod   = $_POST['Acomod'];
		$dtNasc  = $_POST['DataNasc'];
		$acao    = $_POST['acaoForm'];
		
		if ($dtNasc != ""){
			if (strpos($dtNasc,"-") != false){
				$strData = explode('-',$dtNasc);
			}else {
				$strData = explode('/',$dtNasc);
			}
		
			$ano = $strData[2];
			$mes = $strData[1];
			$dia = $strData[0];

			$nova_data = $ano.'-'.$mes.'-'.$dia;
		}
		else
			$nova_data = "";
		
		// Cria conexão
		$conn = mysqli_connect($servername, $username, $password, $database);

		// Verifica conexão
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		// Configura para trabalhar com caracteres acentuados do português
		mysqli_query($conn,"SET NAMES 'utf8'");
		mysqli_query($conn,"SET NAMES 'utf8'");
		mysqli_query($conn,'SET character_set_connection=utf8');
		mysqli_query($conn,'SET character_set_client=utf8');
		mysqli_query($conn,'SET character_set_results=utf8');

		// Faz Select na Base de Dados
		$sql = "INSERT INTO saude (Nome, Numero, DataNasc, Acomod) VALUES ('$nome','$Numero','$dtNasc','$Acomod')";
		echo "<div class='w3-responsive w3-card-4'>";
		if ($result = mysqli_query($conn, $sql)) {
			if ($acao == "Contratar")
				echo "Um registro adicionado!";
			else
				echo "Um registro alterado!";
		} else {
			echo "Erro executando INSERT: " . mysqli_error($conn);
		}
        echo "</div>";
		mysqli_close($conn);  //Encerra conexao com o BD

	?>
  </div>
</div>


<footer class="w3-panel w3-padding-32 w3-card-4 w3-light-grey w3-center w3-opacity">
  <p><nav>
      <a class="w3-button w3-theme w3-hover-white" onclick="document.getElementById('id01').style.display='block'" >Sobre</a>
  </nav></p>
</footer>

<!-- FIM PRINCIPAL -->
</div>
<!-- Inclui RODAPE.PHP  -->
<?php require 'rodape.php';?>
</body>
</html>
