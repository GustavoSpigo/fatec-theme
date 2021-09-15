<style>
#primaryContent {
    min-height: 950px !important;
}

</style>

<div class="content-first-complete content-box">
    <table style="padding:10px;">
        <tr>
            <td align="center" style="padding-right:80px">
                <a href="https://siga.cps.sp.gov.br/aluno/login.aspx" target="_blank">
                    <img src="<?php echo get_template_directory_uri (); ?>/img/LogoSiga.png" /><br>SIGA
                </a>
            </td>
            <td align="center" style="padding-right:80px">
                <a href="http://www.fatec.edu.br/moodle/" target="_blank">
                    <img src="<?php echo get_template_directory_uri (); ?>/img/md.png" /><br>Moodle
                </a>
            </td>
            <td align="center" style="padding-right:80px">
                <a href="http://hypnos.americana.fatec.br" target="_blank" class="speedbump">
                    <img src="<?php echo get_template_directory_uri (); ?>/img/hypnos.png" /><br>Hypnos
                </a>
            </td>
            <td align="center" style="padding-right:80px">
                <a href="http://fatec.onthehub.com" target="_blank">
                    <img height="64" src="<?php echo get_template_directory_uri (); ?>/img/dreamspark.png" /><br>DreamSpark
                </a>
            </td>
            <td align="center">
                <a href="https://www.jobbydoo.com.br/" target="_blank">
                    <img height="64" src="<?php echo get_template_directory_uri (); ?>/img/jobbydoo.png" /><br>Jobbydoo
                </a>
            </td>
            
        </tr>
    </table>
</div>


<div class="content-box content-news">
    <h1 style="margin: 0px;padding:10px;color:rgb(148,22,17);">Comunicados</h1>
    <div class="home-more-wrap" style="width:270px;height: 730px;">
        <div class="home-more" style="width:270px;"></div>
        <a href="<?php echo get_home_url(); ?>/noticias"><div class="home-more2" style="width:270px;">
            Mais notícias...
        </div></a>
    </div>
    <?php
    foreach ( get_posts( array( 'category_name'  => 'noticias-ao-aluno', 
                                'posts_per_page' => 10 ,
                                'orderby'        => 'date',
                                'order'          => 'DESC') ) as $post ) : setup_postdata( $post );
    ?>
            <a style="text-decoration:none;" href="<?php echo get_permalink();?>">
            <table style="padding:10px;position:relative;z-index:500">
                <tr>
                <?php if(wp_get_attachment_url( get_post_thumbnail_id())==""){ ?>
                    <td><strong><?php echo get_the_title(); ?></strong></td>
                <?php }else{ ?>
                    <td valign="top"><img width="100"src="<?php echo wp_get_attachment_url( get_post_thumbnail_id()) ?>" /></td>
                    <td valign="top"><strong><?php echo get_the_title(); ?></strong></td>                        
                <?php } ?>
                </tr></table></a>
    <?php
    endforeach;
    ?>
</div>

<div class="content-box content-estagios">
    <h1 style="    margin: 0px;padding:10px;color:rgb(148,22,17);">Estágios</h1>
    <?php
    $estagios = get_posts(array('post_type'      => 'estagios', 
                                'posts_per_page' => 99 ,
                                'orderby'        => 'date',
                                'order'          => 'DESC')); 
    foreach ($estagios  as $post ) : setup_postdata( $post );
    ?>
            <a style="text-decoration:none;" href="javascript:document.getElementById('myModal<?php echo $post->ID; ?>').style.display ='block';void(0)" onclik="document.getElementById('myModal<?php echo $post->ID; ?>').style.display ='block'">
            <table style="padding:10px;position:relative;z-index:500">
                <tr>
                <?php if(wp_get_attachment_url( get_post_thumbnail_id())==""){ ?>
                    <td><strong><?php echo get_the_title(); ?></strong></td>
                <?php }else{ ?>
                    <td valign="top"><img width="100"src="<?php echo wp_get_attachment_url( get_post_thumbnail_id()) ?>" /></td>
                    <td valign="top"><strong><?php echo get_the_title(); ?></strong></td>                        
                <?php } ?>
                </tr></table></a>
    <?php
    endforeach;
    ?>
    <br><br>
</div>

<div class="content-box content-docs">
    <h1 style="padding:10px;margin: 0;">
        <a style="color: rgb(148,22,17);text-decoration: initial;" href="https://drive.google.com/folderview?id=1QWcgpSvV8WlUiHHTfJ7O_sNUmf9DZBuY&usp=sharing" target="_blank">
            Documentos Importantes
        </a>
    </h1> 
    <iframe src="https://drive.google.com/embeddedfolderview?id=1QWcgpSvV8WlUiHHTfJ7O_sNUmf9DZBuY#list" style="width:100%; height:400px; border:0;"></iframe>
</div>
<div style="height:30px;"></div>
<?php 
foreach ($estagios  as $post ) : setup_postdata( $post );
?>
<div id="myModal<?php echo $post->ID; ?>" class="modal">
    <div class="modal-content">
        <span class="close" onclick="document.getElementById('myModal<?php echo $post->ID; ?>').style.display ='none'">×</span>
        <strong><?php echo get_the_title(); ?></strong>
        <p><?php echo str_replace("\r", "<br />", get_the_content('')); ?></p>
    </div>
</div>
<?php
endforeach;
?>