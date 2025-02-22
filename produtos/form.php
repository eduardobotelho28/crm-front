
<?php
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];

        $url = 'http://localhost/api/produtos/'.$id ;
        $curl = curl_init($url)                  ;

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

    <form action="save.php<?= isset($id) ? '?id=' . $id : ''?>"  method="POST">

        <div class="msg">
            <?php 
                if(isset($_GET['msg'])) {
                    echo 'Mensagem: ' . $_GET['msg'];
                }
            ?>
        </div>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?= isset($data['nome']) ? $data['nome'] : '';?>"></input>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" value="<?= isset($data['descricao']) ? $data['descricao'] : '';?>"></input>
        </div>

        <div class="form-group">
            <label for="codigo">Código</label>
            <input type="text" id="codigo" name="codigo" value="<?= isset($data['codigo']) ? $data['codigo'] : '';?>"></input>
        </div>

        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" id="preco" name="preco" value="<?= isset($data['preco']) ? $data['preco'] : '';?>"></input>
        </div>

        <div class="form-group">
            <label for="data_criacao">Data de Criação</label>
            <input type="date" id="data_criacao" name="data_criacao" value="<?= isset($data['data_criacao']) ? $data['data_criacao'] : '';?>"></input>
        </div>


        <div class="buttons">   

            <button type="submit" id="save-button">Salvar</button>

            <button type="button"><a href="grid.php">Voltar a Lista</a></button>

        </div>

    </form>



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
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100vw;
    }

    form {
        background-color: #e0e0e0;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 400px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    label {
        color: #333;
        font-weight: bold;
    }

    input[type="text"], input[type="date"] {
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
        outline: none;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus {
        border-color: #4682b4;
    }

    .buttons {
        display: flex;
        gap: 10px;
        margin-top: 10px;
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

    button a {
        color: #fff;
        text-decoration: none;
    }

    button a:hover {
        color: #fff;
    }

    #save-button {
        background-color: #26c3da;
    }

    #save-button:hover {
        background-color: #33d1e5;
    }

    .msg {
        background-color: #f4f4f4;
        color: #333;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        font-weight: bold;
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
        padding: 10px 20px;
    }

    a:hover {
        color: #003399;
    }

    button[type="submit"] {
        padding: 10px 20px;
    }

</style>