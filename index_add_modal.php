<?php
echo "<div class='modal fade' id='addNewSport'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						<span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title'><b><span class='add_sport_head'>Add Sport Entry</span></b></h4>
				</div>
				<div class='modal-body'>
					<form class='form-horizontal' id='add_my_sport_form' method='POST' action='add_new_sport.php'>
					<div class='form-group'>
						<label for='add_sport_headline' class='col-sm-3 control-label'>Headline</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='add_sport_headline' name='add_sport_headline' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='add_sport_author' class='col-sm-3 control-label'>Author</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' pattern='[A-Za-z\s]{2,}' id='add_sport_author' name='add_sport_author' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='add_sport_sport' class='col-sm-3 control-label'>Sport</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' pattern='[A-Za-z]{2,}' id='add_sport_sport' name='add_sport_sport' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='add_sport_url' class='col-sm-3 control-label'>URL</label>

						<div class='col-sm-9'>
						<input type='url' class='form-control' pattern='https?://.+' title='Include http:// or https://' name='add_sport_url' id='add_sport_url' required>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default btn-flat pull-left' data-dismiss='modal'><i class='fa fa-close'></i> Close</button>
					<button type='submit' class='btn btn-primary btn-flat' name='add1'><i class='glyphicon glyphicon-floppy-save'></i> Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>";


    // Editorial
    echo "<div class='modal fade' id='addNewEditorial'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						<span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title'><b><span class='add_edito_head'>Add Editorial Entry</span></b></h4>
				</div>
				<div class='modal-body'>
					<form class='form-horizontal' id='add_my_edito_form' method='POST' action='add_new_editorial.php'>
					<div class='form-group'>
						<label for='add_edito_headline' class='col-sm-3 control-label'>Headline</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='add_edito_headline' name='add_edito_headline' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='add_edito_paper' class='col-sm-3 control-label'>Paper</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='add_edito_paper' name='add_edito_paper' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='add_edito_url' class='col-sm-3 control-label'>URL</label>

						<div class='col-sm-9'>
						<input type='url' class='form-control' pattern='https?://.+' title='Include http:// or https://' id='add_edito_url' name='add_edito_url' required>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default btn-flat pull-left' data-dismiss='modal'><i class='fa fa-close'></i> Close</button>
					<button type='submit' class='btn btn-primary btn-flat' name='add2'><i class='glyphicon glyphicon-floppy-save'></i> Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>";

    // // Trailer
    echo "<div class='modal fade' id='addNewTrailer'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						<span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title'><b><span class='add_trailer_head'>Add Trailer Entry</span></b></h4>
				</div>
				<div class='modal-body'>
					<form class='form-horizontal' id='add_my_trail_form' method='POST' action='add_new_trailer.php'>
						<input type='hidden' class='trailerid' name='id3'>
					<div class='form-group'>
						<label for='add_film_title' class='col-sm-3 control-label'>Title</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='add_film_title' name='add_film_title' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='add_film_language' class='col-sm-3 control-label'>Language</label>

						<div class='col-sm-9'>
						<input type='number' min='1' max='11' class='form-control' id='add_film_language' name='add_film_language' required>
						<div>
							<span>1: English</span>&nbsp;&nbsp;&nbsp;<span>2: Hindi</span>&nbsp;&nbsp;&nbsp;<span>3: Gujarati</span>&nbsp;&nbsp;&nbsp;<span>4: Tamil</span><br>
							<span>5: Marathi</span>&nbsp;&nbsp;&nbsp;<span>6: Bengali</span>&nbsp;&nbsp;&nbsp;<span>7: Kannada</span>&nbsp;&nbsp;&nbsp;<span>8: Malayalam</span><br>
							<span>9: Punjabi</span>&nbsp;&nbsp;&nbsp;<span>10: Telugu</span>&nbsp;&nbsp;&nbsp;<span>11: Urdu</span>
						</div>
						</div>
					</div>
					<div class='form-group'>
						<label for='add_film_description' class='col-sm-3 control-label'>Description</label>

						<div class='col-sm-9'>
						<textarea type='text' class='form-control' id='add_film_description' name='add_film_description' required></textarea>
						</div>
					</div>
					<div class='form-group'>
						<label for='add_film_release' class='col-sm-3 control-label'>Release Date</label>

						<div class='col-sm-9'>
						<input type='date' class='form-control' id='add_film_release' name='add_film_release' required>
						</div>
					</div>
                    <div class='form-group'>
						<label for='add_film_review' class='col-sm-3 control-label'>Review</label>

						<div class='col-sm-9'>
						<input type='number' min='1' max='5' class='form-control' id='add_film_review' name='add_film_review' required>
						</div>
					</div>
                    <div class='form-group'>
						<label for='add_film_url' class='col-sm-3 control-label'>URL</label>

						<div class='col-sm-9'>
						<input type='url' class='form-control' pattern='https?://.+' title='Include http:// or https://' id='add_film_url' name='add_film_url' required>
						</div>
					</div>	
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default btn-flat pull-left' data-dismiss='modal'><i class='fa fa-close'></i> Close</button>
					<button type='submit' class='btn btn-primary btn-flat' name='add3'><i class='glyphicon glyphicon-floppy-save'></i> Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>";


    // Technology
    echo "<div class='modal fade' id='addNewTech'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						<span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title'><b><span class='add_tech_head'>Add New Technology News</span></b></h4>
				</div>
				<div class='modal-body'>
					<form class='form-horizontal' id='add_my_tech_form' method='POST' action='add_new_tech.php'>
					<div class='form-group'>
						<label for='add_tech_headline' class='col-sm-3 control-label'>Headline</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='add_tech_headline' name='add_tech_headline' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='add_tech_author' class='col-sm-3 control-label'>Author</label>

						<div class='col-sm-9'>
						<input type='text' pattern='[A-Za-z\s]{2,}' class='form-control' id='add_tech_author' name='add_tech_author' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='add_tech_category' class='col-sm-3 control-label'>Category</label>

						<div class='col-sm-9'>
						<input type='text' pattern='[A-Za-z\s]{2,}' class='form-control' id='add_tech_category' name='add_tech_category' required>
						</div>
					</div>
					<div class='form-group'>
						<label for='add_tech_url' class='col-sm-3 control-label'>URL</label>

						<div class='col-sm-9'>
						<input type='url' pattern='https?://.+' title='Include http:// or https://' class='form-control' name='add_tech_url' id='add_tech_url' required>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default btn-flat pull-left' data-dismiss='modal'><i class='fa fa-close'></i> Close</button>
					<button type='submit' class='btn btn-primary btn-flat' name='add4'><i class='glyphicon glyphicon-floppy-save'></i> Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>";
?>