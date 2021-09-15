<?php
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
  
  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    //"<!-- " . var_export($item->url, true) . " : " . get_home_url() . "/ -->\n";
    if(var_export($item->url, true) == "'" . get_home_url() . "/'"){
        $args = array( 'category_name' => '_part-home' );
        $myposts = get_posts( $args );
        $n = count($myposts);
        if(count($myposts)){
            $output .= '<ul class="sub-menu">';
            foreach ( $myposts as $post ) : setup_postdata( $post );
                $output .= '<li class="no-current-menu-item menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-152"><a href="http://spigo.net/jogos/#' . $post->post_name . '">' . $post->post_title . '</a></li>';
            endforeach;
            $output .= '</ul>';
        }        
    }
    $output .= "</li>\n";
    
  }
}
?>