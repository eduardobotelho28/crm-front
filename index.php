<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <style>
        * {
            padding: 0px          ;
            margin: 0px           ;
            box-sizing: border-box;
        }
        
        body {
            width: 100vw           ;
            height: 100vh          ;
            background-color: #191970 ;
            display: flex          ;
            flex-direction: column ;
            align-items: center    ;
            justify-content: center;
            gap: 20px              ; 
        }

        div {
            background-color: #E7E7E7;
            height: 60px             ;
            width: 800px             ;
            border-radius: 10px      ;
        }

        #resources-box {
            padding: 10px           ;
            display: flex           ;
            gap: 20px               ;
            justify-content: center ;
            align-items: center     ; 
        }

        .resource {
            width: 200px             ;
            height: 50px             ;
            display: flex            ;
            justify-content: center  ;
            align-items: center      ;
            background-color:#DADADA ;
            cursor: pointer          ;
        }

        .resource:hover {
            background-color: white;
        }

        a {
            text-decoration: none;
            color: black         ;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
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
    </div>
</body>
</html>