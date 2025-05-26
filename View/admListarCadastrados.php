<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Css/navigation.css" />
    <link rel="stylesheet" href="../Css/sections.css" />
    <link rel="stylesheet" href="../Css/forms.css" />
    <title>Usuários Cadastrados</title>
</head>

<body class="w3-black">

    <?php
    include_once '../Model/Usuario.php';
    include_once '../Controller/UsuarioController.php';
    if (!isset($_SESSION)) {
        session_start();
    }
    ?>

    <img src="/Agenda12/Img/logoGlobo.png" alt="Logo" style="position: absolute; top: 20px; left: 20px; height: 60px;">

    <!-- Seção Home -->
    <section id="home" class="main-section">
        <div class="home-container">
            <div class="home-header">
                <h1 class="main-title">SISTEMA DE CURRÍCULOS</h1>
                <h3 class="subtitle" style="font-weight: 500; font-size: 1.3rem; font-weight: bold; color: #676767; text-align: center;">Lista de Usuários Cadastrados
                    no
                    <span style="background-color: #761069; color: white; padding: 2px 8px; border-radius: 4px; margin-left: 4px;">Sistema.</span>
                </h3>
            </div>

            <div class="data-table-container">
                <table class="data-table w3-centered">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Visualizar</th>
                        </tr>
                    </thead>
                    <?php
                    $usuario = new Usuario();
                    $results = $usuario->listaCadastrados();
                    if ($results != null) {
                        while ($row = $results->fetch_object()) {
                            echo '<tr>';
                            echo '<td style="width: 1%;">' . $row->idusuario . '</td>';
                            echo '<td style="width: 50%;">' . $row->nome . '</td>';
                            echo '<td style="width: 10%;">
                                    <form action="/Agenda12/Controller/navegacao.php" method="post">
                                        <input type="hidden" name="idUsuario" value="' . $row->idusuario . '">
                                        <button name="btnVisualizarUsuario" class="w3-button w3-round-large w3-purple">
                                            <i class="fa fa-eye"></i> 
                                        </button>
                                    </form>
                                  </td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
                 <div class="w3-row w3-section w3-center">
                     <form action="/Agenda12/Controller/navegacao.php" method="post">
                    <button name="btnVoltar" class="w3-button w3-round-large" style=" width: 15%; background: linear-gradient(to right, #DC1DC3, #761069); color: white;
                border: none; padding: 12px; border-radius: 25px;">
                    <i class="fa fa-arrow-left"></i> Voltar
                </button>
                     </form>
                </div>
    </section>
</body>

</html>