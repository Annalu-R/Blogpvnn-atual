<?php include "header.php"; ?>

<div class="main-content home col-9">


<!-- REPETIR POSTAGENS -->
<?php foreach($data['posts'] as $post): ?>

  <?php $dataFormatada = new DateTime($post['data']); ?>

<?php endforeach; ?>
<?php include "menu_lateral.php"; ?> 

<main>



<?php if(sizeof($data['posts']) < 1): ?>


  <article class="blog-post">Nenhuma publicação cadastrada.</article>
<?php endif; ?>




  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item">
        <img src=" ../views/imagens/background1.jpeg" class="rounded float-start"  width="100%" height="100%"  aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect>

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Bem-vindos ao Blog PVNN</h1>
            <p>Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item active">
        <img src=" ../views/imagens/background1.jpeg" class="rounded float-start"  width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect>

        <div class="container">
          <div class="carousel-caption">
            <h1 class="display-4 fst-italic">Bem-vindos ao Blog PVNN</h1>
            <h4 class="lead my-3">Um blog de interação entre leitores de fantasia</h4>
            <p>Bem-vindos, leitores! Se o seu apetite pela leitura é insaciável, e você adora conversar sobre como o seu livro favorito poderia ter sido, o Blog PVNN é o lugar certo para você. Vamos trocar ideias e fazer desse livro o melhor de todos os tempos!</p>
            <p><a class="btn btn-lg btn-primary" href="#">Destaques</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src=" ../views/imagens/background1.jpeg" class="rounded float-start"  width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect><

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  

  </div><!-- /.container -->


  <article class="blog-post">
  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">World</strong>
          <h2 class="blog-post-title"><?= $post['titulo']; ?></h2>
          <p class="blog-post-meta mb-1 text-muted"><?= $dataFormatada->format('d / m / Y'); ?> por <a href="#"><?= $post['autor']; ?></a></p>
          <p><?= $post['texto']; ?></p>
        </div>
        <div class="col-auto d-none d-lg-block">
        <img src=" ../views/imagens/post1.jpeg" class="rounded float-start" width="250" height="250">

        </div>
      </div>
    </div>

    </article>

  <article class="blog-post">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Design</strong>
          <h2 class="blog-post-title"><?= $post['titulo']; ?></h2>
          <p class="blog-post-meta mb-1 text-muted"><?= $dataFormatada->format('d / m / Y'); ?> por <a href="#"><?= $post['autor']; ?></a></p>
          <p><?= $post['texto']; ?></p>
        </div>
        <div class="col-auto d-none d-lg-block">
        <img src=" ../views/imagens/post2.jpeg" class="rounded float-start" width="250" height="250">

        </div>
      </div>
    </div>
  </div>

  </article>
  </div>

</main>

</div><!-- /.main-content-->





<?php include "footer.php"; ?>