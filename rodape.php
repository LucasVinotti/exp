<!-------------------------------------------------------------------------------
Oficina Desenvolvimento Web
PUCPR

RODAPE.PHP

Profa. Cristina V. P. B. Souza
Novembro/2018
---------------------------------------------------------------------------------->

    <!-- Sobre -->

    <div id="id01" class="w3-modal w3-animate-opacity">
        <div class="w3-modal-content">
            <header class="w3-container w3-theme">
                <span onclick="document.getElementById('id01').style.display='none'"
                      class="w3-button w3-display-topright">&times;</span>
                <h2>IE Exemplo</h2>
            </header>
            <div class="w3-container">
                <p>Site Exemplo Projeto: <b>Desenvolvimento Web com PHP</b></p>
                <p class="w3-small">Aluno Lucas Medeiros de Freitas Vinotti</p>
                <p class="w3-small">Auxilio de Profa. Cristina Varçosa</p>
            </div>
            <footer class="w3-container w3-theme ">
                <p>PUCPR 2019</p>
            </footer>
        </div>
    </div>


    <script>
        // Script para abrir e fechar o sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

        function w3_show_nav(name) {
            document.getElementById("menuProf").style.display = "none";
            document.getElementById("menuDisc").style.display = "none";
			document.getElementById("menuTurma").style.display = "none";
            document.getElementById(name).style.display = "block";

        }
    </script>

