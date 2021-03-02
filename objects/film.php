<?php
// 'user' object
class Film{

	// database connection and table name
	private $conn;
	private $table_name = "trailers";

	// object properties
	public $trail_id;
	public $title;
	public $language;
	public $description;
	public $date;
	public $url;
    public $review;

	// constructor
	public function __construct($db){
		$this->conn = $db;
	}

    function readTrailers() {
        // query to read all user records, with limit clause for pagination
		$query = "SELECT * FROM " . $this->table_name;

        // prepare query statement
		$stmt = $this->conn->prepare( $query );

		// execute query
		$stmt->execute();

		// return values
		return $stmt;
    }

	// Get single Trailer data with id
	function getTrailerRow() {

		// query to check if email exists
		$query = "SELECT trail_id, title, language, description, date, url
				FROM " . $this->table_name . "
				WHERE trail_id = ?
				LIMIT 0,1";
		// prepare the query
		$stmt = $this->conn->prepare( $query );

		// sanitize
		$this->trail_id=htmlspecialchars(strip_tags($this->trail_id));

		// bind given email value
		$stmt->bindParam(1, $this->trail_id);

		// execute the query
		$stmt->execute();

		// get number of rows
		$num = $stmt->rowCount();

		// if email exists, assign values to object properties for easy access and use for php sessions
		if($num>0){

			// get record details / values
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			return $row;
		}

		// return false if email does not exist in the database
		return "Some Error";
	}

	// Edit Editorial details
	function editTrailerRow() {

		// sanitize
		$this->title=htmlspecialchars(strip_tags($this->title));
		$this->trail_id=htmlspecialchars(strip_tags($this->trail_id));
		$this->language=htmlspecialchars(strip_tags($this->language));
		$this->description=htmlspecialchars(strip_tags($this->description));
		$this->date=htmlspecialchars(strip_tags($this->date));
		$this->url=htmlspecialchars(strip_tags($this->url));

		$sql = "UPDATE " . $this->table_name . " SET title = '" . addslashes($this->title) . "', language = '$this->language', description = '" . addslashes($this->description) . "', date = '$this->date', url = '$this->url' WHERE trail_id = '$this->trail_id'";

		// prepare the query
		$stmt = $this->conn->prepare( $sql );

		// execute the query, also check if query was successful
		if($stmt->execute()){
			return true;
		}
		else{
			$this->showError($stmt);
			return false;
		}
	}

	// create new Sport record
	function create(){

		// insert query
		$query = "INSERT INTO
					" . $this->table_name . "
				SET
					title = :title,
					language = :language,
					description = :description,
					date = :date,
					review = :review,
					url = :url";

		// prepare the query
		$stmt = $this->conn->prepare($query);

		// sanitize
		$this->title=htmlspecialchars(strip_tags($this->title));
		$this->language=htmlspecialchars(strip_tags($this->language));
		$this->description=htmlspecialchars(strip_tags($this->description));
		$this->date=htmlspecialchars(strip_tags($this->date));
		$this->review=htmlspecialchars(strip_tags($this->review));
		$this->url=htmlspecialchars(strip_tags($this->url));

		// bind the values
		$stmt->bindParam(':title', $this->title);
		$stmt->bindParam(':language', $this->language);
		$stmt->bindParam(':description', $this->description);
		$stmt->bindParam(':date', $this->date);
		$stmt->bindParam(':review', $this->review);
		$stmt->bindParam(':url', $this->url);

		// execute the query, also check if query was successful
		if($stmt->execute()){
			return true;
		}
		else{
			$this->showError($stmt);
			return false;
		}
	}
}

?>