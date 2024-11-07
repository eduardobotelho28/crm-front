<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        width: 100vw;
        height: 100vh;
        background-color: #191970;
        color: #ffffff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 20px;
        text-align: center;
    }

    header {
        font-size: 1.5rem;
        font-weight: bold;
    }

    #resources-box {
        background-color: #E7E7E7;
        padding: 20px;
        width: 90%;
        max-width: 800px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        display: flex;
        justify-content: space-around;
        align-items: center;
        gap: 20px;
    }

    .resource {
        width: 200px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #dadada;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .resource:hover {
        background-color: #ffffff;
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    a {
        text-decoration: none;
        color: #191970;
        font-weight: bold;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    </style>
</head>
<body>
    <div style="display: flex; justify-content:center; align-items:center;">
        <p>O que você deseja acessar?</p>
    </div>
    <div id="resources-box">
        <div class="resource">
            <a href="leads/grid.php">Leads</a>
        </div>
        <div class="resource">
            <a href="oportunidades/grid.php">Oportunidades</a>
        </div>
        <div class="resource">
            <a href="produtos/grid.php">Produtos</a>
        </div>
        <div class="resource">
            <a href="">Exportar produtos PDF</a>
        </div>
    </div>
</body>
</html>