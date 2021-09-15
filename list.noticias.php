<?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    query_posts("post_type=Notícias&showposts=20&paged=$paged");
    /*foreach ( get_posts( array( 'post_type'      => 'Notícias', 
                                'numberposts' => 20 ,
                                'orderby'        => 'date',
                                'paged'          => $paged,
                                'order'          => 'DESC') ) as $post ) : setup_postdata( $post );
    */
    while (have_posts()) : the_post(); 
    ?>
            <a style="text-decoration:none;" href="<?php echo get_permalink();?>">
            <table>
                <tr>
                <?php if(wp_get_attachment_url( get_post_thumbnail_id())==""){ ?>
                    <td><strong style="color:rgb(148,22,17)"><?php echo get_the_title(); ?></strong></td>
                </tr>
                <tr>
                    <td style="font-size:1rem;"><?php echo get_the_excerpt(); ?></td>
                </tr>
                <tr>
                    <td style="font-size:0.7rem; vertical-align: top;"><?php echo get_the_date(); ?></td>
                <?php }else{ ?>
                    <td colspan="2" style="vertical-align: top;color:rgb(148,22,17)"><strong><?php echo get_the_title(); ?></strong></td>
                </tr>
                <tr>
                    <td height="10" width="110" style="vertical-align: top;"><img width="100" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id()) ?>" /></td>
                    <td valign="top" style="font-size:1rem;" rowspan="2"><?php echo get_the_excerpt(); ?></td>
                </tr>
                <tr>
                    <td valign="top" style="font-size:0.7rem;"><?php echo get_the_date(); ?></td>                        
                <?php } ?>
                </tr></table></a>
                <br>
    <?php
    endwhile;
    
    $abort_pagination = false;
    ?>
