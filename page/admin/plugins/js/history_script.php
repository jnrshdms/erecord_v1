<script type="text/javascript" >


 const search_history =()=>{
  var emp_id = document.getElementById('emp_id_h').value;
  var fullname = document.getElementById('fullname_h').value;
  var category = document.getElementById('categoryyy').value;
  console.log(category)
   if (category == 'Category') {
    category = '';
  }
  $.ajax({
    url:'../../process/can_request/history.php',
    type:'POST',
    cache:false,
    data:{
    method:'fetch_category',
    emp_id:emp_id,
    fullname:fullname,
    category:category
    
    },success:function(response){
      $('#history_list').html(response);
      let table_rows = parseInt($("#history_list tr").length);
      $('#demooo').html(table_rows);
    }
  });
}





  
</script>