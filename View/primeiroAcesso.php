<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Primeiro Acesso - Enlatados Juarez</title>
  <link rel="stylesheet" href="../Css/login.css">
</head>

<body>
  <!-- Logo no canto superior esquerdo -->
  <img src="/Agenda12/Img/logoGlobo.png" alt="Logo" class="logo">

  <form action="/Agenda12/Controller/Navegacao.php" method="post" class="auth-form register-form">
    <input type="hidden" name="nome_form" value="frmPrimeiroAcesso" />

    <h2>CADASTRAR</h2>

    <!-- Nome -->
    <div class="form-group">
      <label for="nome">Nome Completo</label>
      <input id="nome" name="txtNome" type="text" placeholder="Digite seu nome" class="form-control" />
    </div>

    <!-- CPF -->
    <div class="form-group">
      <label for="cpf">CPF</label>
      <input id="cpf" name="txtCPF" type="text" placeholder="33333333333" class="form-control" />
    </div>

    <!-- Email -->
    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" name="txtEmail" type="email" placeholder="Digite seu email" class="form-control" />
    </div>

    <!-- Senha -->
    <div class="form-group">
      <label for="senha">Senha</label>
      <input id="senha" name="txtSenha" type="password" placeholder="Digite sua senha" class="form-control" />
    </div>

    <p class="auth-link">
      Já possui uma conta?
      <a href="/Agenda12/index.php">Clique aqui</a>
      para entrar.
    </p>

    <!-- Botão -->
    <button type="submit" name="btnCadastrar" class="auth-btn register-btn" style="width: 50%; padding: 10px; margin: 15px;">
      Criar Cadastro
    </button>
  </form>

</body>

</html>