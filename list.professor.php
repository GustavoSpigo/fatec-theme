<table class="home-wrap">
    <tr>
        <td valign="top" style="height:400px;">
            <div style="box-shadow: 0px 2px 8px 0px rgba(0,0,0,0.5);height:190px;background-color: #fafafa;">
                <h1 style="padding:10px;color:rgb(148,22,17);">Sistemas Acadêmicos</h1>
                <table style="padding:10px;">
                    <tr>
                        <td align="center" style="padding-right:20px">
                            <a href="https://siga.cps.sp.gov.br/fatec/" target="_blank">
                                <img src="<?php echo get_template_directory_uri (); ?>/img/LogoSiga.png" /><br>SIGA
                            </a>
                        </td>
                        <td align="center" style="padding-right:20px">
                            <a href="http://www.fatec.edu.br/moodle/" target="_blank">
                                <img src="<?php echo get_template_directory_uri (); ?>/img/md.png" /><br>Moodle
                            </a>
                        </td>
                        <td align="center">
                            <a href="http://hypnos.americana.fatec.br" hrefEXT="https://fatecam.no-ip.biz:8081" target="_blank" class="speedbump">
                                <img src="<?php echo get_template_directory_uri (); ?>/img/hypnos.png" /><br>Hypnos
                            </a>
                        </td>
                    </tr>
                </table>
            </div><div style="height:25px;"></div>
            <div class="home-group-news" style="width:600px;height:466px">
                <h1  class="home-group-title" style="color:rgb(148,22,17);">Notícias</h1>
                <div class="home-more-wrap" style="width:600px;">
                    <div class="home-more" style="width:600px;"></div>
                    <a href="<?php echo get_home_url(); ?>/noticias"><div class="home-more2" style="width:600px;">
                        Mais notícias...
                    </div></a>
                </div>
                <?php
                foreach ( get_posts( array( 'category_name'  => 'professor', 
                                            'posts_per_page' => 10 ,
                                            'orderby'        => 'date',
                                            'order'          => 'DESC') ) as $post ) : setup_postdata( $post );
                ?>
                        <a style="text-decoration:none;" href="<?php echo get_permalink();?>">
                        <table style="position:relative;z-index:500">
                            <tr>
                            <?php if(wp_get_attachment_url( get_post_thumbnail_id())==""){ ?>
                                <td><strong><?php echo get_the_title(); ?></strong></td>
                            <?php }else{ ?>
                                <td valign="top"><img width="100"src="<?php echo wp_get_attachment_url( get_post_thumbnail_id()) ?>" /></td>
                                <td valign="top"><strong><?php echo get_the_title(); ?></strong></td>                        
                            <?php } ?>
                            </tr></table></a>
                            <br>
                <?php
                endforeach;
                ?>
            </div>
            
        </td>
        <td style="width:25px;"></td>
        <td valign="top" style="width:300px;">
            <div style="height:20px;"></div>
            <div style="box-shadow: 0px 2px 8px 0px rgba(0,0,0,0.5);height:700px;background-color: #fafafa;">
                <h1 style="padding:10px;margin: 0;">
                    <a style="color: rgb(148,22,17);text-decoration: initial;" href="https://drive.google.com/drive/folders/1HivQyksKX69mgeWGRs41N-xP-bU_F_4p?usp=sharing" target="_blank">Downloads</a>
                </h1>
                <iframe src="https://drive.google.com/embeddedfolderview?id=1HivQyksKX69mgeWGRs41N-xP-bU_F_4p#list" 
                        style="width:100%; height:640px; border:0;"></iframe>
            </div>
        </td>
    </tr>
</table>
<div style="height:30px;"></div>