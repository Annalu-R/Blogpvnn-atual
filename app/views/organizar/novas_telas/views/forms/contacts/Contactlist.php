<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD Contatos</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel="stylesheet" type="text/css" href="../helpers/style.css">
    <script src="../helpers/crud.js" type="text/javascript"></script>

</head>
<body>
<?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 
?>
    <h1> Contatos </h1>
    <ul>
        <?php foreach($data['contatos'] as $contato): ?>

            <li>
                <?= $contato['idContact'] ?> - 
                <?= $contato['nome'] ?> - 
                <?= $contato['email'] ?> - 
                <?= $contato['assunto'] ?> - 
                <?= $contato['mensagem'] ?> - 
            
                [ <a href="./ContactController.php?action=edit&idContact=<?= $contato['idContact'] ?>">Editar</a> ] 
                [ <a href="javascript:confirmarExclusaoContact('<?= $contato['nome'] ?>', '<?= $contato['email'] ?>', '<?= $contato['assunto'] ?>', '<?= $contato['mensagem'] ?>', <?= $contato['idCategory'] ?>)">Excluir</a> ]
            </li>             
        <?php endforeach; ?>
    </ul>

    <p>
    [ <a href="./ContactController.php?action=loadFormNew">Cadastrar novo contato </a> ]
    
</body>
</html>