(function ($) {
    "use strict";

    var ESC_BUTTON = 27,
        ENDPOINT = window.location.protocol + '//' + window.location.host + '/wp-json/pug_fps_api';

    function FullPageSearch () {
        this.classSuffix    = 'pug-fps';
        this.$body          = $(document.body);
        this.$btnSearch     = $('.js-fps-open');
        this.$modal         = $('.'+ this.classSuffix +'-modal');
        this.$form          = this.$modal.find('form');
        this.$search        = this.$modal.find('.js-fps-search-field');
        this.$result        = this.$modal.find('.js-fps-search-result');
        this.$emptyResult   = this.$result.find('.js-fps-search-empty-result').detach();

        ////

        this._bindEvents();
    }

    FullPageSearch.prototype._bindEvents = function () {
        this.$body.on('click', '.js-fps-open', this.toggleModal.bind(this));
        this.$body.on('keyup', this.escKeyUp.bind(this));
        this.$modal.on('keyup', '.js-fps-search-field', this._eventSearch.bind(this));
        this.$modal.on('focusout', '.js-fps-search-field', this._eventSearch.bind(this));
        this.$modal.on('click', '.js-fps-close-modal', this.toggleModal.bind(this));
        this.$form.on('submit', this.disableSubmitForm);
    };

    FullPageSearch.prototype.toggleModal = function (e) {
        this.$body.toggleClass(this.classSuffix + '-open');
        this.$modal.toggleClass('open');

        if (this.$body.hasClass(this.classSuffix + '-open')) {
            this.$search.focus();
        } else {
            this.$search.blur();
        }

    };

    FullPageSearch.prototype.escKeyUp = function (e) {
        if (e.keyCode === ESC_BUTTON && this.$body.hasClass(this.classSuffix + '-open')) {
            this.toggleModal();
        }
    };

    FullPageSearch.prototype._eventSearch = function (e) {
        if (this.$search.val().length > 2) {
            this.search();
        }
    };

    FullPageSearch.prototype.search = function () {
        var _selt = this,
            endpoint = ENDPOINT + '/products/?' + this.$form.serialize();

        $.get(endpoint, function (res) {
            _selt._generateProductItem(res);
        });
    };

    FullPageSearch.prototype._generateProductItem = function (products) {
        var _self = this,
            result;

        _self.$search.css({'margin-top': '2%'});

        if (products.length === 0) {
            result = _self.$emptyResult;
        } else {
            result = products.reduce(function (result, product) {
                result += '<li class="col-xs-12 col-md-4 post-'+ product.id +' product type-product status-publish has-post-thumbnail instock shipping-taxable purchasable product-type-simple" data-sr=\'wait 0.1s, ease-in 20px\'>' +
                    '<a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="'+ product.href +'">' +
                        '<figure class="ws-product-empty-bg">' +
                            '<img class="attachment-shop_catalog size-shop_catalog wp-post-image" width="256" height="256" src="'+ product.image +'" alt="'+ product.title +'" sizes="(max-width: 256px) 100vw, 256px"/>' +
                        '</figure>' +
                        '<h2 class="woocommerce-loop-product__title">'+ product.title +'</h2>' +
                        '<span class="price">' + product.price + '</span>' +
                        '</a>' +
                    '</li>';
                return result;
            }, '');
        }

        this.$result.html($(result));
    };

    FullPageSearch.prototype.disableSubmitForm = function (e) {
        e.preventDefault();
    };

    window.FullPageSearch = FullPageSearch;
}(jQuery));
