<!-- Score:99 -->
<html>
<head>
<script>
var turn;
var winner;
var button;
var result;
function init() {
	for(var i=1;i<10;i++) {
		var space = document.getElementById("space" + i);
		space.innerHTML = "";
	}
	button = document.getElementById("button")
	result = document.getElementById("result");
	button.value = "Restart";
	winner = "";
	turn = "X";
	result.innerHTML = "";
}
function move(space) {
	if(winner == "") {
		if(space.innerHTML == "") {
			space.innerHTML = turn;
			turn = turn == "X" ? "O" : "X";
		}
		if(hasWon("X")) {
			winner = "X"
			result.innerHTML = "X has won!";
		} else if(hasWon("O")) {
			result.innerHTML = "O has won!";
			winner = "O";
		} else if(isTie()) {
			result.innerHTML = "It is a tie!";
			winner = "-";			
		}
		if(winner != "") button.value = "Play Again";
	}
}
function check3(player, start, step) {
	var result = true;
	for(var i=0;i<3;i++) {
		var space = document.getElementById("space" + (start + (i*step)));
		result = result && (space.innerHTML == player);
	}
	return result;
}
function hasWon(player) {
	for(var i = 1;i<9;i+=3) {	// first, the rows
		if(check3(player,i,1)) return true;
	}
	for(var i = 1;i<4;i++) {	// now the columns
		if(check3(player,i,3)) return true;
	} 	// Now the diagonals
	if(check3(player,1,4)) return true;
	if(check3(player,3,2)) return true;	
	return false;
}
function isTie() {
	var filled = true;
	for(var i=1;i<10;i++) {
		var space = document.getElementById("space" + i);
		filled = filled && (space.innerHTML != "");		
	}
	return (winner != "") ? false : filled;
}
</script>
<style>
#board {
	font-size:80px;
	user-select:none;
	table-layout:fixed;
	text-align:center;
	vertical-align:central;
}
</style>
</head>
<body onLoad="init()">
<table id="board"  border="1px">
<tr>
	<td id="space1" onClick="move(this)" width="100" height="100"></td>
    <td id="space2" onClick="move(this)" width="100" height="100"></td>
    <td id="space3" onClick="move(this)" width="100" height="100"></td>
</tr>
<tr>
	<td id="space4" onClick="move(this)" width="100" height="100"></td>
    <td id="space5" onClick="move(this)" width="100" height="100"></td>
    <td id="space6" onClick="move(this)" width="100" height="100"></td>
</tr>
<tr>
	<td id="space7" onClick="move(this)" width="100" height="100"></td>
    <td id="space8" onClick="move(this)" width="100" height="100"></td>
    <td id="space9" onClick="move(this)" width="100" height="100"></td>
</tr>
</table>
<p id="result"></p><br>
<input type="button" onClick="init()" value="Restrt" id="button">
</body>
</html>
