<?php
/*****************************************************************
SLIDER INICIAL
*****************************************************************/
    $args = array( 'post_type'   => 'Slider Inicial' );
    $myposts = get_posts( $args );
    if(count($myposts)){
        
        $images = Array();
        foreach ( $myposts as $post ) : setup_postdata( $post ); 
            $images[] = Array("title" => get_the_title(),
                              "imagem" => wp_get_attachment_url( get_post_thumbnail_id()),
                              "preview" => get_the_content ());
        endforeach;
         
        wp_reset_postdata();
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/bjqs-1.3.min.js"></script>
<div id="my-slideshow" style="box-shadow: 0px 2px 8px 0px rgba(0,0,0,0.5);"><ul class="bjqs"><?php 
		foreach ( $images as $cadaImagem ){ 
           ?><li><div class="cadaSlide" style="background-image: url(<?php echo $cadaImagem['imagem']; ?>)">
<?php if($cadaImagem['title'] . $cadaImagem['preview'] != ""){ ?>
                    <div class="slide-title"><?php echo $cadaImagem['title']; ?></div>
                    <div class="slide-text"><?php echo $cadaImagem['preview']; ?></div>
<?php } ?>
                </div>
            </li>            
        <?php } ?>
	</ul>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
	$('#my-slideshow').bjqs({
		'height' : '60vw',
        'width' : '100vw',
        animtype : 'fade',
		'responsive' : true,
        'showcontrols' : false,
        'keyboardnav' : true, // enable keyboard navigation
        'hoverpause' : true, // pause the slider on hover
	});
});
</script>
<?php
    }
?>