<script>

const search_can =current_page=>{
  var emp_id = document.getElementById('emp_id_can').value;
  var fullname = document.getElementById('fullname_can').value;
  var category = document.getElementById('category_can').value;
  var r_status = document.getElementById('r_status_can').value;
  console.log(category)
   if (category == 'Category') {
    category = '';
  }
  if (r_status == 'Pending') {
    r_status = 'Pending';
  }else if(r_status == 'Reviewed'){
    r_status = 'Reviewed';
  }else if(r_status == 'Disapproved'){
    r_status = 'Disapproved';
  }
  $.ajax({
    url:'../../process/can_request/status.php',
    type:'POST',
    cache:false,
    data:{
    method:'fetch_status_can',
    emp_id:emp_id,
    fullname:fullname,
    category:category,
    r_status:r_status,
    current_page:current_page 
    
    },success:function(response){
      $('#can_list').html(response);
      sessionStorage.setItem('can_list_pagination', current_page);
      count_can();
    }
  });
}

 const count_can =()=>{
  var emp_id = document.getElementById('emp_id_can').value;
  var fullname = document.getElementById('fullname_can').value;
  var category = document.getElementById('category_can').value;
  var r_status = document.getElementById('r_status_can').value;
  console.log(category)
   if (category == 'Category') {
    category = '';
  }
  if (r_status == 'Pending') {
    r_status = 'Pending';
  }else if(r_status == 'Reviewed'){
    r_status = 'Reviewed';
  }else if(r_status == 'Disapproved'){
    r_status = 'disapprove';
  }
  $.ajax({
    url:'../../process/can_request/status.php',
    type:'POST',
    cache:false,
    data:{
    method:'count_can',
    emp_id:emp_id,
    fullname:fullname,
    category:category,
    r_status:r_status
    
    },success:function(response){
            sessionStorage.setItem('count_rows', response);
            var count = `Total: ${response}`;
            $('#count_rows_display').html(count);

            if (response > 0) {
              search_can_pagination();
              document.getElementById('btnPrevPage').disabled = false;
              document.getElementById('btnNextPage').disabled = false;
              document.getElementById('can_list_pagination').disabled = false;
            } else {
              document.getElementById('btnPrevPage').disabled = true;
              document.getElementById('btnNextPage').disabled = true;
              document.getElementById('can_list_pagination').disabled = true;
            }
        }
    });
}

const search_can_pagination =()=>{
  var emp_id = document.getElementById('emp_id_can').value;
  var fullname = document.getElementById('fullname_can').value;
  var category = document.getElementById('category_can').value;
  var r_status = document.getElementById('r_status_can').value;
  var current_page = sessionStorage.getItem('process_details_pagination');
  console.log(category)
   if (category == 'Category') {
    category = '';
  }
  if (r_status == 'Pending') {
    r_status = 'Pending';
  }else if(r_status == 'Reviewed'){
    r_status = 'Reviewed';
  }else if(r_status == 'Disapproved'){
    r_status = 'disapprove';
  }
  $.ajax({
    url:'../../process/can_request/status.php',
    type:'POST',
    cache:false,
    data:{
    method:'fetch_can_pagination',
    emp_id:emp_id,
    fullname:fullname,
    category:category,
    r_status:r_status
    
    },success:function(response){
            $('#can_list_paginations').html(response);
            $('#can_list_pagination').val(current_page);
            sessionStorage.setItem('can_list_pagination', current_page);
            let last_page_check = document.getElementById("can_list_paginations").innerHTML;
            if (last_page_check != '') {
                let last_page = document.getElementById("can_list_paginations").lastChild.text;
                sessionStorage.setItem('last_page', last_page);
            }
        }
    });
} 


const rec_qc_disapproved =(param)=>{
  var data = param.split('~!~');
  var id = data[0];
  var auth_year = data[1];
  var date_authorized = data[2];
  var expire_date = data[3];
  var remarks = data[4];
  var dept = data[5];
  var r_of_cancellation = data[6];
  var d_of_cancellation =data[7];
  var updated_by = data[8];
  var fullname = data[9];
  var auth_no = data[10];
  var category = data[11];

  $('#id_qc_d').val(id);
  $('#auth_year_qc_d').val(auth_year);
  $('#date_authorized_qc_d').val(date_authorized);
  $('#expire_date_qc_d').val(expire_date);
  $('#remarks_qc_d').val(remarks);
  $('#dept_qc_d').val(dept);
  $('#r_of_cancellation_qc_d').val(r_of_cancellation);
  $('#d_of_cancellation_qc_d').val(d_of_cancellation);
  $('#updated_by_qc_d').val(updated_by);
  $('#employee_name_qc_d').val(fullname);
  $('#auth_no_qc_d').val(auth_no);
  $('#category_qc_d').val(category);

  console.log(param)
}

const ds_qc_save_data =()=>{
  var auth_no = document.getElementById('auth_no_qc_d').value;
  var dept = document.getElementById('dept_qc_d').value;
  var r_of_cancellation = document.getElementById('r_of_cancellation_qc_d').value; 
  var d_of_cancellation = document.getElementById('d_of_cancellation_qc_d').value;
  var updated_by = document.getElementById('updated_by_qc_d').value;
  var id = document.getElementById('id_qc_d').value;
  var category = document.getElementById('category_qc_d').value;


    $.ajax({
           url:'../../process/can_request/status.php',
          type:'POST',
          cache:false,
          data:{
          method:'ds_qc_update',
          auth_no:auth_no,
          dept:dept,
          r_of_cancellation:r_of_cancellation,
          d_of_cancellation:d_of_cancellation,
          updated_by:updated_by,
          id:id,
          category:category     
          },success:function(response){    
              console.log(response)
              if (response == 'success') {
                      Swal.fire({
                        icon: 'success',
                        title: 'Succesfully Recorded!!!',
                        text: 'Success',
                        showConfirmButton: false,
                        timer : 1000
                      });
                  $("#auth_no").val('');
                  $("#dept").val('');
                  $("#r_of_cancellation").val('');
                  $("#d_of_cancellation").val('');
                  $("#updated_by").val('');
                  search_cert(1);
                  $('#qc_disapproved').modal('hide');
                  
              }else if(response == 'existing'){
                       Swal.fire({
                        icon: 'info',
                        title: 'Duplicate Data !!!',
                        text: 'Information',
                        showConfirmButton: false,
                        timer : 1000
                      });
                    $("#auth_no").val('');
                    $("#dept").val('');
                    $("#r_of_cancellation").val('');
                    $("#d_of_cancellation").val('');
                    $("#updated_by").val('');
                    $('#qc_disapproved').modal('hide');
                  
              }else{
                      Swal.fire({
                        icon: 'error',
                        title: 'Error !!!',
                        text: 'Error',
                        showConfirmButton: false,
                        timer : 1000
                      });
                  $("#auth_no").val('');
                  $("#dept").val('');
                  $("#r_of_cancellation").val('');
                  $("#d_of_cancellation").val('');
                  $("#updated_by").val('');
                  $('#qc_disapproved').modal('hide');
                  }
          }
      });
  }

</script>