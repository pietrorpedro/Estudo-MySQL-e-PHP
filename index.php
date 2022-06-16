<?php
    include_once 'includes/head.php';
    include_once 'includes/footer.php';
?>
    <body>
        <section>
            <h1>Nos envie uma mensagem!<h1>
            <div class="form">
                <form action="index.php" method="POST">
                    <input type="text" name="member_name" placeholder="nome" required>
                    <input type="text" name="member_lname" placeholder="sobrenome" required>
                    <input type="email" name="member_email" placeholder="email" required>
                    <input type="text" name="msg" placeholder="mensagem" required>
                    <input id="submit" type="submit" value="Enviar" name="submit">
                </form>
            </div>
        </section>
    </body>
</html>
    
<?php
    //envio dos dados do form para o db
    if(isset($_POST['submit'])){ //caso o botão de submit seja apertado
        
        try {
            include_once 'includes/conexao.php'; //inclui a conexao
            $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password); //conexao com o db
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // preparar o SQL e pegar os dados preenchidos
            $stmt = $conn->prepare("INSERT INTO contato (name,sobrenome,email,mensagem) VALUES (:member_name, :member_lname, :member_email, :msg)");
            $stmt->bindParam(':member_name', $member_name); //nome
            $stmt->bindParam(':member_lname', $member_lname); //sobrenome
            $stmt->bindParam(':member_email', $member_email); //email
            $stmt->bindParam(':msg', $msg); //mensagem
        
        // inserir os dados
            $member_name = $_POST["member_name"];
            $member_lname = $_POST["member_lname"];
            $member_email = $_POST["member_email"];
            $msg = $_POST["msg"];

        //validação para que o formulario não seja enviado vazio
            if(!empty($member_name&&$member_lname&&$member_email&&$msg)){ //caso não esteja vazio os campos, executar o "$stmt = $conn->prepare"
                $stmt->execute();
            }

        }
        catch(PDOException $e) //caso de algum erro ou bug
        {
            echo "Error: " . $e->getMessage(); //dizer "error" e dizer o tipo do erro
        }
        $conn = null; //finaliza a conexao
    }

    //CODIGO FEITO POR PIETRO R. PEDRO
    //GITHUB: github.com/pietrorpedro
?>