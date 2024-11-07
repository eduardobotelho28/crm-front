<?php

    //update
    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $url = 'http://localhost/api/oportunidades/'.$id;
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT"); 
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($_POST));

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        
        $data = json_decode($response, true);

        curl_close($curl);

        if(isset($data['mensagem'])) {
            header('Location: /app/oportunidades/form.php?id='.$id.'&msg='.$data['mensagem']); 
        }

    }

    //criação
    else {
        
        $url = 'http://localhost/api/oportunidades/';
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($_POST));

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $data = json_decode($response, true);

        curl_close($curl);

        if(isset($data['mensagem'])) {
            header('Location: /app/oportunidades/form.php?msg='.$data['mensagem']); 
        }

        else {
            header('Location: /app/oportunidades/grid.php'); 
        }
    }

?>