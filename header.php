<?php
 /*   if(!is_user_logged_in()){
      include(get_template_directory() . "/manutencao/index.php");
      exit();
    }*/
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('name'); 
    $title_page = wp_title('', false);
    if($title_page!=""){
        echo " | ".$title_page;
    }?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="<?php echo get_template_directory_uri (); ?>/img/icon-32x32.png" sizes="32x32" />
    <link rel="icon" href="<?php echo get_template_directory_uri (); ?>/img/icon-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri (); ?>/img/icon-180x180.png" />
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri (); ?>/img/icon-270x270.png" />
<?php if(!is_front_page()){ ?>
    <script src="<?php echo get_template_directory_uri (); ?>/js/clipboard.min.js"></script>
<?php } ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri (); ?>/js/fatec.js"></script>
    <script>$(document).ready(function(){$("a").on('click', function(event) {if (this.hash !== "") {event.preventDefault(); var hash = this.hash; $('html, body').animate({ scrollTop: $(hash).offset().top}, 800, function(){window.location.hash = hash;});}});});</script>
    <link href=<?php echo get_template_directory_uri() . "/style.php" ?> rel="stylesheet">
    <?php
    function coalesce_image_post(){
        if(get_the_post_thumbnail_url()==""){
            return get_template_directory_uri() . "/img/opengraph.png";
        }else{
            return get_the_post_thumbnail_url();
        }
    }
$inicial = is_front_page() || is_home() || is_front_page() && is_home();
if($inicial){?>
<meta property="og:url"                content="<?php echo home_url( $wp->request ) ?>" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="<?php echo the_title() ?>" />
<meta property="og:description"        content="<?php echo strip_tags( get_the_excerpt() );  ?>" />
<meta property="og:image"              content="<?php echo coalesce_image_post(); ?>" />
<?php }else{ global $wp; ?>
<meta property="og:url"                content="<?php echo home_url( $wp->request ) ?>" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="<?php echo the_title() ?>" />
<meta property="og:description"        content="<?php echo strip_tags( get_the_excerpt() );  ?>" />
<meta property="og:image"              content="<?php echo coalesce_image_post(); ?>" />
<?php } ?>
<style>
    .aviso-container{
        width: 100%;
        margin: auto;
        height: 100%;
        position: fixed;
        z-index: 9999;
        background-color: #000000cc;
    }
    .aviso-container .aviso{
        width: 450px;
        max-width: 95vw;
        margin: auto;
        margin-top: 10%;
        background-color: #ffffff;
        border-radius: 6px;
    }
    .aviso-container h3{
        font-size: 42px;
        background-color: black;
        color: white;
        border-top-left-radius: 5px;
        text-align: center;
        border-top-right-radius: 5px;
        margin-bottom: 0px;
    }
    .aviso-container p{
        font-size: 20px;
        padding: 16px;
        padding-bottom: 33px;
        text-align: center;
    }
    .aviso-container button{
        height: 30px;
        margin-top: 10px;
        font-size: 18px;
    }
</style>
</head><body><!--div class="aviso-container" id="avco" style="">
    <div class="aviso">
        <h3>COMUNICADO FATECS E ETECS</h3>
        <p>Centro Paula Souza suspende as aulas nas Fatecs a partir de segunda-feira (16/03/2020)
            e nas Etecs, a partir de 23/03/2020<br>
            <button onclick="javascript:document.getElementById('avco').style.display='none'">
                Fechar aviso
            </button>
        </p>
    </div>
</div--><div class="perguntaLinkContainer">
        <div class="perguntaLink">
            <div class="perguntaLabel">
                Esse link pode ser acessado exclusivamente através da rede interna da Fatec Americana
            </div>
            <div class="perguntaInterno">
                <a id="segundoLink">Estou na rede interna da Fatec e desejo continuar</a>
            </div>
            <div class="perguntaVoltar">
                <a id="linkVoltar" href="#" onclick="document.getElementsByClassName('perguntaLinkContainer')[0].style.display='';">Voltar</a>
            </div>
        </div>
    </div><div id="canvas"><a id="top"></a>
    <?php 
    if(is_user_logged_in()){ ?>
        <a style="position:absolute" href="javascript:document.getElementById('myModalInfo').style.display ='block';void(0)"><i class="material-icons" >info</i></a>
        <div id="myModalInfo" class="modal">
            <div class="modal-content">
                <span class="close" onclick="document.getElementById('myModalInfo').style.display ='none'">×</span>
                <strong>Informações da página</strong>
                <?php echo "<pre style='max-height: 300px;overflow-y: scroll;'>";
                var_export($wp_query);
                echo "</pre>"; ?>
            </div>
        </div> 
    <?php
    } 
    ?><div class="header-wrap">
        <img class="imagem-print" src="<?php echo get_template_directory_uri (); ?>/img/logo-colorido.png" />
        <div id="header">
            <div class="btn-top"><a href="#top"><i class="material-icons">arrow_upward</i></a></div>
            <div style="height:110px;">
                <div class="logo-wrap"><div class="header-logo" onclick="location.href='<?php echo get_home_url(); ?>'"></div></div>
                <div style="float:right; width:540px;height:"><div class="header-menu2">
                <div class="header-pesq">
                    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_home_url(); ?>">
                        <input type="text" value="Pesquisar..." name="s" id="s" style="background-image: url('<?php echo get_template_directory_uri (); ?>/img/ic_search_white_1x.png');">
                    </form>
                    <div class="social-links" >
                        <a href="https://www.facebook.com/faculdadedetecnologiadeamericana"><svg viewBox="0 0 24 24">
                            <path fill="#4a555c" d="M19,4V7H17A1,1 0 0,0 16,8V10H19V13H16V20H13V13H11V10H13V7.5C13,5.56 14.57,4 16.5,4M20,2H4A2,2 0 0,0 2,4V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V4C22,2.89 21.1,2 20,2Z" />
                        </svg></a>
                        <a href="https://twitter.com/hashtag/fatecamericana"><svg viewBox="0 0 24 24">
                            <path fill="#4a555c" d="M17.71,9.33C17.64,13.95 14.69,17.11 10.28,17.31C8.46,17.39 7.15,16.81 6,16.08C7.34,16.29 9,15.76 9.9,15C8.58,14.86 7.81,14.19 7.44,13.12C7.82,13.18 8.22,13.16 8.58,13.09C7.39,12.69 6.54,11.95 6.5,10.41C6.83,10.57 7.18,10.71 7.64,10.74C6.75,10.23 6.1,8.38 6.85,7.16C8.17,8.61 9.76,9.79 12.37,9.95C11.71,7.15 15.42,5.63 16.97,7.5C17.63,7.38 18.16,7.14 18.68,6.86C18.47,7.5 18.06,7.97 17.56,8.33C18.1,8.26 18.59,8.13 19,7.92C18.75,8.45 18.19,8.93 17.71,9.33M20,2H4A2,2 0 0,0 2,4V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V4C22,2.89 21.1,2 20,2Z" />
                        </svg></a>
                        <!--a href="#"><svg viewBox="0 0 24 24">
                            <path fill="#4a555c" d="M10,16.5V7.5L16,12M20,4.4C19.4,4.2 15.7,4 12,4C8.3,4 4.6,4.19 4,4.38C2.44,4.9 2,8.4 2,12C2,15.59 2.44,19.1 4,19.61C4.6,19.81 8.3,20 12,20C15.7,20 19.4,19.81 20,19.61C21.56,19.1 22,15.59 22,12C22,8.4 21.56,4.91 20,4.4Z" />
                        </svg></a-->
                        <a href="https://www.instagram.com/fatecamoficial/"><svg viewBox="0 0 24 24">
                            <path fill="#4a555c" d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
                        </svg></a>
                    </div>
                </div>
                <div class="menu2">
                    <li class="sub-manual-pai"><a href="<?php echo get_home_url(); ?>/category/professor"><i class="material-icons">assignment_ind</i><span>Professores</span></a></li>
                    <li class="sub-manual-pai"><a href="<?php echo get_home_url(); ?>/category/aluno"><i class="material-icons">face</i><span>Alunos</span></a></li>
                    <li class="sub-manual-pai"><a target="_blank" href="http://hypnos.americana.fatec.br/biblioteca/opac/"  class="speedbump"><i class="material-icons">local_library</i><span>Biblioteca</span></a>
                        <div class="sub-manual">
                            <a target="_blank" href="http://hypnos.americana.fatec.br/biblioteca/opac/" class="speedbump">Acervo</a><br>
                            <a href="<?php echo get_home_url(); ?>/biblioteca">Informações</a><br>
                            <a href="<?php echo get_home_url(); ?>/periodicos-de-acesso-aberto">Periódicos de acesso aberto</a>
                            <a target="_blank" href="http://stor.americana.fatec.br" class="speedbump">RIC-CPS</a>
                        </div>
                    </li>
                    <li class="sub-manual-pai"><a href="http://fatec.edu.br/revista/"><i class="material-icons">receipt</i><span>Revista Tecnológica</span></a></li>
                </div>
            </div></div>                
            </div>
            <div class="menu-texto-wrap">
                <?php wp_nav_menu(array( 'menu' => 'Menu Principal')); ?>
                <div class="botoes-menores">
                    <i class="material-icons"><a href="<?php echo get_home_url(); ?>/category/professor" title="Professor">assignment_ind</a></i>
                    <i class="material-icons"><a href="<?php echo get_home_url(); ?>/category/aluno" title="Aluno">face</a></i>
                    <i class="material-icons"><a href="<?php echo get_home_url(); ?>/biblioteca" title="Biblioteca">local_library</a></i>
                    <i class="material-icons"><a href="http://fatec.edu.br/revista/" title="Revista Tecnológica">receipt</a></i>
                    <i class="material-icons"><a href="#s" title="Pesquisa">search</a></i>
                </div>
            </div>
        </div>
        <div id="header-mobile">
            <table style="border-collapse: collapse;">
            <tr><td style="border:0px;padding:0; margin:0;">
            <button id="btn-menu"><i class="material-icons">menu</i></button>
            </td><td style="border:0px;padding:0; margin:0;">
            <a href="<?php echo get_home_url()?>" style="font-size: 30px;color: rgb(242,242,242);text-decoration: none;">
                Fatec Americana
            </a>
            </td></tr></table>
            <div id="menu-mobile-container">
                <div class="botoes-menores">
                    <i class="material-icons"><a href="<?php echo get_home_url(); ?>/category/professor" title="Professor">assignment_ind</a></i>
                    <i class="material-icons"><a href="<?php echo get_home_url(); ?>/category/aluno" title="Aluno">face</a></i>
                    <i class="material-icons"><a href="http://hypnos.americana.fatec.br/biblioteca/opac/" title="Biblioteca"  class="speedbump">local_library</a></i>
                    <i class="material-icons"><a href="http://fatec.edu.br/revista/" title="Revista Tecnológica">receipt</a></i>
                    <i class="material-icons"><a href="#sm" title="Pesquisa" id="click-search">search</a></i>
                </div>
                <form role="search" method="get" id="searchform2" class="searchform" action="<?php echo get_home_url(); ?>">
                    <input type="text" value="Pesquisar..." name="s" id="sm" style="max-height:34px; background-image: url('<?php echo get_template_directory_uri (); ?>/img/ic_search_white_1x.png');">
                </form>
                <?php wp_nav_menu(array( 'menu' => 'Menu Principal')); ?>
            </div>
        </div>
    </div>
    <div id="primaryContent">