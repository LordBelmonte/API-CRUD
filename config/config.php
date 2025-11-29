<?php
    const dbDrive = "mysql";
    const dbEndereco = "localhost";
    const dbNome = "ongdogs";
    const dbUsuario = "root";
    const dbSenha = "";

    try {
        $conexao = new PDO(
            dbDrive . ":host=" . dbEndereco . ";dbname=" . dbNome . ";charset=utf8",
            dbUsuario,
            dbSenha
        );

        // Habilita o modo de erros
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "✔ Conexão bem-sucedida!";
    } catch (PDOException $e) {
        echo "❌ Erro ao conectar: " . $e->getMessage();
    }
?>
