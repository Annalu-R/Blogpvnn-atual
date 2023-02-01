<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
	include_once __DIR__ . "/../helpers/mensagem.php";
	//$caminho = __DIR__ . "/../helpers/mensagem.php";
	//print_r($caminho); 

	$category = $data['category'];
?>
<h2>Editar categorias </h2>

<p>
	<form action="./CategoryController.php?action=update&idCategory=<?= $category->getIdCategory()?>" method="POST">
		Tipo: <input type="text" name="tipo" value="<?= $category->getTipo(); ?>">
		
		<br>
		Tag: <input type="text" name="tag" value="<?= $category->getTag(); ?>">
		
	
		<input type="submit" value="Atualizar">
		<input type="reset" value="Limpar">
	</form>		

</body>
</html>
