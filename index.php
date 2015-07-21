<?php
include_once("connectMedic.php");
include("ChecaSessao.php");  

if(isset($_SESSION['logged_in'])) { 

    $pageTitle="menu";

    function customPageHeader() { ?>

    <?php }
    
    include_once("header.php");

?>
  
<!-- empresa -->
    <div id="myLinks">


        <div class="container">
            <!-- header -->
            <h2 class="section_header">
                
            </h2>

            <!-- princípios -->
            <div class="row">
                <div class="span12">
                
                <a href="medicamentos.php" class="linksDRS" target="_blank">Medicamentos</a>
                
                </div>
            </div>
            <div class="row">
                <div class="span12">
                
                <a href="medicamentos.php?man=1" class="linksDRS" target="_blank">Medicamentos Manipulados</a>
                
                </div>
            </div>
            <div class="row">
                <div class="span12">
               
                <a href="SADT.php" class="linksDRS" target="_blank">Guias de exames SADT</a>
                
                </div>
            </div>
            <div class="row">
                <div class="span12">
                
                <a href="atestado.php" class="linksDRS" target="_blank">Atestados</a>
                </div>
            </div>
         </div>
    </div>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/theme.js"></script>
<script src="js/drs.js"></script>
<script src="js/bootstrap-collapse.js"></script>
</body>

</html>
<?php } // fecha o if do session
else {
    header("Location:login.php");
}?>
