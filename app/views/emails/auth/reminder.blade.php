<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Reestablecer Contraseña</h2>

		<div>
			Para reestablecer su contraseña, complete el siguiente formulario :  {{ URL::to('password/reset', array($token)) }}.
		</div>
	</body>
</html>
