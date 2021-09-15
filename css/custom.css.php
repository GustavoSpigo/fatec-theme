<?php 
//header("Content-type: text/css; charset: UTF-8");
//if(!file_exists('../../../../wp-load.php'))
//    exit;   
//require_once('../../../../wp-load.php');  
    $FATEC_Cinza    = "rgb(74,85,92)";
    $FATEC_Vermelho = "rgb(148,22,17)";
    $Quase_Branco   = "rgb(242,242,242)";
    $Jogos_Azul     = "rgb(37,34,97)";
    $Jogos_Laranja  = "rgb(240,89,43)";
echo "/*"; ?><style><?php echo "*/\n"; ?>
.header-logo{
    background-image: url('<?php echo get_template_directory_uri (); ?>/img/logo-colorido.png');
}
#menu-menu-principal{
    background-image: url('<?php echo get_template_directory_uri (); ?>/img/logo-branco.png');    
}
html, body{
    background-color:  <?php echo $Quase_Branco; ?>;
}
body{
    color:<?php echo $FATEC_Cinza; ?>;
}

a:link,
a:visited,
a:hover,
a:active {
    color: <?php echo $FATEC_Cinza; ?>;
}
a.link:link,
a.link:visited,
a.link:hover,
a.link:active {
    color: <?php echo $FATEC_Vermelho; ?>;
}
#primaryContent a:link,
#primaryContent a:visited,
#primaryContent a:hover,
#primaryContent a:active {
    color: <?php echo $FATEC_Cinza; ?>;
}
a.post-edit-link:link,
a.post-edit-link:visited,
a.post-edit-link:hover,
a.post-edit-link:active {
    color: <?php echo $FATEC_Vermelho; ?> !important;
}

#header{    
    background-color: <?php echo $Quase_Branco; ?>;
}
.header-wrap{
    background-color: <?php echo $Quase_Branco; ?>;
}
#footer{
    background-color: <?php echo $FATEC_Cinza; ?> !important;
    color: <?php echo $Quase_Branco; ?> !important;
}
.menu-item-has-children:after {
    color: <?php echo $Quase_Branco; ?>;
}
li.menu-item > a{
    color:   <?php echo $Quase_Branco; ?>;
}
.sub-menu {
    background-color: <?php echo $FATEC_Cinza; ?>;
}
.header-menu2{
    color: <?php echo $FATEC_Cinza; ?>;
}
/*.header-menu2 ul.menu li a{
    color: <?php echo $FATEC_Cinza; ?>;
}*/
.searchform input{
    background-color: rgb(200,200,200);
    color: <?php echo $FATEC_Cinza; ?>;
}
/*
.material-icons.menu-item > a{
    font-size: 18px !important;

}
.material-icons.menu-item{
    font-size: 18px !important;
    padding-top: 10px;
    padding-left: 0px;
    padding-right: 0px !important;
    padding-bottom: 0px;
}
.header-menor .material-icons.menu-item > a{
    font-size: 26px !important;
}
.header-menor .menu2 li:not(.material-icons){
    display:none;
}*/
.sub-manual{
    background-color: <?php echo $Quase_Branco; ?>;
}
<?php echo "/*"; ?></style><?php echo "*/\n"; ?>