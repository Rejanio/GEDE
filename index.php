<!DOCTYPE html>
<html>
    <head>
        
        <link rel="icon" type="image/ico" href="imagens/favicon.ico" />

        <meta charset="UTF-8">

        <title>Gerenciador de Dados Educacionais</title>
        <link rel="stylesheet" type="text/css" href="css/estiloLogin.css"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">


    </head>
    <body>

        <div id="areaLogin">

            <form method="post" action="login.php">
                <img id="logo" src="imagens/logo.png" width="140" alt="logo"/>
                <br>
                <br>
                <p>&nbsp;&nbsp;&nbsp Gerenciador de Dados Educacionais</p>
                <br>
                <p>Usuário: <input type="text" class="form-control" id="iUsuario" name="nUsuario" placeholder=""></p>
                <p>Senha: &nbsp;&nbsp;&nbsp;<input type="password" class="form-control" id="iSenha" name="nSenha" placeholder=""></p>
                <br>
                <button type="submit" class="btn btn-primary">Entrar</button>

            </form>

        </div>    

    </body>
</html>
