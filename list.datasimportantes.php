<style>
.home-cada-date{
    padding: 10px;
    white-space: initial;
    display:inline-block;
    vertical-align: middle;
}
.home-cada-data-wrap{
    width: 240px;
}
.home-cada-data-wrap td{
    text-align: center;
    
}
.home-cada-data-wrap span{
    color: rgb(148,22,17);
}
.home-cada-data-dia{
    color: rgb(148,22,17);
    font-size: 2rem;
}
.home-cada-data-mes{
    font-size: 1.2rem;
    color: rgb(148,22,17);
    border-top: 1px solid rgb(148,22,17);
}
.home-cada-data-split .home-cada-data-dia{
    font-size: 1.5rem;
}
.home-cada-data-split .home-cada-data-mes{
    font-size: 0.8rem;
}
.home-cada-date-tit{
    padding-left: 5px;
    font-size: 0.8rem;
}
</style><?php

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
$abort_pagination = true;
?>