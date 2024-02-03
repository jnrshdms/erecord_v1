<script type="text/javascript">
	

const account_details =(param)=>{
	var data = param.split('~!~');
	var id = data[0];
    var fname = data[1];
    var username = data[2];
    var password = data[3];
     var role = data[4];


    document.getElementById('id_update').value = id;
    document.getElementById('fname_update').value = fname;
    document.getElementById('username_update').value = username;
    document.getElementById('password_update').value = password;
    document.getElementById('role_update').value = role;

}
const delete_data =()=>{
	var id = document.getElementById('id_update').value;
	$.ajax({
		url:'../../process/accounts/edit.php',
		type:'POST',

		cache:false,
		data:{
		method:'delete_account',
		id:id
		},success:function(response){
			if (response == 'success') {
				Swal.fire({
		            icon: 'info',
		            title: 'Succesfully Deleted !!!',
		            text: 'Information',
		            showConfirmButton: false,
		            timer : 1000
		        });
		        search_data();
		         $('#upacc').modal('hide');
			}else{
				Swal.fire({
		            icon: 'error',
		            title: 'Error !!!',
		            text: 'Error',
		            showConfirmButton: false,
		            timer : 1000
		        });
			}
		}
	});
}

const update_data =()=>{
	var id = document.getElementById('id_update').value;
	var fname = document.getElementById('fname_update').value;
	var username = document.getElementById('username_update').value;
	var role = document.getElementById('role_update').value;
	var password = document.getElementById('password_update').value;
	// console.log(id)
	// console.log(fname)
	// console.log(username)
	// console.log(password)
	if (fname == '') {
		Swal.fire({
		            icon: 'info',
		            title: 'Please Input Fullname !!!',
		            text: 'Information',
		            showConfirmButton: false,
		            timer : 1000
		        });
	}else if(username == '') {
		Swal.fire({
		            icon: 'info',
		            title: 'Please Input Username !!!',
		            text: 'Information',
		            showConfirmButton: false,
		            timer : 1000
		        });
	}else if(role == ''){
		Swal.fire({
		            icon: 'info',
		            title: 'Please Input Role !!!',
		            text: 'Information',
		            showConfirmButton: false,
		            timer : 1000
		        });
	}else if(password == ''){
		Swal.fire({
		            icon: 'info',
		            title: 'Please Input Password !!!',
		            text: 'Information',
		            showConfirmButton: false,
		            timer : 1000
		        });
	}else{
	$.ajax({
		url:'../../process/accounts/edit.php',
		type:'POST',
		cache:false,
		data:{
		method:'update_acc',
		id:id,
		fname:fname,
		username:username,
		password:password,
		role:role
		},success:function(response){
			console.log(response);
			if (response == 'success') {
				Swal.fire({
		            icon: 'success',
		            title: 'Succesfully Recorded !!!',
		            text: 'Success',
		            showConfirmButton: false,
		            timer : 1000
		        });
		        search_data();
		        $('#upacc').modal('hide');
			}else if(response == 'existing'){
				Swal.fire({
		            icon: 'info',
		            title: 'Existing Data !!!',
		            text: 'Information',
		            showConfirmButton: false,
		            timer : 1000
		        });
		        $('#upacc').modal('hide');
			}else{
				Swal.fire({
		            icon: 'error',
		            title: 'Error !!!',
		            text: 'Error',
		            showConfirmButton: false,
		            timer : 1000
		        });
			}
		}
	});
	}
}
</script>