<?php

class Food {
	function saveFood($orderId, $type, $salad, $sauce, $orderedBy, $comment) {
		$file = file_get_contents('orders/'.$orderId);
		file_put_contents('orders/'.$orderId, $file."\n".$type.';'.$salad.';'.$sauce.';'.htmlspecialchars($comment).';'.htmlspecialchars($orderedBy));
	}

	function getFood($orderId) {
		$file = fopen('orders/'.$orderId, "r");
		$result = [];

		while (!feof($file)) {
			$result[] = fgets($file);
		}

		$order = [];
		$html = "<div class='container'>
		<h1>Danke fürs abholen :3</h1>
			<div class='action'>
				<a href='/'>Bestellen</a>
				<a href=''>Abholen</a>
				<input type='text' value='$orderId' disabled>
			</div>
			<div class='order_container'>
			<h1>Sammelbestellung $orderId</h1>";

		foreach ($result as $row) {
			if ($row!=$result[0]) {
				$new = explode(';', $row); //[0] = Fleisch, [1] = Salatbeilage, [2] = Sauce, [3] = Kommentar, [4] = Besteller

				$order[$new[0]][] = [
					//'base' => $new[0],
					'salad' => $new[1],
					'sauce' => $new[2],
					'comment' => $new[3],
					'orderer' => $new[4],
				];
			}
		}

		//print_r($order);

		$foodcount = 0;
		$currentOrder = "";

		foreach ($order as $key => $value) {
			foreach ($value as $x) {
				$foodcount++;
				$currentOrder.= "<div class='order'>";
				foreach ($x as $i => $j) {
					$currentOrder.= "<div class='$i'>$j</div>";
				}
				$currentOrder.= "</div>";
			}
			$html.= "<h2>$foodcount x $key</h2>";
			$html.= "<div class='$key'>";
			$html.= $currentOrder;
			$html.= "</div>";
			$foodcount = 0;
			$currentOrder = "";
		}
		$html.= "</div>
		</div>";

		echo($html);
		echo('<link rel="stylesheet" href="order.css">');
	}
}

$food = new Food();

if ($_GET['action'] == 'load') {
	$food->getFood($_GET['orderId']);
} else if ($_GET['action'] == 'save') {
	$food->saveFood(
		$_GET['orderId'],
		$_GET['type'],
		$_GET['salad'],
		$_GET['sauce'],
		$_GET['orderedBy'],
		$_GET['comment']
	);
}
