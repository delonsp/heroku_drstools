<?php include_once("header"); ?>
	<div id="contact" class="contact_page">
        <div class="container">
        	<div class="row form">
             	<div class="span6">
                <form class="form-horizontal" method="post" action="index.php">
                	   	<div class="control-group">
                            <label for="login" class="control-label">Login:</label>
                            <div class="controls">
                                <input type="text" class="span4" name="login" id="login" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="pass" class="control-label">Senha:</label>
                            <div class="controls">
                                <input type="password" class="span4" name="pass" id="pass"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" value="entrar" class='btn btn-info btn-large'/>
                            </div>
                        </div>
                        
                    </form>
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

