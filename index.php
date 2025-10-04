<?php
header ( 'Content-Type: application/json; charset=utf-8');

    include_once "UsuariosService.php" ;
    include_once "ParticipacoesService.php";
    include_once "util.php" ;

    //http://localhost/OngDogs/api/Usuario
  
    if(@$_GET["url"]) { //Condição para se tiver algo gravado na variável url
        
        $url =explode("/", $_GET["url"]); // Separar os parametros pela "/" e armazenar em vetores

        if ($url[0] === "api") { // Verificar se o primeiro elemento do vetor é igual a "api"   
            array_shift($url); //Remover o primeiro elemento do vetor
                  
            $service = ucfirst($url[0]) . "Service"; //Obrigar a primeira letra a ser maiuscula
            array_shift($url); //Remover o primeiro elemento do vetor

            $method = strtolower($_SERVER["REQUEST_METHOD"]); //Pegar metodo/ação da requisição
 
            //echo "Service: " . $service . "<br>" ;
            //echo "Method: " . $method . "<br><br>" ;

            try {
                //chamar a classe responsavel pelo service
                $response = call_user_func_array( array( new $service , $method ) , $url );
                http_response_code(200); //OK
                //echo "<br>";
                //echo $response;
                echo FormatarMensagemJson( $response['erro'], $response['mensagem'], $response['dados'] );

            } catch ( Exception $erro ) {
                http_response_code(500); //Erro interno do servidor
                //echo "<br>";
                //echo "Erro na API - " . $erro->getMessage();
                echo FormatarMensagemJson( true, $erro->getMessage(), [] );
                
            }

        } else {
            echo "<br>";
            echo "EndPoint incorreto";
        }

    } else {
        echo "<br>";
        echo "EndPoint incorreto";
    }

?>