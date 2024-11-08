<?php

require_once 'dompdf/autoload.inc.php';
$dompdf = new Dompdf\Dompdf();

$url = 'http://localhost/api/produtos' ;
$curl = curl_init($url)             ;

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPGET, true)       ;

$response  = curl_exec($curl)                       ;
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE); 

if($http_code == 200) {
    $data = json_decode($response, true);
}

curl_close($curl);

if($data) {

    $html = "<h1>Lista de Todos os Produtos Cadastrados</h1>";
    foreach ($data as $row) {
        
        $html.= "<h4>".$row['nome']."</h4>" . "<br>";

        $html .= "<ul>";
        $html .= "<li> NOME : "            . (!empty($row['nome'])         ? $row['nome']         : '') . "</li>";
        $html .= "<li> DESCRIÇÃO : "       . (!empty($row['descricao'])    ? $row['descricao']    : '') . "</li>";
        $html .= "<li> CÓDIGO : "          . (!empty($row['codigo'])       ? $row['codigo']       : '') . "</li>";
        $html .= "<li> PREÇO : "           . (!empty($row['preco'])        ? $row['preco']        : '') . "</li>";
        $html .= "<li> DATA DE CRIAÇÃO: "  . (!empty($row['data_criacao']) ? $row['data_criacao'] : '') . "</li>";
        $html .= "</ul>";

        $html.= "<hr>";
    }

    $dompdf->loadHtml($html);
    $dompdf->render();
    header("content-type: application/pdf");
    echo $dompdf->output();

}

