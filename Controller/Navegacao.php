<?php
if (!isset($_SESSION)) {
    session_start();
}

// <!-- Bloco: Tela inicial de login -->
if (empty($_POST)) {
    include_once "View/login.php";
}

// <!-- Bloco: Primeiro acesso - redireciona para criação de conta -->
elseif (isset($_POST["btnPrimeiroAcesso"])) {
    include_once "../View/primeiroAcesso.php";
}

// <!-- Bloco: Cadastro de novo usuário -->
elseif (isset($_POST["btnCadastrar"])) {
    if (empty($_POST["txtCPF"]) || empty($_POST["txtNome"]) || empty($_POST["txtEmail"]) || empty($_POST["txtSenha"])) {
        $_SESSION['erro'] = "Preencha todos os campos para adicionar o cadastro.";
        include_once "../Mensagens/cadastroNaoRealizado.php";
        exit;
    }

    require_once "../Controller/UsuarioController.php";
    $uController = new UsuarioController();
    if ($uController->inserir(
        $_POST["txtNome"],
        $_POST["txtCPF"],
        $_POST["txtEmail"],
        $_POST["txtSenha"]
    )) {
        include_once "../Mensagens/cadastroRealizado.php";
    } else {
        include_once "../Mensagens/cadastroNaoRealizado.php";
    }
}

// <!-- Bloco: Atualização dos dados do usuário -->
elseif (isset($_POST["btnAtualizar"])) {
    require_once "../Controller/UsuarioController.php";
    $uController = new UsuarioController();
    if ($uController->atualizar(
        $_POST["txtID"],
        $_POST["txtNome"],
        $_POST["txtCPF"],
        $_POST["txtEmail"],
        date("Y-m-d", strtotime($_POST["txtData"]))
    )) {
        include_once "../Mensagens/atualizacaoRealizada.php";
    } else {
        include_once "../Mensagens/atualizacaoNaoRealizada.php";
    }
}

// <!-- Bloco: Login do usuário -->
elseif (isset($_POST["btnLogin"])) {
    require_once "../Controller/UsuarioController.php";
    $uController = new UsuarioController();
    if ($uController->login($_POST["txtLogin"], $_POST["txtSenha"])) {
        include_once "../View/principal.php";
    } else {
        include_once "../Mensagens/loginNaoRealizado.php";
    }
}

// <!-- Bloco: Adição de formação acadêmica -->
elseif (isset($_POST["btnAddFormacao"])) {
    if (empty($_POST["txtInicioFA"]) || empty($_POST["txtFimFA"]) || empty($_POST["txtDescFA"])) {
        $_SESSION['erro'] = "Preencha todos os campos para adicionar a formação.";
        include_once "../Mensagens/operacaoNaoRealizada.php";
        exit;
    }

    require_once "../Controller/FormacaoAcadController.php";
    include_once "../Model/Usuario.php";
    $fController = new FormacaoAcadController();
    $usuario = unserialize($_SESSION["Usuario"]);

    if ($fController->inserir(
        date("Y-m-d", strtotime($_POST["txtInicioFA"])),
        date("Y-m-d", strtotime($_POST["txtFimFA"])),
        $_POST["txtDescFA"],
        $usuario->getID()
    )) {
        include_once "../Mensagens/informacaoInserida.php";
    } else {
        include_once "../Mensagens/InformacaoNaoInserida.php";
    }
}

// <!-- Bloco: Exclusão de formação acadêmica -->
elseif (isset($_POST["btnExcluirFA"])) {
    require_once "../Controller/FormacaoAcadController.php";
    include_once "../Model/Usuario.php";
    $fController = new FormacaoAcadController();
    if ($fController->remover($_POST["idF"])) {
        include_once "../Mensagens/informacaoExcluida.php";
    } else {
        include_once "../Mensagens/operacaoNaoRealizada.php";
    }
}

// <!-- Bloco: Adição de experiência profissional -->
elseif (isset($_POST["btnAddExpProf"])) {
    if (empty($_POST["txtInicioEP"]) || empty($_POST["txtFimEP"]) || empty($_POST["txtDescEP"]) || empty($_POST["txtEmpEP"])) {
        $_SESSION['erro'] = "Preencha todos os campos para adicionar a formação.";
        include_once "../Mensagens/operacaoNaoRealizada.php";
        exit;
    }

    require_once "../Controller/ExperienciaProfissionalController.php";
    include_once "../Model/Usuario.php";
    $epController = new ExperienciaProfissionalController();
    if ($epController->inserir(
        date("Y-m-d", strtotime($_POST["txtInicioEP"])),
        date("Y-m-d", strtotime($_POST["txtFimEP"])),
        $_POST["txtEmpEP"],
        $_POST["txtDescEP"],
        unserialize($_SESSION["Usuario"])->getID()
    ) != false) {
        include_once "../Mensagens/informacaoInserida.php";
    } else {
        include_once "../Mensagens/InformacaoNaoInserida.php";
    }
}

// <!-- Bloco: Exclusão de experiência profissional -->
elseif (isset($_POST["btnExcluirEP"])) {
    if (!isset($_POST["idEP"])) {
        die("ID da experiência profissional não foi enviado.");
    }
    require_once "../Controller/ExperienciaProfissionalController.php";
    include_once "../Model/Usuario.php";
    $epController = new ExperienciaProfissionalController();
    if ($epController->remover($_POST["idEP"])) {
        include_once "../Mensagens/informacaoExcluida.php";
    } else {
        include_once "../Mensagens/operacaoNaoRealizada.php";
    }
}

// <!-- Bloco: Adição de outras formações acadêmicas -->
elseif (isset($_POST["btnAddOutFormacao"])) {
    if (empty($_POST["txtInicioOFA"]) || empty($_POST["txtFimOFA"]) || empty($_POST["txtDescOFA"])) {
        $_SESSION['erro'] = "Preencha todos os campos para adicionar a formação.";
        include_once "../Mensagens/operacaoNaoRealizada.php";
        exit;
    }

    require_once "../Controller/OutrasFormacoesController.php";
    include_once "../Model/Usuario.php";
    $ofController = new OutrasFormacoesController();
    $usuario = unserialize($_SESSION["Usuario"]);

    if ($ofController->inserir(
        date("Y-m-d", strtotime($_POST["txtInicioOFA"])),
        date("Y-m-d", strtotime($_POST["txtFimOFA"])),
        $_POST["txtDescOFA"],
        $usuario->getID()
    )) {
        include_once "../Mensagens/informacaoInserida.php";
    } else {
        include_once "../Mensagens/InformacaoNaoInserida.php";
    }
}

// <!-- Bloco: Exclusão de outras formações acadêmicas -->
elseif (isset($_POST["btnExcluirOF"])) {
    require_once "../Controller/OutrasFormacoesController.php";
    include_once "../Model/Usuario.php";
    $ofController = new OutrasFormacoesController();
    if ($ofController->remover($_POST["idOF"])) {
        include_once "../Mensagens/informacaoExcluida.php";
    } else {
        include_once "../Mensagens/operacaoNaoRealizada.php";
    }
}
// <!-- Bloco: Login do administrador -->
if (isset($_POST["btnLoginADM"])) {
    require_once '../Controller/AdministradorController.php';
    $aController = new AdministradorController();
    if ($aController->login($_POST['txtLoginADM'], $_POST['txtSenhaADM'])) {
        include_once '../View/admPrincipal.php';
    }
}

// <!-- Bloco: Acesso à área do administrador -->
if (isset($_POST["btnADM"])) {
    include_once '../View/admLogin.php';
}

// <!-- Bloco: Listagem de usuários cadastrados -->
if (isset($_POST["btnListarCadastrados"])) {
    include_once '../View/admListarCadastrados.php';
}

// <!-- Bloco: Listagem de Adms cadastrados -->
if (isset($_POST["btnListarAdmCadastrados"])) {
    include_once '../View/admListarAdministradores.php';
}

// <!-- Bloco: voltar à área do administrador -->
if (isset($_POST["btnVoltar"])) {
    include_once '../View/admPrincipal.php';
}

// <!-- Bloco: voltar à Painel do administrador -->
if (isset($_POST["btnVoltarPA"])) {
    include_once '../View/admListarCadastrados.php';
}
// Bloco: Visualizar cadastro completo do usuário
elseif (isset($_POST["btnVisualizarUsuario"])) {
    include_once '../View/admVisualizarCadastro.php';
}


