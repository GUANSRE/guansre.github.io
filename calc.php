<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script>

	let proses1 = '', ubah = true, deg = false;

	function faktorial(n){

		if (Math.floor(n) != n || n < 0) throw 1;

		let fak = 1;

		for (let i = 2; i <= n; i++) fak *= i;

		return fak;

	}

	function gas(){

		try {

			proses1 = eval(proses1);

			document.getElementById('terakhir').innerHTML = document.getElementById('hasil').innerHTML + ' = ' + proses1;

			document.getElementById('hasil').innerHTML = (typeof(proses1) == 'number') ? proses1 : 'Error dek';

		} catch(err) {

			document.getElementById('hasil').innerHTML = 'Error dek<br>' + err.message;

		}		

	}

	function hapus(){

		proses1 = proses1.substr(0, proses1.length - 1);

		let a = document.getElementById('hasil').innerHTML;

		document.getElementById('hasil').innerHTML = a.substr(0, a.length - 1)

	}

	function inputA(data1, data2){

		prosesA(data1);

		showInputA(data2);

	}

	function inputB(data1, data2){

		if (deg){

			prosesA(data1 + 'Math.PI/180*(');

			showInputA(data2 + '(');

		} else {

			prosesA(data1);

			showInputA(data2);

		}

	}

	function prosesA(data){

		if ((data == document.getElementById('kuKiri').innerHTML) && (+proses1[proses1.length - 1] == 'number')){

			proses1 += '*(';

		} else {

			proses1 += `${data}`;

		}

	}

	function showInputA(data){

		let x = document.getElementById('hasil').innerHTML;

		let y = document.getElementById('kali').innerHTML;

		if (x == '0' && data != '.'){

			if (data != 'fak') document.getElementById('hasil').innerHTML = `${data}`;

			else document.getElementById('hasil').innerHTML = 'faktorial(';

		}

		else if (x[x.length - 1] == y && x[x.length - 1] == data) document.getElementById('hasil').innerHTML = x.substr(0, x.length - 1) + '^';

		else if (data == 'fak') document.getElementById('hasil').innerHTML += 'faktorial(';

		else document.getElementById('hasil').innerHTML += `${data}`;

	}	

	function ubahSatuan(satuan1){

		document.getElementById('satuan').innerHTML = satuan1;

		let x = document.getElementById('rad'), y = document.getElementById('deg');

		if (satuan1 == 'deg') {

			deg = true;

			x.style.display = 'none';

			y.style.display = 'table-cell';

		} else {

			deg = false;

			y.style.display = 'none';

			x.style.display = 'table-cell';

		}

	}

	function ulang(){

		proses1 = '';

		document.getElementById('hasil').innerHTML = '0';

	}

	function tes(){

		let op1Elemen = document.querySelectorAll('.op1');

		let op2Elemen = document.querySelectorAll('.op2');

		if (ubah){

			op1Elemen.forEach(function(element) {element.style.display = 'none'});

			op2Elemen.forEach(function(element) {element.style.display = 'table-cell'});		 

			ubah = false;

		} else {

			op1Elemen.forEach(function(element) {element.style.display = 'table-cell'});

			op2Elemen.forEach(function(element) {element.style.display = 'none'});

			ubah = true;

		}

	}

	alert("Masih tahap pengembangan\nSangat menerima perbaikan dan masukan");

	alert("Fungsi trigonometri menggunakan kurung tutup dua kali untuk satuan derajat(deg)");

	alert("Sebelum mencari nilai faktorial, gunakan fungsi fak terlebih dahulu");

</script>

<style>

	table {

		border: 5px solid red;

		border-collapse: collapse;

		width: 90%

	}

	td {

		text-align: center;

		border: 1px solid black;

		height: 70px;

		font-size: 40px;

		background-color: rgba(43,45,43,0.3);

		width : 25%;

	}

	.op1 {

		display: table-cell;

	}

	.op2 {

		display: none;

	}

	#hasil {

		background-color: rgba(43,45,43,0);

		border: none;

		color: black;

		height: 40px;

		font-size: 25px;

		text-align: right;

		padding-right: 25px;

		width: 90%;

	}

	#hasil1 {

		border: none;

		height: 40px;

	}

	#satuan {

		border: none;

		font-size: 15px;

		height: 30px;

		padding-left: 15%;

		text-align: left;

	}

	#terakhir {

		background-color: rgba(43,45,43,0);

		border: none;

		font-size: 17px;

		height: 30px;

		padding-right: 5px;

		text-align: right;

		width: 95%;

	}

	#terakhir1 {

		border: none;

		height: 30px;

		padding-right: 3px;

		text-align: right;

	}

</style>

</head>

<body>

	<table align='center'>

		<caption style="font-size: 50px">Kalkulator Irgi</caption>

		<caption style="caption-side: bottom"><h3>Made in Ruang Irgi</h3></caption>

		<tr>

			<td id='satuan' colspan='4'>rad</td>

		</tr><tr>

			<td id='hasil1' colspan='4'><textarea id='hasil' disabled>0</textarea></td>

		</tr><tr>

			<td id='terakhir1' colspan='4'><textarea id='terakhir' disabled>0</textarea></td>

		</tr><tr>

			<td id='rad'   onclick='ubahSatuan("deg")'>deg</td><td id='deg' style='display: none' onclick='ubahSatuan("rad")'>rad</td>

			<td id='other' onclick='tes()'>2nd</td>

			<td onclick='hapus()'>&#x232B</td>

			<td onclick="ulang()">AC</td>

		</tr><tr>

			<td id='a1' class='op1'	onclick="inputA(1, 1)">1</td><td class='op2' id='sin' 	onclick="inputB('Math.sin(', 'sin(')">sin</td>

			<td id='a2' class='op1'	onclick="inputA(2, 2)">2</td><td class='op2' id='cos'	onclick="inputB('Math.cos(', 'cos(')">cos</td>

			<td id='a3' class='op1'	onclick="inputA(3, 3)">3</td><td class='op2' id='tan'	onclick="inputB('Math.tan(', 'tan(')">tan</td>

			<td id='kali' 	onclick="inputA('*', '&#215')">&#215</td>

		</tr><tr>

			<td id='a4' class='op1'	onclick="inputA(4, 4)">4</td><td class='op2' id='asin' onclick="inputA('Math.asin(', 'arc sin(')">sin<sup>-1</sup></td>

			<td id='a5' class='op1'	onclick="inputA(5, 5)">5</td><td class='op2' id='acos' onclick="inputA('Math.acos(', 'arc cos(')">cos<sup>-1</sup></td>

			<td id='a6' class='op1'	onclick="inputA(6, 6)">6</td><td class='op2' id='atan' onclick="inputA('Math.atan(', 'arc tan(')">tan<sup>-1</sup></td>

			<td id='bagi' 			onclick="inputA('/', '/')">/</td>

		</tr><tr>

			<td id='a7' class='op1'	onclick="inputA(7, 7)">7</td><td class='op2' id='exp' onclick="inputA('Math.exp(', 'exp(')">e<sup>x</sup></td>

			<td id='a8' class='op1'	onclick="inputA(8, 8)">8</td><td class='op2' id='ln' onclick="inputA('Math.log(', 'ln(')">ln</td>

			<td id='a9' class='op1'	onclick="inputA(9, 9)">9</td><td class='op2' id='mod' onclick="inputA('%(', 'mod(')">mod</td>

			<td id='tambah' 		onclick="inputA('+', '+')">+</td>

		</tr><tr>

			<td id='minus' 	class='op1'	onclick="inputA('-', '-')">&plusmn</td>	<td class='op2' id='pi' onclick="inputA('Math.PI', '&#x03C0')">&#x03C0</td>

			<td id='a0' 	class='op1'	onclick="inputA(0, 0)">0</td>			<td class='op2' id='panduan' style="font-size: 20px" onclick="alert('nyusul')">Guide</td>

			<td id='koma' 	class='op1'	onclick="inputA('.', '.')">.</td>		<td class='op2' id='fk' onclick="inputA('faktorial(', 'fak')">fak</td>

			<td id='kurang' onclick="inputA('-', '-')">-</td>

		</tr><tr>

			<td id='kuKiri'  onclick="inputA('(', '(')">(</td>

			<td id='kuKanan' onclick="inputA(')', ')')">)</td>

			<td id='pangkat' onclick="inputA('**', '^')">^</td>

			<td 			 onclick="gas()">=</td>

		</tr>

	</table>

</body>

</html>
