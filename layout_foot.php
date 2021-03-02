</div>
	<!-- /container -->

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
	//  $(document).ready(function(){
    //     $('#myTable').DataTable();
    // });

	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(1000, function(){
			$(this).remove(); 
		});
	}, 3000);

	// (function() {
	// 	const form = document.getElementById('#register');
	// 	const checkboxes = form.querySelector('input[type=checkbox]');
	// 	const checkboxLength = checkboxes.length;
	// 	const firstCheckbox = checkboxLength > 0 ? checkboxes[0] : null;

	// 	function init() {
	// 		if (firstCheckbox) {
	// 			for (let i = 0; i < checkboxLength; i++) {
	// 				checkboxes[i].addEventListener('change', checkValidity);
	// 			}

	// 			checkValidity();
	// 		}
	// 	}

	// 	function isChecked() {
	// 		for (let i = 0; i < checkboxLength; i++) {
	// 			if (checkboxes[i].checked) return true;
	// 		}

	// 		return false;
	// 	}

	// 	function checkValidity() {
	// 		const errorMessage = !isChecked() ? 'At least one checkbox must be selected.' : '';
	// 		firstCheckbox.setCustomValidity(errorMessage);
	// 	}

	// 	init();
	// })();

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