<?php
function check_username_by_table($tablename, $email)
{
	global $con;

	$sql = "SELECT * FROM $tablename WHERE email='$email' LIMIT 1";

	$result = mysqli_query($con, $sql);

	return (mysqli_num_rows($result) > 0) ? true : false;
}
function get_field($table)
{
	global $con;
	$field = array();
	$sql = "SHOW COLUMNS FROM $table";
	$result = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$field[] = $row['Field'];
	}

	return $field;
}
function insertion($table, $data = array())
{
	global $con;
	foreach ($data as $key => $value) {
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
function get_all($table)
{
	global $con;
	$sql = "SELECT * from $table";
	$result = mysqli_query($con, $sql);
	return (mysqli_num_rows($result) > 0) ? $result : 0;
}
function get_by_id($table, $tableid, $id)
{
	global $con;
	$sql = "SELECT * FROM $table WHERE $tableid='$id' LIMIT 1";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		return mysqli_fetch_array($result);
	} else {
		return 0;
	}
}
function get_by_any($table, $tableid, $id)
{
	global $con;
	$sql = "SELECT * FROM $table WHERE $tableid='$id'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		return $result;
	} else {
		return 0;
	}
}
function deletion($table, $tableid, $id)
{
	global $con;
	$returndata = get_by_id($table, $tableid, $id);
	$sql = "DELETE FROM $table WHERE $tableid='$id'";
	if (!mysqli_query($con, $sql)) {
		echo "Error: " . $sql . "<br />" . mysqli_error($con);
		exit;
	}
	return $returndata;
}
function updation($table, $tableid, $id, $data = array())
{
	global $con;
	foreach ($data as $key => $value) {
		if (is_string($value)) {
			$data[$key] = mysqli_real_escape_string($con, $value);
		}
	}

	$field = get_field($table);
	$att = array();
	foreach ($data as $key => $value) {
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
function get_num_rows($table)
{
	global $con;
	$sql = "SELECT * FROM $table";
	$result = mysqli_query($con, $sql);
	return mysqli_num_rows($result);
}
function upload_image($imageName, $outputFolder)
{
	$target_path = "../" . basename($_FILES[$imageName]['name']);
	$image_temp_name = (!empty($_FILES[$imageName]["tmp_name"])) ? $_FILES[$imageName]["tmp_name"] : "../index.php";
	if ((!empty($image_tmp_name)) && (getimagesize($image_tmp_name == false))) $error_message = "Uploaded file is not a image or Too large file !";
	if (getimagesize($_FILES[$imageName]["tmp_name"]) == false) $error_message = "Uploaded file is not a image";
	if ($_FILES[$imageName]["size"] > 2000000) $error_message = "Uploaded file must be less than 2M";

	if (isset($error_message) && strlen($error_message) > 0) {
		exit($error_message);
		return false;
	} else {
		if (move_uploaded_file($_FILES[$imageName]['tmp_name'], $target_path)) {
			if (!file_exists($outputFolder)) mkdir($outputFolder, 0777, true);
			$file = basename($_FILES[$imageName]['name']);
			rename($target_path, $outputFolder . $file);
			return $file;
		} else {
			exit('Error Uploading File ');
			return false;
		}
	}
}
