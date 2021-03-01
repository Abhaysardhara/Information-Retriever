</div>
	<!-- /container -->

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
});

$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'user_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.id);
      $('.employee_id').html(response.id);
      $('.del_employee_name').html(response.firstname+' '+response.lastname);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_address').val(response.address);
      $('#edit_contact').val(response.contact_number);
      $('#edit_address').val(response.address);
      $('#edit_email').val(response.email);
      $('#edit_nick').val(response.nick_name);
      $('#edit_level').val(response.access_level);
      $('#edit_type').val(response.user_type);
      $('#edit_status').val(response.status);
    }
  });
}
</script>

<!-- end the HTML page -->
</body>
</html>