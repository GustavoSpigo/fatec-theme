<?php
/**
* Wordpress Naked, a very minimal wordpress theme designed to be used as a base for other themes.
*
* @licence LGPL
* @author Darren Beale - http://siftware.co.uk - bealers@gmail.com - @bealers
* 
* Project URL http://code.google.com/p/wordpress-naked/
*/
//error_reporting(E_ALL); 
//ini_set("display_errors", 1);
/**
* @desc make the site's heading & tagline an h1 on the homepage and an h4 on internal pages
* Naked's default CSS should make the two different states look identical
*/

include( get_template_directory() . '/functions.menu.php');

add_action('after_setup_theme', 'fatec_jogos_setup');
function fatec_jogos_setup(){
    load_theme_textdomain('fatec-jogos', get_template_directory() . '/languages');
}

function do_heading()
{
  $output = "";

  if(is_home()) $output .= "<h1>"; else  $output .= "<h4>";

  $output .= "<a href='"  . get_bloginfo('url') . "'>" . get_bloginfo('name') . "</a> <span>" . get_bloginfo('description') . "</span>";

  if(is_home()) $output .= "</h1>"; else  $output .= "</h4>";

  return $output;
}

/**
* register_sidebar()
*
*@desc Registers the markup to display in and around a widget
*/
if ( function_exists('register_sidebar') )
{
  register_sidebar(array(
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '',
    'after_title' => '',
  ));
}

/**
* Check to see if this page will paginate
* 
* @return boolean
*/
function will_paginate() 
{
  global $wp_query;
  global $abort_pagination;
  if($abort_pagination){
      return false;
  }

  if ( !is_singular() ) 
  {
    $max_num_pages = $wp_query->max_num_pages;
    
    if ( $max_num_pages > 1 ) 
    {
      return true;
    }
  }
  return false;
}

$args = array(
	'width'         => 300,
	'height'        => 65,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
);
add_theme_support( 'custom-header', $args );

register_nav_menus( array(
	'main_menu' => 'Menu Principal'
) );
register_nav_menus( array(
	'main_footer' => 'Menu Rodapé'
) );

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}


/**
 * Register meta box(es).
 */
function wpdocs_register_meta_boxes() {
    add_meta_box( 'meta-box-id'
                , __( 'Data do evento', 'textdomain' )
                , 'wpdocs_my_display_callback'
                , 'Datas Importantes' );
    
    add_meta_box( 'meta-employes'
                , __('Informações Adicionais', 'textdomain')
                , 'wpdocs_employes_callback'
                , 'Docentes');
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );
 
function wpdocs_my_display_callback( $post , $metabox ) {
    global $post;
    echo "Informe a data do evento<br><br>";
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    echo '<table><tr><td>';
    echo 'Data Início';
    echo '</td><td>';
    $varArray = get_post_meta($post->ID, 'dt-ini', FALSE); 
    echo '<INPUT TYPE="date" required NAME="dt-ini" VALUE="'. $varArray[0] .'">';
    echo '</td></tr><tr><td>';
    echo 'Data Fim';
    echo '</td><td>';
    $varArray = get_post_meta($post->ID, 'dt-fim', FALSE);
    echo '<INPUT TYPE="date" required NAME="dt-fim" VALUE="'. $varArray[0].'">';
    echo '</td></tr></table>';
}
 function wpdocs_employes_callback( $post , $metabox ) {
    global $post;
    echo '<script>
    function atualizaEmployeCampos(o){
        document.getElementById("linha-lattes").style.display = o == "docente"? "":"none";
        document.getElementById("linha-link").style.display = o == "docente"? "":"none";
        document.getElementById("linha-titulação").style.display = o == "docente"? "":"none";

        document.getElementsByName("lattes")[0].required = o == "docente";
        document.getElementsByName("titulação")[0].required = o == "docente";
    }
    window.addEventListener("load",function(){
        atualizaEmployeCampos(document.getElementById("type-employe").value);
    },false);
    </script>';
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    echo '<table><tr><td style="width:200px;">';
    echo 'Tipo';
    echo '</td><td>';
    $varArray = get_post_meta($post->ID, 'type-employe', FALSE); 
    echo '<select name="type-employe" id="type-employe" onchange="atualizaEmployeCampos(this.value)">
  <option value="docente" ' . ($varArray[0]=='docente' ? 'selected' :'') . '>Docente</option>
  <option value="adm" ' . ($varArray[0]=='adm' ? 'selected' :'') . '>Técnico Administrativo</option>
</select>';
    
    echo '</td></tr><tr id="linha-lattes"><td>';
    echo 'Link para o Lattes';
    echo '</td><td>';
    $varArray = get_post_meta($post->ID, 'lattes', FALSE);
    echo '<INPUT TYPE="url" required NAME="lattes" VALUE="'. $varArray[0].'" style="width:300px;">';
    echo '</td></tr><tr id="linha-link"><td>';
    echo 'Site';
    echo '</td><td>';
    $varArray = get_post_meta($post->ID, 'link', FALSE);
    echo '<INPUT TYPE="url" NAME="link" VALUE="'. $varArray[0].'" style="width:300px;">';
    echo '</td></tr><tr id="linha-titulação"><td>';
    echo 'Titulação';
    echo '</td><td>';
    $varArray = get_post_meta($post->ID, 'titulação', FALSE);
    echo '<INPUT TYPE="text" required NAME="titulação" VALUE="'. $varArray[0].'">';
    echo '</td></tr></table>';
}
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function wpdocs_save_meta_box( $post_id, $post ) {
    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

    $events_meta['dt-ini'] = $_POST['dt-ini'];
    $events_meta['dt-fim'] = $_POST['dt-fim'];
    
    $events_meta['lattes'] = $_POST['lattes'];
    $events_meta['link'] = $_POST['link'];
    $events_meta['titulação'] = $_POST['titulação'];

    $events_meta['type-employe'] = $_POST['type-employe'];
    
    // Add values of $events_meta as custom fields
    

    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }


}
add_action( 'save_post', 'wpdocs_save_meta_box', 1, 2 );

function create_posttype() {

	register_post_type( 'Notícias',
		array(
			'labels' => array(
				'name' => __( 'Notícias' ),
				'singular_name' => __( 'Notícia' ),
                'add_new' => __('Adicionar nova notícia'),
                'add_new_item' => __('Adicionar nova notícia'),
                'edit_item' => __('Editar notícia'),
                'new_item' => __('Adicionar nova notícia'),
                'view_item' => __('Ver notícia'),
                'search_items' => __('Procurar notícias'),
                'not_found' => __('Nenhuma notícia encontrada'),
                'not_found_in_trash' => __('Nenhuma notícia na lixeira')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'noticias'),
            'menu_icon' => 'dashicons-list-view',
            'supports' => array (
                'title',
                'editor',
                'thumbnail', 
                'excerpt'
            ),
	        'taxonomies' => array('category')
		)
	);
    register_post_type( 'Slider Inicial',
		array(
			'labels' => array(
				'name' => __( 'Slider Inicial' ),
				'singular_name' => __( 'Slide' ),
                'add_new' => __('Adicionar novo slide'),
                'add_new_item' => __('Adicionar novo slide'),
                'edit_item' => __('Editar slide'),
                'new_item' => __('Adicionar novo slide'),
                'view_item' => __('Ver slide'),
                'search_items' => __('Procurar slides'),
                'not_found' => __('Nenhum slide encontrado'),
                'not_found_in_trash' => __('Nenhum slide na lixeira')
			),
			'public' => true,
			'has_archive' => true,
            'menu_icon' => 'dashicons-slides',
            'supports' => array (
                'title',
                'thumbnail',
                'editor'
            )
		)
	);
    register_post_type( 'Docentes',
		array(
			'labels' => array(
				'name' => __( 'Docentes' ),
				'singular_name' => __( 'Docente' ),
                'add_new' => __('Adicionar novo docente'),
                'add_new_item' => __('Adicionar novo docente'),
                'edit_item' => __('Editar docente'),
                'new_item' => __('Adicionar novo docente'),
                'view_item' => __('Ver docente'),
                'search_items' => __('Procurar docentes'),
                'not_found' => __('Nenhum docente encontrado'),
                'not_found_in_trash' => __('Nenhum docente na lixeira')
			),
			'public' => true,
			'has_archive' => true,
            'menu_icon' => 'dashicons-welcome-learn-more',
            'supports' => array (
                'title',
                'thumbnail'
            )
		)
	);
    add_filter( 'enter_title_here', 'custom_enter_title' );
    function custom_enter_title( $input ) {
        if ( 'docentes' === get_post_type() ) {
            return __( 'Insira o nome aqui');
        }
        return $input;
    }
    register_post_type( 'Cursos',
		array(
			'labels' => array(
				'name' => __( 'Cursos' ),
				'singular_name' => __( 'Curso' ),
                'add_new' => __('Adicionar novo curso'),
                'add_new_item' => __('Adicionar novo curso'),
                'edit_item' => __('Editar curso'),
                'new_item' => __('Adicionar novo curso'),
                'view_item' => __('Ver curso'),
                'search_items' => __('Procurar curso'),
                'not_found' => __('Nenhum curso encontrado'),
                'not_found_in_trash' => __('Nenhum curso na lixeira')
			),
			'public' => true,
			'has_archive' => true,
            'menu_icon' => 'dashicons-awards',
            'supports' => array (
                'title',
                'thumbnail',
                'editor',
                'excerpt'
            ),
	        'taxonomies' => array('category')
		)
	);
    register_post_type( 'Datas Importantes',
		array(
			'labels' => array(
				'name' => __( 'Datas Importantes' ),
				'singular_name' => __( 'Data Importante' ),
                'add_new' => __('Adicionar nova data importante'),
                'add_new_item' => __('Adicionar nova data importante'),
                'edit_item' => __('Editar data importante'),
                'new_item' => __('Adicionar novo  data importante'),
                'view_item' => __('Ver data importante'),
                'search_items' => __('Procurar data importante'),
                'not_found' => __('Nenhuma data importante encontrada'),
                'not_found_in_trash' => __('Nenhuma data importante na lixeira')
			),
			'public' => true,
			'has_archive' => true,
            'menu_icon' => 'dashicons-calendar-alt',
            'supports' => array (
                'title',
                'editor',
                'excerpt'
            )
		)
	);
    register_post_type( 'Estagios',
		array(
			'labels' => array(
				'name' => __( 'Estágios' ),
				'singular_name' => __( 'Estágio' ),
                'add_new' => __('Adicionar novo estágio'),
                'add_new_item' => __('Adicionar novo estágio'),
                'edit_item' => __('Editar estágio'),
                'new_item' => __('Adicionar novo estágio'),
                'view_item' => __('Ver estágio'),
                'search_items' => __('Procurar estágio'),
                'not_found' => __('Nenhum estágio encontrada'),
                'not_found_in_trash' => __('Nenhum estágio na lixeira')
			),
			'public' => true,
			'has_archive' => true,
            'menu_icon' => 'dashicons-id',
            'supports' => array (
                'title',
                'editor'
            )
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

function imagem($atual){
    return ($atual=="")? get_template_directory_uri () . "/img/default_t.jpg" : $atual;
}

function my_mce_before_init( $init_array ) {
	$init_array['theme_advanced_styles'] =
            '.translation=translation;.contributors=contributors;.notes=notes;';

	return $init_array;
}
add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function wpa_order_docentes( $query ){
    
    if( 'docentes' == @$query->query['post_type']){
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
        $query->set( 'posts_per_page', 9999 );
    }
    if( 'dataimportantes' == @$query->query['post_type']){
        $query->set( 'posts_per_page', 9999 );
    }
}
add_action( 'pre_get_posts', 'wpa_order_docentes' );

function mes($num){
    if($num=='01') return 'Jan';
    if($num=='02') return 'Fev';
    if($num=='03') return 'Mar';
    if($num=='04') return 'Abr';
    if($num=='05') return 'Mai';
    if($num=='06') return 'Jun';
    if($num=='07') return 'Jul';
    if($num=='08') return 'Ago';
    if($num=='09') return 'Set';
    if($num=='10') return 'Out';
    if($num=='11') return 'Nov';
    if($num=='12') return 'Dez';
}
function parent_link($post_atual){
    if($post_atual->post_type=="page"){
        return "";
    }elseif($post_atual->post_type=="post"){
        return "";
    }else{
        return "<a class='voltar' href='". get_post_type_archive_link($post_atual->post_type) ."'>" .
               "Voltar para " . get_post_type_object( get_post_type($post))->label . 
               "</a>";
    }
}

function curso_func( $atts ){
    $original_blog_id = get_current_blog_id();
    //$menu = "<script src='". get_template_directory_uri () ."/js/menu-curso.js'></script>";
    $menu = '<script>
var lala;
$( document ).ready(function() {
    $(".menu-curso-item").click(function() {
        $(".menu-curso-item").removeClass("menu-curso-item-selected");
        $(event.target).addClass("menu-curso-item-selected");

        $(".curso-bloco").hide();
        sender = $(event.target);
        $("#" + sender[0].id + "page").show();

        //$(document).scrollTop( $("#info").offset().top );  
    });
});
</script>
<style>
.menu-curso-item-selected{
    background-color:' . $atts['menuselecback'] . ' !important;
}
</style>
';
    switch_to_blog($atts['site']); 

    $menu .= "<div class='menu-curso' style='background-color:" . $atts['menuback'] . "'>";
    $html = "<a id='info'></a>";
    $first = true;
    foreach(explode(",", $atts['paginas']) as $cadaPaginaPai):
        $titulo = get_the_title($cadaPaginaPai);
        $menu .= "<a href='#info'><div id='_curso_menu$cadaPaginaPai' class='menu-curso-item" . (($first)? ' menu-curso-item-selected':'') . "'>$titulo</div></a>";
        
        $html .= "<div  id='_curso_menu$cadaPaginaPai". "page' class='curso-bloco' style='" .(($first)?'': 'display:none') . "'>"; 
        
        $content = get_post($cadaPaginaPai)->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        $html .=  $content;
        
        $pages = get_pages(array('parent' => $cadaPaginaPai,'sort_column' => 'menu_order'));
        if($pages){
            foreach($pages as $post ) :
                $html .= "<h2>". get_the_title($post). "</h2>";
                $content = $post->post_content;
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]&gt;', $content);
                $html .=  $content;
            endforeach;
        } 
        $html .= "</div>";
        $first = false;             
    endforeach;
    $menu .= "</div>";
    
    switch_to_blog( $original_blog_id );
    return $menu . $html;
}
add_shortcode( 'curso', 'curso_func' );

function tec_adm_func( $atts ){
    include(get_template_directory() . "/list.adm.php");
}
add_shortcode( 'tecadm', 'tec_adm_func' );

add_image_size( 'crunchify-admin-post-featured-image', 120, 120, false );
 
// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_posts_columns', 'crunchify_add_post_admin_thumbnail_column', 2);
add_filter('manage_pages_columns', 'crunchify_add_post_admin_thumbnail_column', 2);
 
// Add the column
function crunchify_add_post_admin_thumbnail_column($crunchify_columns){
	$crunchify_columns['crunchify_thumb'] = __('Featured Image');
	return $crunchify_columns;
}
 
// Let's manage Post and Page Admin Panel Columns
add_action('manage_posts_custom_column', 'crunchify_show_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'crunchify_show_post_thumbnail_column', 5, 2);
 
// Here we are grabbing featured-thumbnail size post thumbnail and displaying it
function crunchify_show_post_thumbnail_column($crunchify_columns, $crunchify_id){
	switch($crunchify_columns){
		case 'crunchify_thumb':
		if( function_exists('the_post_thumbnail') )
			echo the_post_thumbnail( 'crunchify-admin-post-featured-image' );
		else
			echo 'hmm... your theme doesn\'t support featured image...';
		break;
	}
}
?>