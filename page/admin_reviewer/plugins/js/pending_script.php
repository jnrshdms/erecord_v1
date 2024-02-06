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
    url:'../../process/can_request/pending.php',
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
    url:'../../process/can_request/pending.php',
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
    url:'../../process/can_request/pending.php',
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
 const p_details =(param)=>{
  var data = param.split('~!~');
  var id = data[0];
  var auth_year = data[1];
  var date_authorized = data[2];
  var expire_date = data[3];
  var remarks = data[4];
  var r_of_cancellation = data[5];
  var d_of_cancellation = data[6];
  var updated_by = data[7];
  var fullname = data[8];
  var auth_no = data[9];


  $('#id_viewp').val(id);
  $('#auth_year_viewp').val(auth_year);
  $('#date_authorized_viewp').val(date_authorized);
  $('#expire_date_viewp').val(expire_date);
  $('#remarks_viewp').val(remarks);
  $('#r_of_cancellation_viewp').val(r_of_cancellation);
  $('#d_of_cancellation_viewp').val(d_of_cancellation);
  $('#updated_by_viewp').val(updated_by);
  $('#employee_name_viewp').val(fullname);
  $('#auth_no_viewp').val(auth_no);
  



    console.log()
    
    view_data();


}

const view_data =()=>{
  var fullname = document.getElementById('employee_name_viewp').value;
  var auth_no = document.getElementById('auth_no_viewp').value;
  var category = document.getElementById('category').value;
  

  console.log(fullname)
  $.ajax({
    url:'../../process/can_request/pending.php',
    type:'POST',
    cache:false,
    data:{
    method:'qc_view',
    fullname:fullname,
    auth_no:auth_no,
    category:category
    },success:function(response){
      $('#details_p').html(response);
      let table_rows = parseInt($("#details_p tr").length);
      $('#demo').html(table_rows);
    }
  });     
}

const qc_review =()=>{
var category = document.getElementById('category').value;
var arr = [];
  $('input.singleCheck:checkbox:checked').each((i, el) => {
    arr.push($(el).val());
  });
  console.log(arr);

  var numberOfChecked = arr.length;
  if (numberOfChecked > 0) {
    $.ajax({
       url:'../../process/can_request/pending.php',
        type:'POST',
        cache:false,
        data:{
        method:'qc_review',
        category:category,
        arr:arr
       },success:function(response){ 
          console.log(response);
          if (response == 'success') {
            Swal.fire({
                    icon: 'success',
                    title: 'Succes!!!',
                    text: 'Success',
                    showConfirmButton: false,
                    timer : 1000
                });
             search_pending(1);
             $('#qc_i_review').modal('hide');
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