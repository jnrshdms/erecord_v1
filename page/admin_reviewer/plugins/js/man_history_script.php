<script type="text/javascript" >
$(function() {
  agency_data();
   search_data(1);
});

document.querySelectorAll('#emp_id_search, #fullname_search, #batch').forEach(input => {
  input.addEventListener("keyup", e => {
    if (e.which === 13) {
      search_data(1);
    }
  });
});
document.getElementById("details_emp_pagination").addEventListener("keyup", e => {
  var current_page = document.getElementById("details_emp_pagination").value.trim();
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
    var current_page = parseInt(sessionStorage.getItem('details_emp_pagination'));
    let total = sessionStorage.getItem('count_rows');
    var prev_page = current_page - 1;
    if (prev_page > 0 && total > 0) {
        search_data(prev_page);
    }
}

const get_next_page = () => {
    var current_page = parseInt(sessionStorage.getItem('details_emp_pagination'));
    let total = sessionStorage.getItem('count_rows');
    var last_page = parseInt(sessionStorage.getItem('last_page'));
    var next_page = current_page + 1;
    if (next_page <= last_page && total > 0) {
        search_data(next_page);
    }
}
const search_data =current_page=>{
  var emp_id = document.getElementById('emp_id_search').value;
  var agency = document.getElementById('agency').value;
  var batch = document.getElementById('batch').value;
  var fullname = document.getElementById('fullname_search').value;
  var emp_status = document.getElementById('emp_status').value;
     if (emp_status == 'STATUS:') {
    emp_status = '';
  }
  if (agency == 'Provider') {
    agency = '';
  }
  // console.log(agency);
  $.ajax({
    url:'../../process/viewer/manhistory.php',
    type:'POST',
    cache:false,
    data:{
    method:'fetch_data',
    emp_id:emp_id,
    agency:agency,
    batch:batch,
    fullname:fullname,
    emp_status:emp_status,
    current_page:current_page

    },success:function(response){
      $('#details_emp').html(response);
      sessionStorage.setItem('details_emp_pagination', current_page);
      count_data();
    }
  });
}
const count_data =()=>{
  var emp_id = document.getElementById('emp_id_search').value;
  var agency = document.getElementById('agency').value;
  var batch = document.getElementById('batch').value;
  var fullname = document.getElementById('fullname_search').value;
  var emp_status = document.getElementById('emp_status').value;
     if (emp_status == 'STATUS:') {
    emp_status = '';
  }
  if (agency == 'Provider') {
    agency = '';
  }
  // console.log(agency);
  $.ajax({
    url:'../../process/viewer/manhistory.php',
    type:'POST',
    cache:false,
    data:{
    method:'count_data',
    emp_id:emp_id,
    agency:agency,
    batch:batch,
    fullname:fullname,
    emp_status:emp_status

    },success:function(response){
            sessionStorage.setItem('count_rows', response);
            var count = `Total: ${response}`;
            $('#count_rows_display').html(count);

            if (response > 0) {
              search_data_pagination();
              document.getElementById('btnPrevPage').disabled = false;
              document.getElementById('btnNextPage').disabled = false;
              document.getElementById('details_emp_pagination').disabled = false;
            } else {
              document.getElementById('btnPrevPage').disabled = true;
              document.getElementById('btnNextPage').disabled = true;
              document.getElementById('details_emp_pagination').disabled = true;
            }
        }
    });
}
const search_data_pagination =()=>{
  var emp_id = document.getElementById('emp_id_search').value;
  var agency = document.getElementById('agency').value;
  var batch = document.getElementById('batch').value;
  var fullname = document.getElementById('fullname_search').value;
  var emp_status = document.getElementById('emp_status').value;
  var current_page = sessionStorage.getItem('details_emp_pagination');

     if (emp_status == 'STATUS:') {
    emp_status = '';
  }
  if (agency == 'Provider') {
    agency = '';
  }
  // console.log(agency);
  $.ajax({
    url:'../../process/viewer/manhistory.php',
    type:'POST',
    cache:false,
    data:{
    method:'search_data_pagination',
    emp_id:emp_id,
    agency:agency,
    batch:batch,
    fullname:fullname,
    emp_status:emp_status

    },success:function(response){
            $('#details_emp_paginations').html(response);
            $('#details_emp_pagination').val(current_page);
            sessionStorage.setItem('details_emp_pagination', current_page);
            let last_page_check = document.getElementById("details_emp_paginations").innerHTML;
            if (last_page_check != '') {
                let last_page = document.getElementById("details_emp_paginations").lastChild.text;
                sessionStorage.setItem('last_page', last_page);
            }
        }
    });
}

// const emp_data =()=>{
//   $.ajax({
//     url:'../../process/viewer/manpower.php',
//     type:'POST',
//     cache:false,
//     data:{
//     method:'view',
//     },success:function(response){
//       $('#details_emp').html(response);
//       let table_rows = parseInt($("#details_emp tr").length);
//       $('#demo').html(table_rows);
//     }
//   });     
// }

const agency_data =()=>{
  $.ajax({
    url:'../../process/viewer/manhistory.php',
    type:'POST',
    cache:false,
    data:{
    method:'fetch_agency',
    },success:function(response){
      $('#agency').html(response);
    }
  });     
}


  
</script>