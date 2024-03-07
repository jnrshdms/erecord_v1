<script type="text/javascript" >

document.querySelectorAll('#fullname_p, #emp_id_p').forEach(input => {
  input.addEventListener("keyup", e => {
    if (e.which === 13) {
      search_pending(1);
    }
  });
});

document.getElementById("pending_list_pagination1").addEventListener("keyup", e => {
  var current_page = document.getElementById("pending_list_pagination1").value.trim();
  let total = sessionStorage.getItem('count_rows1');
  var last_page = parseInt(sessionStorage.getItem('last_page'));
  if (e.which === 13) {
    e.preventDefault();
    console.log(total);
    if (current_page != 0 && current_page <= last_page && total > 0) {
      search_pending(current_page);
    }
  }
});

const get_prev_page1 = () => {
    var current_page = parseInt(sessionStorage.getItem('pending_list_pagination1'));
    let total = sessionStorage.getItem('count_rows1');
    var prev_page = current_page - 1;
    if (prev_page > 0 && total > 0) {
        search_pending(prev_page);
    }
}

const get_next_page1 = () => {
    var current_page = parseInt(sessionStorage.getItem('pending_list_pagination1'));
    let total = sessionStorage.getItem('count_rows1');
    var last_page = parseInt(sessionStorage.getItem('last_page'));
    var next_page = current_page + 1;
    if (next_page <= last_page && total > 0) {
        search_pending(next_page);
    }
}

 const search_pending =current_page=>{
  var emp_id = document.getElementById('emp_id_p').value;
  var fullname = document.getElementById('fullname_p').value;
  var category = document.getElementById('category').value;
 
   if (category == 'Category') {
    category = '';
  }
  $.ajax({
    url:'../../process/listReq/pending.php',
    type:'POST',
    cache:false,
    data:{
    method:'fetch_category',
    emp_id:emp_id,
    fullname:fullname,
    category:category,
    current_page:current_page
    
    },success:function(response){
      $('#pending_list').html(response);
      sessionStorage.setItem('pending_list_pagination1', current_page);
      count_pending();
    }
  });
}
 const count_pending = () =>{
  var emp_id = document.getElementById('emp_id_p').value;
  var fullname = document.getElementById('fullname_p').value;
  var category = document.getElementById('category').value;

   if (category == 'Category') {
    category = '';
  }
  $.ajax({
    url:'../../process/listReq/pending.php',
    type:'POST',
    cache:false,
    data:{
    method:'count_pending',
    emp_id:emp_id,
    fullname:fullname,
    category:category
    
    },success:function(response){
            sessionStorage.setItem('count_rows1', response);
            var count = `Total: ${response}`;
            $('#count_rows_display1').html(count);

            if (response > 0) {
              search_pending_pagination();
              document.getElementById('btnPrevPage1').disabled = false;
              document.getElementById('btnNextPage1').disabled = false;
              document.getElementById('pending_list_pagination1').disabled = false;
            } else {
              document.getElementById('btnPrevPage1').disabled = true;
              document.getElementById('btnNextPage1').disabled = true;
              document.getElementById('pending_list_pagination1').disabled = true;
            }
        }
    });
}
const search_pending_pagination = () => {
  var emp_id = document.getElementById('emp_id_p').value;
  var fullname = document.getElementById('fullname_p').value;
  var category = document.getElementById('category').value;
  var current_page = sessionStorage.getItem('pending_list_pagination');

   if (category == 'Category') {
    category = '';
  }
  $.ajax({
    url:'../../process/listReq/pending.php',
    type:'POST',
    cache:false,
    data:{
    method:'search_pending_pagination',
    emp_id:emp_id,
    fullname:fullname,
    category:category
    
    },success:function(response){
            $('#pending_list_paginations1').html(response);
            $('#pending_list_pagination1').val(current_page);
            sessionStorage.setItem('pending_list_pagination1', current_page);
            let last_page_check = document.getElementById("pending_list_paginations1").innerHTML;
            if (last_page_check != '') {
                let last_page = document.getElementById("pending_list_paginations1").lastChild.text;
                sessionStorage.setItem('last_page', last_page);
            }
        }
    });
}
  
const select_all_func =()=>{
    var select_all = document.getElementById('check_all_for_auth');
    if(select_all.checked == true){
        console.log('check');
        $('.singleCheck').each(function(){
            this.checked=true;
        });
    }else{
        console.log('uncheck');
        $('.singleCheck').each(function(){
            this.checked=false;
        }); 
    }
 
    get_checked_length();
}

// GET THE LENGTH OF CHECKED CHECKBOXES
const get_checked_length = () => {
  var arr = [];
  $('input.singleCheck:checkbox:checked').each((i, el) => {
    arr.push($(el).val());
  });
  console.log(arr);
  var numberOfChecked = arr.length;
  if (numberOfChecked > 0) {
    $('#checkbox_control').attr('disabled', false);
  } else {
    $('#checkbox_control').attr('disabled', true);
  }
}
 

// History of Admin Reviewer
document.querySelectorAll('#fullname_h, #emp_id_h').forEach(input => {
  input.addEventListener("keyup", e => {
    if (e.which === 13) {
      search_history(1);
    }
  });
});

document.getElementById("history_list_pagination2").addEventListener("keyup", e => {
  var current_page = document.getElementById("history_list_pagination2").value.trim();
  let total = sessionStorage.getItem('count_rows2');
  var last_page = parseInt(sessionStorage.getItem('last_page'));
  if (e.which === 13) {
    e.preventDefault();
    console.log(total);
    if (current_page != 0 && current_page <= last_page && total > 0) {
      search_history(current_page);
    }
  }
});

const get_prev_page2 = () => {
    var current_page = parseInt(sessionStorage.getItem('history_list_pagination2'));
    let total = sessionStorage.getItem('count_rows2');
    var prev_page = current_page - 1;
    if (prev_page > 0 && total > 0) {
        search_history(prev_page);
    }
}

const get_next_page2 = () => {
    var current_page = parseInt(sessionStorage.getItem('history_list_pagination2'));
    let total = sessionStorage.getItem('count_rows2');
    var last_page = parseInt(sessionStorage.getItem('last_page'));
    var next_page = current_page + 1;
    if (next_page <= last_page && total > 0) {
        search_history(next_page);
    }
}

 const search_history =  current_page=>{
  var emp_id = document.getElementById('emp_id_h').value;
  var fullname = document.getElementById('fullname_h').value;
  var category = document.getElementById('categoryyy').value;
  var date_authorized = document.getElementById('date_authorized_h').value;
  var expire_date = document.getElementById('expire_date_h').value;
   

   if (category == 'Category') {
    category = '';
  }
  $.ajax({
    url:'../../process/listReq/history.php',
    type:'POST',
    cache:false,
    data:{
    method:'history_admin_r',
    emp_id:emp_id,
    fullname:fullname,
    category:category,
    date_authorized:date_authorized,
    expire_date:expire_date,
    current_page:current_page 
    
    },success:function(response){
      $('#history_list').html(response);
      sessionStorage.setItem('history_list_pagination2', current_page);
      count_history();
    }
  });
}

 const count_history = ()=>{
  var emp_id = document.getElementById('emp_id_h').value;
  var fullname = document.getElementById('fullname_h').value;
  var category = document.getElementById('categoryyy').value;
  var date_authorized = document.getElementById('date_authorized_h').value;
  var expire_date = document.getElementById('expire_date_h').value;
   

   if (category == 'Category') {
    category = '';
  }
  $.ajax({
    url:'../../process/listReq/history.php',
    type:'POST',
    cache:false,
    data:{
    method:'count_history_admin',
    emp_id:emp_id,
    fullname:fullname,
    date_authorized:date_authorized,
    expire_date:expire_date,
    category:category
    
    },success:function(response){
            sessionStorage.setItem('count_rows2', response);
            var count = `Total: ${response}`;
            $('#count_rows_display2').html(count);

            if (response > 0) {
              history_pagination();
              document.getElementById('btnPrevPage2').disabled = false;
              document.getElementById('btnNextPage2').disabled = false;
              document.getElementById('history_list_pagination2').disabled = false;
            } else {
              document.getElementById('btnPrevPage2').disabled = true;
              document.getElementById('btnNextPage2').disabled = true;
              document.getElementById('history_list_pagination2').disabled = true;
            }
        }
    });
}
const history_pagination  = ()=>{
  var emp_id = document.getElementById('emp_id_h').value;
  var fullname = document.getElementById('fullname_h').value;
  var category = document.getElementById('categoryyy').value;
  var date_authorized = document.getElementById('date_authorized_h').value;
  var expire_date = document.getElementById('expire_date_h').value;
  var current_page = sessionStorage.getItem('history_list_pagination2');
 
   if (category == 'Category') {
    category = '';
  }
  $.ajax({
    url:'../../process/listReq/history.php',
    type:'POST',
    cache:false,
    data:{
    method:'history_pagination_admin_r',
    emp_id:emp_id,
    fullname:fullname,
    date_authorized:date_authorized,
    expire_date:expire_date,
    category:category
    
    },success:function(response){
            $('#history_list_paginations2').html(response);
            $('#history_list_pagination2').val(current_page);
            sessionStorage.setItem('history_list_pagination2', current_page);
            let last_page_check = document.getElementById("history_list_paginations2").innerHTML;
            if (last_page_check != '') {
                let last_page = document.getElementById("history_list_paginations2").lastChild.text;
                sessionStorage.setItem('last_page', last_page);
            }
        }
    });
}


const rec_admin_update = (param) => {
  
   var data = param.split('~!~');
   var id = data[0];
   var auth_year = data[1];
   var date_authorized = data[2];
   var expire_date = data[3];
   var remarks = data[4];
   var r_of_cancellation = data[5];
   var dept = data[6];
   var d_of_cancellation = data[7];
   var updated_by = data[8];
   var fullname = data[9];
   var auth_no = data[10];
   var batch = data[11];
   //var category = category[10];

   $('#id_a').val(id);
   $('#auth_year_a').val(auth_year);
   $('#date_authorized_a').val(date_authorized);
   $('#expire_date_a').val(expire_date);
   $('#remarks_a').val(remarks);
   $('#r_of_cancellation_a').val(r_of_cancellation);
   $('#dept_a').val(dept);
   $('#d_of_cancellation_a').val(d_of_cancellation);
   $('#updated_by_a').val(updated_by);
   $('#employee_name_a').val(fullname);
   $('#auth_no_a').val(auth_no);
   $('#batch').val(batch);

   console.log(param);
};

const save_admin_data =()=>{
  var auth_no = document.getElementById('auth_no_a').value;
  var auth_year = document.getElementById('auth_year_a').value;
  var date_authorized = document.getElementById('date_authorized_a').value;
  var expire_date = document.getElementById('expire_date_a').value;
  var remarks = document.getElementById('remarks_a').value;
  // var r_of_cancellation = document.getElementById('r_of_cancellation_a').value;
  var dept = document.getElementById('dept_a').value;
  // var d_of_cancellation = document.getElementById('d_of_cancellation_a').value;
  var updated_by = document.getElementById('updated_by_a').value;
  var id = document.getElementById('id_a').value;
  var fullname = document.getElementById('employee_name_a').value;
  var category = document.getElementById('category').value;
  // var batch = document.getElementById('batch_a').value;

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
          url:'../../process/listReq/pending.php',
          type:'POST',
          cache:false,
          data:{
          method:'update',
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
              // console.log(response)
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
                  $("#r_of_cancellation").val('');
                  $("#dept").val('');
                  $("#d_of_cancellation").val('');
                  $("#updated_by").val('');
                  search_pending(1);
                  $('#admin_r_update').modal('hide');
                  
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
                  $("#r_of_cancellation").val('');
                  $("#dept").val('');
                  $("#d_of_cancellation").val('');
                  $("#updated_by").val('');
                  $('#admin_r_update').modal('hide');
                  
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
                  $("#r_of_cancellation").val('');
                  $("#dept").val('');
                  $("#d_of_cancellation").val('');
                  $("#updated_by").val('');
                  $('#admin_r_update').modal('hide');
                  }
          }
      });
  }
}

const i_review =()=>{
var category = document.getElementById('category').value;
var arr = [];
  $('input.singleCheck:checkbox:checked').each((i, el) => {
    arr.push($(el).val());
  });
  console.log(arr);

  var numberOfChecked = arr.length;
  if (numberOfChecked > 0) {
    $.ajax({
       url:'../../process/listReq/pending.php',
        type:'POST',
        cache:false,
        data:{
        method:'review',
        category:category,
        arr:arr
       },success:function(response){
          console.log(response);
          if (response == 'success') {
            Swal.fire({
                    icon: 'success',
                    title: 'Review Succes!!!',
                    text: 'Success',
                    showConfirmButton: false,
                    timer : 1000
                });
             search_pending(1);
             $('#i_review').modal('hide');
          }
      }
    });
    } else {
        Swal.fire({
            icon: 'info',
            title: 'No checkbox checked !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        });
    }
}

const i_disreview =()=>{
var category = document.getElementById('category').value;
var arr = [];
  $('input.singleCheck:checkbox:checked').each((i, el) => {
    arr.push($(el).val());
  });
  console.log(arr);

  var numberOfChecked = arr.length;
  if (numberOfChecked > 0) {
    $.ajax({
       url:'../../process/listReq/pending.php',
        type:'POST',
        cache:false,
        data:{
        method:'disreview',
        category:category,
        arr:arr
       },success:function(response){
          console.log(response);
          if (response == 'success') {
            Swal.fire({
                    icon: 'success',
                    title: 'Successfully Disapproved !!!',
                    text: 'Success',
                    showConfirmButton: false,
                    timer : 1000
                });
             search_pending(1);
             $('#i_review').modal('hide');
          }
      }
    });
    } else {
        Swal.fire({
            icon: 'info',
            title: 'No checkbox checked !!!',
            text: 'Information',
            showConfirmButton: false,
            timer : 1000
        });
    }
}

</script>