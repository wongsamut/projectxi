<!DOCTYPE html>
<html>
<head>
<title>TODO supply a title</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<link href="assets/css/table-override.less " rel="stylesheet/less"/>
<link href="assets/css/general.css" rel="stylesheet"/>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h3>Manage
        <hr/>
      </h3>
    </div>
  </div>
  <!-----------เริ่ม----------------------------------------------management----------------------------------------------->
  <form>
    <div class="form form-group row">
      <div class="col-md-4">
        <label>Select Name</label>
      </div>
      <div class="col-md-8">
        <input class="form-control" type="text"/>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div id="pnlTableWrapper">
          <table class= "table table-hover">
            <tr>
              <th>Employee Name</th>
              <th>Department</th>
              <th>Telephone</th>
              <th></th>
            </tr>
            <tr>
              <td><a href="#" data-toggle="modal" data-target="#view">Mr.been</a></td>
              <td>ICT</td>
              <td>0999999999</td>
              <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#pnlEdit"><span class="glyphicon glyphicon-pencil"></span></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#de"><span class="glyphicon glyphicon-fire"></span></button></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </form>
</div>
<!--------------Edit----------------------------------------------------------------------------------------------->
<div id ="pnlEdit" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Edit</h3>
      </div>
      <div class="modal-body"> 
        <!----------------------------------------------------------------------------------------------->
        <form>
          <div class="form-group row">
            <div class="col-md-4">
              <label>First name</label>
            </div>
            <div class="col-md-8">
              <input class = "form-control" type="text"/>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <label>Last name</label>
            </div>
            <div class="col-md-8">
              <input class = "form-control" = type="text"/>
            </div>
          </div>
          <div class="form-group row">
          <div class="col-md-4">
            <label>Gender</label>
          </div>
          <div class="col-md-8">
          <label>
          <input name="A" type="radio" checked>
          Male
          <label>
          <input name="A" type="radio">
          Female
          </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <label>Age</label>
            </div>
            <div class="col-md-8">
              <input class = "form-control" = type="text"/>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <label>Department</label>
            </div>
            <div class="col-md-8">
              <select>
                <option value="">A</option>
                <option value="">B</option>
                <option value="">C</option>
                <option value="">D</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <label>E-mail</label>
            </div>
            <div class="col-md-8">
              <input class = "form-control" = type="text"/>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <label>Tel.</label>
            </div>
            <div class="col-md-8">
              <input class = "form-control" = type="text"/>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <label>Photo.</label>
            </div>
            <div class="col-md-8">
              <input class = "form-control" = type="file"/>
            </div>
          </div>
        </form>
        <!-------------------------------------------------------------------------------------------> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!-------------End-Edit------------------------------------------------------------------> 
<!-----------Delete--------------------------------------------------------------------------->
<div id="de" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Delete Profile</h3>
      </div>
      <div class="modal-body">
        <p> Do you want to delete this employee profile ? </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
<!----------end-Delete---------------------------------------------------------------------------> 
<!----------profile-------------------------------------------------------------------------------------->
<div id="view" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Employee Profile</h3>
      </div>
      <div class="modal-body"> 
        <!-------------------------------------------------->
        <div class="row">
          <div class="col-md-3"><img class="thumbnail" src="../download.jpg" title=""/></div>
          <div class="col-md-9">
            <div class="col-md-3">
              <label>Full Name</label>
            </div>
            <div class="col-md-9">
              <label>Mr.Been</label>
            </div>
            <div class="col-md-3">
              <label>Gender</label>
            </div>
            <div class="col-md-9">
              <label>Male</label>
            </div>
            <div class="col-md-3">
              <label>Age</label>
            </div>
            <div class="col-md-9">
              <label>21</label>
            </div>
            <div class="col-md-3">
              <label>Department</label>
            </div>
            <div class="col-md-9">
              <label>ICT</label>
            </div>
            <div class="col-md-3">
              <label>Email</label>
            </div>
            <div class="col-md-9">
              <label>ya_ooo@hotmail.com</label>
            </div>
            <div class="col-md-3">
              <label>Tel.</label>
            </div>
            <div class="col-md-9">
              <label>0999999999</label>
            </div>
          </div>
        </div>
        <!--------------------------------------------------> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!---------------end--profile-----------------------------------------------------------------------------------> 

<script src="assets/js/jquery-1.11.0.min.js"></script> 
<script src="assets/js/less-1.7.4.min.js"></script> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
