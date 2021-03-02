<?php
echo "<div class='modal fade' id='edit1'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						<span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title'><b><span class='sport_headline_head'></span></b></h4>
				</div>
				<div class='modal-body'>
					<form class='form-horizontal' method='POST' action='sport_update.php'>
						<input type='hidden' class='sportid' name='id1'>
					<div class='form-group'>
						<label for='edit_sport_headline' class='col-sm-3 control-label'>Headline</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='edit_sport_headline' name='sport_headline' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_sport_author' class='col-sm-3 control-label'>Author</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' pattern='[A-Za-z0-9]{2,}' id='edit_sport_author' name='sport_author' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_sport_sport' class='col-sm-3 control-label'>Sport</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' pattern='[A-Za-z]{2,}' id='edit_sport_sport' name='sport_sport' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_sport_url' class='col-sm-3 control-label'>URL</label>

						<div class='col-sm-9'>
						<input type='url' class='form-control' pattern='https?://.+' title='Include http:// or https://' name='sport_url' id='edit_sport_url' required>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default btn-flat pull-left' data-dismiss='modal'><i class='fa fa-close'></i> Close</button>
					<button type='submit' class='btn btn-success btn-flat' name='edit1'><i class='fa fa-check-square-o'></i> Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>";


    // Editorial
    echo "<div class='modal fade' id='edit2'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						<span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title'><b><span class='editorial_headline_head'></span></b></h4>
				</div>
				<div class='modal-body'>
					<form class='form-horizontal' method='POST' action='editorial_update.php'>
						<input type='hidden' class='editorialid' name='id2'>
					<div class='form-group'>
						<label for='edit_edit_headline' class='col-sm-3 control-label'>Headline</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='edit_edit_headline' name='edito_headline' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_edit_paper' class='col-sm-3 control-label'>Paper</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='edit_edit_paper' name='edito_paper' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_edit_url' class='col-sm-3 control-label'>URL</label>

						<div class='col-sm-9'>
						<input type='url' class='form-control' pattern='https?://.+' title='Include http:// or https://' id='edit_edit_url' name='edito_url' required>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default btn-flat pull-left' data-dismiss='modal'><i class='fa fa-close'></i> Close</button>
					<button type='submit' class='btn btn-success btn-flat' name='edit2'><i class='fa fa-check-square-o'></i> Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>";

    // Trailer
    echo "<div class='modal fade' id='edit3'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						<span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title'><b><span class='trailer_title_head'></span></b></h4>
				</div>
				<div class='modal-body'>
					<form class='form-horizontal' method='POST' action='trailer_update.php'>
						<input type='hidden' class='trailerid' name='id3'>
					<div class='form-group'>
						<label for='edit_trail_title' class='col-sm-3 control-label' required>Title</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='edit_trail_title' name='film_title'>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_trail_language' class='col-sm-3 control-label'>Language</label>

						<div class='col-sm-9'>
						<input type='number' min='1' max='11' class='form-control' id='edit_trail_language' name='film_language' required>
						<div>
							<span>1: English</span>&nbsp;&nbsp;&nbsp;<span>2: Hindi</span>&nbsp;&nbsp;&nbsp;<span>3: Gujarati</span>&nbsp;&nbsp;&nbsp;<span>4: Tamil</span><br>
							<span>5: Marathi</span>&nbsp;&nbsp;&nbsp;<span>6: Bengali</span>&nbsp;&nbsp;&nbsp;<span>7: Kannada</span>&nbsp;&nbsp;&nbsp;<span>8: Malayalam</span><br>
							<span>9: Punjabi</span>&nbsp;&nbsp;&nbsp;<span>10: Telugu</span>&nbsp;&nbsp;&nbsp;<span>11: Urdu</span>
						</div>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_trail_desc' class='col-sm-3 control-label'>Description</label>

						<div class='col-sm-9'>
						<textarea type='text' class='form-control' id='edit_trail_desc' name='film_description' required></textarea>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_trail_rel' class='col-sm-3 control-label'>Release Date</label>

						<div class='col-sm-9'>
						<input type='date' class='form-control' id='edit_trail_rel' name='film_release' required>
						</div>
					</div>
                    <div class='form-group'>
						<label for='edit_trail_url' class='col-sm-3 control-label'>URL</label>

						<div class='col-sm-9'>
						<input type='url' class='form-control' pattern='https?://.+' title='Include http:// or https://' id='edit_trail_url' name='film_url' required>
						</div>
					</div>	
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default btn-flat pull-left' data-dismiss='modal'><i class='fa fa-close'></i> Close</button>
					<button type='submit' class='btn btn-success btn-flat' name='edit3'><i class='fa fa-check-square-o'></i> Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>";


    // Technology
    echo "<div class='modal fade' id='edit4'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						<span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title'><b><span class='tech_headline_head'></span></b></h4>
				</div>
				<div class='modal-body'>
					<form class='form-horizontal' method='POST' action='techno_update.php'>
						<input type='hidden' class='techid' name='tech_id'>
					<div class='form-group'>
						<label for='edit_tech_headline' class='col-sm-3 control-label'>Headline</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='edit_tech_headline' name='tech_headline' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_tech_author' class='col-sm-3 control-label'>Author</label>

						<div class='col-sm-9'>
						<input type='text' pattern='[A-Za-z]{2,}' class='form-control' id='edit_tech_author' name='tech_author' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_tech_category' class='col-sm-3 control-label'>Category</label>

						<div class='col-sm-9'>
						<input type='text' pattern='[A-Za-z]{2,}' class='form-control' id='edit_tech_category' name='tech_category' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_tech_url' class='col-sm-3 control-label'>URL</label>

						<div class='col-sm-9'>
						<input type='url' pattern='https?://.+' title='Include http:// or https://' class='form-control' name='tech_url' id='edit_tech_url' required>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default btn-flat pull-left' data-dismiss='modal'><i class='fa fa-close'></i> Close</button>
					<button type='submit' class='btn btn-success btn-flat' name='edit4'><i class='fa fa-check-square-o'></i> Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>";

	// <select class='form-control' id='sel1'>
	// 	<option value='1'>English</option>
	// 	<option value='2'>Hindi</option>
	// 	<option value='3'>Gujarati</option>
	// 	<option value='4'>Tamil</option>
	// 	<option value='5'>Marathi</option>
	// 	<option value='6'>Bengali</option>	
	// 	<option value='7'>Kannada</option>
	// 	<option value='8'>Malayalam</option>
	// 	<option value='9'>Punjabi</option>
	// 	<option value='10'>Telugu</option>
	// 	<option value='11'>Urdu</option>
	// </select>
?>