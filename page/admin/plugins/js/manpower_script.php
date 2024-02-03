<script type="text/javascript" >
$(function() {
  agency_data();
   search_data(1);
   import_emp(); 
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
    url:'../../process/viewer/manpower.php',
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
    url:'../../process/viewer/manpower.php',
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
    url:'../../process/viewer/manpower.php',
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
const import_emp =()=> {
  $("#import_emp").click(function(){
    $('#import_employee').modal('hide');
    Swal.fire({
      icon: 'info',
      title: 'Please Wait!!!',
      text:'',
      showConfirmButton: false,
      allowOutsideClick: false,
      allowEscapeKey: false,
      allowEnterKey: false
    });
  });

}

const agency_data =()=>{
  $.ajax({
    url:'../../process/viewer/manpower.php',
    type:'POST',
    cache:false,
    data:{
    method:'fetch_agency',
    },success:function(response){
      $('#agency').html(response);
    }
  });     
}

const save_emp_data =()=>{
    var fullname = document.getElementById('fullname').value;
    var emp_id = document.getElementById('emp_id').value;
    var agency = document.getElementById('agency_get').value;
    var batch = document.getElementById('batch_get').value;
    var m_name = document.getElementById('m_name_get').value;
 

    if (fullname == '') {
    Swal.fire({
                icon: 'info',
                title: 'Please Input Fullname !!!',
                text: 'Information',
                showConfirmButton: false,
                timer : 1000
            });
  }else if(emp_id == ''){
    Swal.fire({
                icon: 'info',
                title: 'Please Input Employee ID !!!',
                text: 'Information',
                showConfirmButton: false,
                timer : 1000
            });
  }else if(agency == ''){
    Swal.fire({
                icon: 'info',
                title: 'Please Select Provider !!!',
                text: 'Information',
                showConfirmButton: false,
                timer : 1000
            });
  }else if(batch == ''){
    Swal.fire({
                icon: 'info',
                title: 'Please Select Batch !!!',
                text: 'Information',
                showConfirmButton: false,
                timer : 1000
            });
  }else{
  $.ajax({
    url:'../../process/viewer/manpower.php',
    type:'POST',
    cache:false,
    data:{
    method:'save_acc',
    fullname:fullname,
    emp_id:emp_id,
    agency:agency,
    batch:batch,
    m_name:m_name
    },success:function(response){
      console.log(response);
      if (response == 'success') {
        Swal.fire({
                icon: 'success',
                title: 'Succesfully Recorded !!!',
                text: 'Success',
                showConfirmButton: false,
                timer : 1000
            });
            search_data(1);
            $('#add_emp').modal('hide');
            $('#fullname').val('');
            $('#emp_id').val('');
            $('#agency').val('');
            $('#batch').val('');
      }else if(response == 'existing'){
        Swal.fire({
                icon: 'info',
                title: 'Existing Data !!!',
                text: 'Information',
                showConfirmButton: false,
                timer : 1000
            });
            $('#add_emp').modal('hide');
            $('#fullname').val('');
            $('#emp_id').val('');
            $('#agency').val('');
            $('#batch').val('');
      }else{
        Swal.fire({
                icon: 'error',
                title: 'Error !!!',
                text: 'Error',
                showConfirmButton: false,
                timer : 1000
            });
      }
    }
  });
  }
}
 function export_data(table_id, separator = ',') {
    // Select rows from table_id
    var rows = document.querySelectorAll('table#' + table_id + ' tr');
    // Construct csv
    var csv = [];
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll('td, th');
        for (var j = 0; j < cols.length; j++) {
            var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
            data = data.replace(/"/g, '""');
            // Push escaped string
            row.push('"' + data + '"');
        }
        csv.push(row.join(separator));
    }
    var csv_string = csv.join('\n');
    // Download it
    var filename = 'employee_data'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,%EF%BB%BF' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}


  const edit_employee =(param)=>{
  var data = param.split('~!~');
  var id = data[0];
  var fullname = data[1];
  var emp_id = data[2];
  var agency = data[3];
  var batch = data[4];
  var emp_status = data[5];
  var m_name = data[6];



  $('#id_edit').val(id);
  $('#fullname_edit').val(fullname);
  $('#emp_id_edit').val(emp_id);
  $('#agency_edit').val(agency);
  $('#batch_edit').val(batch);
  $('#emp_status_edit').val(emp_status);
  $('#m_name_edit').val(m_name);
  console.log(param)

}
  
  const save_emp_update =()=>{
    var fullname = document.getElementById('fullname_edit').value;
    var emp_id = document.getElementById('emp_id_edit').value;
    var agency = document.getElementById('agency_edit').value;
    var batch = document.getElementById('batch_edit').value;
    var id = document.getElementById('id_edit').value;
    var emp_status = document.getElementById('emp_status_edit').value;
    var m_name = document.getElementById('m_name_edit').value;
    console.log(emp_status)

    if (fullname == '') {
    Swal.fire({
                icon: 'info',
                title: 'Please Input Fullname !!!',
                text: 'Information',
                showConfirmButton: false,
                timer : 1000
            });
  }else if(emp_id == ''){
    Swal.fire({
                icon: 'info',
                title: 'Please Input Employee ID !!!',
                text: 'Information',
                showConfirmButton: false,
                timer : 1000
            });
  }else if(agency == ''){
    Swal.fire({
                icon: 'info',
                title: 'Please Select Provider !!!',
                text: 'Information',
                showConfirmButton: false,
                timer : 1000
            });
  }else if(batch == ''){
    Swal.fire({
                icon: 'info',
                title: 'Please Select Batch !!!',
                text: 'Information',
                showConfirmButton: false,
                timer : 1000
            });
  }else{
  $.ajax({
    url:'../../process/viewer/manpower.php',
    type:'POST',
    cache:false,
    data:{
    method:'save_up',
    fullname:fullname,
    emp_id:emp_id,
    agency:agency,
    batch:batch,
    id:id,
    emp_status:emp_status,
    m_name:m_name
    },success:function(response){
      console.log(response);
      if (response == 'success') {
        Swal.fire({
                icon: 'success',
                title: 'Succesfully Recorded !!!',
                text: 'Success',
                showConfirmButton: false,
                timer : 1000
            });
            search_data(1);
            $('#edit_emp').modal('hide');
            $('#fullname').val('');
            $('#emp_id').val('');
            $('#agency').val('');
            $('#batch').val('');
      }else if(response == 'existing'){
        Swal.fire({
                icon: 'info',
                title: 'Existing Data !!!',
                text: 'Information',
                showConfirmButton: false,
                timer : 1000
            });
            $('#edit_emp').modal('hide');
            $('#fullname').val('');
            $('#emp_id').val('');
            $('#agency').val('');
            $('#batch').val('');
      }else{
        Swal.fire({
                icon: 'error',
                title: 'Error !!!',
                text: 'Error',
                showConfirmButton: false,
                timer : 1000
            });
      }
    }
  });
  }
}

const delete_emp =()=>{
  var id = document.getElementById('id_edit').value;
  $.ajax({
    url:'../../process/viewer/manpower.php',
    type:'POST',

    cache:false,
    data:{
    method:'delete_account',
    id:id
    },success:function(response){
      if (response == 'success') {
        Swal.fire({
                icon: 'info',
                title: 'Succesfully Deleted !!!',
                text: 'Information',
                showConfirmButton: false,
                timer : 1000
            });
            search_data(1);
             $('#edit_emp').modal('hide');
      }else{
        Swal.fire({
                icon: 'error',
                title: 'Error !!!',
                text: 'Error',
                showConfirmButton: false,
                timer : 1000
            });
      }
    }
  });
}
  
</script>