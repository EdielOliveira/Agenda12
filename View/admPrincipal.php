<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Painel de Administração</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/navigation.css" />
    <link rel="stylesheet" href="../Css/sections.css" />
    <link rel="stylesheet" href="../Css/forms.css" />
    <style>
    .buttons-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 30px;
        margin-top: 50px;
        flex-wrap: wrap;
    }
    
    .gradient-button {
        background: linear-gradient(135deg, #DC1DC3 0%, #761069 100%);
        border: none;
        color: white;
        width: 180px;
        height: 240px;
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        padding: 25px 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        font-family: 'Montserrat', sans-serif;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .gradient-button:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }
    
    .gradient-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(220,29,195,0.2) 0%, rgba(118,16,105,0.2) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .gradient-button:hover::before {
        opacity: 1;
    }
    
    .button-icon {
        font-size: 40px;
        margin-bottom: 10px;
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .button-title {
        font-size: 16px;
        font-weight: 600;
        margin: 10px 0;
        flex: 1;
        display: flex;
        align-items: center;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .button-subtext {
        font-size: 12px;
        opacity: 0.8;
        font-weight: 400;
        flex: 1;
        display: flex;
        align-items: flex-end;
    }
</style>
</head>

<body class="w3-black">

    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    ?>
    <!-- Menu fixo no topo -->
    <img src="/Agenda12/Img/logoGlobo.png" alt="Logo" style="position: absolute; top: 20px; left: 20px; height: 60px;">

    <!-- Seção Home -->
    <section id="home" class="main-section">
        <div class="home-container">
            <div class="home-header">
                <h1 class="main-title">SISTEMA DE CURRÍCULOS</h1>
                <h3 class="subtitle" style="font-weight: 500; font-size: 1.3rem; font-weight: bold; color: #676767; text-align: center;">
                    <span style="background-color: #761069; color: white; padding: 2px 8px; border-radius: 4px; margin-left: 4px;">Administração</span>
                </h3>
            </div>

            <div class="buttons-container">
                <!-- Botão Usuários Cadastrados -->
                <form action="/Agenda12/Controller/navegacao.php" method="post">
                    <input type="hidden" name="nome_form" value="frmLoginADM" />
                    <button name="btnListarCadastrados" class="gradient-button">
                        <div class="button-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="button-title">USUÁRIOS CADASTRADOS</div>
                        <div class="button-subtext">Abrir</div>
                    </button>
                </form>

                <!-- Botão ADM's Cadastrados -->
                <form action="/Agenda12/Controller/navegacao.php" method="post">
                    <input type="hidden" name="nome_form" value="frmLoginADM" />
                    <button name="btnListarAdmCadastrados" class="gradient-button">
                        <div class="button-icon">
                            <i class="fa fa-user-secret"></i>
                        </div>
                        <div class="button-title">ADM'S CADASTRADOS</div>
                        <div class="button-subtext">Abrir</div>
                    </button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>