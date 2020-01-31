<?php 
require_once("inc/header.php");
?>
     <br>
	
		<div class = "col-md-3"></div>
		<div class = "col-md-6 well">
			<h3 class  = "text-primary">Sign Up</h3>
			<hr style = "border-top:1px dotted #000;"/>
			<h3></h3><a href =  "index.php" class = "pull-right">Sign in</a>
			<br />
			<div ng-model="message" ng-show="showMessage" class="alert alert-info">{{message}}</div>
			<form ng-submit = "submitForm()">
				<div class = "form-group">
					<label>Username</label>
					<input type = "text" maxlength= "25" class = "form-control" ng-model = "members.username" ng-required = "true"/>
				</div>
				<div class ="form-group">
					<label>Password</label>
					<input type = "password" maxlength = "12" class = "form-control" ng-model = "members.password" ng-required = "true" />
				</div>
				<div class = "form-group">
					<label>Firstname</label>
					<input type  = "text" maxlength = "30" class = "form-control" ng-model = "members.firstname" ng-required = "true"/>
				</div>
				<div class = "form-group">
					<label>Lastname</label>
					<input type = "text" maxlength = "30" class = "form-control" ng-model = "members.lastname" ng-required = "true"/>
				</div>
				<div class = "form-group">
					<button class = "btn btn-primary form-control"><span class = "glyphicon glyphicon-save"></span> Submit</button>
				</div>
			</form>
		</div>
	</div>
        
    </body>
</html>
