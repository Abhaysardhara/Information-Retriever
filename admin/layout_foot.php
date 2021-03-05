</div>
	<!-- /container -->

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>

jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
			return true;
		} else {
			return false;
		}
}, "Please enter a valid Email.");
	
$("#add_user_admin").validate(
  {
    errorClass: "error fail-alert",
    validClass: "valid success-alert",
    rules: {
      "email": {
        required: true,
        validate_email: true
      },
      "contact": {
        required: true,
        number: true,
        minlength: 10,
        maxlength: 10
      },
      "password": {
        required: true,
        minlength: 8
      },
      "nick_name": {
        required: true,
        minlength: 2
      },
      "address": {
        required: true,
        minlength: 5
      },
      "nick_name": {
        required: true,
        minlength: 2
      },
      "firstname": {
        required: true,
        minlength: 2
      },
      "lastname": {
        required: true,
        minlength: 2
      },
      "read[]": { 
        required: true
      }
    }
  }
);

$("#edit_user_admin").validate(
  {
    errorClass: "error fail-alert",
    validClass: "valid success-alert",
    rules: {
      "email": {
        required: true,
        validate_email: true
      },
      "contact": {
        required: true,
        number: true,
        minlength: 10,
        maxlength: 10
      },
      "nick_name": {
        required: true,
        minlength: 2
      },
      "address": {
        required: true,
        minlength: 5
      },
      "nick_name": {
        required: true,
        minlength: 2
      },
      "firstname": {
        required: true,
        minlength: 2
      },
      "lastname": {
        required: true,
        minlength: 2
      }
    }
  }
);

window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(1000, function(){
			$(this).remove(); 
		});
	}, 3000);

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
      $('.employee_id').html(response.firstname+' '+response.lastname+' - '+response.access_level);
      $('.del_employee_name').html(response.firstname+' '+response.lastname);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_address').val(response.address);
      $('#edit_contact').val(response.contact_number);
      $('#edit_address').val(response.address);
      $('#edit_email').val(response.email);
      $('#edit_nick').val(response.nick_name);
      if(response.access_level == "Admin") {
        $("#radio1").prop("checked", true);
      }
      else {
        $("#radio2").prop("checked", true);
      }
      if(response.status == 1) {
        $("#edit_status1").prop("checked", true);
      }
      else {
        $("#edit_status2").prop("checked", true);
      }
      if(response.sport_r == 1) {
        $("#read_s").prop("checked", true);
      }
      else {
        $("#read_s").prop("checked", false);
      }
      if(response.editorial_r == 1) {
        $("#read_e").prop("checked", true);
      }
      else {
        $("#read_e").prop("checked", false);
      }
      if(response.trailer_r == 1) {
        $("#read_tr").prop("checked", true);
      }
      else {
        $("#read_tr").prop("checked", false);
      }
      if(response.tech_r == 1) {
        $("#read_te").prop("checked", true);
      }
      else {
        $("#read_te").prop("checked", false);
      }
      if(response.sport_w == 1) {
        $("#write_s").prop("checked", true);
      }
      else {
        $("#write_s").prop("checked", false);
      }
      if(response.editorial_w == 1) {
        $("#write_e").prop("checked", true);
      }
      else {
        $("#write_e").prop("checked", false);
      }
      if(response.trailer_w == 1) {
        $("#write_tr").prop("checked", true);
      }
      else {
        $("#write_tr").prop("checked", false);
      }
      if(response.tech_w == 1) {
        $("#write_te").prop("checked", true);
      }
      else {
        $("#write_te").prop("checked", false);
      }
    }
  });
}
</script>

<!-- end the HTML page -->
</body>
</html>