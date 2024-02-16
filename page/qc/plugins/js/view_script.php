<script type="text/javascript" >

$(document).ready(function() {

      $("#category").change(function() {
        var category = document.getElementById("category").value;
        $.ajax({
          url:'../../process/viewer/view_page.php',
          type:'POST',
          cache:false,
          data:{
            method:'fetch_pro',
            category:category
          },success:function(response){
            $('#pro').html(response);
          }
        });
        });


});

document.querySelectorAll('#emp_id_search, #fullname_search').forEach(input => {
  input.addEventListener("keyup", e => {
    if (e.which === 13) {
      search_data(1);
    }
  });
});


document.getElementById("process_details_pagination").addEventListener("keyup", e => {
  var current_page = document.getElementById("process_details_pagination").value.trim();
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
    var current_page = parseInt(sessionStorage.getItem('process_details_pagination'));
    let total = sessionStorage.getItem('count_rows');
    var prev_page = current_page - 1;
    if (prev_page > 0 && total > 0) {
        search_data(prev_page);
    }
}

const get_next_page = () => {
    var current_page = parseInt(sessionStorage.getItem('process_details_pagination'));
    let total = sessionStorage.getItem('count_rows');
    var last_page = parseInt(sessionStorage.getItem('last_page'));
    var next_page = current_page + 1;
    if (next_page <= last_page && total > 0) {
        search_data(next_page);
    }
}
 const search_data =current_page=>{
  var emp_id = document.getElementById('emp_id_search').value;
  var fullname = document.getElementById('fullname_search').value;
  var category = document.getElementById('category').value;
  var pro = document.getElementById('pro').value;
  var date = document.getElementById('expire_date_search').value;
  var date_authorized = document.getElementById('date_authorized_search').value;
  
  
  if (pro == 'Please select a process.....') {
    pro = '';
  }
   if (category == 'Category') {
    category = '';
  }
  $.ajax({
    url:'../../process/viewer/view_page.php',
    type:'POST',
    cache:false,
    data:{
    method:'fetch_category',
    emp_id:emp_id,
    category:category,
    pro:pro,
    fullname:fullname,
    date:date,
    date_authorized:date_authorized,
    current_page:current_page
    
    },success:function(response){
      $('#process_details').html(response);
      sessionStorage.setItem('process_details_pagination', current_page);
      count_data();
    }
  });
}
 const count_data =()=>{
  var emp_id = document.getElementById('emp_id_search').value;
   var fullname = document.getElementById('fullname_search').value;
  var category = document.getElementById('category').value;
  var pro = document.getElementById('pro').value;
  var date = document.getElementById('expire_date_search').value;
  var date_authorized = document.getElementById('date_authorized_search').value;
  
  
  if (pro == 'Please select a process.....') {
    pro = '';
  }
   if (category == 'Category') {
    category = '';
  }
  $.ajax({
    url:'../../process/viewer/view_page.php',
    type:'POST',
    cache:false,
    data:{
    method:'count_category',
    emp_id:emp_id,
    category:category,
    pro:pro,
    date:date,
    date_authorized:date_authorized,
    fullname:fullname
    
    },success:function(response){
      sessionStorage.setItem('count_rows', response);
            var count = `Total: ${response}`;
            $('#count_rows_display').html(count);

            if (response > 0) {
              search_data_pagination();
              document.getElementById('btnPrevPage').disabled = false;
              document.getElementById('btnNextPage').disabled = false;
              document.getElementById('process_details_pagination').disabled = false;
            } else {
              document.getElementById('btnPrevPage').disabled = true;
              document.getElementById('btnNextPage').disabled = true;
              document.getElementById('process_details_pagination').disabled = true;
            }
        }
    });
}
const search_data_pagination = () =>{
  var emp_id = document.getElementById('emp_id_search').value;
  var fullname = document.getElementById('fullname_search').value;
  var category = document.getElementById('category').value;
  var pro = document.getElementById('pro').value;
  var date = document.getElementById('expire_date_search').value;
  var date_authorized = document.getElementById('date_authorized_search').value;
  var current_page = sessionStorage.getItem('process_details_pagination');

  if (pro == 'Please select a process.....') {
    pro = '';
  }
   if (category == 'Category') {
    category = '';
  }
    $.ajax({
        url:'../../process/viewer/view_page.php',
        type:'POST',
        cache:false,
        data:{
            method:'fetch_category_pagination',
            emp_id:emp_id,
            category:category,
            pro:pro,
            date:date,
            date_authorized:date_authorized,
            fullname:fullname
        },
        success:function(response){
            $('#process_details_paginations').html(response);
            $('#process_details_pagination').val(current_page);
            sessionStorage.setItem('process_details_pagination', current_page);
            let last_page_check = document.getElementById("process_details_paginations").innerHTML;
            if (last_page_check != '') {
                let last_page = document.getElementById("process_details_paginations").lastChild.text;
                sessionStorage.setItem('last_page', last_page);
            }
        }
    });
}

 const rec_details =(param)=>{
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
  var m_name = data[9];
  var auth_no = data[10];
  //var category = category[10];


  $('#id_view').val(id);
  $('#auth_year_view').val(auth_year);
  $('#date_authorized_view').val(date_authorized);
  $('#expire_date_view').val(expire_date);
  $('#remarks_view').val(remarks);
  $('#r_of_cancellation_view').val(r_of_cancellation);
  $('#d_of_cancellation_view').val(d_of_cancellation);
  $('#updated_by_view').val(updated_by);
  $('#employee_name_view').val(fullname);
  $('#auth_no_view').val(auth_no);
  //$('#category').val(category);



    console.log()
    
    view_data();


}

// const view_data =()=>{
//   var fullname = document.getElementById('employee_name_view').value;
//   var auth_no = document.getElementById('auth_no_view').value;
//   var category = document.getElementById('category').value;
  

//   console.log(auth_no)
//   $.ajax({
//     url:'../../process/viewer/view_page.php',
//     type:'POST',
//     cache:false,
//     data:{
//     method:'view',
//     fullname:fullname,
//     auth_no:auth_no,
//     category:category
//     },success:function(response){
//       $('#details').html(response);
//       let table_rows = parseInt($("#details tr").length);
//       $('#demo').html(table_rows);
//     }
//   });     
// }

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
    var filename = 'erecord_data'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
</script>