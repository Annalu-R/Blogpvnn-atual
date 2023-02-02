<?php include "header.php"; ?>

<?php 
  function resumir($phrase, $max_words) {
    $phrase_array = explode(' ',$phrase);
    if(count($phrase_array) > $max_words && $max_words > 0)
      $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
    return $phrase;
  }
?>

<div class="container">

  <div class="row">

    <div class="main-content home col-9">

      <!-- CASO NÃO EXISTAM POSTAGENS, EXIBE A MSG -->
      <?php if (sizeof($data['posts']) < 1) : ?>
        <article class="blog-post">Nenhuma publicação cadastrada.</article>
      <?php endif; ?>

      <!-- REPETIR POSTAGENS -->
      <?php foreach ($data['posts'] as $post) : ?>

        <?php $dataFormatada = new DateTime($post['data']); ?>

        <article class="blog-post">
          <div class="border rounded mb-4 p-4">
            
            <!-- ### data e autor ### -->
            <p class="data-autor mb-1 text-muted">
                <?= $dataFormatada->format('d/M/Y'); ?> por 
                <a href="#"><?= $post['autor']; ?></a>
            </p>
            
            <h2 class="blog-post-title"><?= $post['titulo']; ?></h2>
              
            <p><?= resumir($post['texto'], 30); ?></p>

            <div class=".post-rodape row">

              <div class="col-2">
                <a href="<?= $data['base_path'] ?>/app/controllers/BlogController.php?action=pagePost&id_param=<?= $post['idPosts']?>">saiba mais</a>
              </div>

              <div class="col-10 align-right">
              <span>tags...</span>
              </div>

            </div>

          </div>

        </article>

      <?php endforeach; ?>

    </div>
    <!-- /.main-content .col-9-->

    <?php include "menu_lateral.php"; ?>

  </div>
  <!-- /.content .row -->

</div>
<!-- /.container -->


<?php include "footer.php"; ?>