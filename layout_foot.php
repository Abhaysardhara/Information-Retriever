</div>
	<!-- /container -->

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
	//  $(document).ready(function(){
    //     $('#myTable').DataTable();
    // });
	$("#edit_my_sport_form").validate();
	$("#edit_my_edito_form").validate();
	$("#edit_my_trail_form").validate();
	$("#edit_my_tech_form").validate();
	$("#add_my_sport_form").validate();
	$("#add_my_edito_form").validate();
	$("#add_my_trail_form").validate();
	$("#add_my_tech_form").validate();

	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
			return true;
		} else {
			return false;
		}
	}, "Please enter a valid Email.");
	
	$("#register").validate(
		{
			errorClass: "error fail-alert",
			validClass: "valid success-alert",
			rules: {
				"choice[]": { 
					required: true
				},
				"email": {
					required: true,
					validate_email: true
				},
				"contact_number": {
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
				}
			}, 
			messages: { 
				"spam[]": "Please select at least one choice."
			}
		}
	);
	
	function formatDate() {
		var d = new Date(),
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(),
			year = d.getFullYear();

		if (month.length < 2) 
			month = '0' + month;
		if (day.length < 2) 
			day = '0' + day;

		return [year, month, day].join('-');
	}

	document.getElementById("edit_trail_rel").setAttribute("max", formatDate());
	document.getElementById("edit_trail_rel").setAttribute("min", "2019-01-01");
	document.getElementById("add_film_release").setAttribute("max", formatDate());
	document.getElementById("add_film_release").setAttribute("min", "2019-01-01");

	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(1000, function(){
			$(this).remove(); 
		});
	}, 3000);

	$(function(){
		$('.edit1').click(function(e){
			e.preventDefault();
			$('#edit1').modal('show');
			var id = $(this).data('id');
			getRowSport(id);
		});

		$('.edit2').click(function(e){
			e.preventDefault();
			$('#edit2').modal('show');
			var id = $(this).data('id');
			getRowEdito(id);
		});

		$('.edit3').click(function(e){
			e.preventDefault();
			$('#edit3').modal('show');
			var id = $(this).data('id');
			getRowTrail(id);
		});

		$('.edit4').click(function(e){
			e.preventDefault();
			$('#edit4').modal('show');
			var id = $(this).data('id');
			getRowTechno(id);
		});
	});

	function getRowSport(id) {
		$.ajax({
			type: 'POST',
			url: 'sport_row.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				$('.sport_headline_head').html(response.headline);
				$('.sportid').val(response.id);
				$('#edit_sport_headline').val(response.headline);
				$('#edit_sport_author').val(response.author);
				$('#edit_sport_sport').val(response.sport);
				$('#edit_sport_url').val(response.link);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				alert("Status: " + textStatus); alert("Error: " + errorThrown); 
			}
		});
	}

	function getRowEdito(id) {
		$.ajax({
			type: 'POST',
			url: 'edito_row.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				$('.editorial_headline_head').html(response.headline);
				$('.editorialid').val(response.id);
				$('#edit_edit_headline').val(response.headline);
				$('#edit_edit_paper').val(response.paper);
				$('#edit_edit_url').val(response.link);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				alert("Status: " + textStatus); alert("Error: " + errorThrown); 
			}
		});
	}

	function getRowTrail(id) {
		$.ajax({
			type: 'POST',
			url: 'trail_row.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				$('.trailer_title_head').html(response.title);
				$('.trailerid').val(response.trail_id);
				$('#edit_trail_title').val(response.title);
				$('#edit_trail_language').val(response.language);
				$('#edit_trail_desc').val(response.description);
				$('#edit_trail_rel').val(response.date);
				$('#edit_trail_url').val(response.url);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				alert("Status: " + textStatus); alert("Error: " + errorThrown); 
			}
		});
	}

	function getRowTechno(id) {
		$.ajax({
			type: 'POST',
			url: 'techno_row.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				$('.tech_headline_head').html(response.headline);
				$('.techid').val(response.id);
				$('#edit_tech_headline').val(response.headline);
				$('#edit_tech_author').val(response.author);
				$('#edit_tech_category').val(response.category);
				$('#edit_tech_url').val(response.link);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				alert("Status: " + textStatus); alert("Error: " + errorThrown); 
			}
		});
	}
</script>

<!-- end HTML page -->
</body>
</html>