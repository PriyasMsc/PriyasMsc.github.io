<?php 
require_once("inc/header.php");
?>
     <br>
	
		<div class = "col-md-4"></div>
		<div class = "col-md-4 well">
			<form ng-submit = "loginForm()">
			<h3 class  = "text-primary">Login</h3>
			<hr style = "border-top:1px dotted #000;"/>
			<h3>Member Login</h3><a href =  "register.php" class = "pull-right">Sign up</a>
			<br />
			<div class = "form-group">
				<label>Username</label>
				<input type = "text" class = "form-control" ng-model = "username" ng-required = "true"/>
			</div>
			<div class = "form-group">
				<label>Password</label>
				<input type = "password" class = "form-control" ng-model = "password" ng-required = "true"/>
			</div>
			<center><div class = "text-danger" ng-model = "result">{{result}}</div></center>
			<br />
			<div class = "form-group">
				<button class = "btn btn-primary form-control"><span class = "glyphicon glyphicon-log-in"></span> Login</button>
			</div>
			</form>
		</div>
       </div> 
        
    </body>
</html>
