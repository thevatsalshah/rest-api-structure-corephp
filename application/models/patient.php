<?php

class Patient extends Model {

    function insert_patient($data) {
	$columns = implode(", ", array_keys($data));
	$escaped_values = array_map('mysql_real_escape_string', array_values($data));
	$values = implode("', '", $escaped_values);
	$query = "INSERT INTO Patient ($columns) VALUES ('$values')";
	$res = mysql_query($query);

	if ($res) {
	    return array(
		"success" => "1",
		"message" => "Patient Inserted successfully",
	    );
	} else {

	    return array(
		"success" => "0",
		"message" => "Patient Not Inseted",
	    );
	}
    }

    function update_patient($data) {



	$userID = mysql_real_escape_string($data['userID']);
	$name = mysql_real_escape_string($data['name']);
	$gender = mysql_real_escape_string($data['gender']);
	$dateofbirth = mysql_real_escape_string($data['dateofbirth']);
	$address = mysql_real_escape_string($data['address']);
	$phoneno = mysql_real_escape_string($data['phoneno']);
	$status = mysql_real_escape_string($data['status']);
	$id = intval($data['patientID']);


	$sql = "UPDATE Patient SET userID='$userID', name='$name', gender='$gender', dateofbirth='$dateofbirth', address  ='$address', phoneno='$phoneno', status='$status' WHERE patientID=$id";
	$result = mysql_query($sql);
	if ($result) {
	    return array(
		"success" => "1",
		"message" => "Patient Updated successfully",
	    );
	} else {

	    return array(
		"success" => "0",
		"message" => "Patient Not Updated",
	    );
	}
    }

    function delete_patient($data) {
	$id = intval($data['patientID']);


	$sql = "Delete from Patient WHERE patientID=$id";
	$result = mysql_query($sql);
	if ($result) {
	    return array(
		"success" => "1",
		"message" => "Patient Deleted successfully",
	    );
	} else {

	    return array(
		"success" => "0",
		"message" => "Patient Not Deleted",
	    );
	}
    }

    function get_patient($id) {


	$sql = "Select * from Patient ";
	if ($id > 0) {
	    $sql .= "Where patientID=$id";
	}
	$sql .= " Order by patientID desc";

	$result = mysql_query($sql);

	$rows = array();
	while($r = mysql_fetch_assoc($result)) {
	    $rows[] = $r;
	}
	return json_encode($rows);
    }

}
