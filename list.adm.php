<?php
$lastposts = get_posts(array('post_type'   => 'docentes'));
?>

<table width="100%">
    <thead>
        <tr> 
            <th align="left">Nome</th>
        </tr>
    </thead>
    <?php 
    foreach ( $lastposts as $post ) : 
     if(get_post_meta($post->ID, 'type-employe', true)=="adm"){
    ?>
    <tr>
        <td>
            <?php
            if(is_user_logged_in()){ echo '<a href="' . str_replace('40', $post->ID ,get_edit_post_link() ) . '">'; }
            echo $post->post_title ; 
            if(is_user_logged_in()){ echo '</a>'; }
            ?>
        </td>
    </tr>
    <?php
        }
    endforeach;
    ?>
</table>

<?php if(is_user_logged_in()){ ?>
    <div style="background-color:rgb(0, 115, 170);float:left;"><a style="color:white" href="<?php echo get_home_url() ?>/wp-admin/post-new.php?post_type=docentes">Adicionar <i class="material-icons" style="color:white">person_add</i></a></div>';
    <br>
<?php } ?>