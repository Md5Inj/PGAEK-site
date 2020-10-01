function GLTFireEvent(t, o) {
    try {
        if (document.createEvent) {
            (e = document.createEvent("HTMLEvents")).initEvent(o, !0, !0), t.dispatchEvent(e)
        } else {
            var e = document.createEventObject();
            t.fireEvent("on" + o, e)
        }
    } catch (t) {}
}

function doGoogleLanguageTranslator(t) {
    if (t.value && (t = t.value), "" != t) {
        var o, e = t.split("|")[1],
            i = jQuery(".goog-te-combo"),
            s = jQuery(".goog-te-menu-frame:first"),
            n = s.contents().find(".goog-te-menu2-item span.text:contains(" + lang_text + ")");
        if (0 == i.length)
            for (var a = 0; a < s.length; a++) o = s[a];
        else
            for (a = 0; a < i.length; a++) o = i[a];
        null != document.getElementById("google_language_translator") && (0 != i.length ? lang_prefix != default_lang ? (o.value = e, GLTFireEvent(o, "change")) : jQuery(".goog-te-banner-frame:first").contents().find(".goog-close-link").get(0).click() : (o.value = e, lang_prefix != default_lang ? n.click() : jQuery(".goog-te-banner-frame:first").contents().find(".goog-close-link").get(0).click()))
    }
}

jQuery(document).ready(function(t) {
    
        t("#glt-translate-trigger,#glt-translate-trigger font").toolbar({
            content: "#flags",
            position: "top",
            hideOnClick: !0,
            event: "click",
            style: "primary"
        }), t("#glt-translate-trigger").on("toolbarItemClick", function(o) {
            t(this).removeClass("pressed")
        })
    }),
    /**
     * Toolbar.js
     *
     * @fileoverview  jQuery plugin that creates tooltip style toolbars.
     * @link          http://paulkinzett.github.com/toolbar/
     * @author        Paul Kinzett (http://kinzett.co.nz/)
     * @version       1.1.0
     * @requires      jQuery 1.7+
     *
     * @license jQuery Toolbar Plugin v1.1.0
     * http://paulkinzett.github.com/toolbar/
     * Copyright 2013 - 2015 Paul Kinzett (http://kinzett.co.nz/)
     * Released under the MIT license.
     * <https://raw.github.com/paulkinzett/toolbar/master/LICENSE.txt>
     */
    "function" != typeof Object.create && (Object.create = function(t) {
        function o() {}
        return o.prototype = t, new o
    }),
    function(t, o, e, i) {
        var s = {
            init: function(o, e) {
                this.elem = e, this.$elem = t(e), this.options = t.extend({}, t.fn.toolbar.options, o), this.metadata = this.$elem.data(), this.overrideOptions(), this.toolbar = t('<div class="tool-container" />').addClass("tool-" + this.options.position).addClass("toolbar-" + this.options.style).append('<div class="tool-items" />').append('<div class="arrow" />').appendTo("body").css("opacity", 0).hide(), this.toolbar_arrow = this.toolbar.find(".arrow"), this.initializeToolbar()
            },
            overrideOptions: function() {
                var o = this;
                t.each(o.options, function(t) {
                    void 0 !== o.$elem.data("toolbar-" + t) && (o.options[t] = o.$elem.data("toolbar-" + t))
                })
            },
            initializeToolbar: function() {
                this.populateContent(), this.setTrigger(), this.toolbarWidth = this.toolbar.width()
            },
            setTrigger: function() {
                var e = this;
                if ("onload" == e.options.event && t(o).load(function(t) {
                        t.preventDefault(), e.show()
                    }), "click" == e.options.event && (e.$elem.on("click", function(t) {
                        t.preventDefault(), e.$elem.hasClass("pressed") ? e.hide() : e.show()
                    }), e.options.hideOnClick && t("html").on("click.toolbar", function(t) {
                        t.target != e.elem && 0 === e.$elem.has(t.target).length && 0 === e.toolbar.has(t.target).length && e.toolbar.is(":visible") && e.hide()
                    })), e.options.hover) {
                    var i;

                    function s() {
                        e.$elem.hasClass("pressed") ? i = setTimeout(function() {
                            e.hide()
                        }, 150) : clearTimeout(i)
                    }
                    e.$elem.on({
                        mouseenter: function(t) {
                            e.$elem.hasClass("pressed") ? clearTimeout(i) : e.show()
                        }
                    }), e.$elem.parent().on({
                        mouseleave: function(t) {
                            s()
                        }
                    }), t(".tool-container").on({
                        mouseenter: function(t) {
                            clearTimeout(i)
                        },
                        mouseleave: function(t) {
                            s()
                        }
                    })
                }
                t(o).resize(function(t) {
                    t.stopPropagation(), e.toolbar.is(":visible") && (e.toolbarCss = e.getCoordinates(e.options.position, 20), e.collisionDetection(), e.toolbar.css(e.toolbarCss), e.toolbar_arrow.css(e.arrowCss))
                })
            },
            populateContent: function() {
                var o = this,
                    e = o.toolbar.find(".tool-items"),
                    i = t(o.options.content).clone(!0).find("a").addClass("tool-item");
                e.html(i), e.find(".tool-item").on("click", function(t) {
                    t.preventDefault(), o.$elem.trigger("toolbarItemClick", this)
                })
            },
            calculatePosition: function() {
                this.arrowCss = {}, this.toolbarCss = this.getCoordinates(this.options.position, this.options.adjustment), this.toolbarCss.position = "fixed", this.toolbarCss.zIndex = this.options.zIndex, this.collisionDetection(), this.toolbar.css(this.toolbarCss), this.toolbar_arrow.css(this.arrowCss)
            },
            getCoordinates: function(t, o) {
                switch (this.coordinates = this.$elem.offset(), this.options.adjustment && this.options.adjustment[this.options.position] && (o = this.options.adjustment[this.options.position] + o), this.options.position) {
                    case "top":
                        return {
                            left: this.coordinates.left - this.toolbar.width() / 2 + this.$elem.outerWidth() / 2, top: this.coordinates.top - this.$elem.outerHeight() - o, right: "auto"
                        };
                    case "left":
                        return {
                            left: this.coordinates.left - this.toolbar.width() / 2 - this.$elem.outerWidth() / 2 - o, top: this.coordinates.top - this.toolbar.height() / 2 + this.$elem.outerHeight() / 2, right: "auto"
                        };
                    case "right":
                        return {
                            left: this.coordinates.left + this.toolbar.width() / 2 + this.$elem.outerWidth() / 2 + o, top: this.coordinates.top - this.toolbar.height() / 2 + this.$elem.outerHeight() / 2, right: "auto"
                        };
                    case "bottom":
                        return {
                            left: this.coordinates.left - this.toolbar.width() / 2 + this.$elem.outerWidth() / 2, top: this.coordinates.top + this.$elem.outerHeight() + o, right: "auto"
                        }
                }
            },
            collisionDetection: function() {
                "top" != this.options.position && "bottom" != this.options.position || (this.arrowCss = {
                    left: "50%",
                    right: "50%"
                }, this.toolbarCss.left < 20 ? (this.toolbarCss.left = 20, this.arrowCss.left = this.$elem.offset().left + this.$elem.width() / 2 - 20) : t(o).width() - (this.toolbarCss.left + this.toolbarWidth) < 20 && (this.toolbarCss.right = 20, this.toolbarCss.left = "auto", this.arrowCss.left = "auto", this.arrowCss.right = t(o).width() - this.$elem.offset().left - this.$elem.width() / 2 - 20 - 5))
            },
            show: function() {
                this.$elem.addClass("pressed"), this.calculatePosition(), this.toolbar.show().css({
                    opacity: 1
                }).addClass("animate-" + this.options.animation), this.$elem.trigger("toolbarShown")
            },
            hide: function() {
                var t = this,
                    o = {
                        opacity: 0
                    };
                switch (t.$elem.removeClass("pressed"), t.options.position) {
                    case "top":
                        o.top = "+=20";
                        break;
                    case "left":
                        o.left = "+=20";
                        break;
                    case "right":
                        o.left = "-=20";
                        break;
                    case "bottom":
                        o.top = "-=20"
                }
                t.toolbar.animate(o, 200, function() {
                    t.toolbar.hide()
                }), t.$elem.trigger("toolbarHidden")
            },
            getToolbarElement: function() {
                return this.toolbar.find(".tool-items")
            }
        };
        t.fn.toolbar = function(o) {
            if (t.isPlainObject(o)) return this.each(function() {
                var e = Object.create(s);
                e.init(o, this), t(this).data("toolbarObj", e)
            });
            if ("string" == typeof o && 0 !== o.indexOf("_")) {
                var e = t(this).data("toolbarObj");
                return e[o].apply(e, t.makeArray(arguments).slice(1))
            }
        }, t.fn.toolbar.options = {
            content: "#myContent",
            position: "top",
            hideOnClick: !1,
            zIndex: 120,
            hover: !1,
            style: "default",
            animation: "standard",
            adjustment: 10
        }
    }(jQuery, window, document), jQuery(function(t) {
        t("#flags a, a.single-language, .tool-items a").each(function() {
            t(this).attr("data-lang", t(this).attr("title"))
        }), t(document.body).on("click", "li.lang", function() {
            lang_text = t(this).attr("data-lang"), default_lang = t("#google_language_translator").attr("class").split("-").pop(), lang_prefix = t(this).attr("class").split(" ")[2], lang_prefix == default_lang ? doGoogleLanguageTranslator(default_lang + "|" + default_lang) : doGoogleLanguageTranslator(default_lang + "|" + lang_prefix), t(".tool-container").hide()
            switch(lang_prefix) {
                case "ru":
                    jQuery('.default_logo')[0].src="http://new.pgaek.by/wp-content/uploads/2019/05/444-1.svg";
                    break;
                case "en":
                    jQuery('.default_logo')[0].src="http://new.pgaek.by/wp-content/uploads/2019/05/11.svg";
                    break;
                case "be":
                    jQuery('.default_logo')[0].src="http://new.pgaek.by/wp-content/uploads/2019/05/1111.svg";
                    break;
            }
        })
    });