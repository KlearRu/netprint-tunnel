var NP = window.NP || {};

NP.app = function() {
    // Private
    this.$page = $(".b-page--js, .b-footer--js");
    this.$sandwitchButton = $(".b-nav__aside-menu--js");
    this.$pageShiftOverlay = $(".b-page__shift-overlay--js");
    this.asideMenuVisible = false;

    this.$pageBody = $("html, body");

    this.mode = false;

    this.toggleAsideMenu = function(e) {
        if(e) {
            e.preventDefault();
        }

        this.asideMenuVisible = !this.asideMenuVisible;
        this.$pageBody.toggleClass("shifted--js");

        if( this.asideMenuVisible ) {
            var left = 300;

            if( this.mode == "mobile" ) {
                left = 40;
            }

            this.$page.css({
                left: ( $(window).width() - left ) < left ? left : ( $(window).width() - left ) + "px"
            });
        } else {
            this.$page.css({
                left: 0
            });
        }
    };

    this.updateScreenMode = function() {
        var width = $(window).width();

        $("body").removeClass("responsive-" + this.mode);

        var old_mode = this.mode;

        if( width > 960 ) {
            this.mode = "desktop";
        } else if( width > 380 ) {
            this.mode = "tablet";
        } else {
            this.mode = "mobile";
        }

        $("body").addClass("responsive-" + this.mode);

        if( this.mode !== old_mode && this.asideMenuVisible ) {
            this.toggleAsideMenu();
        }
    };

    // Init
    this.$sandwitchButton.on("touchstart, click", $.proxy(this.toggleAsideMenu, this));
    this.$pageShiftOverlay.on("touchstart, click", $.proxy(this.toggleAsideMenu, this));
    $(window).on("resize", $.proxy(this.updateScreenMode, this));
    this.updateScreenMode();

    // Public
    return this;
};

NP.tab = function(el) {
    this.$tabsParent = $(el);
    this.mobileOnly = $(el).data("mobile");
    this.showAll = $(el).data("showall");
    this.mobileNav = $(el).data("mobilenav");

    this.acceptorIsWrapper = $(el).data("acceptorwrapper");

    if( typeof this.acceptorIsWrapper == "undefined" ) {
        this.acceptorIsWrapper = true;
    }

    if ( this.mobileOnly ) {
        if( NP.app.mode !== "desktop" ) {
            this.$tabsParent.show();
        } else {
            this.$tabsParent.hide();
        }
    }

    this.hideElements = function() {
        this.$tabsParent.find(".tab--js").each($.proxy(function(i, el) {
            if( this.acceptorIsWrapper ) {
                $( $(el).data("acceptor") ).find(".tab--js").hide();
            } else {
                $( $(el).data("acceptor") ).hide();
            }

        }, this));
        this.$tabsParent.find(".tab--js").removeClass("current");
    };
    this.showElements = function() {
        this.$tabsParent.find(".tab--js").each($.proxy(function(i, el) {
            if( this.acceptorIsWrapper ) {
                $( $(el).data("acceptor") ).find(".tab--js").show();
            } else {
                $( $(el).data("acceptor") ).show();
            }

        }, this));
        this.$tabsParent.find(".tab--js").removeClass("current");
    };
    $(el).find(".tab--js").on("touchstart, click", $.proxy(function(e) {
        e.preventDefault();

        this.hideElements();
        $(e.currentTarget).addClass("current");

        var data_id = $(e.currentTarget).data("id");

        if(this.acceptorIsWrapper) {
            $( $(e.currentTarget).data("acceptor") ).find(".tab--js").each(function(i, el) {
                if( $(el).data("id") == data_id ) {
                    $(el).show();
                }
            });
        } else {
            $( $(e.currentTarget).data("acceptor") ).each(function(i, el) {
                if( $(el).data("id") == data_id ) {
                    $(el).show();
                }
            });
        }

        if( this.mobileNav && NP.app.mode == "mobile" ) {
            this.$tabsParent.hide();
            $( this.$tabsParent.find(".tab--js").first().data("acceptor") ).fadeIn();

            $( this.$tabsParent.data("mobilenavtitle") ).text( $(e.currentTarget).find("i").text() );

            $( this.$tabsParent.data("mobilenavback") ).show();
        };

    }, this));

    $(window).on("resize", $.proxy(function() {
        this.init();
    }, this));

    if( this.mobileNav ) {
        $( this.$tabsParent.data("mobilenavback") ).on("touchstart, click", $.proxy(function() {
            this.$tabsParent.fadeIn();
            $( this.$tabsParent.find(".tab--js").first().data("acceptor") ).hide();
            $( this.$tabsParent.data("mobilenavtitle") ).text( $( this.$tabsParent.data("mobilenavtitle")).data("default") );
            $( this.$tabsParent.data("mobilenavback") ).hide();
            this.$tabsParent.find(".tab--js").removeClass("current");
        }, this));
    }

    this.init = function() {
        if( this.mobileNav && NP.app.mode == "mobile" ) {
            this.$tabsParent.show();
            $( this.$tabsParent.find(".tab--js").first().data("acceptor") ).hide();
            $( this.$tabsParent.data("mobilenavback") ).hide();
        } else {
            $( this.$tabsParent.find(".tab--js").first().data("acceptor") ).show();

            if( this.mobileNav ) {
                $( this.$tabsParent.data("mobilenavtitle") ).text( $( this.$tabsParent.data("mobilenavtitle")).data("default") );
            }
        };

        if( ! this.showAll ) {
            this.$tabsParent.find(".tab--js").first().trigger("click");

            if( (this.$tabsParent.hasClass("b-no-mobile") ||
                this.$tabsParent.hasClass("b-no-tablet")) &&
                this.mode == "desktop" ) {
                this.$tabsParent.show();
            }

            if ( this.mobileOnly && NP.app.mode === "desktop" ) {
                this.showElements();
                this.$tabsParent.hide();
            }
        }
    };
    this.init();
};

NP.popup = function(el) {
    this.$trigger = $(el);
    this.$popup = $( $(el).data("popup") );

    this.$popupBg = $(".b-popup-bg");

    this.hidePopup = function(e) {
        if( e ) {
            e.preventDefault();
        }

        this.$popup.fadeOut();
    };
    this.hideAll = function(e) {
        if( e ) {
            e.preventDefault();
        }
        this.hidePopup();

        this.$popupBg.fadeOut();
        $("body").removeClass("no-overflow");
        $("body").css("height", "100%");
    };
    this.showPopup = function(e) {
        e.preventDefault();

        $(".b-popup").fadeOut();

        this.$popup.fadeIn();
        this.$popupBg.fadeIn();
        $("body").addClass("no-overflow");

        if( NP.app.mode == "desktop" || NP.app.mode == "tablet" ) {
            $("body").css("height", $(window).height());
        } else {
            $("body").css("height", this.$popup.height() + "px");
        }
    };
    this.$trigger.on("touchstart, click", $.proxy(this.showPopup, this));
    this.$popup.find(".b-popup__close--js").on("touchstart, click", $.proxy(this.hideAll, this));

    this.hidePopup();
};

NP.accordion = function() {
    this.calculateHeights = function() {
        $(".b-accordion__element--js").each(function(i, el) {
            var $element = $(el).closest(".b-accordion__element").find(".b-accordion__element__description--js");
//            $element.show();
//            $element.css("height", "auto");
//            $element.css("height", $element.height());
            $element.hide();
        });
    };

    $(".b-accordion__element--js").on("touchend, click", function(e) {
        e.preventDefault();

        var $wrapper = $(this).closest(".b-accordion__element");
        $wrapper.toggleClass("opened").find(".b-accordion__element__description--js").slideToggle();
            //find(".b-accordion__element__description--js").slideToggle();
    });

    $(window).on("resize", $.proxy(this.calculateHeights, this));
    this.calculateHeights();
};

NP.checkbox = function(el) {
    this.$checkboxWrap = $(el);

    this.$checkboxIcon = this.$checkboxWrap.find(".b-icon");
    this.$checkboxInput = this.$checkboxWrap.find(".b-checkbox__input");
    this.$checkboxCustom = this.$checkboxWrap.find(".b-checkbox__custom");

    this.$checkboxWrap.on("touchend, click", $.proxy(function() {
        if( this.$checkboxInput.is(":checked") ) {
            this.$checkboxInput.prop('checked', false);
            this.$checkboxIcon.hide();
        } else {
            this.$checkboxInput.prop('checked', true);
            this.$checkboxIcon.show();
        }
    }, this));

    // Init
    this.$checkboxInput.addClass("hide");
    this.$checkboxCustom.addClass("show");

    if( this.$checkboxInput.is(":checked") ) {
        this.$checkboxIcon.show();
    } else {
        this.$checkboxIcon.hide();
    }
};

NP.photoGallery = function() {
    $(".fotorama").fotorama();
};

NP.slider = function() {
    $('.b-slider__items').slick({
        dots: false,
        infinite: true,
        arrows: false,
        speed: 600,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false,
                    arrows: false,
                }
            },
            {
                breakpoint: 700,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: false,
                    arrows: false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: false
                }
            }
        ]
    });
    $(".b-slider__nav__item--prev--js").on("click", function() {
        $('.b-slider__items').slickPrev();
    });
    $(".b-slider__nav__item--next--js").on("click", function() {
        $('.b-slider__items').slickNext();
    });
    $(".b-slider__item").on("click", function() {
        var src = $(this).data("format");
        $(".b-sample__format").fadeOut(function() {
            $(this).css({
                backgroundImage: "url(" + src + ")"
            });
            $(this).fadeIn();
        });
    });
};

NP.mobileNavSlider = function() {
    $('.b-type-selector-mobile').slick({
        dots: false,
        infinite: true,
        arrows: false,
        speed: 600,
        slidesToShow: 1,
        slidesToScroll: 1,
        onAfterChange: function(e, index) {
            $(".b-type-content--js.tab--js").each(function(i, el) {
                if( $(el).data("id") == index + 1 ) {
                    $(el).show();
              //      alert("SHOW " + (index+1) + " " + $(el).data("id"));
                } else {
                    $(el).hide();
                }
            });
        }
    });
    $(".b-type-selector-mobile__item__nav--prev--js").on("click", function() {
        $('.b-type-selector-mobile').slickPrev();
    });
    $(".b-type-selector-mobile__item__nav--next--js").on("click", function() {
        $('.b-type-selector-mobile').slickNext();
    });

    this.resize = function() {
        if( NP.app.mode == "desktop" ) {
            $('.b-type-selector-mobile').hide();
        } else {
            $('.b-type-selector-mobile').show();
        }
        $('.b-type-selector-mobile').slickGoTo(0);
    };
    this.resize();
    $(window).on("resize", $.proxy(this.resize, this));
};

NP.toggle = function() {
    $(".toggle--js").on("click", function(e) {
        e.preventDefault();

        $($(this).data("acceptor")).slideToggle();

        var text = $(this).text();
        $(this).text($(this).data("replace"));
        $(this).data("replace", text);
    });
};

$(function() {
    FastClick.attach(document.body);

    NP.app = NP.app();

    $(".tabs--js").each($.proxy(function(i, el) {
        new NP.tab(el);
    }, this));
    $(".b-checkbox--js").each($.proxy(function(i, el) {
        new NP.checkbox(el);
    }, this));
    $(".popup-trigger--js").each($.proxy(function(i, el) {
        new NP.popup(el);
    }, this));

    NP.mobileNavSlider();

    NP.accordion();
    NP.photoGallery();
    NP.slider();
    NP.toggle();
});