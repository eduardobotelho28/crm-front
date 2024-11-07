
<?php
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];

        $url = 'http://localhost/api/leads/'.$id ;
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
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?= isset($data['email']) ? $data['email'] : '';?>"></input>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" value="<?= isset($data['telefone']) ? $data['telefone'] : '';?>"></input>
        </div>

        <div class="form-group">
            <label for="origem">Origem</label>
            <input type="text" id="origem" name="origem" value="<?= isset($data['origem']) ? $data['origem'] : '';?>"></input>
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
    }

    body {
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #191970;
    }

    form {
        background-color: #E7E7E7;
        padding: 20px;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 400px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    a{
        margin-top: 20px     ;
        text-decoration: none;
        color: black;
        width: 50px;
        height: 20px;
    }

    .buttons {
        margin-top: 10px;
    }

    button {
        padding: 5px;
        border-radius: 5px;
        cursor: pointer;
    }

    #save-button {
        background-color: #26C3DA;
        color: white;
    }

    input {
        padding: 3px;
        border-radius: 3px;
    }

    .msg {
        background-color: #F0F0F0;
        padding: 10px           ;
    }
</style>