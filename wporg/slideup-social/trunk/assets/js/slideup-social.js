(function ($) {
    "use strict"
    //Close buttton 
    $("#btn-close").on("click", function () {
        $('.float-banner').addClass('hidethis');
    });

    $.fn.floatbanner = function (options) {

        //Default options
        var settings = $.extend({
            socialName: ['facebook', 'twitter', 'instagram'],
            userName: ['username', 'username', 'username'],
            socialUrl: ['#', '#', '#']
        }, options);

        var name = settings.socialName;
        var user = settings.userName;
        var link = settings.socialUrl;

        this.each(function () {

            var i = 0;
            for (i; i < name.length; i++) {
                var typ;
                switch (name[i]) {
                    case "facebook":
                        typ = "LIKE"
                        break;
                    case "twitter":
                        typ = "FOLLOW"
                        break;
                    case "instagram":
                        typ = "FOLLOW"
                        break;
                }


                $('.float-banner-wrap').prepend(
                    `<div class="${name[i]}-wrap social-wrap">
                        <div class="social-logo">
                            <img src ="${slideup_plugin_url.Url}/assets/img/${name[i]}.png" alt ="">
                        </div>
                        <div class="social-details">
                            <h6>Keep In Touch</h6>
                            <h4>
                                <span>${typ} </span><a target="_blank" href="${link[i]}">@${user[i]}</a> on <span>${name[i]}<span>
                            </h4>
                        </div>
                    </div>`
                );
            }



            var state = true;
            $(window).scroll(function () {
                if ($(window).scrollTop() >= 600) {
                    $('.float-banner').removeClass('nav-down').addClass('nav-up');
                    if (state) {
                        var random = Math.floor(Math.random() * name.length);
                        var theCls = name[random];
                        $('.float-banner').addClass(theCls);
                        state = false;
                    }

                } else {
                    $('.float-banner').removeClass('nav-up').addClass('nav-down');
                    $('.float-banner').removeClass('facebook twitter instagram');
                    state = true;
                }
            });




        });
        return this;
    };

})(jQuery)