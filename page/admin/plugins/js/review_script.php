<script type="text/javascript" >


 const search_rev =()=>{
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
    method:'fetch_category',
    emp_id:emp_id,
    fullname:fullname,
    category:category
    
    },success:function(response){
      $('#rev_list').html(response);
      let table_rows = parseInt($("#rev_list tr").length);
      $('#demoo').html(table_rows);
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


const approve =()=>{
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
        method:'approve',
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
              search_rev();
              $('#approve').modal('hide');
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


const disapprove =()=>{
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
        method:'disapprove',
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
             search_rev();
             $('#approve').modal('hide');
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