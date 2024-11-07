<?php

if (isset($_GET['titulo'])) {
    $url = 'http://localhost/api/oportunidades?titulo=' . $_GET['titulo'] ;
    $curl = curl_init($url)             ;

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPGET, true)       ;

    $response  = curl_exec($curl)                       ;
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE); 

    if($http_code == 200) {
        $data = json_decode($response, true);
    }

    curl_close($curl);
}
else {
    $url = 'http://localhost/api/oportunidades' ;
    $curl = curl_init($url)             ;

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPGET, true)       ;

    $response  = curl_exec($curl)                       ;
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE); 

    if($http_code == 200) {
        $data = json_decode($response, true);
    }

    curl_close($curl);
}

?>

<div class="wrapper">

    <form action="" method="GET">

        <p>Filtrar?</p>

        <div class="form-control">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo">
        </div>

        <button type="submit">Enviar</button>
    </form>

    <?php if(!empty($data)) : ?>

        <table>
        <thead>
            <tr>
                <td>Título</td>
                <td>Valor</td>
                <td>Data de Fechamento</td>
                <td>Estágio</td>
                <td colspan="2">Opções</td>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($data as $row) : ?>
            
                <tr>
                    <td> <?= !empty($row['titulo']) ? $row['titulo']         : '' ; ?></td>
                    <td> <?= !empty($row['valor']) ? $row['valor']       : '' ; ?></td>
                    <td> <?= !empty($row['data_fechamento']) ? $row['data_fechamento'] : '' ; ?></td>
                    <td> <?= !empty($row['estagio']) ? $row['estagio']     : '' ; ?></td>
                    <td class="option">
                        <a href="form.php<?= '?id=' . $row['id']?>">
                            Editar
                        </a>
                    </td>
                    <td class="option">
                        <a href="delete.php<?= '?id=' . $row['id']?>">
                           Excluir
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>
        </table>

    <?php else:?>

        <div style="color:white"> sem dados</div>

    <?php endif; ?>
    
    <button>
        <a href="form.php">CRIAR</a>
    </button>

    <button>
        <a href="../index.php">VOLTAR AO MENU</a>
    </button>
</div>


<style>
    * {
        padding: 0px;
        margin: 0px;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #191970;
        color: #fff;
    }

    .wrapper {
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 20px;
        background-color: #191970;
    }

    form {
        background-color: #e0e0e0;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px;
        gap: 10px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    form p {
        color: #333;
        font-weight: bold;
        margin-right: 10px;
    }

    form label {
        color: #333;
        font-weight: normal;
    }

    input[type="text"] {
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button {
        background-color: #4682b4;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-weight: bold;
    }

    button:hover {
        background-color: #5a9bd3;
    }

    a {
        text-decoration: none;
        color: #0066cc;
        transition: color 0.3s ease;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 8px 15px;
    }

    a:hover {
        color: #003399;
    }

    table {
        width: auto;
        border-radius: 10px; /* Arredondamento nas bordas da tabela */
        border-collapse: separate; /* Necessário para o border-radius */
        border-spacing: 0; /* Remove espaçamento extra entre as células */
        overflow: hidden; /* Garante que as bordas arredondadas sejam aplicadas */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #fff;
        color: #333;
    }

    td, th {
        text-align: center;
        padding: 12px;
        border: 1px solid #dcdcdc;
    }

    thead {
        background-color: #f4f4f4;
        font-weight: bold;
        color: #333;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tbody tr:nth-child(odd) {
        background-color: #e0e0e0;
    }

    .option {
        color: #4682b4;
        cursor: pointer;
        font-weight: bold;
    }

    .option:hover {
        color: #5a9bd3;
    }

    button a {
        color: #fff;
    }

    button a:hover {
        color: #fff;
    }

    button[type="submit"] {
        padding: 8px 15px;
    }
</style>