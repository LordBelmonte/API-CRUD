<?php

require_once "config.php"; //Inserir o arquivo config.php

    class Participacoes {
        public static function inserir( $dados ) {
            $tabela = "participacoes";
            $conexao = new PDO( dbDrive . ":host=" . dbEndereco . ";dbname=" . dbNome, dbUsuario, dbSenha );

            $sql = "INSERT INTO $tabela (id_usuario, id_evento) VALUES (:id_usuario , :id_evento)";

            //Trocar o apelido pela informação
            $stm = $conexao->prepare($sql);
            $stm->bindValue(":id_usuario", $dados["id_usuario"]);
            $stm->bindValue(":id_evento", $dados["id_evento"]);
            
            $stm->execute();

            if ( $stm->rowCount() > 0 ) {
                //return "Registro inserido com sucesso!";
                return [
                    'erro' => false,
                    'mensagem' => 'Registro inserido com sucesso!',
                    'dados' => []
                ];
            } else {
                //return "Erro ao inserir registro!";
                return [
                    'erro' => true,
                    'mensagem' => 'Erro ao inserir registro!',
                    'dados' => []
                ];
            }
        }

    public static function buscarParticipacoesPeloId( $id_participacao ) {

        $tabela = "participacoes";
        $conexao = new PDO( dbDrive . ":host=" . dbEndereco . ";dbname=" . dbNome, dbUsuario, dbSenha );

        $sql = "SELECT * FROM $tabela WHERE id_participacao = :id_participacao";

        $stm = $conexao->prepare( $sql );
        $stm->bindValue(":id_participacao", $id_participacao);

        $stm->execute();

        if ( $stm->rowCount() > 0 ) {
            $valores = $stm->fetch(PDO::FETCH_ASSOC);
            //var_dump( $valores );
            return [
                'erro' => false,
                'mensagem' => "Registro encontrado!",
                'dados' => $valores
            ];
        } else {
            //return "Codigo não cadastrado!";
            return [
                'erro' => true,
                'mensagem' => "Codigo não cadastrado!",
                'dados' => []
            ];
        }
    }

    public static function buscarTodosParticipacoes() {

        $tabela = "participacoes";
        $conexao = new PDO( dbDrive . ":host=" . dbEndereco . ";dbname=" . dbNome, dbUsuario, dbSenha );

        $sql = "SELECT * FROM $tabela";

        $stm = $conexao->prepare($sql);

        $stm->execute();

        if ( $stm->rowCount() > 0 ) {
            $valores = $stm->fetchAll(PDO::FETCH_ASSOC);
            //var_dump( $valores );
            return [
                'erro' => false,
                'mensagem' => 'Registros encontrados!',
                'dados' => $valores
            ];
        } else {
            return [
                'erro' => true,
                'mensagem' => 'Tabela está vazia!',
                'dados' => []
            ];
        }
    }

    public static function alterar( $id_participacao, $dados ) {
        $tabela = "participacoes";
        $conexao = new PDO( dbDrive . ":host=" . dbEndereco . ";dbname=" . dbNome, dbUsuario, dbSenha );

        $sql = "UPDATE $tabela SET id_usuario = :id_usuario, id_evento = :id_evento WHERE id_participacao = :id_participacao";

        //Trocar o apelido pela informação
        $stm = $conexao->prepare($sql);
        $stm->bindValue(":id_usuario", $dados["id_usuario"]);
        $stm->bindValue(":id_evento", $dados["id_evento"]);
        $stm->bindValue(":id_participacao", $id_participacao);
        
        $stm->execute();

        if ( $stm->rowCount() > 0 ) {
            //return "Dados alterados com sucesso!";
            return [
                'erro' => false,
                'mensagem' => 'Dados alterados com sucesso!',
                'dados' => []
            ];
        } else {
            //return "Erro!";
            return [
                'erro' => true,
                'mensagem' => 'Erro!',
                'dados' => []
            ];
        }
    }

    public static function deletar( $id_participacao ) {
        $tabela = "participacoes";
        $conexao = new PDO( dbDrive . ":host=" . dbEndereco . ";dbname=" . dbNome, dbUsuario, dbSenha );

        $sql = "DELETE FROM $tabela WHERE id_participacao = :id_participacao";

        //Trocar o apelido pela informação
        $stm = $conexao->prepare($sql);
        $stm->bindValue(":id_participacao", $id_participacao);
        
        $stm->execute();

        if ( $stm->rowCount() > 0 ) {
            //return "Dados deletados com sucesso!";
            return [
                'erro' => false,
                'mensagem' => 'Dados deletados com sucesso!',
                'dados' => []
            ];
        } else {
            //return "Erro!";
            return [
                'erro' => true,
                'mensagem' => 'Erro!',
                'dados' => []
            ];
        }
    }
}

?>