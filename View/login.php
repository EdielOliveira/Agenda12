<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Enlatados Juarez</title>
  <link rel="stylesheet" href="../Agenda12/Css/login.css">
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

    <h1>Login</h1>

    <div class="form-group">
      <label for="cpf">CPF</label>
      <input id="cpf" name="txtLogin" type="text" placeholder="Digite seu CPF" class="form-control" />
    </div>

    <div class="form-group">
      <label for="senha">Senha</label>
      <input id="senha" name="txtSenha" type="password" placeholder="Digite a Senha" class="form-control" />
    </div>

    <p class="auth-link">
      Não tem uma conta?
      <a href="/Agenda12/View/primeiroAcesso.php">Clique aqui</a>
      para cadastrar
    </p>

    <button type="submit" name="btnLogin" class="auth-btn register-btn" 
    style="width: 40%; padding: 10px; margin: 15px;">
      Entrar
    </button>

    <p class="auth-link" style="margin-top: 0px;" name= "btnADM">
      <a href="/Agenda12/View/admLogin.php">Login Como Administrador</a>
    </p>
  </form>

  

</body>

</html>