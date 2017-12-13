function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

$(document).ready(function () {
    var date = new Date(0);
    document.cookie = "Search=; expires="+date.toUTCString();
    $("#all_list").click(function() {
        var id = "artist";
        document.cookie = "Search=; expires="+date.toUTCString();
        $("#fon").css({'display':'block'});
        $("#load").fadeIn(1000,function () {
            $.ajax({
                url:'index.php',
                data:'sort='+id,
                type:'get',
                dataType:'json',
                success:function (html) {
                    console.log(html);
                    $("#list").html('');
                    for(value in html) {
                        $("#list").append(
                            '<section><h2>' +
                            html[value]['artist']
                            +' - '+
                            html[value]['title']+
                            '</h2><p id="genre">Жанр: '+
                            html[value]['genre']+
                            '</p><audio controls><source src="songs/'+
                            html[value]['file']+
                            '" type="audio/mpeg">Your browser does not support the audio element.</audio></section>'
                        );
                    }

                    $("#list").hide().fadeIn(2000);
                    $("#fon").css({'display':'none'});
                    $("#load").fadeOut(1000);
                }
            });
        });
    });


    $("select").on('change', function() {
        var id = this.value;
        $("#fon").css({'display':'block'});
        $("#load").fadeIn(1000,function () {
            $.ajax({
                url:'index.php',
                data:'sort='+id+(getCookie("Search") != undefined ? '&search='+getCookie("Search") : ''),
                type:'get',
                dataType:'json',
                success:function (html) {
                    console.log(html);
                    $("#list").html('');
                    for(value in html) {
                        $("#list").append(
                            '<section><h2>' +
                            html[value]['artist']
                            +' - '+
                            html[value]['title']+
                            '</h2><p id="genre">Жанр: '+
                            html[value]['genre']+
                            '</p><audio controls><source src="songs/'+
                            html[value]['file']+
                            '" type="audio/mpeg">Your browser does not support the audio element.</audio></section>'
                        );
                    }

                    $("#list").hide().fadeIn(2000);
                    $("#fon").css({'display':'none'});
                    $("#load").fadeOut(1000);
                }
            });
        });
    });

    $("#searchsubmit").click(function(){
        var id = $('#search').val();
        document.cookie = "Search="+id;
        $("#fon").css({'display':'block'});
        $("#load").fadeIn(1000,function () {
            $.ajax({
                url:'index.php',
                data:'search='+id,
                type:'get',
                dataType:'json',
                success:function (html) {
                    console.log(html);
                    $("#list").html('');
                    for(value in html) {
                        $("#list").append(
                            '<section><h2>' +
                            html[value]['artist']
                            +' - '+
                            html[value]['title']+
                            '</h2><p id="genre">Жанр: '+
                            html[value]['genre']+
                            '</p><audio controls><source src="songs/'+
                            html[value]['file']+
                            '" type="audio/mpeg">Your browser does not support the audio element.</audio></section>'
                        );
                    }

                    $("#list").hide().fadeIn(2000);
                    $("#fon").css({'display':'none'});
                    $("#load").fadeOut(1000);
                }
            });
        });
    });
});
