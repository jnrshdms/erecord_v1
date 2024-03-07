<script type="text/javascript" >


 const search_pending =()=>{
  var emp_id = document.getElementById('emp_id_p').value;
  var fullname = document.getElementById('fullname_p').value;
  var category = document.getElementById('category').value;
  console.log(category)
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
    category:category
    
    },success:function(response){
      $('#pending_list').html(response);
      let table_rows = parseInt($("#pending_list tr").length);
      $('#demo').html(table_rows);
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
  //var category = data[10];


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
  //$('#categoryp').val(category);



    console.log()
        view_data();



}

const view_data =()=>{
  var fullname = document.getElementById('employee_name_viewp').value;
  var auth_no = document.getElementById('auth_no_viewp').value;
  var category = document.getElementById('categoryy').value;
  

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

const review =()=>{
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
        method:'review',
        category:category,
        arr:arr
       },success:function(response){
          console.log(response);
          if (response == 'success') {
            Swal.fire({
                    icon: 'success',
                    title: 'Successfully Recorded!!!',
                    text: 'Success',
                    showConfirmButton: false,
                    timer : 1000
                });
             search_pending();
             $('#review').modal('hide');
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