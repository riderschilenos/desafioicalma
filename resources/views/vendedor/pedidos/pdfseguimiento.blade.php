<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Informe con imagen de fondo</title>
	<style>
		body {
			background-image: url('{{Storage::url($pedido->image->url)}}');
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>
<body>
	<!-- Aquí puedes agregar el contenido de tu informe
	<h1>Título del informe</h1>
	<p>Contenido del informe...</p> -->
</body>
</html>