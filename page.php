<?php
    /*if(!is_user_logged_in()){
      include(get_template_directory() . "/manutencao/index.php");
      exit();
    }*/
  
    get_header();
    if(is_front_page()){
          include(get_template_directory() . "/home.php");
    }else{
      if (have_posts()) : while (have_posts()) : the_post();
      ?>
      <div class="second-header" style="background-image:url('<?php echo imagem(wp_get_attachment_url( get_post_thumbnail_id())); ?>');">
      </div><div class="conteudo-wrap">
        <div class="conteudo">
          <div class="conteudo-titulo">
            <h1 style="margin:0px;"><?php the_title(); ?></h1>
            <?php include(get_template_directory() . "/blocos/bloco.share.php"); ?>
          </div>
          <?php echo parent_link($post); ?>
          <?php the_content(); ?>
        </div>
      </div>
      <?php
      //comments_template();

      endwhile; else: ?>

        <p> <?php echo __("Sorry, no such page."); ?></p>

    <?php
      endif;
    } /*
    echo "<pre>";
    var_export($post);
    echo "</pre>";*/
    get_footer();
?>