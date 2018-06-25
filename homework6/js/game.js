function startGame() {
	turns = 1;
	document.turn = "X";
	document.winner = null;
	var squares = document.getElementsByClassName("square");
	for (var i = 0; i < squares.length; ++i) {
    	squares[i].innerText = "";
    	squares[i].style.color = "black";
	}
	setMessage(document.turn + " starts first!");
}

function setMessage(msg) {
	document.getElementById("message").innerText = msg;
}

function nextTurn(square) {
	if (document.winner != null) {
		setMessage(document.winner + " already won the game.");
	} else if (square.innerText === "") {
		square.innerText = document.turn;
		if(switchTurn()) {
			setTimeout(AIPlayer, 1000); // wait 1 second before executing AIPlayer()
		}
	} else {
		setMessage("This field is already used.")
	}
}

// AI (Autistic intelligence)
function AIPlayer() {
	var availSquares = getAvailableSquares();
	var squareNumber = availSquares[Math.floor(Math.random() * availSquares.length)];
	document.getElementById(String(squareNumber)).innerText = document.turn;
	switchTurn();
}

function getAvailableSquares() {
	var available = [];
	for (var i = 1; i <= 9; ++i) {
		var square = document.getElementById(String(i)).innerText;
		if (square === "") {
			available.push(String(i));
		}
	}
	return available;
}

function switchTurn() {
	var anotherTurn = true;
	if (checkForWinner(document.turn)) {
		setMessage(document.turn + " won!");
		document.winner = document.turn;
		anotherTurn = false;
	} else if (turns == 9) {
		setMessage("Draw!");
		anotherTurn = false;
	}
	else if (document.turn === "X") {
		document.turn = "O";
		setMessage(document.turn + "'s turn!");
		turns += 1;
	} else {
		document.turn = "X";
		setMessage(document.turn + "'s turn!");
		turns += 1;
	}
	return anotherTurn;
}

function checkForWinner(sign) {
	var result = false;
	if (checkRow(1, 2, 3, sign) || 
		checkRow(4, 5, 6, sign) || 
		checkRow(7, 8, 9, sign) || 
		checkRow(1, 4, 7, sign) || 
		checkRow(2, 5, 8, sign) || 
		checkRow(3, 6, 9, sign) || 
		checkRow(1, 5, 9, sign) ||
		checkRow(3, 5, 7, sign)) {
		result = true;
	}
	return result;
}

function checkRow(a, b, c, sign) {
	var result = false;
	if (getBox(a) === sign && getBox(b) === sign && getBox(c) === sign) {
		document.getElementById(a).style.color = "red";
		document.getElementById(b).style.color = "red";
		document.getElementById(c).style.color = "red";
		result = true;
	}
	return result;
}

function getBox(number) {
	return document.getElementById(number).innerText;
}