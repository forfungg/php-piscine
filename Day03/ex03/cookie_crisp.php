<?php
	function set_cookie() {

	}
	
	function get_cookie() {

	}

	function delete_cookie() {

	}

	foreach ($_GET as $key => $value) {
		$c_data = ['action' => NULL, 'name' => NULL, 'value' => NULL];
		$c_data[$key] = $value;
	}
	if (!$c_data['action'] || !$c_data['name']) {
		echo "Some of the required data is missing\n";
	}
?>