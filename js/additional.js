    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    $('.fa-stack').hover(function() {
        $(this).children('i:first-child').css({'color':'#d6b913'});
        $(this).children('i:nth-child').css({'color':'#d6b913'});
    }, function() {
        $(this).children('i:first-child').css({'color':'#302304'});
    });

     $("#menu-tutup").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    var next;
    $('#scroll-down').click(function() {
        if (next === undefined) {
            next = $('section');
        } else {
            next = next.next();
        }
        $('html,body').animate({
            scrollTop: next.offset().top
        }, 500);
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length && (target.selector !== "#carousel-service")) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });

    $(document).ready(function(){
        var index = 0,
        items = $('.slider div'),
        total = items.length;

        function slide(){
            var item = $('.slider div').eq(index);
            items.hide();
            item.css('display', 'block');

        }

        var load = setInterval(function(){
            index++;
            if(index > total - 1) index = 0;
            slide();
        }, 10000);
    });

    