// JavaScript Document
var app = angular.module("myModule", []);
				app.controller("myController", function($scope, $http, $timeout){
 
					$http.get('inc/db_select.php').then(function(response){
						$scope.members = response.data;
					});
 
					$scope.insertData = function(){
						$http.post("inc/db_insert.php", {firstname: $scope.firstname, lastname: $scope.lastname})
						.then(function(){
							$scope.message = "Successfully Submit!";
							$scope.msgBox = true;
							$scope.firstname = "";
							$scope.lastname = "";
							$scope.messageStatus = "alert alert-success";
							$timeout(function(){
								$scope.msgBox = false;
							}, 2000);
							$scope.selectData();
						});	
					}
 
					$scope.selectData = function(){
						$http.get('inc/db_select.php').then(function(response){
							$scope.members = response.data;
						});
					}
					
					$scope.btnInsert = true;
 
					$scope.updateData = function(mem_id){
						$scope.btnUpdate = false;
						$scope.btnInsert = true;
						$http.post("inc/db_update.php", {mem_id: $scope.mem_id, firstname: $scope.firstname, lastname: $scope.lastname})
						.then(function(response){	
							$scope.firstname = "";
							$scope.lastname = "";
							$scope.message = "Successfully Updated";
							$scope.messageStatus = "alert alert-success";
							$scope.msgBox = true;
							$timeout(function(){
								$scope.msgBox = false;
							}, 1000);
							$scope.selectData();
						});
					}
 
					$scope.updateBtn = function(mem_id, firstname, lastname){
						$scope.btnInsert = false;
						$scope.btnUpdate = true;
						$scope.firstname = firstname;
						$scope.lastname = lastname;
						$scope.mem_id = mem_id;
					}
					
					
					$scope.deleteData = function(mem_id){
						$scope.btnUpdate = false;
						$scope.btnInsert = true;
						$http.post("inc/db_delete.php", {mem_id: mem_id})
						.then(function(response){	
							$scope.message = "Successfully Deleted";
							$scope.messageStatus = "alert alert-success";
							$scope.msgBox = true;
							$timeout(function(){
								$scope.msgBox = false;
							}, 1000);
							$scope.selectData();
						});
					}
 					
					$scope.members = {}
									$scope.submitForm = function(){
									
										var request = $http({
											method : "POST",
											url : "inc/db_register.php",
											data :  {
												'username': $scope.members.username,
												'password': $scope.members.password,
												'firstname': $scope.members.firstname,
												'lastname': $scope.members.lastname
												},
											headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
										})
										request.then(function(response){
											$scope.members.username = "";
											$scope.members.password = "";
											$scope.members.firstname = "";
											$scope.members.lastname = "";
											$scope.message = "Successfully Register A Member! Go back and Login!";
											$scope.showMessage = true;
											$timeout(function(){
												$timeout(function(){
													$scope.showMessage = false;
												}, 3000);
											}, 2000);
										});
									};	
									
							$scope.loginForm = function(){
										$scope.result = "";
										var request = $http({
											method: "POST",
											url: "inc/db_login.php",
											data: {
												username : $scope.username,
												password: $scope.password
											},
											headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
										});
										request.then(function(response){
											console.log(response);
											if(response.data == "true"){
												$scope.username = "";
												$scope.password = "";
												window.location = "login.php";
											}else{
												$scope.result = "Invalid username or Password";
											}
										});
									};
						
				});
				
				
		    