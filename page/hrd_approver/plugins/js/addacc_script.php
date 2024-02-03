<script type="text/javascript">
	$(function() {
   search_data();

});


	const save_data =()=>{
		var fname = document.getElementById('fname').value;
		var username = document.getElementById('username').value;
		var role = document.getElementById('role').value;
		var password = document.getElementById('password').value;
		

		if (fname == '') {
		Swal.fire({
		            icon: 'info',
		            title: 'Please Input Fullname !!!',
		            text: 'Information',
		            showConfirmButton: false,
		            timer : 1000
		        });
	}else if(username == ''){
		Swal.fire({
		            icon: 'info',
		            title: 'Please Input Username !!!',
		            text: 'Information',
		            showConfirmButton: false,
		            timer : 1000
		        });
	}else if(password == ''){
		Swal.fire({
		            icon: 'info',
		            title: 'Please Select Password !!!',
		            text: 'Information',
		            showConfirmButton: false,
		            timer : 1000
		        });
	}else if(role == ''){
		Swal.fire({
		            icon: 'info',
		            title: 'Please Select Role !!!',
		            text: 'Information',
		            showConfirmButton: false,
		            timer : 1000
		        });
	}else{
	$.ajax({
		url:'../../process/accounts/add_approver.php',
		type:'POST',
		cache:false,
		data:{
		method:'save_acc',
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
		        $('#addaccA').modal('hide');
		        $('#fname').val('')
		        $('#username').val('');
				$('#password').val('');
				$('#role').val('');
			}else if(response == 'existing'){
				Swal.fire({
		            icon: 'info',
		            title: 'Existing Data !!!',
		            text: 'Information',
		            showConfirmButton: false,
		            timer : 1000
		        });
		        $('#addaccA').modal('hide');
		        $('#fname').val('')
		        $('#username').val('');
				$('#password').val('');
				$('#role').val('');
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

	const search_data =()=>{
	var name = document.getElementById('username_search').value;
	$.ajax({
		url:'../../process/accounts/add_approver.php',
		type:'POST',
		cache:false,
		data:{
		method:'fetch_account',
		name:name
		},success:function(response){
			$('#account_list').html(response);
		}
	});
}


</script>