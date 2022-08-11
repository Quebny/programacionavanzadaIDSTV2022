<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="
	width=device-width,
	initial-scale=1"
	<title>
	<style type ="text/css">
		canvas{
			background-color: rgb(250,250,250);
		}
	</style>
	</title>
</head
<body>
	<canvas id="mycanvas" width="500" height="500">
		Tu navegador no soporta canvas
	</canvas>

	<script type ="text/javascript">

	var cv = document.getElementById('mycanvas');
	var ctx = cv.getContext('2d');

	//cuadrados
	ctx.fillStyle = "rgb(100,120,200)";
	ctx.fillRect(10,10,65,65);

	ctx.fillStyle = "rgb(200,0,0)";
	ctx.fillRect(60,60,65,65);

	ctx.fillStyle ="rgba(220,0,200,0.5)";
	ctx.fillRect(110,110,65,65);

	//lineas
	ctx.moveTo(340,20);
	ctx.lineTo(140,300);
	ctx.stroke();

	//triangulo
	ctx.fillStyle="rgb(20,50,120)";

	ctx.moveTo(150,20);
	ctx.lineTo(300,20);
	ctx.lineTo(70,300);
	ctx.fill();

	//circulos
	ctx.fillStyle="red";
	ctx.strokeStyle="red";

	ctx.beginPath();
	ctx.arc(400,70,50,0,2*Math.PI);
	ctx.stroke();

	ctx.beginPath();
	ctx.arc(525,70,50,0,2*Math.PI);
	ctx.fill();

	//texto
	ctx.fillStyle="blue";
	ctx.strokeStyle="blue";
	
	ctx.font = "30px Arial";
	ctx.fillText("Kevin Lizárraga B)",180,150);
	ctx.strokeText("Kevin Lizárraga B)",180,200);

	</script>
</body>
</html>
