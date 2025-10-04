<?php

require_once "config.php"; //Inserir o arquivo config.php

    class Usuarios {
        public static function inserir( $dados ) {
            $tabela = "usuarios";
            $conexao = new PDO( dbDrive . ":host=" . dbEndereco . ";dbname=" . dbNome, dbUsuario, dbSenha );

            $sql = "INSERT INTO $tabela (nome, email, senha, telefone, cpf, tipo_usuario) VALUES (:nome , :email , :senha , :telefone , :cpf , :tipo_usuario)";

            //Trocar o apelido pela informação
            $stm = $conexao->prepare($sql);
            $stm->bindValue(":nome", $dados["nome"]);
            $stm->bindValue(":email", $dados["email"]);
            $stm->bindValue(":senha", $dados["senha"]);
            $stm->bindValue(":telefone", $dados["telefone"]);
            $stm->bindValue(":cpf", $dados["cpf"]);
            $stm->bindValue(":tipo_usuario", $dados["tipo_usuario"]);
            
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

    public static function buscarUsuarioPeloId( $id_usuarios ) {

        $tabela = "usuarios";
        $conexao = new PDO( dbDrive . ":host=" . dbEndereco . ";dbname=" . dbNome, dbUsuario, dbSenha );

        $sql = "SELECT * FROM $tabela WHERE id_usuario = :id_usuario";

        $stm = $conexao->prepare( $sql );
        $stm->bindValue(":id_usuario", $id_usuarios );

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

    public static function buscarTodosUsuarios() {

        $tabela = "usuarios";
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

    public static function alterar( $id_usuario, $dados ) {
        $tabela = "usuarios";
        $conexao = new PDO( dbDrive . ":host=" . dbEndereco . ";dbname=" . dbNome, dbUsuario, dbSenha );

        $sql = "UPDATE $tabela SET nome = :nome, email = :email, senha = :senha, telefone = :telefone, cpf = :cpf, tipo_usuario = :tipo_usuario  WHERE id_usuario = :id_usuario";

        //Trocar o apelido pela informação
        $stm = $conexao->prepare($sql);
        $stm->bindValue(":nome", $dados["nome"]);
        $stm->bindValue(":email", $dados["email"]);
        $stm->bindValue(":senha", $dados["senha"]);
        $stm->bindValue(":telefone", $dados["telefone"]);
        $stm->bindValue(":cpf", $dados["cpf"]);
        $stm->bindValue(":tipo_usuario", $dados["tipo_usuario"]);
        $stm->bindValue(":id_usuario", $id_usuario);
        
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

    public static function deletar( $id_usuario ) {
        $tabela = "usuarios";
        $conexao = new PDO( dbDrive . ":host=" . dbEndereco . ";dbname=" . dbNome, dbUsuario, dbSenha );

        $sql = "DELETE FROM $tabela WHERE id_usuario = :id_usuario";

        //Trocar o apelido pela informação
        $stm = $conexao->prepare($sql);
        $stm->bindValue(":id_usuario", $id_usuario);
        
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