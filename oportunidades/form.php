
<?php
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];

        $url = 'http://localhost/api/oportunidades/'.$id ;
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
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="<?= isset($data['titulo']) ? $data['titulo'] : '';?>"></input>
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" id="valor" name="valor" value="<?= isset($data['valor']) ? $data['valor'] : '';?>"></input>
        </div>

        <div class="form-group">
            <label for="data_fechamento">Data de Fechamento</label>
            <input type="date" id="data_fechamento" name="data_fechamento" value="<?= isset($data['data_fechamento']) ? $data['data_fechamento'] : '';?>"></input>
        </div>

        <div class="form-group">
            <label for="estagio">Estágio</label>
            <input type="text" id="estagio" name="estagio" value="<?= isset($data['estagio']) ? $data['estagio'] : '';?>"></input>
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