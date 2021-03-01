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
						<input type='text' class='form-control' id='edit_sport_headline' name='sport_headline'>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_sport_author' class='col-sm-3 control-label'>Author</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='edit_sport_author' name='sport_author'>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_sport_sport' class='col-sm-3 control-label'>Sport</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='edit_sport_sport' name='sport_sport'>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_sport_url' class='col-sm-3 control-label'>URL</label>

						<div class='col-sm-9'>
						<textarea class='form-control' name='sport_url' id='edit_sport_url'></textarea>
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
						<input type='text' class='form-control' id='edit_edit_headline' name='edito_headline'>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_edit_paper' class='col-sm-3 control-label'>Paper</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='edit_edit_paper' name='edito_paper'>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_edit_url' class='col-sm-3 control-label'>URL</label>

						<div class='col-sm-9'>
						<textarea type='text' class='form-control' id='edit_edit_url' name='edito_url'></textarea>
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
						<label for='edit_trail_title' class='col-sm-3 control-label'>Title</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='edit_trail_title' name='film_title'>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_trail_language' class='col-sm-3 control-label'>Language</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='edit_trail_language' name='film_language'>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_trail_desc' class='col-sm-3 control-label'>Description</label>

						<div class='col-sm-9'>
						<textarea type='text' class='form-control' id='edit_trail_desc' name='film_description'></textarea>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_trail_rel' class='col-sm-3 control-label'>Release Date</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='edit_trail_rel' name='film_release'>
						</div>
					</div>
                    <div class='form-group'>
						<label for='edit_trail_url' class='col-sm-3 control-label'>URL</label>

						<div class='col-sm-9'>
						<textarea type='text' class='form-control' id='edit_trail_url' name='film_url'></textarea>
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
						<input type='text' class='form-control' id='edit_tech_headline' name='tech_headline'>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_tech_author' class='col-sm-3 control-label'>Author</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='edit_tech_author' name='tech_author'>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_tech_category' class='col-sm-3 control-label'>Category</label>

						<div class='col-sm-9'>
						<input type='text' class='form-control' id='edit_tech_category' name='tech_category'>
						</div>
					</div>
					<div class='form-group'>
						<label for='edit_tech_url' class='col-sm-3 control-label'>URL</label>

						<div class='col-sm-9'>
						<textarea class='form-control' name='tech_url' id='edit_tech_url'></textarea>
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
?>