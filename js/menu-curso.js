$( document ).ready(function() {
    $(".menu-curso-item").click(function() {
        $(".menu-curso-item").removeClass("menu-curso-item-selected");
        $(event.target).addClass("menu-curso-item-selected");
    });
});