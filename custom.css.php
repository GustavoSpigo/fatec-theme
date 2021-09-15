<?php 
header("Content-type: text/css; charset: UTF-8");
require_once('../../../wp-load.php');  
?>
.menu-menu-principal-container{
    background-color: rgb(242,242,242);
    background-image: url(<?php header_image(); ?>);
    background-repeat: no-repeat;
    background-position: center left;
    padding-left:<?php echo intval(get_custom_header()->width); ?>px;
    z-index: 3000;
    height:100px;
    max-width: 1044px;
    box-sizing: border-box;
    margin: auto;
    background-position-x: 15px;
}
hr{
    border: none;
    height: 24px;
    background-image: url(<?php echo get_template_directory_uri (); ?>/img/separador3.png);
    background-position: center;
    background-repeat: no-repeat;
    margin: 10px;
    background-size: 800px 1px;
}

hr.comImagens{
    border: none;
    height: 24px;
    background-image: url(<?php echo get_template_directory_uri (); ?>/img/separador.png);
    background-position: center;
    background-repeat: no-repeat;
    margin: 10px;
}