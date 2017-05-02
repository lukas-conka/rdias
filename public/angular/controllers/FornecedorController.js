app.controller('FornecedorController', function($scope, $http, API_URL) {
  // retrieve Supplier listing from API
  $http.get(API_URL + "fornecedor")
  .success(function(response){
    $scope.fornecedores = response;
  });

  // show modal Form
  $scope.toggle = function(modalstate, id) {
      $scope.modalstate = modalstate;
      switch(modalstate) {
        case 'add':
          $scope.form_title = "Add novo fornecedor";
          break;
        case 'edit':
          $scope.form_title = "fornecedor Detalhes";
          $scope.id = id;
          $http.get(API_URL + 'fornecedor/' + id).success(function(response){
            console.log(response);
            $scope.f = response;
          });
          break;
        default:
          break;
      }
      console.log(id);
      $('#myModal').modal('show');
  }

  // save new supplier and update existing supplier
  $scope.save = function(modalstate, id) {
    var url = API_URL + "fornecedor";
    if (modalstate === 'edit') {
      url += "/" + id;
    }
    $http({
      method: 'POST',
      url: url,
      data: $.param($scope.f),
      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).success(function(response){
      console.log(response);
      location.reload();
    }).error(function(response){
      console.log(response);
      alert('This is embarassing. An error has occured. Please check the log for details');
    });
  }

 // delete supplier record
 $scope.confirmDelete = function(id) {
   var isConfirmDelete = confirm('Are you sure you want this record?');
   if (isConfirmDelete) {
     $http({
       method: 'DELETE',
       url: API_URL + 'fornecedor/' + id
     }).success(function(data){
       console.log(data);
       location.reload();
     }).error(function(data){
       console.log(data);
       alert('Unable to delete');
     });
   } else {
     return false;
   }
 }
});