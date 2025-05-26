<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Oxi</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/styles.css" />
    <link rel="stylesheet" href="../Css/navigation.css" />
    <link rel="stylesheet" href="../Css/sections.css" />
    <link rel="stylesheet" href="../Css/forms.css" />
    <link rel="stylesheet" href="../Css/cards.css" />
</head>

<body class="w3-black">
    <?php
    include_once '../Model/Usuario.php';
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once '../Controller/FormacaoAcadController.php';
    include_once '../Controller/ExperienciaProfissionalController.php';
    include_once '../Controller/OutrasFormacoesController.php';
    ?>

    <!-- Menu fixo no topo -->
    <nav class="topnav">
        <a href="#home" class="logo-link">
            <img src="/Agenda12/img/LogoGLobo.png" alt="Logo" class="nav-logo" />
        </a>
        <a href="#home">Inicio</a>
        <a href="#dPessoais">Dados Pessoais</a>
        <a href="#formacao">Formação Acad.</a>
        <a href="#expProf">Exp. Profissional</a>
        <a href="#Outformacao">Outras Formações</a>
    </nav>

    <!-- Seção Home -->
    <section id="home" class="main-section">
        <div class="home-container">
            <div class="home-header">
                <h1 class="main-title">SISTEMA DE CURRÍCULOS</h1>
                <h3 class="subtitle" style="font-weight: 500; font-size: 1.3rem; font-weight: bold; color: #676767;">
                    O melhor site de sistema de currículo de
                    <span style="background-color: #761069; color: white; padding: 2px 8px; border-radius: 4px; margin-left: 4px;">Todos!</span>
                </h3>
            </div>

            <div class="cards-container">
                <!-- Card 1 -->
                <div class="card card-gray">
                    <div class="card-header">100% GRATUITO!</div>
                    <img src="/Agenda12/img/Lapis.png" alt="Lápis" class="card-icon-pencil" />
                    <p class="card-text">Nada de pagar pra conseguir PDF. Aqui é sem pegadinhas, tudo liberado!</p>
                </div>

                <!-- Card 2 -->
                <div class="card card-purple">
                    <div class="card-header">FACIL DE USAR!</div>
                    <img src="/Agenda12/img/Certo.png" alt="Certo" class="card-icon-check" />
                    <p class="card-text">Interface intuitiva, rápida e sem complicações. Você cria seu currículo em minutos, sem precisar ser um expert</p>
                </div>

                <!-- Card 3 -->
                <div class="card card-gray-2">
                    <div class="card-header">CURRICULOS PROFISSIONAIS</div>
                    <img src="/Agenda12/img/5Estrelas.png" alt="Estrelas" class="card-icon-stars" />
                    <p class="card-text">Modelos criados com base nas exigências de recrutadores. Visual limpo, direto ao ponto e impactante.</p>
                </div>

                <a href="#dPessoais" class="down-arrow">
                    <i class="fa fa-chevron-down"></i>
                </a>

            </div>

    </section>

    <!-- Dados Pessoais - Esquerda -->
    <section id="dPessoais" class="form-section left-form">
        <div class="form-content">
            <h1 class="section-title">Dados Pessoais</h1>
            <h3 class="section-subtitle">Atualize aqui seus  <span style="color:rgb(255, 255, 255);"> dados pessoais! </span> </h3>

            <form action="/Agenda12/Controller/Navegacao.php" method="post">
                <div class="w3-section">
                    <label>ID</label>
                    <input class="input-customizado" type="text" name="txtID" value="<?php echo unserialize($_SESSION['Usuario'])->getID(); ?>" />
                </div>

                <div class="w3-section">
                    <label>Nome Completo</label>
                    <input class="input-customizado" name="txtNome" type="text" value="<?php echo unserialize($_SESSION['Usuario'])->getNome(); ?>" />
                </div>

                <div class="w3-section">
                    <label>CPF</label>
                    <input class="input-customizado" name="txtCPF" type="text" placeholder="CPF - 33333333333" value="<?php echo unserialize($_SESSION['Usuario'])->getCPF(); ?>" />
                </div>

                <div class="w3-section">
                    <label>Data de Nascimento</label>
                    <input class="input-customizado" name="txtData" type="date" value="<?php echo unserialize($_SESSION['Usuario'])->getDataNascimento(); ?>" />
                </div>

                <div class="w3-section">
                    <label>Email</label>
                    <input class="input-customizado" name="txtEmail" type="text" value="<?php echo unserialize($_SESSION['Usuario'])->getEmail(); ?>" />
                </div>

                <div class="w3-section w3-center">
                    <button class="w3-button w3-padding32 w3-round-large form-button" name="btnAtualizar" type="submit">
                        <i class="fa fa-refresh w3-margin-right"></i> Atualizar Cadastro
                    </button>
                </div>
            </form>
        </div>
        <div class="spacer"></div>
    </section>

    <!-- Formação Acadêmica - Direita -->
    <section id="formacao" class="form-section right-form">



        <div class="form-content">
            <h1 class="section-title">Formações Academicas</h1>
            <h3 class="section-subtitle">Você tem o  <span style="color:rgb(255, 255, 255);"> ensino médio </span> completo? Se sim coloque!</h3>

            <form action="/Agenda12/Controller/Navegacao.php" method="post">
                <div class="w3-row w3-section">
                    <div class="w3-half">
                        <label>Data Inicial</label>
                        <input class="input-customizado" name="txtInicioFA" type="date" />
                    </div>
                    <div class="w3-half">
                        <label>Data Final</label>
                        <input class="input-customizado" name="txtFimFA" type="date" />
                    </div>
                </div>

                <div class="w3-section">
                    <label>Descrição</label>
                    <input class="input-customizado" name="txtDescFA" type="text" placeholder="Ex.: Técnico em Desenvolvimento de Sistemas - Centro Paula Souza" />
                </div>

                <div class="w3-row w3-section w3-center">
                    <button name="btnAddFormacao" class="w3-button w3-round-large form-button">
                        <i class="fa fa-user-plus"></i> Adicionar Formação
                    </button>
                </div>
            </form>

            <!-- Tabela -->
            <div class="data-table-container">
                <table class="data-table w3-centered">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                            <th>Apagar</th>
                        </tr>
                    </thead>
                    <?php
                    $fCon = new FormacaoAcadController();
                    $results = $fCon->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                    if ($results != null)
                        while ($row = $results->fetch_object()) {
                            echo '<tr>';
                            echo '<td style="width: 20%;">' . $row->inicio . '</td>';
                            echo '<td style="width: 20%;">' . $row->fim . '</td>';
                            echo '<td style="width: 65%;">' . $row->descricao . '</td>';
                            echo '<td style="width: 5%;"> 
                    <form action="/Agenda12/Controller/Navegacao.php" method="post">
                    <input type="hidden" name="idF" value="' . $row->idformacaoAcademica . '">
                    <button name="btnExcluirFA" class="w3-button w3-white w3-cell w3-round-large">
                    <i class="fa fa-user-times"></i></button>
                    </form></td>';
                            echo '</tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
        <div class="spacer"></div>
    </section>

    <!-- Experiência Profissional - Esquerda -->
    <section id="expProf" class="form-section left-form">


        <div class="form-content">
            <h1 class="section-title">Exp. Profissionais</h1>
            <h3 class="section-subtitle">Ja trabalhou em Empresas? Se sim diga para nós as suas <span style="color:rgb(255, 255, 255);"> experiencias!</span></h3>

            <form action="/Agenda12/Controller/Navegacao.php" method="post">
                <div class="w3-row w3-section">
                    <div class="w3-half">
                        <label>Data Inicial</label>
                        <input class="input-customizado" name="txtInicioEP" type="date" />
                    </div>
                    <div class="w3-half">
                        <label>Data Final</label>
                        <input class="input-customizado" name="txtFimEP" type="date" />
                    </div>
                </div>

                <div class="w3-section">
                    <label>Empresa</label>
                    <input class="input-customizado" name="txtEmpEP" type="text" placeholder="Ex.: Tecnologia Ltda." />
                </div>

                <div class="w3-section">
                    <label>Descrição</label>
                    <input class="input-customizado" name="txtDescEP" type="text" placeholder="Ex.: Programador Júnior na Empresa X" />
                </div>

                <div class="w3-row w3-section w3-center">
                    <button name="btnAddExpProf" class="w3-button w3-round-large form-button">
                        <i class="fa fa-user-plus"></i> Adicionar Experiência
                    </button>
                </div>
            </form>

            <!-- Tabela -->
            <div class="data-table-container">
                <table class="data-table w3-centered">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Empresa</th>
                            <th>Descrição</th>
                            <th>Apagar</th>
                        </tr>
                    </thead>
                    <?php
                    $eCon = new ExperienciaProfissionalController();
                    $results = $eCon->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                    if ($results != null)
                        while ($row = $results->fetch_object()) {
                            echo '<tr>';
                            echo '<td style="width: 20%;">' . $row->inicio . '</td>';
                            echo '<td style="width: 20%;">' . $row->fim . '</td>';
                            echo '<td style="width: 20%;">' . $row->empresa . '</td>';
                            echo '<td style="width: 35%;">' . $row->descricao . '</td>';
                            echo '<td style="width: 5%;"> 
                    <form action="/Agenda12/Controller/Navegacao.php" method="post">
                    <input type="hidden" name="idEP" value="' . $row->idexperienciaprofissional . '">
                    <button name="btnExcluirEP" class="w3-button w3-block w3-white w3-cell w3-round-large">
                    <i class="fa fa-user-times"></i> </button> </td>
                    </form>';
                            echo '</tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
        <div class="spacer"></div>
    </section>

    <!-- Outras Formações - Direita -->
    <section id="Outformacao" class="form-section right-form">

        <div class="form-content">
            <h1 class="section-title">Outras Formações</h1>
            <h3 class="section-subtitle">Uuh, tem mais habilidades? coloque seus <span style="color:rgb(255, 255, 255);"> conhecimentos! </span></h3>

            <form action="/Agenda12/Controller/Navegacao.php" method="post">
                <div class="w3-row w3-section">
                    <div class="w3-half">
                        <label>Data Inicial</label>
                        <input class="input-customizado" name="txtInicioOF" type="date" />
                    </div>
                    <div class="w3-half">
                        <label>Data Final</label>
                        <input class="input-customizado" name="txtFimOF" type="date" />
                    </div>
                </div>

                <div class="w3-section">
                    <label>Descrição</label>
                    <input class="input-customizado" name="txtDescOF" type="text" placeholder="Ex.: Curso de Inglês - Cultura Inglesa" />
                </div>

                <div class="w3-row w3-section w3-center">
                    <button name="btnAddOutFormacao" class="w3-button w3-round-large form-button">
                        <i class="fa fa-user-plus"></i> Adicionar Outra Formação
                    </button>
                </div>
            </form>

            <!-- Tabela -->
            <div class="data-table-container">
                <table class="data-table w3-centered">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                            <th>Apagar</th>
                        </tr>
                    </thead>
                    <?php
                    $oCon = new OutrasFormacoesController();
                    $results = $oCon->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                    if ($results != null)
                        while ($row = $results->fetch_object()) {
                            echo '<tr>';
                            echo '<td style="width: 20%;">' . $row->inicio . '</td>';
                            echo '<td style="width: 20%;">' . $row->fim . '</td>';
                            echo '<td style="width: 65%;">' . $row->descricao . '</td>';
                            echo '<td style="width: 5%;"> 
                    <form action="/Agenda12/Controller/Navegacao.php" method="post">
                    <input type="hidden" name="idOF" value="' . $row->idoutrasformacoes . '">
                    <button name="btnExcluirOF" class="w3-button w3-block w3-white w3-cell w3-round-large">
                    <i class="fa fa-user-times"></i> </button> </td>
                    </form>';
                            echo '</tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
        <div class="spacer"></div>
    </section>
    <button class="back-to-top" title="Voltar ao topo">
        <i class="fa fa-arrow-up"></i>
    </button>

    <script>
        // Mostrar/ocultar botão voltar ao topo
        window.addEventListener('scroll', function() {
            var backToTop = document.querySelector('.back-to-top');
            if (window.pageYOffset > window.innerHeight) {
                backToTop.style.display = 'block';
            } else {
                backToTop.style.display = 'none';
            }
        });

        // Voltar ao topo suavemente
        document.querySelector('.back-to-top').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

</body>

</html>