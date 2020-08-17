<?php

class List {
	function buildList($orderId) {
		$file = fopen('orders/'.$orderId, "r");
		$result = [];
		while (!feof($file)) {
			$result[] = fgets($file);
		}
		foreach ($result as $row) {
			print_r(explode(';', $row));
		}
	}
}
