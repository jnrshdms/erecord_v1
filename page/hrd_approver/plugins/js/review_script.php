<script type="text/javascript" >

 document.querySelectorAll('#emp_id_r, #fullname_r').forEach(input => {
  input.addEventListener("keyup", e => {
    if (e.which === 13) {
      search_rev(1);
    }
  });
});
 
document.getElementById("rev_list_pagination1").addEventListener("keyup", e => {
  var current_page = document.getElementById("rev_list_pagination1").value.trim();
  let total = sessionStorage.getItem('count_rows1');
  var last_page = parseInt(sessionStorage.getItem('last_page'));
  if (e.which === 13) {
    e.preventDefault();
    console.log(total);
    if (current_page != 0 && current_page <= last_page && total > 0) {
      search_rev(current_page);
    }
  }
});

const get_prev_page1 = () => {
    var current_page = parseInt(sessionStorage.getItem('rev_list_pagination1'));
    let total = sessionStorage.getItem('count_rows1');
    var prev_page = current_page - 1;
    if (prev_page > 0 && total > 0) {
        search_rev(prev_page);
    }
}

const get_next_page1 = () => {
    var current_page = parseInt(sessionStorage.getItem('rev_list_pagination1'));
    let total = sessionStorage.getItem('count_rows1');
    var last_page = parseInt(sessionStorage.getItem('last_page'));
    var next_page = current_page + 1;
    if (next_page <= last_page && total > 0) {
        search_rev(next_page);
    }
}


const search_rev =current_page=>{
  var emp_id = document.getElementById('emp_id_r').value;
  var fullname = document.getElementById('fullname_r').value;
  var category = document.getElementById('categoryy').value;
  console.log(category)
   if (category == 'Category') {
    category = '';
  }
  $.ajax({
    url:'../../process/can_request/review.php',
    type:'POST',
    cache:false,
    data:{
    method:'fetch_rev',
    emp_id:emp_id,
    fullname:fullname,
    category:category,
    current_page:current_page
    
    },success:function(response){
      $('#rev_list').html(response);
      sessionStorage.setItem('rev_list_pagination1', current_page);
      count_rev();
    }
  });
}
const count_rev = () =>{
  var emp_id = document.getElementById('emp_id_r').value;
  var fullname = document.getElementById('fullname_r').value;
  var category = document.getElementById('categoryy').value;

   if (category == 'Category') {
    category = '';
  }
  $.ajax({
    url:'../../process/can_request/review.php',
    type:'POST',
    cache:false,
    data:{
    method:'count_rev',
    emp_id:emp_id,
    fullname:fullname,
    category:category
    
    },success:function(response){
            sessionStorage.setItem('count_rows1', response);
            var count = `Total: ${response}`;
            $('#count_rows_display1').html(count);

            if (response > 0) {
              rev_pagination();
              document.getElementById('btnPrevPage1').disabled = false;
              document.getElementById('btnNextPage1').disabled = false;
              document.getElementById('rev_list_pagination1').disabled = false;
            } else {
              document.getElementById('btnPrevPage1').disabled = true;
              document.getElementById('btnNextPage1').disabled = true;
              document.getElementById('rev_list_pagination1').disabled = true;
            }
        }
    });
}
const rev_pagination = () => {
  var emp_id = document.getElementById('emp_id_r').value;
  var fullname = document.getElementById('fullname_r').value;
  var category = document.getElementById('categoryy').value;
  var current_page = sessionStorage.getItem('rev_list_pagination1');

   if (category == 'Category') {
    category = '';
  }
  $.ajax({
    url:'../../process/can_request/review.php',
    type:'POST',
    cache:false,
    data:{
    method:'rev_pagination',
    emp_id:emp_id,
    fullname:fullname,
    category:category
    
    },success:function(response){
            $('#rev_list_paginations1').html(response);
            $('#rev_list_pagination1').val(current_page);
            sessionStorage.setItem('rev_list_pagination1', current_page);
            let last_page_check = document.getElementById("rev_list_paginations1").innerHTML;
            if (last_page_check != '') {
                let last_page = document.getElementById("rev_list_paginations1").lastChild.text;
                sessionStorage.setItem('last_page', last_page);
            }
        }
    });
}
const select_all_func_r =()=>{
    var select_all = document.getElementById('check_all_for_r');
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
 
    get_checked_length_r();
}

// GET THE LENGTH OF CHECKED CHECKBOXES
const get_checked_length_r = () => {
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


const qc_approve =()=>{
var category = document.getElementById('categoryy').value;
var arr = [];
  $('input.singleCheck:checkbox:checked').each((i, el) => {
    arr.push($(el).val());
  });
  console.log(arr);

  var numberOfChecked = arr.length;
  if (numberOfChecked > 0) {
    $.ajax({
       url:'../../process/can_request/review.php',
        type:'POST',
        cache:false,
        data:{
        method:'qc_approve',
        category:category,
        arr:arr
       },success:function(response){
          console.log(response);
          if (response == 'success') {
            Swal.fire({
                    icon: 'success',
                    title: 'Approve Success!!!',
                    text: 'Success',
                    showConfirmButton: false,
                    timer : 1000
                });
              search_rev(1);
              $('#qc_i_approve').modal('hide');
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


const qc_disapprove =()=>{
var category = document.getElementById('categoryy').value;
var arr = [];
  $('input.singleCheck:checkbox:checked').each((i, el) => {
    arr.push($(el).val());
  });
  console.log(arr);

  var numberOfChecked = arr.length;
  if (numberOfChecked > 0) {
    $.ajax({
       url:'../../process/can_request/review.php',
        type:'POST',
        cache:false,
        data:{
        method:'qc_disapprove',
        category:category,
        arr:arr
       },success:function(response){
          console.log(response);
          if (response == 'success') {
            Swal.fire({
                    icon: 'success',
                    title: 'Disapprove Success!!!',
                    text: 'Success',
                    showConfirmButton: false,
                    timer : 1000
                });
             search_rev(1);
             $('#qc_i_approve').modal('hide');
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