<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Visualizar Cadastro</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/styles.css" />

    <style>
        /* Estilos para o layout unificado */
        .main-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        .info-group {
            margin-bottom: 40px;
            padding: 25px;
            background-color: #1a1a1a;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .info-title {
            color: #761069;
            border-bottom: 2px solid #761069;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .data-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .data-table th {
            background-color: #761069;
            color: white;
            padding: 12px;
            text-align: left;
        }

        .data-table td {
            padding: 10px;
            border-bottom: 1px solid #333;
        }

        .input-customizado {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #333;
            border: 1px solid #444;
            color: white;
            border-radius: 4px;
        }

        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #761069;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 20px;
            cursor: pointer;
            display: none;
            z-index: 99;
        }
    </style>
</head>

<body class="w3-black">
    <?php
    include_once '../Model/Usuario.php';
    include_once '../Controller/FormacaoAcadController.php';
    include_once '../Controller/ExperienciaProfissionalController.php';
    include_once '../Controller/OutrasFormacoesController.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    $idUsuario = $_POST['idUsuario'];
    $usuario = new Usuario();
    $usuarioData = $usuario->carregarUsuarioPorID($idUsuario);
    ?>

    <img src="/Agenda12/Img/logoGlobo.png" alt="Logo" style="position: absolute; top: 20px; left: 20px; height: 60px;">

    <div class="main-container">
        <!-- Cabeçalho -->
        <div class="info-group" style="text-align: center; background-color: transparent; box-shadow: none;">
            <h1 style="color: white; font-size: 2rem; margin-bottom: 10px;">VISUALIZAR CADASTRO</h1>
            <h3 style="font-weight: 500; font-size: 1.3rem; color: #676767;">
                Dados completos do usuário:
                <span style="color:rgb(255, 255, 255);"><?php echo $usuarioData->nome; ?></span>
            </h3>
        </div>

        <!-- Dados Pessoais -->
        <div class="info-group">
            <h2 class="info-title">Dados Pessoais</h2>

            <div class="w3-section">
                <label>ID</label>
                <input class="input-customizado" type="text" value="<?php echo $usuarioData->idusuario; ?>" readonly />
            </div>

            <div class="w3-section">
                <label>Nome Completo</label>
                <input class="input-customizado" type="text" value="<?php echo $usuarioData->nome; ?>" readonly />
            </div>

            <div class="w3-section">
                <label>CPF</label>
                <input class="input-customizado" type="text" value="<?php echo $usuarioData->cpf; ?>" readonly />
            </div>

            <div class="w3-section">
                <label>Data de Nascimento</label>
                <input class="input-customizado" type="date" value="<?php echo $usuarioData->dataNascimento; ?>" readonly />
            </div>

            <div class="w3-section">
                <label>Email</label>
                <input class="input-customizado" type="text" value="<?php echo $usuarioData->email; ?>" readonly />
            </div>
        </div>

        <!-- Formação Acadêmica -->
        <div class="info-group">
            <h2 class="info-title">Formações Acadêmicas</h2>

            <div class="data-table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $fCon = new FormacaoAcadController();
                        $results = $fCon->gerarLista($idUsuario);
                        if ($results != null) {
                            while ($row = $results->fetch_object()) {
                                echo '<tr>';
                                echo '<td>' . date('d/m/Y', strtotime($row->inicio)) . '</td>';
                                echo '<td>' . date('d/m/Y', strtotime($row->fim)) . '</td>';
                                echo '<td>' . $row->descricao . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="3" style="text-align: center;">Nenhuma formação acadêmica cadastrada</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Experiência Profissional -->
        <div class="info-group">
            <h2 class="info-title">Experiências Profissionais</h2>

            <div class="data-table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Empresa</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $eCon = new ExperienciaProfissionalController();
                        $results = $eCon->gerarLista($idUsuario);
                        if ($results != null) {
                            while ($row = $results->fetch_object()) {
                                echo '<tr>';
                                echo '<td>' . date('d/m/Y', strtotime($row->inicio)) . '</td>';
                                echo '<td>' . date('d/m/Y', strtotime($row->fim)) . '</td>';
                                echo '<td>' . $row->empresa . '</td>';
                                echo '<td>' . $row->descricao . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="4" style="text-align: center;">Nenhuma experiência profissional cadastrada</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Outras Formações -->
        <div class="info-group">
            <h2 class="info-title">Outras Formações</h2>

            <div class="data-table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $oCon = new OutrasFormacoesController();
                        $results = $oCon->gerarLista($idUsuario);
                        if ($results != null) {
                            while ($row = $results->fetch_object()) {
                                echo '<tr>';
                                echo '<td>' . date('d/m/Y', strtotime($row->inicio)) . '</td>';
                                echo '<td>' . date('d/m/Y', strtotime($row->fim)) . '</td>';
                                echo '<td>' . $row->descricao . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="3" style="text-align: center;">Nenhuma outra formação cadastrada</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Botão Voltar -->
        <div style="text-align: center; margin-top: 30px;">
            <form action="/Agenda12/Controller/navegacao.php" method="post">
                <button name="btnVoltarPA" class="w3-button w3-round-large" style=" width: 15%; background: linear-gradient(to right, #DC1DC3, #761069); color: white;
                border: none; padding: 12px; border-radius: 25px;">
                    <i class="fa fa-arrow-left"></i> Voltar
                </button>
            </form>
        </div>
    </div>

    <button class="back-to-top" title="Voltar ao topo">
        <i class="fa fa-arrow-up"></i>
    </button>

    <script>
        // Mostrar/ocultar botão voltar ao topo
        window.addEventListener('scroll', function() {
            var backToTop = document.querySelector('.back-to-top');
            if (window.pageYOffset > 300) {
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