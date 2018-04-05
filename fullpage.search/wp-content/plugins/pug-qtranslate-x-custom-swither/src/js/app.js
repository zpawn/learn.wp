(function ($) {
    "use strict";

    setTimeout(function () {

        var currentHost = window.location.host,
            currentPathname = window.location.pathname.split('/').filter(function (item) {
                return item !== '';
            }),
            linksData = {
                links: [],
                langs: []
            };

        $('.js-pug-lang').each(function (index, elm) {
            linksData.links[index] = elm;
            linksData.langs[index] = $(elm).data('pugLang');
        });

        if ($.inArray(currentPathname[0], linksData.langs) !== -1) {
            currentPathname.shift();
        }

        linksData.links.map(function (link, index) {
            link.href = '//' + currentHost + '/' + linksData.langs[index] + '/' + currentPathname.join('/');
        });
    }, 0)
}(jQuery));
