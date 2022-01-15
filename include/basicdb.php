<?php
function check_username_by_table($tablename, $email){
	global $con;
	
	$sql="SELECT * FROM $tablename WHERE email='$email' LIMIT 1";

	$result=mysqli_query($con,$sql);

	return (mysqli_num_rows($result)>0)? true: false;
}
function get_field($table){
	global $con;
	$field = array();
	$sql = "SHOW COLUMNS FROM $table";
	$result = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$field[] = $row['Field'];
	}

	return $field;
}
function insertion($table, $data = array()){
	global $con;
	foreach($data as $key => $value) {
		if (is_string($value)) {
			$data[$key] = mysqli_real_escape_string($con, $value);
		}
	}

	$sql = "INSERT INTO $table VALUES ('" . join("', '", $data) . "');";
	if (!mysqli_query($con, $sql)) {
		echo "Error: " . $sql . "<br />" . mysqli_error($con);
		exit;
	}

	return mysqli_insert_id($con);
}
function get_all($table){
	global $con;
	$sql = "SELECT * from $table";
	$result = mysqli_query($con, $sql);
	return (mysqli_num_rows($result) > 0) ? $result : 0;
}
function get_by_id($table, $tableid, $id){
	global $con;
	$sql = "SELECT * FROM $table WHERE $tableid='$id' LIMIT 1";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		return mysqli_fetch_array($result);
	}else {
		return 0;
	}
}
function get_by_any($table, $tableid, $id){
	global $con;
	$sql = "SELECT * FROM $table WHERE $tableid='$id'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		return $result;
	}
	else {
		return 0;
	}
}
function deletion($table, $tableid, $id){
	global $con;
	$returndata = get_by_id($table, $tableid, $id);
	$sql = "DELETE FROM $table WHERE $tableid='$id'";
	if (!mysqli_query($con, $sql)) {
		echo "Error: " . $sql . "<br />" . mysqli_error($con);
		exit;
	}
	return $returndata;
}
function updation($table, $tableid, $id, $data = array()){
	global $con;
	foreach($data as $key => $value) {
		if (is_string($value)) {
			$data[$key] = mysqli_real_escape_string($con, $value);
		}
	}

	$field = get_field($table);
	$att = array();
	foreach($data as $key => $value) {
		if ($value !== null) {
			$temp = $field[$key];
			$att[] = "{$temp}='{$value}'";
		}
	}

	$sql = "UPDATE $table SET " . join(", ", $att) . " where  $tableid='$id';";
	if (!mysqli_query($con, $sql)) {
		echo "Error: " . $sql . "<br />" . mysqli_error($con);
		exit;
	}

	return $id;
}
function get_num_rows($table){
	global $con;
	$sql = "SELECT * FROM $table";
	$result = mysqli_query($con, $sql);
	return mysqli_num_rows($result);
}
?>