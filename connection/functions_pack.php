<?php
$UserTypes = array(1 => "Administrator");

function GetUserType($type_id) {
	global $UserTypes;
	return $UserTypes[$type_id];
}

function jk_website_down_message() {
	return 0;
}

function jk_mysql_datetime() {
	return date('Y-m-d H:i:s');
}

function jk_alert($msg, $submsg = "") {
	$body = file_get_contents(ADMININC . 'mail_templates/website_alert.html');
	$body = stripcslashes($body);
	$body = str_replace("#MESSAGE#", $msg, $body);
	$body = str_replace("#SUBMESSAGE#", $submsg, $body);
	echo $body;
	die();
}

function jk_form_error($msg) {
	return '<div class="alert-msg"><div class="alert alert-danger alert-msg" style="margin-bottom:0px !important">' . $msg . '</div></div>';
}

function jk_form_ok($msg) {
	return '<div class="alert-msg no-print"><div class="alert alert-success" style="margin-bottom: 0px;">' . $msg . '</div></div>';
}

function isMobile() {
	if (isset($_SERVER['HTTP_USER_AGENT']) && !empty($_SERVER['HTTP_USER_AGENT'])) {
		$user_ag = $_SERVER['HTTP_USER_AGENT'];
		return preg_match('/(Mobile|Android|Tablet|GoBrowser|[0-9]x[0-9]*|uZardWeb\/|Mini|Doris\/|Skyfire\/|iPhone|Fennec\/|Maemo|Iris\/|CLDC\-|Mobi\/)/uis', $user_ag);
	}
	return false;
}

function jk_valid_email($email) {
	if (substr_count($email, '@') != 1) return false;
	if ($email[0] == '@') return false;
	if (substr_count($email, '.') < 1) return false;
	if (strpos($email, '..') !== false) return false;

	$length = strlen($email);
	for ($i = 0; $i < $length; $i++) {
		$c = $email[$i];
		if (ctype_alnum($c) || in_array($c, ['@', '.', '_', '-'])) continue;
		return false;
	}

	$TLD = array('COM', 'NET', 'ORG', 'MIL', 'EDU', 'GOV', 'BIZ', 'NAME', 'MOBI', 'INFO', 'AERO', 'JOBS', 'MUSEUM');
	$tld = strtoupper(substr($email, strrpos($email, '.') + 1));
	return (strlen($tld) == 2 || in_array($tld, $TLD));
}

function jk_fix_autonumber($table) {
	global $CN;
	$result = mysqli_query($CN, "SELECT * FROM $table");
	$count = mysqli_num_rows($result);
	$sql = "ALTER TABLE $table AUTO_INCREMENT = $count";
	mysqli_query($CN, $sql);
}

function jk_random_password($length = 7) {
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$pass = '';
	for ($i = 0; $i < $length; $i++) {
		$pass .= $chars[rand(0, strlen($chars) - 1)];
	}
	return $pass;
}

function jk_encrypt_password($str, $len = 20) {
	$new_pword = '';
	if (defined('PASS_SALT_1')) $new_pword .= md5(PASS_SALT_1);
	$new_pword .= md5($str);
	if (defined('PASS_SALT_2')) $new_pword .= md5(PASS_SALT_2);
	return substr($new_pword, strlen($str), $len);
}

function jk_insert_data($tablename, $data) {
	global $CN;
	if (!is_array($data) || $tablename == "") die("jk_insert_data(): Invalid input");

	$result = mysqli_query($CN, "SELECT * FROM $tablename");
	$field_names = array();
	while ($field = mysqli_fetch_field($result)) {
		$field_names[] = $field->name;
	}

	$fields = $values = array();
	foreach ($data as $key => $value) {
		if (in_array($key, $field_names)) {
			$fields[] = $key;
			$values[] = "'" . addslashes(trim($value)) . "'";
		}
	}

	$sql = "INSERT IGNORE INTO $tablename (" . implode(",", $fields) . ") VALUES (" . implode(",", $values) . ")";
	mysqli_query($CN, $sql);
	return mysqli_insert_id($CN);
}

function jk_update_data($tablename, $data, $keyfield, $valueif) {
	global $CN;
	if ($data == "" || $tablename == "" || $keyfield == "" || $valueif == "") die("jk_update_data(): Invalid parameters");

	$result = mysqli_query($CN, "SELECT * FROM $tablename");
	$field_names = array();
	while ($field = mysqli_fetch_field($result)) {
		$field_names[] = $field->name;
	}

	$fields = array();
	foreach ($data as $key => $value) {
		if (in_array($key, $field_names)) {
			$fields[] = "$key='" . addslashes(trim($value)) . "'";
		}
	}

	$sql = "UPDATE $tablename SET " . implode(",", $fields) . " WHERE $keyfield='$valueif'";
	return mysqli_query($CN, $sql);
}

function jk_delete_data($tablename, $keyfield, $keyvalues) {
	global $CN;
	if ($tablename == "" || $keyfield == "" || $keyvalues == "") die("jk_delete_data(): Invalid input");

	$values = is_array($keyvalues) ? array_map(function ($v) { return "'" . $v . "'"; }, $keyvalues) : ["'$keyvalues'"];
	$sql = "DELETE FROM $tablename WHERE $keyfield IN (" . implode(",", $values) . ")";
	mysqli_query($CN, $sql);
	jk_fix_autonumber($tablename);
	return true;
}

function jk_select_data($tablename, $where = "", $fields = "*") {
	global $CN;
	$sql = "SELECT $fields FROM $tablename" . ($where ? " $where" : "");
	$result = mysqli_query($CN, $sql);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = array_map('stripslashes', $row);
	}
	return $data;
}

function cal_hours($hours, $minutes, $seconds) {
	$tot_hr = array_sum($hours);
	$tot_min = array_sum($minutes);
	$tot_ss = array_sum($seconds);

	$tot_min += floor($tot_ss / 60);
	$tot_ss = $tot_ss % 60;

	$tot_hr += floor($tot_min / 60);
	$tot_min = $tot_min % 60;

	return "$tot_hr:$tot_min:$tot_ss";
}
