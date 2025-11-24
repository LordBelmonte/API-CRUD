<?php

    include_once __DIR__ . "/../models/Usuarios.php";

    class UsuariosService {
        //Método GET para buscar Participacoes
        //Método POST para inserir Participacoes
        //Método PUT para atualizar Participacoes
        //Método DELETE para deletar Participacoes


        public function get ($id_usuario = null) {
            if ( $id_usuario ) {            
                return Usuarios::buscarUsuarioPeloId( id_usuarios : $id_usuario); //A consulta será feita pelo código do aluno            
            } else {              
                return Usuarios::buscarTodosUsuarios(); //A consulta será de TODOS os Alunos             
            }
        }

        public function post () {
            //Pegar os dados no formato JSON para gravar no banco de dados
            $dados = json_decode(file_get_contents("php://input"), true, 512);
            if ($dados == null) {
                throw new Exception("Falta os dados para incluir");
            }
            return Usuarios::inserir( $dados );      

        }

        public function put ( $id_usuario = null ) {
           if ($id_usuario == null) {
                throw new Exception("Falta o código");
            }

            //Pegar os dados no formato JSON para gravar no banco de dados
            $dados = json_decode(file_get_contents("php://input"), true, 512);
            if ($dados == null) {
                throw new Exception("Falta os dados para alterar");
            }
            return Usuarios::alterar( $id_usuario, $dados );

        }

        public function delete ( $id = null ) {
            if ($id == null) {
                throw new Exception("Falta o código");
            }
            return Usuarios::deletar( $id );
        }

    }

?>