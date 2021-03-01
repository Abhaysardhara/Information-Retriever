<?php
// 'user' object
class Editorial {

	// database connection and table name
	private $conn;
	private $table_name = "editorial";

	// object properties
	public $id;
	public $headline;
	public $paper;
	public $link;
    public $date;

	// constructor
	public function __construct($db){
		$this->conn = $db;
	}

    function readEditorial() {
        // query to read all user records, with limit clause for pagination
		$query = "SELECT * FROM " . $this->table_name;

        // prepare query statement
		$stmt = $this->conn->prepare( $query );

		// execute query
		$stmt->execute();

		// return values
		return $stmt;
    }

	// Get single Editorial data with id
	function getEditorialRow() {

		// query to check if email exists
		$query = "SELECT id, headline, paper, link
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

	// Edit Editorial details
	function editEditorialRow() {

		// sanitize
		$this->headline=htmlspecialchars(strip_tags($this->headline));
		$this->id=htmlspecialchars(strip_tags($this->id));
		$this->paper=htmlspecialchars(strip_tags($this->paper));
		$this->link=htmlspecialchars(strip_tags($this->link));

		$sql = "UPDATE " . $this->table_name . " SET headline = '$this->headline', paper = '$this->paper', link = '$this->link' WHERE id = '$this->id'";

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
}

?>