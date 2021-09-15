<?php
get_header();

if($wp_query->query_vars['category_name']=='professor'){ 
  include(get_template_directory() . "/list.professor.php");
}elseif($wp_query->query_vars['category_name']=='aluno'){ 
  include(get_template_directory() . "/list.aluno.php");
}else{

    if(have_posts() || $wp_query->query['post_type']=="notcias"): ?>
    <link rel='stylesheet' href='<?php echo get_template_directory_uri (); ?>/css/j.css' type='text/css'>
    <link rel='stylesheet' href='<?php echo get_template_directory_uri (); ?>/css/page.css' type='text/css'>

    <div class="second-header" style="background-image:url('<?php echo imagem(''); ?>');">
    </div><div class="conteudo-wrap">
      <div class="conteudo">
        <div class="conteudo-titulo">
          <h1 style="margin:0px;"><?php echo $wp_query->queried_object->labels->name; ?></h1>
        </div>
        <?php
          
          if($wp_query->query_vars['post_type']=="docentes"){
            include(get_template_directory() . "/list.docentes.php");
          }elseif($wp_query->query_vars['post_type']=="notcias"){
            include(get_template_directory() . "/list.noticias.php");
          }elseif($wp_query->query_vars['post_type']=="datasimportantes"){
            include(get_template_directory() . "/list.datasimportantes.php");
          }elseif(substr($wp_query->query['post_type'],0,6)=='cursos'){
            include(get_template_directory() . "/list.cursos.php");
          }else{
            while (have_posts()) : the_post(); 
              ?><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a> - (<?php the_date(); ?>)

              <br><br>
              <?php 
            endwhile;
          }
          if (will_paginate()): ?>
    
        <ul id="pagination">
          <li><?php posts_nav_link() ?></li>
        </ul>
      
        <?php endif; ?>
      </div>
    </div>
    <?php
    
    elseif(substr($wp_query->query['category_name'],0,6)=='cursos'): 
        include(get_template_directory() . "/list.cursos.php");
    elseif($wp_query->query['category_name']=='professor'): 
        include(get_template_directory() . "/list.professor.php");
    elseif($wp_query->query['category_name']=='aluno'): 
        include(get_template_directory() . "/list.aluno.php");
    else:
    ?>
      <p> <?php echo __("Sorry, no such page."); ?></p>
  <?php
    endif;

    
}
get_footer();

?>