<?php 
	session_start();
	if(!ISSET($_SESSION['mem_id'])){
		header("location:index.php");
	}
	require_once("inc/header.php");
?>
     <br>
	<div class = "col-md-3"></div>	
    <div class="col-md-6 well">
    <h3 class = "text-primary"></h3>
    <a class = "btn btn-danger" href = "login.php"><span class = "glyphicon glyphicon-log-out"></span> Back</a>
	<a class = "btn btn-danger" href = "logout.php"><span class = "glyphicon glyphicon-log-out"></span> Logout</a>

		<hr style = "border-top:1px dotted #ccc;">
        <form>
        	<div class="form-inline">
        		<label>Firstname</label>
                <input type="text" class="form-control" id="firstname" ng-model="firstname">
				<label>Lastname</label>
                <input type="text" class="form-control" id="lastname" ng-model="lastname">
                <button type="button" class="btn btn-primary form-control" ng-click = "insertData()" ng-show="btnInsert">
                <span class="glyphicon glyphicon-save"></span>Save
                </button>
                <button type = "button" class = "btn btn-warning form-control" ng-show = "btnUpdate" ng-click = "updateData()">
                <span class = "glyphicon glyphicon-edit"></span> Update
                </button>    
            </div>
            <br> <br>
            <div ng-model = "message" ng-show = "msgBox" class = "{{messageStatus}}" >{{message}}</div>
         </form>
         <br>
         <table class="table table-responsive table-bordered alert-warning">
         <thead>
         <tr>
         	<th>First name</th>
            <th>Last name </th>
            <th>Actions </th>
         </tr>
         </thead>
         <tbody>
         <tr ng-show="member!='undefined' && member!='null' && member.length!=0" ng-repeat = "member in members" >
         <td>{{member.firstname}}</td>
         <td>{{member.lastname}}</td>
         <td> <center><button type="button" class="btn btn-danger" ng-click = "updateBtn(member.mem_id, member.firstname, member.lastname)" ><span class="glyphicon glyphicon-edit"></span></button>    <button type="button" class=" btn btn-warning" ng-click = "deleteData(member.mem_id);" ><span class="glyphicon glyphicon-remove"></span></button></center></td>
         
         </tr>
          <tr ng-show="member=='undefined' ||member=='null' || member.length==0"  >
         <td></td>
         <td>No Data Found</td>
         <td> </td>
         
         </tr>
         </tbody>
         </table>
    </div>
   </div>
	</body>
</html>
