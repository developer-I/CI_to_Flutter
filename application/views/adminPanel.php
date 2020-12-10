<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        
        .header {
          overflow: hidden;
          background-color: #f1f1f1;
          padding: 20px 10px;
        }
        
        .header a {
          float: left;
          color: black;
          text-align: center;
          padding: 12px;
          text-decoration: none;
          font-size: 18px; 
          line-height: 25px;
          border-radius: 4px;
        }
        
        .header a.logo {
          font-size: 25px;
          font-weight: bold;
        }
        
        .header a:hover {
          background-color: #ddd;
          color: black;
        }
        
        .header a.active {
          background-color: dodgerblue;
          color: white;
        }
        
        .header-right {
          float: right;
        }
        
        @media screen and (max-width: 500px) {
          .header a {
            float: none;
            display: block;
            text-align: left;
          }
          
          .header-right {
            float: none;
          }

          
        }
        </style>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    </head>
    <body >
        <div class="header">
            <a href="#default" class="logo">Attendance System</a>
            <div class="header-right">
                <a  href="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/reports">Report</a>
                  
              <a  href="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/profile"> Profile </a>
              <a href="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/attendance">Attendance</a>
              <a href="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/unset_session_data">Logout</a>
             

            </div>
          </div>
           
          <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>SL NO</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>EMAIL</th>
						            <th>PHONE</th>
                        <th>Designation</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				// $result = mysqli_query($conn,"SELECT * FROM crud");
					$i=1;
					foreach($data as $row) {
				?>
				<tr id="<?php echo $row->id; ?>">
				<td>
							<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row->id; ?>">
								<label for="checkbox2"></label>
							</span>
						</td>
					<td><?php echo $i; ?></td>
					<td><?php echo $row->firstname; ?></td>
          <td><?php echo $row->lastname; ?></td>
					<td><?php echo $row->email; ?></td>
					<td><?php echo $row->phone; ?></td>
					<td><?php echo $row->designation; ?></td>
					<td>
						<a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row->id; ?>"
							data-firstname="<?php echo $row->firstname; ?>"
              data-lastname="<?php echo $row->lastname; ?>"
							data-email="<?php echo $row->email; ?>"
							data-phone="<?php echo $row->phone; ?>"
							data-designation="<?php echo $row->designation; ?>"
							title="Edit"></i>
						</a>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row->id; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						 title="Delete"></i></a>
                    </td>
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Edit User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
						<div class="form-group">
							<label>First Name</label>
							<input type="text" id="fname_u" name="firstname" class="form-control" required>
						</div>
            <div class="form-group">
							<label>Last Name</label>
							<input type="text" id="lname_u" name="lastname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email_u" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>PHONE</label>
							<input type="phone" id="phone_u" name="phone" class="form-control" required>
						</div>
						<div class="form-group">
							<label>designation</label>
							<input type="designation" id="designation_u" name="designation" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info"  id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Delete User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>

  <Script>
  $(document).on('click','.update',function(e) {
    var id=$(this).attr("data-id");
    var firstname=$(this).attr("data-firstname");
    var lastname=$(this).attr("data-lastname");
    var email=$(this).attr("data-email");
    var phone=$(this).attr("data-phone");
    var designation=$(this).attr("data-designation");
    $('#id_u').val(id);
    $('#fname_u').val(firstname);
    $('#lname_u').val(lastname);
    $('#email_u').val(email);
    $('#phone_u').val(phone);
    $('#designation_u').val(designation);
});

$(document).on('click','#update',function(e) {
    var data = $("#update_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "http://192.168.0.200/Vipin/AdminUser/index.php/Connector/update",
        success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    $('#editEmployeeModal').modal('hide');
                    alert('Data updated successfully !'); 
                    location.reload();						
                }
                else if(dataResult.statusCode==201){
                   alert(dataResult);
                }
        }
    });
});
$(document).on("click", ".delete", function() { 
    var id=$(this).attr("data-id");
    $('#id_d').val(id);
    
});
$(document).on("click", "#delete", function() { 
    $.ajax({
        url: "http://192.168.0.200/Vipin/AdminUser/index.php/Connector/delete",
        type: "POST",
        cache: false,
        data:{
            type:3,
            id: $("#id_d").val()
        },
        success: function(dataResult){
                $('#deleteEmployeeModal').modal('hide');
                $("#"+dataResult).remove();
        
        }
    });
});
$(document).on("click", "#delete_multiple", function() {
    var user = [];
    $(".user_checkbox:checked").each(function() {
        user.push($(this).data('user-id'));
    });
    if(user.length <=0) {
        alert("Please select records."); 
    } 
    else { 
        WRN_PROFILE_DELETE = "Are you sure you want to delete "+(user.length>1?"these":"this")+" row?";
        var checked = confirm(WRN_PROFILE_DELETE);
        if(checked == true) {
            var selected_values = user.join(",");
            console.log(selected_values);
            $.ajax({
                type: "POST",
                url: "http://192.168.0.200/Vipin/AdminUser/index.php/Connector/delete",
                cache:false,
                data:{
                    type: 4,						
                    id : selected_values
                },
                success: function(response) {
                    var ids = response.split(",");
                    for (var i=0; i < ids.length; i++ ) {	
                        $("#"+ids[i]).remove(); 
                    }	
                } 
            }); 
        }  
    } 
});
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
        if(this.checked){
            checkbox.each(function(){
                this.checked = true;                        
            });
        } else{
            checkbox.each(function(){
                this.checked = false;                        
            });
        } 
    });
    checkbox.click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });
});

  </Script>
    </body>
</html>