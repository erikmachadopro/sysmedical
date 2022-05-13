<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>SYS MEDICAL</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" href="css/login.css">

	<!--REFERENCIA PARA O FAVICON -->
	<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon/favicon2.ico" type="image/x-icon">

</head>
<body>
	<div class="login-form">
		<form action="" method="post">
			<div class="logo">
				<img src="img/logo.jpg" alt="Sys Medical">
			</div>
			<h2 class="text-center">
				Entre no Sistema
			</h2>
			<div class="form-group">
				<input class="form-control" type="email" name="usuario" placeholder="Insira seu Email" required autofocus>
			</div>
			<div class="form-group">
				<input class="form-control" type="password" name="senha" placeholder="Insira sua senha" required>
			</div>
			<div class="form-group">
				<button class="btn btn-primary btn-lg btn-block" type="submit" name="btn-login">LOGIN</button>	
			</div>
			<div class="clearfix">
				<label class="float-left checkbox-inline">
					<input type="checkbox">
					Lembrar-me
				</label>
				<a href="#" class="float-right">Recuperar Senha</a>
			</div>
		</form>
	</div>
</body>
</html>