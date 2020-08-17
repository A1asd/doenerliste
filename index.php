<html>
	<head>
		<title>Dönerliste</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="container">
			<h1>Dönerliste v0.0</h1>
			<div class='action'>
				<a href='#'>Bestellen</a>
				<a href='Food.php?action=load&orderId=asd'>Abholen</a>
			</div>
			<form id="donerForm">
				<h4>Fleisch</h4>
				<input type="radio" id="cow" name="typeSelect" checked>
				<label for="cow">Babykuh</label>
				<input type="radio" id="chicken" name="typeSelect">
				<label for="chicken">Hühnchen</label>
				<input type="radio" id="falafel" name="typeSelect">
				<label for="falafel">Falafel</label>		    
				
				<h4>Salate</h4>
				<input type="button" id="selectAllSalad" value="Alles auswählen" onclick="selectSalads('all');">
				<input type="button" id="deselectAllSalad" value="Auswahl aufheben" onclick="selectSalads('none');">
				<br>
				<input type="checkbox" class="salads" id="salad"><label for="salad">Salat</label>
				<input type="checkbox" class="salads" id="tomato"><label for="tomato">Tomate</label>
				<input type="checkbox" class="salads" id="cucumber"><label for="cucumber">Gurke</label>
				<input type="checkbox" class="salads" id="onion"><label for="onion">Zwiebel</label>
				<input type="checkbox" class="salads" id="cabbage"><label for="cabbage">Rotkohl</label>
				<input type="checkbox" class="salads" id="pickle"><label for="pickle">Eingelegte Gurke</label>
				<input type="checkbox" class="salads" id="pepperoni"><label for="pepperoni">Peperoni</label>
				<input type="checkbox" class="salads" id="feta"><label for="feta">Schafskäse</label>

				<h4>Saucen</h4>
				<input type="checkbox" class="sauces" id="cocktail"><label for="cocktail">Cocktail</label>
				<input type="checkbox" class="sauces" id="tzatziki"><label for="tzatziki">Tzatziki</label>
				<input type="checkbox" class="sauces" id="hotsauce"><label for="hotsauce">Scharf</label>

				<h4>Bestellende</h4>
				<input type="text" id="orderedBy" placeholder="Wer bestellt?">
				<input type="text" id="orderId" placeholder="Bestellcode">
				<br>
				<textarea id="comment" placeholder="Kommentar"></textarea>
				<br>
				<input value="Diesen Döner verbindlich bestellen!" type="button" id="submitButton">
			</form>
		</div>
		<script src="list.js"></script>
	</body>
</html>