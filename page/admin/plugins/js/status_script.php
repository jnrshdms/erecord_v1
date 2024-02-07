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
  //var category = category[10];


  $('#id_d').val(id);
  $('#auth_year_d').val(auth_year);
  $('#date_authorized_d').val(date_authorized);
  $('#expire_date_d').val(expire_date);
  $('#remarks_d').val(remarks);
  $('#dept_d').val(dept);
  $('#updated_by_d').val(updated_by);
  $('#employee_name_d').val(fullname);
  $('#auth_no_d').val(auth_no);



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
  var category = document.getElementById('category').value;


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
                
                  $('#disaproved').modal('hide');
                  
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

  
</script>