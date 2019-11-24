<?php
	function tz_list() {
		$zones_array = array();
		$timestamp = time();
		foreach(timezone_identifiers_list() as $key => $zone) {
			date_default_timezone_set($zone);
			$zones_array[$key]['zone'] = $zone;
			//  $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
		}
		return $zones_array;
	}
?>
