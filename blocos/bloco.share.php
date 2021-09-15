<div class="share">
    <?php 
    if(is_user_logged_in()){ ?>
        <a href="<?php echo get_edit_post_link(); ?>"><i class="material-icons" style="color:rgb(148,22,17)">mode_edit</i></a>               
    <?php
    } ?>
    <a href="javascript:window.print()" title="Imprimir"><i class="material-icons">print</i></a>
    <a href="mailto:?subject=<?php the_title(); ?>&body=<?php echo get_permalink();?>" title="Enviar link por e-mail"><i class="material-icons">email</i></a>
    <a href="javascript:void(0)" data-clipboard-text="<?php echo get_permalink();?>" id="copy-content" title="Copiar Link"><i class="material-icons">content_copy</i></a>
    <script>new Clipboard('#copy-content');</script>
    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink();?>" title="Compartilhar no Facebook"><i class="material-icons">share</i></a>
</div>