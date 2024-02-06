<script type="text/javascript" >

  document.querySelectorAll('#emp_id_can, #fullname_can').forEach(input => {
  input.addEventListener("keyup", e => {
    if (e.which === 13) {
      search_data(1);
    }
  });
});
 
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
    r_status = 'disapprove';
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
  
</script>