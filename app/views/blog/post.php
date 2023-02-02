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

    <div class="main-content post col-9">

      <!-- CASO NÃO EXISTAM POSTAGENS, EXIBE A MSG -->
      <?php if (false) : ?>
        <article class="blog-post">Nenhuma publicação cadastrada.</article>
      <?php endif; ?>

      <h2><?= $data['post']->getTitulo(); ?></h2>
      
      <span><?= $data['post']->getAutor(); ?></span>

      <div class="conteudo-post">
        <?= $data['post']->getTexto(); ?>
      </div>
      
      <span>tags</span>
     

    </div>
    <!-- /.main-content .col-9-->

    <?php include "menu_lateral.php"; ?>

  </div>
  <!-- /.content .row -->

</div>
<!-- /.container -->


<?php include "footer.php"; ?>