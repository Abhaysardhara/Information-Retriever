<?php
// 'user' object
class Choice {

	// database connection and table name
	private $conn;
	private $table_name = "user_choice";

	// object properties
    public $id;
	public $sport_r;
	public $sport_w;
	public $editorial_r;
	public $editorial_w;
	public $trailer_r;
    public $trailer_w;
    public $tech_r;
    public $tech_w;

	// constructor
	public function __construct($db){
		$this->conn = $db;
	}

    function insertChoiceReg() {
        // insert query
		$query = "INSERT INTO
                " . $this->table_name . "
            SET
                id = :id,
                sport_r = :sport_r,
                editorial_r = :editorial_r,
                trailer_r = :trailer_r,
                tech_r = :tech_r";

        // prepare the query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->sport_r=htmlspecialchars(strip_tags($this->sport_r));
        $this->editorial_r=htmlspecialchars(strip_tags($this->editorial_r));
        $this->trailer_r=htmlspecialchars(strip_tags($this->trailer_r));
        $this->tech_r=htmlspecialchars(strip_tags($this->tech_r));

        // bind the values
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':sport_r', $this->sport_r);
        $stmt->bindParam(':editorial_r', $this->editorial_r);
        $stmt->bindParam(':trailer_r', $this->trailer_r);
        $stmt->bindParam(':tech_r', $this->tech_r);

        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }
        else{
            $this->showError($stmt);
            return false;
        }
    }

    // Get User choice after login
	function getUserChoice($login_id) {

		// query to check if email exists
		$query = "SELECT sport_r, sport_w, editorial_r, editorial_w, 
				trailer_r, trailer_w, tech_r, tech_w
				FROM " . $this->table_name . "
				WHERE id = ?
				LIMIT 0,1";
		// prepare the query
		$stmt = $this->conn->prepare( $query );

		// sanitize
		$this->id=htmlspecialchars(strip_tags($this->id));

		// bind given email value
		$stmt->bindParam(1, $login_id);

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
}

?>