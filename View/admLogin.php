<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Administrador</title>
  <link rel="stylesheet" href="../Css/login.css">
</head>

<style>
  input:-webkit-autofill {
  box-shadow: 0 0 0 1000px transparent inset !important;
  -webkit-text-fill-color: white !important;
  transition: background-color 5000s ease-in-out 0s;
}
</style>


<body>
  <!-- Logo no canto superior esquerdo -->
  <img src="/Agenda12/Img/logoGlobo.png" alt="Logo" class="logo">

  <form action="/Agenda12/Controller/Navegacao.php" method="post" class="auth-form register-form">
    <input type="hidden" name="nome_form" value="frmLogin" />

    <h1>Login - ADM</h1>

    <div class="form-group">
      <label for="cpf">CPF</label>
      <input id="cpf" name="txtLoginADM" type="text" placeholder="Digite seu CPF" class="form-control" />
    </div>

    <div class="form-group">
      <label for="senha">Senha</label>
      <input id="senha" name="txtSenhaADM" type="password" placeholder="Digite a Senha" class="form-control" />
    </div>

    <button type="submit" name="btnLoginADM" class="auth-btn register-btn">
      Entrar
    </button>
  </form>

</body>

</html>