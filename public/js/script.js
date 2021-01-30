/**
 * Created by saleem on 10/10/2017.
 */

$(document).ready(function () {

    $('.share a').click(function (ev) {
            window.open(this.href, "my_window", "width=400, height=400");
            ev.preventDefault()
        });


    // loader
    $('.loader').fadeOut(300);


    $('.bePartnerLink').click(function () {
        $('.bePartner').toggleClass('open');
    })
    $('.close-icon').click(function () {
        $('.bePartner').toggleClass('open');

    });
    var searchBox = document.getElementById('searchbox');

    $('.icon-search,#searchbox-close').click(function () {
        if (searchBox.className === 'show') {
            searchBox.className = 'hide';
        } else {
            searchBox.className = 'show';
        }
    })
    window.fbAsyncInit = function() {
        FB.init({
            appId            : '912333495590130',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v2.11'
        });
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'))
//searchToggle();
    // $(window).load(function () {

    // });
});