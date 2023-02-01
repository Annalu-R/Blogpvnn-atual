<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <title><?= $data['titulo']  ?></title>
</head>

<body>
  <div class="container">

    <header class="pb-3 mb-4 mt-4 border-bottom">
      
      
    <!-- teste -->


    <div class="container">
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
      <img src=" ../views/imagens/logo.jpg" class="rounded float-start" width="100">
          <title> Blog PVNN </title>
          <span class="fs-4"> Blog PVNN 
          <div>
            <span class="fs-6">
                            "Até que a última estrela se apague, eu vou estar com você"
            </span>
          </div>
          </span>
      </a>
      
      <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-dark text-decoration-none" href="#">Início</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="#">Sobre</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="#">Livro</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="#">Perfil</a>
        <a class="py-2 text-dark text-decoration-none" href="#">Contato</a>
      </nav>
    </div>

    <div class="area-administrativa">
          <figure>
      <a href="<?= $data['base_path'] ?>/app/controllers/AdminController.php?action=index">área administrativa</a>
</figure>
    </div>

  </header>
    </div>
    

<!-- .teste -->



    </header>

    
    <div class="content row">