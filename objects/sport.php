<?php
// 'user' object
class Sport{

	// database connection and table name
	private $conn;
	private $table_name = "sports";

	// object properties
	public $id;
	public $headline;
	public $author;
	public $sport;
	public $link;

	// constructor
	public function __construct($db){
		$this->conn = $db;
	}

	// Read Sports Rows
    function readSports() {
        // query to read all sport records, with limit clause for pagination
		$query = "SELECT * FROM " . $this->table_name;

        // prepare query statement
		$stmt = $this->conn->prepare( $query );

		// execute query
		$stmt->execute();

		// return values
		return $stmt;
    }

	// Get single sport data with id
	function getSportRow() {

		// query to check if email exists
		$query = "SELECT id, headline, author, sport, link
				FROM " . $this->table_name . "
				WHERE id = ?
				LIMIT 0,1";
		// prepare the query
		$stmt = $this->conn->prepare( $query );

		// sanitize
		$this->id=htmlspecialchars(strip_tags($this->id));

		// bind given email value
		$stmt->bindParam(1, $this->id);

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

	// Edit Sport details
	function editSportRow() {

		// sanitize
		$this->headline=htmlspecialchars(strip_tags($this->headline));
		$this->id=htmlspecialchars(strip_tags($this->id));
		$this->author=htmlspecialchars(strip_tags($this->author));
		$this->sport=htmlspecialchars(strip_tags($this->sport));
		$this->link=htmlspecialchars(strip_tags($this->link));

		$sql = "UPDATE " . $this->table_name . " SET headline = '$this->headline', author = '$this->author', sport = '$this->sport', link = '$this->link' WHERE id = '$this->id'";

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
					headline = :headline,
					author = :author,
					sport = :sport,
					link = :link";

		// prepare the query
		$stmt = $this->conn->prepare($query);

		// sanitize
		$this->headline=htmlspecialchars(strip_tags($this->headline));
		$this->author=htmlspecialchars(strip_tags($this->author));
		$this->sport=htmlspecialchars(strip_tags($this->sport));
		$this->link=htmlspecialchars(strip_tags($this->link));

		// bind the values
		$stmt->bindParam(':headline', $this->headline);
		$stmt->bindParam(':author', $this->author);
		$stmt->bindParam(':sport', $this->sport);
		$stmt->bindParam(':link', $this->link);

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