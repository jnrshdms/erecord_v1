<script type="text/javascript">
  $(document).ready(function() {

    $("#category").change(function() {
      var category = document.getElementById("category").value;
      $.ajax({
        url: '../../process/update/update.php',
        type: 'POST',
        cache: false,
        data: {
          method: 'fetch_pro',
          category: category
        },
        success: function(response) {
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
  const search_data = current_page => {
    var emp_id = document.getElementById('emp_id_search').value;
    var fullname = document.getElementById('fullname_search').value;
    var category = document.getElementById('category').value;
    var pro = document.getElementById('pro').value;


    if (pro == 'Please select a process.....') {
      pro = '';
    }
    if (category == 'Category') {
      category = '';
    }
    $.ajax({
      url: '../../process/update/update.php',
      type: 'POST',
      cache: false,
      data: {
        method: 'qc_fetch_category',
        emp_id: emp_id,
        category: category,
        pro: pro,
        fullname: fullname,
        current_page: current_page

      },
      success: function(response) {
        $('#process_details').html(response);
        sessionStorage.setItem('process_details_pagination', current_page);
        count_data();
      }
    });
  }
  const count_data = () => {
    var emp_id = document.getElementById('emp_id_search').value;
    var fullname = document.getElementById('fullname_search').value;
    var category = document.getElementById('category').value;
    var pro = document.getElementById('pro').value;


    if (pro == 'Please select a process.....') {
      pro = '';
    }
    if (category == 'Category') {
      category = '';
    }
    $.ajax({
      url: '../../process/update/update.php',
      type: 'POST',
      cache: false,
      data: {
        method: 'count_category',
        emp_id: emp_id,
        category: category,
        pro: pro,
        fullname: fullname

      },
      success: function(response) {
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
  const search_data_pagination = () => {
    var emp_id = document.getElementById('emp_id_search').value;
    var fullname = document.getElementById('fullname_search').value;
    var category = document.getElementById('category').value;
    var pro = document.getElementById('pro').value;
    var current_page = sessionStorage.getItem('process_details_pagination');

    if (pro == 'Please select a process.....') {
      pro = '';
    }
    if (category == 'Category') {
      category = '';
    }
    $.ajax({
      url: '../../process/update/update.php',
      type: 'POST',
      cache: false,
      data: {
        method: 'fetch_category_pagination',
        emp_id: emp_id,
        category: category,
        pro: pro,
        fullname: fullname
      },
      success: function(response) {
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

  const qc_rec_details = (param) => {
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

    qc_view_data();


  }

  const qc_view_data = () => {
    var fullname = document.getElementById('employee_name_view').value;
    var auth_no = document.getElementById('auth_no_view').value;
    var category = document.getElementById('category').value;


    console.log(auth_no)
    $.ajax({
      url: '../../process/update/update.php',
      type: 'POST',
      cache: false,
      data: {
        method: 'qc_view',
        fullname: fullname,
        auth_no: auth_no,
        category: category
      },
      success: function(response) {
        $('#details').html(response);
        let table_rows = parseInt($("#details tr").length);
        // $('#demo').html(table_rows);
      }
    });
  }

  const qc_rec_update = (param) => {
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
    //var category = category[10];


    $('#id_r').val(id);
    $('#auth_year_r').val(auth_year);
    $('#date_authorized_r').val(date_authorized);
    $('#expire_date_r').val(expire_date);
    $('#remarks_r').val(remarks);
    $('#r_of_cancellation_r').val(r_of_cancellation);
    $('#dept_r').val(dept);
    $('#d_of_cancellation_r').val(d_of_cancellation);
    $('#updated_by_r').val(updated_by);
    $('#employee_name_r').val(fullname);
    $('#auth_no_r').val(auth_no);



    console.log(param)



  }

  const qc_save_data = () => {
    var auth_no = document.getElementById('auth_no_r').value;
    var auth_year = document.getElementById('auth_year_r').value;
    var date_authorized = document.getElementById('date_authorized_r').value;
    var expire_date = document.getElementById('expire_date_r').value;
    var remarks = document.getElementById('remarks_r').value;
    var r_of_cancellation = document.getElementById('r_of_cancellation_r').value;
    var dept = document.getElementById('dept_r').value;
    var d_of_cancellation = document.getElementById('d_of_cancellation_r').value;
    var updated_by = document.getElementById('updated_by_r').value;
    var id = document.getElementById('id_r').value;
    var fullname = document.getElementById('employee_name_r').value;
    var category = document.getElementById('category').value;

    if (auth_no == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Authorization No. !!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (auth_year == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Authorization Year!!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (date_authorized == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Date Authorized !!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (expire_date == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Expire Date !!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else {
      $.ajax({
        url: '../../process/update/update.php',
        type: 'POST',
        cache: false,
        data: {
          method: 'qc_update',
          auth_no: auth_no,
          auth_year: auth_year,
          date_authorized: date_authorized,
          expire_date: expire_date,
          remarks: remarks,
          r_of_cancellation: r_of_cancellation,
          dept: dept,
          d_of_cancellation: d_of_cancellation,
          updated_by: updated_by,
          id: id,
          fullname: fullname,
          category: category
        },
        success: function(response) {
          // console.log(response)
          if (response == 'success') {
            Swal.fire({
              icon: 'success',
              title: 'Succesfully Recorded!!!',
              text: 'Success',
              showConfirmButton: false,
              timer: 1000
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
            qc_view_data();
            $('#admine_r_update').modal('hide');

          } else if (response == 'existing') {
            Swal.fire({
              icon: 'info',
              title: 'Duplicate Data !!!',
              text: 'Information',
              showConfirmButton: false,
              timer: 1000
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
            $('#admine_r_update').modal('hide');
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error !!!',
              text: 'Error',
              showConfirmButton: false,
              timer: 1000
            });
          }
        }
      });
    }
  }
</script>