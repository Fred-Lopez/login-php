<?php
    require_once 'usuario.php';

    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h2>Cadastro</h2>

    <form action="" method="post">
        <label for="">Nome</label>
        <input type="text" name="nome" id="" placeholder="Digite seu nome..."><br>

        <label for="">Telefone</label>
        <input type="tel" name="telefone" id="" placeholder="Digite seu telefone..."><br>

        <label for="">E-mail</label>
        <input type="email" name="email" id="" placeholder="Digite seu e-mail..."><br>

        <label for="">Senha</label>
        <input type="password" name="senha" id="" placeholder="Digite sua senha..."><br>

        <label for="">Confirme sua Senha</label>
        <input type="password" name="conf_senha" id="" placeholder="Confirme sua senha..."><br>

        <input type="submit" value="Cadastrar"><br>
        <a href="index.php">Voltar</a>
    </form>

    <?php
    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $conf_senha = addslashes($_POST['conf_senha']);

        if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($conf_senha)) {
            $usuario->conectar("cadastroturma32", "localhost", "root", "");

            if ($usuario->msgErro == "") {
                if ($senha == $conf_senha) {
                    if ($usuario->cadastrar($nome, $telefone, $email, $senha)) {
                        ?>
                            <div id="msg_sucesso">
                                Cadastrado com Sucesso!
                                Clique <a href="index.php">Aqui</a> Para Logar.
                            </div>
                        <?php
                    }
                    else {
                        ?>
                            <div id="msg_sucesso">
                                E-mail já Cadastrado!
                            </div>
                        <?php
                    }
                }
                else {
                    ?>
                        <div id="msg_sucesso">
                            As senhas não conferem!
                        </div>
                    <?php
                }
            }
            else {
                ?>
                    <div id="msg_sucesso">
                        <?php echo "Erro: ".$usuario->msgError; ?>
                    </div>
                <?php
            }
        }
    }
    else {
        ?>
            <div id="msg_sucesso">
                Preencha todos os campos!
            </div>
        <?php
    }
    ?>
</body>
</html>