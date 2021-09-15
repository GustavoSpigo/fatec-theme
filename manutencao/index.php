<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>FATEC Americana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='stylesheet' href='<?php echo get_template_directory_uri (); ?>/manutencao/css/fatec.css' type='text/css' />
    <link rel="icon" href="<?php echo get_template_directory_uri (); ?>/manutencao/img/favicon.ico">
    <!--[if IE]><link rel="shortcut icon" href="<?php echo get_template_directory_uri (); ?>/manutencao/img/favicon.ico"><![endif]-->
    </head>
    <style>
        #content{
            background-image: url("<?php echo get_template_directory_uri (); ?>/manutencao/img/barra.png");
        }
	.modal{background-color: rgba(0,0,0,0.8) !important;}
    </style>
<body style="background-image: url('<?php echo get_template_directory_uri (); ?>/manutencao/img/fatec-americana.jpg');">
<?php
    $args = array( 'post_type'   => 'notcias', 'numberposts'=>-1 );
    $myposts = get_posts( $args );
    foreach ( $myposts as $post ) : setup_postdata( $post );
?>
<div id="myModal<?php echo $post->ID; ?>" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="document.getElementById('myModal<?php echo $post->ID; ?>').style.display ='none'">×</span>
                            <p><?php echo $post->post_content; ?></p>
                        </div>
                        </div>
<?php
    endforeach;	
?>
    <div id="container">
        <div id="header">
            <table class="logo">
                <tr>
                    <td class="fatec">
                        <img src="<?php echo get_template_directory_uri (); ?>/manutencao/img/fatec30anos.min.png" />
                    </td>
                    <td class="cps">
                        <img src="<?php echo get_template_directory_uri (); ?>/manutencao/img/cps.png" />
                    </td>
                    <td class="gov">
                        <img src="<?php echo get_template_directory_uri (); ?>/manutencao/img/gov.png" />
                    </td>
                </tr>
            </table>
        </div>
        <div id="content">
            <div class="content-left">
                <div class="manutencao">
                    <i class="material-icons">build</i>
                    <h1>Site em manutenção</h1>
                </div>
                <div class="manutencao-aviso">
                    <h3>Nosso site oficial encontra-se em manutenção temporária.<br>
                    Entre em contato pelo telefone (19) 3406 5776<br>
                    ou pelo e-mail <a href="mailto:direcao@fatec.edu.br ">direcao@fatec.edu.br </a><br>
                    ou pelo e-mail <a href="mailto:academica@fatec.edu.br ">academica@fatec.edu.br </a></h3>
                </div>
            </div><div class="content-right">
                <div class="news-container">
                    <div class="new-title">Notícias</div>
<?php
    if(count($myposts)){
        
        $images = Array();
        foreach ( $myposts as $post ) : setup_postdata( $post );
            if($post->post_excerpt==""){
                ?>
                    <div class="news"><?php echo $post->post_content; ?></div>
                    <!--pre>
                        <?php echo var_export($post,true); ?>
                    </pre-->

                <?php
            }else{
                ?>
                    <div class="news">
                        <span class="linkmodal" onclick="document.getElementById('myModal<?php echo $post->ID; ?>').style.display ='block'"><?php echo $post->post_excerpt; ?></span>
                    </div>
                <?php
            }
        
        endforeach;
        wp_reset_postdata();
    }
?>              </div>
            </div>
        </div>
        <div id="footer">
            <table class="logo">
                <tr>
                    <td width="50%" class="mapa">
                        <table><tr><td>
                        <a class="link" target="_blank" href="https://www.google.com.br/maps/place/FATEC+Americana/@-22.739302,-47.350742,15z/data=!4m5!3m4!1s0x94c89bc1bf4f929b:0xf9a443e43964e245!8m2!3d-22.7395945!4d-47.3511606!6m1!1e1">
                            <i class="material-icons">location_on</i>
                        </a>
                        </td><td>
                        <a class="link" target="_blank" href="https://www.google.com.br/maps/place/FATEC+Americana/@-22.739302,-47.350742,15z/data=!4m5!3m4!1s0x94c89bc1bf4f929b:0xf9a443e43964e245!8m2!3d-22.7395945!4d-47.3511606!6m1!1e1">
                            R. Emílio de Menezes, s/n - Vila Amorim<br>Americana/SP - CEP: 13469-111
                        </a>
                        </td></tr></table>
                    </td>
                    <td style="text-align: right;padding-right: 50px;">
                        <a class="link" target="_blank" href="http://hypnos.americana.fatec.br" class="speedbump">
                           Acesse o Hypnos</a><br>
                        <a class="link" target="_blank" href="https://www.sigacentropaulasouza.com.br/fatec/">
                           Acesse o SIGA (Professor)</a><br>
                        <a class="link" target="_blank" href="https://www.sigacentropaulasouza.com.br/aluno/">
                           Acesse o SIGA (Aluno)</a><br>
                        <a class="link" target="_blank" href="http://www.fatec.edu.br/moodle/">
                           Acesse o Moodle</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>