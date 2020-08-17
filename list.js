document.getElementById('submitButton').addEventListener('click', function submit() {
	var types = [], salads = [], sauces = [];

	types = getCheckedElementsFromName('typeSelect');
	salads = getCheckedElementsFromClass('salads');
	sauces = getCheckedElementsFromClass('sauces');
	orderId = document.getElementById('orderId').value;
	orderedBy = document.getElementById('orderedBy').value;
	comment = document.getElementById('comment').value;
	action = 'save';

	var type = [];
	var salad = [];
	var sauce = [];

	for (let element of types){
		type.push(element.nextSibling.nextSibling.textContent);
	}
	type.join(', ');
	for(let element of salads){
		salad.push(element.nextSibling.textContent);
	}
	salad.join(', ');
	for(let element of sauces){
		sauce.push(element.nextSibling.textContent);
	}
	sauce.join(', ');

	alert('Du möchtest einen Döner mit '+type+", als Salatbeilage: "+salad+" und "+sauce);
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			var response = ajax.responseText;
		}
	};
	console.log('sending');
	ajax.open('GET', 
		'/Food.php?orderId='+orderId+
		'&type='+type+
		'&salad='+salad+
		'&sauce='+sauce+
		'&orderedBy='+orderedBy+
		'&comment='+comment+
		'&action='+action,
		true);
	ajax.send();
});

function getCheckedElementsFromName(label) {
	var allElements = [];
	for (let element of document.getElementsByName(label)) {
		if (element.checked) {
			allElements.push(element);
		}
	}
	return allElements;
}

function getCheckedElementsFromClass(label) {
	var allElements = [];
	for (let element of document.getElementsByClassName(label)) {
		if (element.checked) {
			allElements.push(element);
		}
	}
	return allElements;
}

function selectSalads(selection) {
	var defaultSelection = ['salad', 'tomato', 'cucumber', 'onion', 'cabbage', 'pickle', 'pepperoni', 'feta'];
	if (selection==='all') {
		defaultSelection.forEach(function(element) {
			document.getElementById(element).checked = true;
		});
	} else if (selection==='none') {
		defaultSelection.forEach(function(element) {
			document.getElementById(element).checked = false;
		});
	} else {
		selection.forEach(function(element) {
			document.getElementById(element).checked = true;
		});
	}
}

function updateUrl(button) {
	var code = button.value;
	button.parentNode.children[1].href = "Food.php?action=load&orderId="+code;
}
