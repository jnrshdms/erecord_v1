<script type="text/javascript">
  $(document).ready(function() {

    $("#category").change(function() {
      var category = document.getElementById("category").value;
      $.ajax({
        url: '../../process/import_export/export.php',
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

    import_pro();
  });

  document.querySelectorAll('#emp_id_search, #expire_date_search').forEach(input => {
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
    var category = document.getElementById('category').value;
    var pro = document.getElementById('pro').value;
    var date = document.getElementById('expire_date_search').value;


    if (pro == 'Please select a process.....') {
      pro = '';
    }
    $.ajax({
      url: '../../process/import_export/export.php',
      type: 'POST',
      cache: false,
      data: {
        method: 'fetch_category',
        emp_id: emp_id,
        category: category,
        pro: pro,
        date: date,
        current_page: current_page

      },
      success: function(response) {
        $('#process_details').html(response);
        sessionStorage.setItem('process_details_pagination', current_page);
        count_data();
      }
    });
    /*}*/
  }

  const count_data = () => {
    var emp_id = document.getElementById('emp_id_search').value;
    var category = document.getElementById('category').value;
    var pro = document.getElementById('pro').value;
    var date = document.getElementById('expire_date_search').value;

    if (pro == 'Please select a process.....') {
      pro = '';
    }
    $.ajax({
      url: '../../process/import_export/export.php',
      type: 'POST',
      cache: false,
      data: {
        method: 'count_category',
        emp_id: emp_id,
        category: category,
        pro: pro,
        date: date

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
    var category = document.getElementById('category').value;
    var pro = document.getElementById('pro').value;
    var date = document.getElementById('expire_date_search').value;
    var current_page = sessionStorage.getItem('process_details_pagination');

    if (pro == 'Please select a process.....') {
      pro = '';
    }
    $.ajax({
      url: '../../process/import_export/export.php',
      type: 'POST',
      cache: false,
      data: {
        method: 'fetch_category_pagination',
        emp_id: emp_id,
        category: category,
        pro: pro,
        date: date

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

  const import_pro = () => {
    $("#import_pro").click(function() {
      $('#import_data').modal('hide');
      Swal.fire({
        icon: 'info',
        title: 'Please Wait!!!',
        text: '',
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false
      });
    });

  }
  const export_data_code = () => {
    var emp_id = document.getElementById('emp_id_search').value;
    var category = document.getElementById('category').value;
    var pro = document.getElementById('pro').value;
    var date = document.getElementById('expire_date_search').value;
    window.open('../../process/import_export/export_add_record.php?emp_id=' + emp_id + "&category=" + category + "&pro=" + pro + "&date=" + date, '_blank');
  }

  $(document).ready(function() {

    $("#new_category_add").change(function() {
      var category = document.getElementById("new_category_add").value;
      $.ajax({
        url: '../../process/import_export/add_emp_pro.php',
        type: 'POST',
        cache: false,
        data: {
          method: 'fetch_pro',
          category: category
        },
        success: function(response) {
          $('#new_pro_add').html(response);
        }
      });
    });
  });



  // New authorization 
  document.getElementById("new_emp_id_add").addEventListener("keyup", e => {
    if (e.which === 13) {
      e.preventDefault();
      get_fullname_by_emp_no();
    } else {
      document.getElementById("new_fullname_add").value = '';
      document.getElementById("new_batch_add").value = '';
    }
  });

  // Get Fullname by emp_id (New Authorization)
  const get_fullname_by_emp_no = () => {
    const emp_id = document.getElementById('new_emp_id_add').value;

    $.ajax({
      url: '../../process/import_export/add_emp_pro.php',
      type: 'POST',
      cache: false,
      data: {
        method: 'get_fullname_by_emp_no',
        emp_id: emp_id
      },
      success: function(response) {
        try {
          let response_array = JSON.parse(response);
          if (response_array.message === 'success') {
            document.getElementById('new_fullname_add').value = response_array.fullname;
            document.getElementById('new_batch_add').value = response_array.batch;
          } else if (response_array.message === 'Not Found') {
            Swal.fire({
              icon: 'error',
              title: 'Employee Number Not Found / Registered',
              text: 'Error',
              showConfirmButton: false,
              timer: 1000
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: response_array.message,
              text: 'Error',
              showConfirmButton: false,
              timer: 1000
            });
          }
        } catch (e) {
          console.log(response);
        }
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  }

  // ADD NEW AUTHORIZATION 
  const add_new_autho = () => {
    var category = document.getElementById('new_category_add').value;
    var pro = document.getElementById('new_pro_add').value;
    var auth_no = document.getElementById('new_auth_no_add').value;
    var emp_id = document.getElementById('new_emp_id_add').value;
    var auth_year = document.getElementById('new_auth_year_add').value;
    var date_authorized = document.getElementById('new_date_authorized_add').value;
    var expire_date = document.getElementById('new_expire_date_add').value;
    var remarks = document.getElementById('new_remarks_add').value;
    var fullname = document.getElementById('new_fullname_add').value;
    var dept = document.getElementById('new_dept_add').value;
    var batch = document.getElementById('new_batch_add').value;



    if (pro == 'Please select a process.....') {
      pro = '';
    }
    if (category == 'Category') {
      category = '';
    }

    if (pro == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Process Name !!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (auth_no == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Authorization No. !!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (emp_id == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Employee Number !!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (fullname == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Employee Number !!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (auth_year == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Authorization No.!!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (date_authorized == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Date Authorization !!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (dept == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Department. !!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (expire_date == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Expire Date of Authorization!!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else {
      $.ajax({
        url: '../../process/import_export/add_emp_pro.php',
        type: 'POST',
        cache: false,
        data: {
          method: 'add_new_autho',
          pro: pro,
          auth_no: auth_no,
          emp_id: emp_id,
          auth_year: auth_year,
          date_authorized: date_authorized,
          expire_date: expire_date,
          remarks: remarks,
          fullname: fullname,
          dept: dept,
          batch: batch,
          category: category

        },
        success: function(response) {
          console.log(response)
          if (response == 'success') {
            Swal.fire({
              icon: 'success',
              title: 'Succesfully Recorded!!!',
              text: 'Success',
              showConfirmButton: false,
              timer: 1000
            });
            $('#new_pro_add').val('');
            $('#new_category_add').val('');
            $('#new_auth_no_add').val('');
            $('#new_emp_id_add').val('');
            $('#new_auth_year_add').val('');
            $('#new_date_authorized_add').val('');
            $('#new_expire_date_add').val('');
            $('#new_remarks_add').val('');
            $('#new_fullname_add').val('');
            $('#new_dept_add').val('');
            $('#new_batch_add').val('');
            $('#add_new_autho').modal('hide');
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

  // RENEWAL AUTORIZATION
  document.getElementById("auth_no_add").addEventListener("keyup", e => {
    if (e.which === 13) {
      e.preventDefault();
      get_emp_no_by_auth_no();
    } else {
      document.getElementById("emp_id_add").value = '';
      document.getElementById("fullname_add").value = '';
      document.getElementById("dept_add").value = '';
      document.getElementById("batch_add").value = '';
      document.getElementById("category_add").value = '';
      document.getElementById("process_add").value = '';


    }
  });


  const get_emp_no_by_auth_no = () => {
    var auth_no = document.getElementById('auth_no_add').value;
    $.ajax({
      url: '../../process/import_export/add_emp_pro.php',
      type: 'POST',
      cache: false,
      data: {
        method: 'get_auth_no_by_emp_no',
        auth_no: auth_no
      },
      success: function(response) {
        try {
          let response_array = JSON.parse(response);
          if (response_array.message == 'success') {
            document.getElementById('emp_id_add').value = response_array.emp_id;
            document.getElementById('fullname_add').value = response_array.fullname;
            document.getElementById('dept_add').value = response_array.dept;
            document.getElementById('batch_add').value = response_array.batch;
            document.getElementById("category_add").value = response_array.category;
            document.getElementById("process_add").value = response_array.process;
          } else if (response_array.message == 'Not Found') {
            Swal.fire({
              icon: 'error',
              title: 'Authorization Not Found / Registered',
              text: 'Error',
              showConfirmButton: false,
              timer: 1000
            });
          } else if (response_array.message == 'Process Not Set') {
            Swal.fire({
              icon: 'error',
              title: 'Process Not Set',
              text: 'Error',
              showConfirmButton: false,
              timer: 1000
            });
          } else if (response_array.message == 'Category Not Set') {
            Swal.fire({
              icon: 'error',
              title: 'Category Not Set',
              text: 'Error',
              showConfirmButton: false,
              timer: 1000
            });
          } else {
            console.log(response);
          }
        } catch (e) {
          console.log(response);
        }
      }
    });
  }

  const add_emp_pro = () => {
    var category = document.getElementById('category_add').value;
    var pro = document.getElementById('process_add').value;
    var auth_no = document.getElementById('auth_no_add').value;
    var emp_id = document.getElementById('emp_id_add').value;
    var auth_year = document.getElementById('auth_year_add').value;
    var date_authorized = document.getElementById('date_authorized_add').value;
    var expire_date = document.getElementById('expire_date_add').value;
    var remarks = document.getElementById('remarks_add').value;
    var fullname = document.getElementById('fullname_add').value;
    var dept = document.getElementById('dept_add').value;
    var batch = document.getElementById('batch_add').value;

    if (auth_no == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Authorization No. !!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (emp_id == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Employee Number !!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (fullname == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Employee Number !!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (auth_year == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Authorization No.!!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (date_authorized == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Date Authorization !!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (dept == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Input Department. !!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else if (expire_date == '') {
      Swal.fire({
        icon: 'info',
        title: 'Please Expire Date of Authorization!!!',
        text: 'Information',
        showConfirmButton: false,
        timer: 1000
      });
    } else {
      $.ajax({
        url: '../../process/import_export/add_emp_pro.php',
        type: 'POST',
        cache: false,
        data: {
          method: 'add_emp_pro',
          pro: pro,
          auth_no: auth_no,
          emp_id: emp_id,
          auth_year: auth_year,
          date_authorized: date_authorized,
          expire_date: expire_date,
          remarks: remarks,
          fullname: fullname,
          dept: dept,
          batch: batch,
          category: category

        },
        success: function(response) {
          console.log(response)
          if (response == 'success') {
            Swal.fire({
              icon: 'success',
              title: 'Succesfully Recorded!!!',
              text: 'Success',
              showConfirmButton: false,
              timer: 1000
            });
            $('#add_emp_pro').modal('hide');
            $("#process_add").val('');
            $("#auth_no_add").val('');
            $("#emp_id_add").val('');
            $("#auth_year_add").val('');
            $("#date_authorized_add").val('');
            $("#expire_date_add").val('');
            $("#remarks_add").val('');
            $("#fullname_add").val('');
            $("#dept_add").val('');
            $("#category_add").val('');
            $("#batch_add").val('');
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