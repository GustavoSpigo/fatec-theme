function testScroll(ev){
    if(window.pageYOffset>110){
        document.getElementById("header").className = "header-menor"
    }else{
        document.getElementById("header").className = ""
    }
}
window.onscroll=testScroll;

$( document ).ready(function() {
    var $element = $('#s');
    $element.focus(function() {
        var actualValue = $element.val();
        if (actualValue == 'Pesquisar...') {
            $element.val('');
        }
    });
    $element.blur(function() {
        var actualValue = $element.val();
        if (!actualValue) {
            $element.val('Pesquisar...');
        }
    });
    var $element2 = $('#sm');
    $element2.focus(function() {
        var actualValue = $element2.val();
        if (actualValue == 'Pesquisar...') {
            $element2.val('');
        }
    });
    $element2.blur(function() {
        var actualValue = $element2.val();
        if (!actualValue) {
            $element2.val('Pesquisar...');
        }
    });
    var $menu = $('#btn-menu');
    $menu.click(function() {
        $e = $('#menu-mobile-container')[0];
        $e.style.display = ($e.style.display==""?"block":"");
    });

    var $menusearch = $('#click-search');
    $menusearch.click(function() {
        $e = $('#searchform2')[0];
        $e.style.display = ($e.style.display==""?"block":"");
    });


    var handleSpeedBump = function(e) {
        e.preventDefault();
        
        document.getElementById('segundoLink').href = this.getAttribute("data-href");
        document.getElementsByClassName('perguntaLinkContainer')[0].style.display="initial";
        
    }

    $("a.speedbump")
        .click(handleSpeedBump)
        .bind("contextmenu", handleSpeedBump)
        .dblclick(handleSpeedBump)
        .each(function() {
            var href = this.href;
            this.setAttribute("data-href", href);
            this.href = "javascript:void('Ir para " + href.replace("'", "") + "')";
        })
    
});
