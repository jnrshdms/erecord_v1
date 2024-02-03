<script type="text/javascript">

$(document).ready(function() {

      $("#category_add").change(function() {
        var category = document.getElementById("category_add").value;
        $.ajax({
          url:'../../process/import_export/add_emp_pro.php',
          type:'POST',
          cache:false,
          data:{
            method:'fetch_pro',
            category:category
          },success:function(response){
            $('#pro_add').html(response);
          }
        });
        });
});

document.getElementById("emp_id_add").addEventListener("keyup", e => {
  if (e.which === 13) {
    e.preventDefault();
    get_auth_no_by_emp_no();
  } else {
    document.getElementById("auth_no_add").value = '';
  }
});

const get_auth_no_by_emp_no = () => {
	var category  = document.getElementById('category_add').value;
	var pro  = document.getElementById('pro_add').value;
	var emp_id = document.getElementById('emp_id_add').value;

	if (pro == 'Please select a process.....') {
    pro = '';
  }
   if (category == 'Category') {
    category = '';
  }

  $.ajax({
    url:'../../process/import_export/add_emp_pro.php',
    type:'POST',
    cache:false,
    data:{
        method:'get_auth_no_by_emp_no',
        pro:pro,
				emp_id:emp_id,
				category:category
        },success:function(response){
        	try {
	          let response_array = JSON.parse(response);
	          if (response_array.message == 'success') {
	          	document.getElementById('auth_no_add').value = response_array.auth_no;
	          } else if (response_array.message == 'Not Found') {
	          	Swal.fire({
		            icon: 'error',
		            title: 'Auth No. Not Found / Registered',
		            text: 'Error',
		            showConfirmButton: false,
		            timer : 1000
			        });
	          }else if (response_array.message == 'Process Not Set') {
	          	Swal.fire({
		            icon: 'error',
		            title: 'Process Not Set',
		            text: 'Error',
		            showConfirmButton: false,
		            timer : 1000
			        });
	          }else if (response_array.message == 'Category Not Set') {
	          	Swal.fire({
		            icon: 'error',
		            title: 'Category Not Set',
		            text: 'Error',
		            showConfirmButton: false,
		            timer : 1000
			        });
	          }else {
	          	console.log(response);
	          }
        	} catch(e) {
	          console.log(response);
	        }
        }
    });
}

	const save_emp_pro =()=>{
	var category  = document.getElementById('category_add').value;
	var pro  = document.getElementById('pro_add').value;
	var auth_no = document.getElementById('auth_no_add').value;
	var emp_id = document.getElementById('emp_id_add').value;
	var auth_year = document.getElementById('auth_year_add').value;
	var date_authorized = document.getElementById('date_authorized_add').value;
	var expire_date = document.getElementById('expire_date_add').value;
	var remarks = document.getElementById('remarks_add').value;
	var r_of_cancellation = document.getElementById('r_of_cancellation_add').value;
	var d_of_cancellation = document.getElementById('d_of_cancellation_add').value;



	if (pro == 'Please select a process.....') {
    pro = '';
  }
   if (category == 'Category') {
    category = '';
  }
	
	if (pro == '') {
			Swal.fire({
	            icon: 'info',
	            title: 'Please Input Process Name !!!',
	            text: 'Information',
	            showConfirmButton: false,
	            timer : 1000
	        });}
	else if(auth_no == ''){
			Swal.fire({
	            icon: 'info',
	            title: 'Please Input Short Name !!!',
	            text: 'Information',
	            showConfirmButton: false,
	            timer : 1000
	        });
	}else if(emp_id == ''){
			Swal.fire({
	            icon: 'info',
	            title: 'Please Input Authorization No. !!!',
	            text: 'Information',
	            showConfirmButton: false,
	            timer : 1000
	        });

	}else if(auth_year == ''){
			Swal.fire({
	            icon: 'info',
	            title: 'Please Input Employee Name !!!',
	            text: 'Information',
	            showConfirmButton: false,
	            timer : 1000
	        });
	}else if(date_authorized == ''){
			Swal.fire({
	            icon: 'info',
	            title: 'Please Input Department. !!!',
	            text: 'Information',
	            showConfirmButton: false,
	            timer : 1000
	        });
	}else if(expire_date == ''){
			Swal.fire({
	            icon: 'info',
	            title: 'Please Input Certification !!!',
	            text: 'Information',
	            showConfirmButton: false,
	            timer : 1000
	        });
	}else{
		$.ajax({
	        url:'../../process/import_export/add_emp_pro.php',
	        type:'POST',
	        cache:false,
	        data:{
	            method:'add_emp_pro',
	            pro:pro,
				auth_no:auth_no,
				emp_id:emp_id,
				auth_year:auth_year,
				date_authorized:date_authorized,
				expire_date:expire_date,
				remarks:remarks,
				r_of_cancellation:r_of_cancellation,
				d_of_cancellation:d_of_cancellation,
				category:category
	            	
	        },success:function(response){    
	            // console.log(response)
	            if (response == 'success') {
	                    Swal.fire({
	                      icon: 'success',
	                      title: 'Succesfully Recorded!!!',
	                      text: 'Success',
	                      showConfirmButton: false,
	                      timer : 1000
	                    });
	                    $('#add_emp_pro').modal('hide'); 
	                    $("#pro").val('');
	                    $("#auth_no").val('');
	                    $("#emp_id").val('');
	                    $("#auth_year").val('');
	          			$("#date_authorized").val('');
	          			$("#expire_date").val('');
	          			$("#remarks").val('');
	          			$("#r_of_cancellation").val('');
	          			$("#d_of_cancellation").val('');
	          			
	          			
	            }else if(response == 'existing'){
	                     Swal.fire({
	                      icon: 'info',
	                      title: 'Duplicate Data !!!',
	                      text: 'Information',
	                      showConfirmButton: false,
	                      timer : 1000
	                    });
	                    $('#add_emp_pro').modal('hide'); 
	                    $("#pro").val('');
	                    $("#auth_no").val('');
	                    $("#emp_id").val('');
	                    $("#auth_year").val('');
	          			$("#date_authorized").val('');
	          			$("#expire_date").val('');
	          			$("#remarks").val('');
	          			$("#r_of_cancellation").val('');
	          			$("#d_of_cancellation").val('');
	          			
	          			
	            }else{
	                    Swal.fire({
	                      icon: 'error',
	                      title: 'Error !!!',
	                      text: 'Error',
	                      showConfirmButton: false,
	                      timer : 1000
	                    });
	                    $('#add_emp_pro').modal('hide'); 
	                    $("#pro").val('');
	                    $("#auth_no").val('');
	                    $("#emp_id").val('');
	                    $("#auth_year").val('');
	          			$("#date_authorized").val('');
	          			$("#expire_date").val('');
	          			$("#remarks").val('');
	          			$("#r_of_cancellation").val('');
	          			$("#d_of_cancellation").val('');
	          			 
	                }
	        }
	    });
	}
}


</script>