<!DOCTYPE html>
<html lang="en" ng-app="getFornecedor">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste Empresa Rdias</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">
      <h2>CRUD Simples </h2>
      <div ng-controller="FornecedorController">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome Fornecedor</th>
              <th>Email Fornecedor</th>
              <th>Contato Fornecedor</th>
              <th>Posicao Fornecedor</th>
              <th>
                <button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add', 0)">Add novo Fornecedor</button>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="f in fornecedores">
              <td>@{{ f.id }}</td>
              <td>@{{ f.fornecedorName }}</td>
              <td>@{{ f.fornecedorEmail }}</td>
              <td>@{{ f.fornecedorContact }}</td>
              <td>@{{ f.fornecedorPosition }}</td>
              <td>
                <button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('edit', f.id)">
                  <span class="glyphicon glyphicon-edit"></span>
                </button>
                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(f.id)">
                  <span class="glyphicon glyphicon-trash"></span>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <!-- show modal  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
              </div>
              <div class="modal-body">
                <form name="frmFornecedor" class="form-horizontal" novalidate="">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Nome Fornecedor</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="fornecedorName" name="fornecedorName" placeholder="Nome" value="@{{fornecedorName}}" ng-model="f.fornecedorName" ng-required="true">
                      <span ng-show="frmFornecedor.fornecedorName.$invalid && frmFornecedor.fornecedorName.$touched">Nome obrigatorio</span>
                    </div>
                  </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Email Fornecedor</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="fornecedorEmail" name="fornecedorEmail" placeholder="Email" value="@{{fornecedorEmail}}" ng-model="f.fornecedorEmail" ng-required="true">
                        <span ng-show="frmFornecedor.fornecedorEmail.$invalid && frmFornecedor.fornecedorEmail.$touched">Email obrigatorio</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Contato Fornecedor</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="fornecedorContact" name="fornecedorContact" placeholder="Contato" value="@{{fornecedorContact}}" ng-model="f.fornecedorContact" ng-required="true">
                        <span ng-show="frmFornecedor.fornecedorContact.$invalid && frmFornecedor.fornecedorContact.$touched">Fornecedor Contato obrigatorio</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Posicao Fornecedor</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="fornecedorPosition" name="fornecedorPosition" placeholder="Fornecedor Position" value="@{{fornecedorPosition}}" ng-model="f.fornecedorPosition" ng-required="true">
                        <span ng-show="frmFornecedor.fornecedorPosition.$invalid && frmFornecedor.fornecedorPosition.$touched">Fornecedor posicao obrigatorio</span>
                      </div>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmFornecedor.$invalid">Salvar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Aangular Material load from CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>

    <!-- Angular Application Scripts Load  -->
    <script src="{{ asset('angular/app.js') }}"></script>
    <script src="{{ asset('angular/controllers/FornecedorController.js') }}"></script>
  </body>
</html>
