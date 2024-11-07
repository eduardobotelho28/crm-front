<?php

if (isset($_GET['nome'])) {
    $url = 'http://localhost/api/leads?nome=' . $_GET['nome'] ;
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
    $url = 'http://localhost/api/leads' ;
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
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
        </div>

        <button type="submit">Enviar</button>
    </form>

    <?php if(!empty($data)) : ?>

        <table>
        <thead>
            <tr>
                <td>Nome</td>
                <td>Email</td>
                <td>Telefone</td>
                <td>Origem</td>
                <td colspan="2">Opções</td>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($data as $row) : ?>
            
                <tr>
                    <td> <?= !empty($row['nome']) ? $row['nome']         : '' ; ?></td>
                    <td> <?= !empty($row['email']) ? $row['email']       : '' ; ?></td>
                    <td> <?= !empty($row['telefone']) ? $row['telefone'] : '' ; ?></td>
                    <td> <?= !empty($row['origem']) ? $row['origem']     : '' ; ?></td>
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
</div>


<style>
    *{
        padding: 0px;
        margin: 0px;
    }

    table {
        width: auto;
        border-radius: 10px;
    }
    
    td {
        padding: 15px;
    }

    thead{
        background-color: white;
    }
    tbody {
        background-color: #E7E7E7;
    }
    
    button {
        background-color: #e7e7e7;
        width: 70px              ;
        height: 30px             ;
        border-radius: 5px       ;
        cursor: pointer          ;
    }

    button:hover {
        background-color: white;
    }

    a {
        text-decoration: none;
        color: black         ;
    }

    .option {
        cursor: pointer;
        text-decoration: underline;
    }

    .option:hover {
        background-color: white;
    }

    .wrapper {
        width: 100vw; 
        height:100vh; 
        display:flex; 
        justify-content:center; 
        align-items:center; 
        flex-direction:column; 
        gap:30px;
        background-color: #191970;
    }

    form {
        background-color: #E7E7E7;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        gap: 5px;
        border-radius: 10px;
    }
</style>