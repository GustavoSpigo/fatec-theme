<script>
   function selecionar(e){
       $('.cnt').hide();
       $("#cnt"+e).show();
   }
   $( document ).ready(function() {
  $('#left').click(function () {
    var leftPos = $('div.home-group-agenda').scrollLeft();
    console.log(leftPos);    
    $("div.home-group-agenda").animate({
        scrollLeft: leftPos - 540
    }, 500);
    });

    $('#right').click(function () {
        var leftPos = $('div.home-group-agenda').scrollLeft();
        console.log(leftPos); 
        $("div.home-group-agenda").animate({
            scrollLeft: leftPos + 540
        }, 500);
    });
    });


</script>
<div class="content-home-slider">
    <?php
    /* SLIDER INICIAL */
    include(get_template_directory() . "/parallax-slider.php");
    ?>
</div>
<div class="content-home-noticias">
    <div class="home-group-news">
        <h1  class="home-group-title">
            <a href="noticias">
                Notícias
            </a></h1>
        <div class="home-more-wrap">
            <div class="home-more"></div>
            <a href="<?php echo get_home_url(); ?>/noticias"><div class="home-more2">
                Mais notícias...
            </div></a>
        </div>
        <?php
        foreach ( get_posts( array( 'post_type'      => 'Notícias', 
                                    'posts_per_page' => 10 ,
                                    'orderby'        => 'date',
                                    'order'          => 'DESC') ) as $post ) : setup_postdata( $post );
        ?>
                <a style="text-decoration:none;" href="<?php echo get_permalink();?>">
                <table>
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
</div>
<div class="content-home-agenda">
    <div class="home-agenda-wrap">
        <h1 class="home-group-title" style="margin: 0;margin-left: 7px;"><a class="home-group-title" href="<?php echo get_home_url(); ?>/datasimportantes">Agenda</a></h1>
        <div id="left" class="home-agenda-more2 noselect">chevron_left</div>
        <div class="home-group-agenda">
            <div class="table">
                <div class="tr">
                    <?php
                        foreach ( get_posts( array( 'post_type'      => 'Datas Importantes', 
                                                    'posts_per_page' => -1 ,
                                                    'meta_key'       => 'dt-ini',
                                                    'orderby'        => 'meta_value',
                                                    'order'          => 'ASC')) as $post ) : setup_postdata( $post );
                        $varArray = get_post_meta($post->ID, 'dt-ini', FALSE);
                        $dt_ini = $varArray[0];
                        $dia_ini = substr($dt_ini,8,2);
                        $mes_ini = mes(substr($dt_ini,5,2));
                        
                        $varArray = get_post_meta($post->ID, 'dt-fim', FALSE);
                        $dt_fim = $varArray[0];
                        $dia_fim = substr($dt_fim,8,2);
                        $mes_fim = mes(substr($dt_fim,5,2));
                        if($dt_ini>=date("Y-m-d"))
                        if($dt_ini==$dt_fim){
                    ?>
                        <div class="home-cada-date" title="<?php echo get_the_excerpt(); ?>">
                            <table class="home-cada-data-wrap">
                                <tr>
                                    <td>
                                        <div class="home-cada-data-dia"><?php echo $dia_ini; ?></div>
                                        <div class="home-cada-data-mes"><?php echo $mes_ini; ?></div>
                                    </td>
                                    <td><div class="home-cada-date-tit"><?php echo get_the_title(); ?></div></td>
                                </tr>
                            </table>
                        </div>
                    <?php
                        }else{
                    ?>
                        <div class="home-cada-date" title="<?php echo get_the_excerpt(); ?>">
                            <table class="home-cada-data-wrap home-cada-data-split">
                                <tr>
                                    <td>
                                        <div class="home-cada-data-dia"><?php echo $dia_ini; ?></div>
                                        <div class="home-cada-data-mes"><?php echo $mes_ini; ?></div>
                                        <span>a</span>
                                        <div class="home-cada-data-dia"><?php echo $dia_fim; ?></div>
                                        <div class="home-cada-data-mes"><?php echo $mes_fim; ?></div>
                                    </td>
                                    <td><div class="home-cada-date-tit"><?php echo get_the_title(); ?></div></td>
                                </tr>
                            </table>
                        </div>
                    <?php  
                        }
                        endforeach;
                    ?>
                </div>
            </div>
        </div>
        <div id="right" class="home-agenda-more noselect" style="float:right">chevron_right
            <div class="home-agenda-more-txt">
                <a class="link" href="<?php echo get_home_url(); ?>/datasimportantes">Ver todos os eventos...</a>
            </div>
        </div>
        
    </div>
</div>