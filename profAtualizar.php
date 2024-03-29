<!DOCTYPE html>
<!-------------------------------------------------------------------------------
Oficina Desenvolvimento Web
PUCPR

profAtualizar.php

Profa. Cristina V. P. B. Souza
Novembro/2018
*** Para o correto funcionamento do CSS, o equipamento precisa de internet ***
---------------------------------------------------------------------------------->
<html>
<head>

    <title>IE - Instituição de Ensino</title>
    <link rel="icon" type="image/png" href="imagens/IE_favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .w3-theme {
            color: #ffff !important;
            background-color: #380077 !important
        }

        .w3-code {
            border-left: 4px solid #380077
        }

        .myMenu {
            margin-bottom: 150px
        }
    </style>
</head>
<body  onload="w3_show_nav('menuProf')">

<!-- Inclui MENU.PHP  -->
<?php require 'menu.php'; ?>

<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

    <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
        <h1 class="w3-xxlarge">Atualização Cadastral de Professor</h1>

        <p class="w3-large">
            <div class="w3-code cssHigh notranslate">
                <!-- Acesso em:-->
                <?php

                date_default_timezone_set("America/Sao_Paulo");
                $data = date("d/m/Y H:i:s", time());
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
				$id=$_GET['id'];
				
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
				$sql = "SELECT Cod, Nome, Numero, DataNasc, Acomod FROM saude WHERE Cod = $id";
				
				//Inicio DIV form
				echo "<div class='w3-responsive w3-card-4'>"; 
				if ($result = mysqli_query($conn, $sql)) {
						if (mysqli_num_rows($result) > 0) {
						// Apresenta cada linha da tabela
							while ($row = mysqli_fetch_assoc($result)) {
				?>
								<div class="w3-container w3-theme">
									<h2>Altere os dados do Professor Cód. = [<?php echo $row['Cod']; ?>]</h2>
								</div>
								<form class="w3-container" action="ProfAtualizar_exe.php" method="post" onsubmit="return check(this.form)">
									<p>
									<label class="w3-text-deep-orange"><b>Nome do Beneficiário</b></label>
									<input class="w3-input w3-border w3-sand" name="Nome" type="text" pattern="[a-zA-Z\u00C0-\u00FF ]{10,100}$"
										   title="Nome entre 10 e 100 letras." value="<?php echo $row['Nome']; ?>" required></p>
									<p>
									<label class="w3-text-deep-orange"><b>Número</b></label>
									<input class="w3-input w3-border w3-sand " name="Numero" type="text"
										   pattern="[0-9]{4,6}$" title="12345" value="<?php echo $row['Numero']; ?>" required></p>
									<p>
									<label class="w3-text-deep-orange"><b>Data de Nascimento</b></label>
									<input class="w3-input w3-border w3-sand" name="DataNasc" type="date"
										   pattern="((0[1-9])|([1-2][0-9])|(3[0-1]))\/((0[1-9])|(1[0-2]))\/((19|20)[0-9][0-9])"
										   title="Formato: dd/mm/aaaa." value="<?php echo $row['DataNasc']; ?>"></p>
									<p>
									<label class="w3-text-deep-orange"><b>Acomod</b></label>
									<input class="w3-input w3-border w3-sand" name="Acomod" type="text"
										   pattern="[a-zA-Z]{2,20}" title="Formato: Individual" value="<?php echo $row['Acomod']; ?>" required></p>
									<p>
									<input type="submit" value="Alterar" class="w3-btn w3-red" >
									<input type="button" value="Cancelar" class="w3-btn w3-theme" onclick="window.location.href='profListar.php'"></p>
								</form>
			<?php 
							}
						}
				}
				else {
					echo "Erro executando UPDATE: " . mysqli_error($conn);
				}
				echo "</div>"; //Fim DIV form
				mysqli_close($conn); //Encerra conexao com o BD

			?>

			</div>
		</p>
	</div>


	<footer class="w3-panel w3-padding-32 w3-card-4 w3-light-grey w3-center w3-opacity">
    <p>
        <nav>
            <a class="w3-button w3-theme w3-hover-white"
               onclick="document.getElementById('id01').style.display='block'">Sobre</a>
        </nav>
    </p>
	</footer>

<!-- FIM PRINCIPAL -->
</div>
<!-- Inclui RODAPE.PHP  -->
<?php require 'rodape.php';?>

</body>
</html>
