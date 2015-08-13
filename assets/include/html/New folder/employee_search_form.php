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
      <h3>Search
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

            </tr>
            <tr>
              <td><a href="#" data-toggle="modal" data-target="#view">Mr.been</a></td>
              <td>ICT</td>
              <td>0999999999</td>

          </table>
        </div>
      </div>
    </div>
  </form>
</div>

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
