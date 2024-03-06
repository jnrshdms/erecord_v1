<script type="text/javascript" >


  document.querySelectorAll('#fullname_cert, #emp_id_cert, #emp_id_can, #fullname_can').forEach(input => {
  input.addEventListener("keyup", e => {
    if (e.which === 13) {
      search_cert(1);
    }
  });
});


document.getElementById("cert_list_pagination1").addEventListener("keyup", e => {
  var current_page = document.getElementById("cert_list_pagination1").value.trim();
  let total = sessionStorage.getItem('count_rows1');
  var last_page = parseInt(sessionStorage.getItem('last_page'));
  if (e.which === 13) {
    e.preventDefault();
    console.log(total);
    if (current_page != 0 && current_page <= last_page && total > 0) {
      search_cert(current_page);
    }
  }
});

const get_prev_page1 = () => {
    var current_page = parseInt(sessionStorage.getItem('cert_list_pagination1'));
    let total = sessionStorage.getItem('count_rows1');
    var prev_page = current_page - 1;
    if (prev_page > 0 && total > 0) {
        search_cert(prev_page);
    }
}

const get_next_page1 = () => {
    var current_page = parseInt(sessionStorage.getItem('cert_list_pagination1'));
    let total = sessionStorage.getItem('count_rows1');
    var last_page = parseInt(sessionStorage.getItem('last_page'));
    var next_page = current_page + 1;
    if (next_page <= last_page && total > 0) {
        search_cert(next_page);
    }
}
 const search_cert =current_page=>{
  var emp_id = document.getElementById('emp_id_cert').value;
  var fullname = document.getElementById('fullname_cert').value;
  var category = document.getElementById('category_cert').value;
  var i_status = document.getElementById('i_status_cert').value;
  console.log(category)
   if (category == 'Category') {
    category = '';
  }
  if (i_status == 'Pending') {
    i_status = 'Pending';
  }else if(i_status == 'Reviewed'){
    i_status = 'Reviewed';
  }else if(i_status == 'Disapproved'){
    i_status = 'Disapproved';
  }
  $.ajax({
    url:'../../process/listReq/status.php',
    type:'POST',
    cache:false,
    data:{
    method:'fetch_status_cert',
    emp_id:emp_id,
    fullname:fullname,
    category:category,
    i_status:i_status,
    current_page:current_page
    
    },success:function(response){
      $('#cert_list').html(response);
      sessionStorage.setItem('cert_list_pagination1', current_page);
      count_data_cert();
    }
  });
}

const count_data_cert = () => {
  var emp_id = document.getElementById('emp_id_cert').value;
  var fullname = document.getElementById('fullname_cert').value;
  var category = document.getElementById('category_cert').value;
  var i_status = document.getElementById('i_status_cert').value;
  console.log(category)
   if (category == 'Category') {
    category = '';
  }
  if (i_status == 'Pending') {
    i_status = 'Pending';
  }else if(i_status == 'Reviewed'){
    i_status = 'Reviewed';
  }else if(i_status == 'Disapproved'){
    i_status = 'Disapproved';
  }
  $.ajax({
    url:'../../process/listReq/status.php',
    type:'POST',
    cache:false,
    data:{
    method:'count_cert',
    emp_id:emp_id,
    fullname:fullname,
    category:category,
    i_status:i_status
        }, 
        success:function(response){
            sessionStorage.setItem('count_rows1', response);
            var count = `Total: ${response}`;
            $('#count_rows_display1').html(count);

            if (response > 0) {
              search_cert_pagination();
              document.getElementById('btnPrevPage1').disabled = false;
              document.getElementById('btnNextPage1').disabled = false;
              document.getElementById('cert_list_pagination1').disabled = false;
            } else {
              document.getElementById('btnPrevPage1').disabled = true;
              document.getElementById('btnNextPage1').disabled = true;
              document.getElementById('cert_list_pagination1').disabled = true;
            }
        }
    });
}
const search_cert_pagination = () => {
  var emp_id = document.getElementById('emp_id_cert').value;
  var fullname = document.getElementById('fullname_cert').value;
  var category = document.getElementById('category_cert').value;
  var i_status = document.getElementById('i_status_cert').value;
  var current_page = sessionStorage.getItem('cert_list_pagination');

  console.log(category)
   if (category == 'Category') {
    category = '';
  }
  if (i_status == 'Pending') {
    i_status = 'Pending';
  }else if(i_status == 'Reviewed'){
    i_status = 'Reviewed';
  }else if(i_status == 'Disapproved'){
    i_status = 'Disapproved';
  }
  $.ajax({
    url:'../../process/listReq/status.php',
    type:'POST',
    cache:false,
    data:{
    method:'fetch_cert_pagination',
    emp_id:emp_id,
    fullname:fullname,
    category:category,
    i_status:i_status
        }, 
        success:function(response){
            $('#cert_list_paginations1').html(response);
            $('#cert_list_pagination1').val(current_page);
            sessionStorage.setItem('cert_list_pagination1', current_page);
            let last_page_check = document.getElementById("cert_list_paginations1").innerHTML;
            if (last_page_check != '') {
                let last_page = document.getElementById("cert_list_paginations1").lastChild.text;
                sessionStorage.setItem('last_page', last_page);
            }
        }
    });
}


const rec_disapproved =(param)=>{
  var data = param.split('~!~');
  var id = data[0];
  var auth_year = data[1];
  var date_authorized = data[2];
  var expire_date = data[3];
  var remarks = data[4];
  var dept = data[5];
  var updated_by = data[6];
  var fullname = data[7];
  var auth_no = data[8];
  var category = data[9];

  $('#id_d').val(id);
  $('#auth_year_d').val(auth_year);
  $('#date_authorized_d').val(date_authorized);
  $('#expire_date_d').val(expire_date);
  $('#remarks_d').val(remarks);
  $('#dept_d').val(dept);
  $('#updated_by_d').val(updated_by);
  $('#employee_name_d').val(fullname);
  $('#auth_no_d').val(auth_no);
  $('#category_d').val(category);
  console.log(param)
}

const ds_save_data =()=>{
  var auth_no = document.getElementById('auth_no_d').value;
  var auth_year = document.getElementById('auth_year_d').value;
  var date_authorized = document.getElementById('date_authorized_d').value;
  var expire_date = document.getElementById('expire_date_d').value;
  var remarks = document.getElementById('remarks_d').value;
  var dept = document.getElementById('dept_d').value;
  var updated_by = document.getElementById('updated_by_d').value;
  var id = document.getElementById('id_d').value;
  var fullname = document.getElementById('employee_name_d').value;
  var category = document.getElementById('category_d').value;


  if (auth_no == '') {
      Swal.fire({
              icon: 'info',
              title: 'Please Input Authorization No. !!!',
              text: 'Information',
              showConfirmButton: false,
              timer : 1000
          });}
  else if(auth_year == ''){
      Swal.fire({
              icon: 'info',
              title: 'Please Input Authorization Year!!!',
              text: 'Information',
              showConfirmButton: false,
              timer : 1000
          });
  }else if(date_authorized == ''){
      Swal.fire({
              icon: 'info',
              title: 'Please Input Date Authorized !!!',
              text: 'Information',
              showConfirmButton: false,
              timer : 1000
          });
  }else if(expire_date == ''){
      Swal.fire({
              icon: 'info',
              title: 'Please Input Expire Date !!!',
              text: 'Information',
              showConfirmButton: false,
              timer : 1000
          });
  }
      else{
    $.ajax({
           url:'../../process/listReq/status.php',
          type:'POST',
          cache:false,
          data:{
          method:'ds_update',
          auth_no:auth_no,
          auth_year:auth_year,
          date_authorized:date_authorized,
          expire_date:expire_date,
          remarks:remarks,
          dept:dept,
          updated_by:updated_by,
          id:id,
          fullname:fullname,
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
                  $("#auth_year").val('');
                  $("#date_authorized").val('');
                  $("#expire_date").val('');
                  $("#remarks").val('');
                  $("#dept").val('');
                  $("#updated_by").val('');
                  search_cert(1);
                  $('#disapproved').modal('hide');
                  
              }else if(response == 'existing'){
                       Swal.fire({
                        icon: 'info',
                        title: 'Duplicate Data !!!',
                        text: 'Information',
                        showConfirmButton: false,
                        timer : 1000
                      });
                  $("#auth_no").val('');
                  $("#auth_year").val('');
                  $("#date_authorized").val('');
                  $("#expire_date").val('');
                  $("#remarks").val('');
                  $("#dept").val('');
                  $("#updated_by").val('');
                  $('#disapproved').modal('hide');
                  
              }else{
                      Swal.fire({
                        icon: 'error',
                        title: 'Error !!!',
                        text: 'Error',
                        showConfirmButton: false,
                        timer : 1000
                      });
                  $("#auth_no").val('');
                  $("#auth_year").val('');
                  $("#date_authorized").val('');
                  $("#expire_date").val('');
                  $("#remarks").val('');
                  $("#dept").val('');
                  $("#updated_by").val('');
                  $('#disapproved').modal('hide');
                  }
          }
      });
  }
}

document.getElementById("can_list_pagination").addEventListener("keyup", e => {
  var current_page = document.getElementById("can_list_pagination").value.trim();
  let total = sessionStorage.getItem('count_rows');
  var last_page = parseInt(sessionStorage.getItem('last_page'));
  if (e.which === 13) {
    e.preventDefault();
    console.log(total);
    if (current_page != 0 && current_page <= last_page && total > 0) {
      search_data(current_page);
    }
  }
});

const get_prev_page = () => {
    var current_page = parseInt(sessionStorage.getItem('can_list_pagination'));
    let total = sessionStorage.getItem('count_rows');
    var prev_page = current_page - 1;
    if (prev_page > 0 && total > 0) {
        search_data(prev_page);
    }
}

const get_next_page = () => {
    var current_page = parseInt(sessionStorage.getItem('can_list_pagination'));
    let total = sessionStorage.getItem('count_rows');
    var last_page = parseInt(sessionStorage.getItem('last_page'));
    var next_page = current_page + 1;
    if (next_page <= last_page && total > 0) {
        search_data(next_page);
    }
}


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
    r_status = 'Disapproved';
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

const ds_qc_save_data = () => {
    var auth_no = document.getElementById('auth_no_qc_d').value;
    var dept = document.getElementById('dept_qc_d').value;
    var r_of_cancellation = document.getElementById('r_of_cancellation_qc_d').value;
    var d_of_cancellation = document.getElementById('d_of_cancellation_qc_d').value;
    var updated_by = document.getElementById('updated_by_qc_d').value;
    var id = document.getElementById('id_qc_d').value;
    var category = document.getElementById('category_qc_d').value;



    $.ajax({
        url: '../../process/can_request/status.php',
        type: 'POST',
        cache: false,
        data: {
            method: 'ds_qc_update',
            auth_no: auth_no,
            dept: dept,
            r_of_cancellation: r_of_cancellation,
            d_of_cancellation: d_of_cancellation,
            updated_by: updated_by,
            id: id,
            category: category
        },
        success: function (response) {
            console.log(response);
            if (response == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Recorded!!!',
                    text: 'Success',
                    showConfirmButton: false,
                    timer: 1000
                });
                // Clearing input fields and hiding modal
                $("#auth_no").val('');
                $("#dept").val('');
                $("#r_of_cancellation").val('');
                $("#d_of_cancellation").val('');
                $("#updated_by").val('');
                search_cert(1);
                $('#qc_disapproved').modal('hide');

            } else if (response == 'existing') {
                Swal.fire({
                    icon: 'info',
                    title: 'Duplicate Data !!!',
                    text: 'Information',
                    showConfirmButton: false,
                    timer: 1000
                });
                // Clearing input fields and hiding modal
                $("#auth_no").val('');
                $("#dept").val('');
                $("#r_of_cancellation").val('');
                $("#d_of_cancellation").val('');
                $("#updated_by").val('');
                $('#qc_disapproved').modal('hide');

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error !!!',
                    text: 'Error',
                    showConfirmButton: false,
                    timer: 1000
                });
                // Clearing input fields and hiding modal
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