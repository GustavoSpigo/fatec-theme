<table width="100%">
    <thead>
        <tr> 
            <th align="left">Nome</th>
            <th width="100">Titulação</th>
            <th width="100"><center>Lattes</center></th>
            <th width="100"><center>Site</center></th>
        </tr>
    </thead>
    <?php 
    $i=0;
    $t="";
    while (have_posts()) : the_post(); 
        if(get_post_meta($post->ID, 'type-employe', true)=="docente" || get_post_meta($post->ID, 'type-employe', true)==""){
            if($i==1){
                $t="background-color: #eaeaea;";
                $i=0;
            }else{
                $t="";
                $i=1;
            }
    ?>
    <tr style="height: 30px; <?php echo $t; ?>">
        <td>
            <?php
            if(is_user_logged_in()){ echo '<a href="' . get_edit_post_link() . '">'; }
            echo get_the_title(); 
            if(is_user_logged_in()){ echo '</a>'; }
            ?>
        </td>
        <td>
            <?php 
            echo get_post_meta($post->ID, 'titulação', true); 
            ?>
        </td>
        <td>
            <?php
            if(get_post_meta($post->ID, 'lattes', true)==""){
                echo "&nbsp;";
            }else{
                echo '<center><a target="_blank" href="' . get_post_meta($post->ID, 'lattes', true) .'"><img src="' . get_template_directory_uri () . '/img/lattes.png" /></a></center>';
            }
            ?>
        </td>
        <td>
            <?php
            if(get_post_meta($post->ID, 'link', true)==""){
                echo "&nbsp;";
            }else{
                echo '<center><a target="_blank" href="' . get_post_meta($post->ID, 'link', true) .'"><i class="material-icons">web</i></a></center>';
            }
            ?>
        </td>
    </tr>
    <?php
        }
    endwhile;
    ?>
</table>
<?php if(is_user_logged_in()){ ?>
    <div style="background-color:rgb(0, 115, 170);float:left;"><a style="color:white" href="<?php echo get_home_url() ?>/wp-admin/post-new.php?post_type=docentes">Adicionar <i class="material-icons" style="color:white">person_add</i></a></div>';
    <br>
<?php } ?>