// The controller is a regular JavaScript function. It is called
// once when AngularJS runs into the ng-controller declaration.
var app = angular.module('myApp', []);
app.controller('InlineEditorController', InlineEditorController);
app.controller('ViewChangeController',ViewChangeController);
app.controller('CRUDController',CRUDController);
app.controller('UploadController',UploadController);
// inline editor tooltip
function InlineEditorController($scope){
	// $scope is a special object that makes
	// its properties available to the view as
	// variables. Here we set some default values:

	$scope.showtooltip = false;
	$scope.value = 'Edit me.';

	// Some helper functions that will be
	// available in the angular declarations

	$scope.hideTooltip = function(){

		// When a model is changed, the view will be automatically
		// updated by by AngularJS. In this case it will hide the tooltip.

		$scope.showtooltip = false;
	}

	$scope.toggleTooltip = function(e){
		e.stopPropagation();
		$scope.showtooltip = !$scope.showtooltip;
	}
}
// include external file
function ViewChangeController($scope){
							   var members = [
									{name: "Sample1", age: "20", email: "sample1@test.com"},
									{name: "Sample2", age: "18", email: "sample2@test.com"},
									{name: "Sample3", age: "47", email: "sample3@test.com"}
							   ];
								$scope.members = members;
								$scope.memberView = "member_table.html";
							   }

// Static crud							   
function CRUDController($scope){
  $scope.companies = [
          {
            'name':'Infosys Technologies',
            'employees': 125000,
            'headoffice': 'Bangalore'}
          ,
          {
            'name':'Cognizant Technologies',
            'employees': 100000,
            'headoffice': 'Bangalore'}
          ,
          {
            'name':'Wipro',
            'employees': 115000,
            'headoffice': 'Bangalore'}
          ,
          {
            'name':'Tata Consultancy Services (TCS)',
            'employees': 150000,
            'headoffice': 'Bangalore'}
          ,
          {
            'name':'HCL Technologies',
            'employees': 90000,
            'headoffice': 'Noida'}
          ,
        ];
        $scope.addRow = function(){
          $scope.companies.push({
            'name':$scope.name, 'employees': $scope.employees, 'headoffice':$scope.headoffice }
                               );
          $scope.name='';
          $scope.employees='';
          $scope.headoffice='';
        };
        $scope.removeRow = function(name){
          var index = -1;
          var comArr = eval( $scope.companies );
          for( var i = 0; i < comArr.length; i++ ) {
            if( comArr[i].name === name ) {
              index = i;
              break;
            }
          }
          if( index === -1 ) {
            alert( "Something gone wrong" );
          }
          $scope.companies.splice( index, 1 );
        };
      }

//image upload
function UploadController($scope,$http){
       
		  $scope.form = [];
	      $scope.files = [];
 
	      $scope.submit = function() {
		   
	      	$scope.form.image = $scope.files[0];
 
	      	$http({
			  method  : 'POST',
			  url     : 'upload.php',
			  processData: false,
			  transformRequest: function (data) {
			      var formData = new FormData();
			      formData.append("image", $scope.form.image);  
			      return formData;  
			  }, 
			  data : $scope.form,
			  headers: {
			         'Content-Type': undefined
			  }
		   }).then(function(data){
				alert("Successfully Upload An Image!");
				window.location = "result.php";
		   });
 
	      };
 
	      $scope.uploadedFile = function(element) {
		    $scope.currentFile = element.files[0];
		    var reader = new FileReader();
		    reader.onload = function(event) {
		      $scope.image_source = event.target.result
		      $scope.$apply(function($scope) {
		        $scope.files = element.files;
		      });
		    }
                    reader.readAsDataURL(element.files[0]);
		  }

}	  