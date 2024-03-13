<script type="text/javascript">
	$(function() {
		load_accounts();

	});

	//add account
	const save_acc_admin = () => {
		var fname = document.getElementById('fname_admin').value;
		var username = document.getElementById('username_admin').value;
		var role = document.getElementById('role_admin').value;
		var password = document.getElementById('password_admin').value;


		if (fname == '') {
			Swal.fire({
				icon: 'info',
				title: 'Please Input Fullname !!!',
				text: 'Information',
				showConfirmButton: false,
				timer: 1000
			});
		} else if (username == '') {
			Swal.fire({
				icon: 'info',
				title: 'Please Input Username !!!',
				text: 'Information',
				showConfirmButton: false,
				timer: 1000
			});
		} else if (password == '') {
			Swal.fire({
				icon: 'info',
				title: 'Please Select Password !!!',
				text: 'Information',
				showConfirmButton: false,
				timer: 1000
			});
		} else if (role == '') {
			Swal.fire({
				icon: 'info',
				title: 'Please Select Role !!!',
				text: 'Information',
				showConfirmButton: false,
				timer: 1000
			});
		} else {
			$.ajax({
				url: '../../process/accounts/add_admin.php',
				type: 'POST',
				cache: false,
				data: {
					method: 'save_acc_admin',
					fname: fname,
					username: username,
					password: password,
					role: role
				},
				success: function(response) {
					console.log(response);
					if (response == 'success') {
						Swal.fire({
							icon: 'success',
							title: 'Succesfully Recorded !!!',
							text: 'Success',
							showConfirmButton: false,
							timer: 1000
						});
						$('#fname_admin').val('');
						$('#username_admin').val('');
						$('#password_admin').val('');
						load_accounts();
						$('#addadmin').modal('hide');

					} else if (response == 'duplicate') {
						Swal.fire({
							icon: 'info',
							title: 'Username already exists!',
							text: 'Information',
							showConfirmButton: false,
							timer: 2500
						});
						$('#fname_admin').val('');
						$('#username_admin').val('');
						$('#password_admin').val('');
						load_accounts();
						$('#addadmin').modal('hide');

					} else {
						Swal.fire({
							icon: 'error',
							title: 'Error !!!',
							text: 'Error',
							showConfirmButton: false,
							timer: 1000
						});
					}
				}
			});
		}
	}

	// fetch data
	const load_accounts = () => {
		$.ajax({
			url: '../../process/accounts/add_admin.php',
			type: 'POST',
			cache: false,
			data: {
				method: 'fetch_account'
			},
			success: function(response) {
				$('#account_list').html(response);
				$('#spinner').fadeOut();
			}
		});
	}

	// get account details onclick
	const get_account_details = (param) => {
		var string = param.split('~!~');
		var id = string[0];
		var fname = string[1];
		var username = string[2];
		var role = string[3];
		document.getElementById('id_update').value = id;
		document.getElementById('fname_update').value = fname;
		document.getElementById('username_update').value = username;
		document.getElementById('role_update').value = role;

	}

	// update account
	const update_account = () => {
		var id = document.getElementById('id_update').value;
		var fname = document.getElementById('fname_update').value;
		var username = document.getElementById('username_update').value;
		var password = document.getElementById('password_update').value;
		var role = document.getElementById('role_update').value;


		$.ajax({
			url: '../../process/accounts/add_admin.php',
			type: 'POST',
			cache: false,
			data: {
				method: 'update_account',
				id: id,
				fname: fname,
				username: username,
				password: password,
				role: role

			},
			success: function(response) {
				console.log(response);
				if (response == 'success') {
					Swal.fire({
						icon: 'success',
						title: 'Successfully Recorded!',
						text: 'Success',
						showConfirmButton: false,
						timer: 1000
					});
					$('#update_admin').modal('hide');
					load_accounts();
					
					$('#fname').val('')
					$('#username').val('');
					$('#password').val('');
					$('#role').val('');
				} else if (response == 'duplicate') {
					Swal.fire({
						icon: 'info',
						title: 'Username already exists!',
						text: 'Information',
						showConfirmButton: false,
						timer: 2500
					});
					load_accounts();
					$('#update_admin').modal('hide');
					$('#fname').val('')
					$('#username').val('');
					$('#password').val('');
					$('#role').val('');
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Error!',
						text: 'Error',
						showConfirmButton: false,
						timer: 2500
					});
				}
			}
		});
	}

	// delete account
	const delete_account = () => {
		var id = document.getElementById('id_update').value;
		$.ajax({
			url: '../../process/accounts/add_admin.php',
			type: 'POST',
			cache: false,
			data: {
				method: 'delete_account',
				id: id
			},
			success: function(response) {
				if (response == 'success') {
					Swal.fire({
						icon: 'info',
						title: 'Successfully Deleted!',
						text: 'Information',
						showConfirmButton: false,
						timer: 1000
					});
					load_accounts();
					$('#update_admin').modal('hide');
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Error !!!',
						text: 'Error',
						showConfirmButton: false,
						timer: 2500
					});
				}
			}
		});
	}

	// search account
	const search_account = () => {
		var username_search = document.getElementById('username_search').value;


		if ((username_search != '' || username_search == '')) {
			$.ajax({
				url: '../../process/accounts/add_admin.php',
				type: 'POST',
				cache: false,
				data: {
					method: 'search_account_list',
					username_search: username_search
				},
				success: function(response) {
					$('#account_list').html(response);
					$('#spinner').fadeOut();
				}
			});
		} else {
			Swal.fire({
				icon: 'info',
				title: 'Empty Fields',
				text: 'Fill-out input search field/s',
				showConfirmButton: false,
				timer: 1000
			});
		}
	}
</script>