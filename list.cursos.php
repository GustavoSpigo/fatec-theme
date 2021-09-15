          <?php 
foreach(get_posts(array('post_type'      => 'cursos', 
                        'posts_per_page' => 10 ,
                        'orderby'        => 'date',
                        'category_name'  => $wp_query->query['category_name'],
                        'order'          => 'DESC')) as $post ) :
    setup_postdata( $post );

    ?><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a>
                <br><br>
                <?php 
endforeach;