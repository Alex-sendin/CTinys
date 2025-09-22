(function () {
    $(document).ready(function () {
        window.onload = function () {
            if (window.addEventListener) {
                window.addEventListener("DOMMouseScroll", mouse_wheel, false);
            }

            window.onmousewheel = document.onmousewheel = mouse_wheel;
        };

        var mouse_wheel = function (event) {
            if (false === !!event) event = window.event;
            direction = ((event.wheelDelta) ? event.wheelDelta / 120 : event.detail / -3) || false;
        };

        var slick_responsive = [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ];

        if ($('.products-slider').length>0) {
            $('.products-slider').slick({
                infinite: true,
                speed: 700,
                autoplay: true,
                autoplaySpeed: 6000,
                pauseOnHover: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                appendArrows: $(".related_products_arrows"),
                prevArrow: "<span class='slick-prev slick-arrow' aria-label='Previous'><i class='mpm-faqs-left-arrow'></i></span>",
                nextArrow: "<span class='slick-next slick-arrow' aria-label='Next'><i class='mpm-faqs-right-arrow'></i></span>",
                responsive: slick_responsive,
            });
            $('.faqs-products').addClass('initialized');
        }

        /**
         * Roll out answer
         */
        $(".gomakoil_faq_page .questions").click(function (e) {
            e.preventDefault();

            var answer_page_link = $(this).find(".icon_fag");
            var answer_block = $(this).next();

            if ($(this).hasClass('as_url')) {
                location.href = answer_page_link.attr('href');
                return false;
            }
            
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                answer_page_link.hide();
            } else {
                $(this).addClass('active');
                answer_page_link.fadeIn();
            }

            answer_block.slideToggle("slow");
        });

        /**
         * Prioritize inner link to full question over anchor wrapper
         */
        var link_to_full_question_icon = "a.icon_fag";
        $(link_to_full_question_icon).click(function(event) {
            event.stopPropagation();
        });

        /**
         *
         * Apply Focus/Blur specific styles to main search input field
         */
        var faqs_search_input = "#search_faqs_input";
        var faqs_search_input_group = "#search_faqs_input_group";
        var faqs_search_loader = faqs_search_input_group + " .loader";
        var faqs_search_preview_container = "#mpm_faqs_search_preview_container";
        var search_timeout;
        
        $(document).on("input", faqs_search_input, function() {
            if (search_timeout) {
                clearTimeout(search_timeout);
            }
            
            var base_path = $("#search_faqs_container").data("base-path");
            var search_query = $(this).val();
            
            if (search_query.length < 1) {
                $(faqs_search_preview_container).html("").hide();
                $(faqs_search_loader).hide();
                return false;
            }
            
            $(faqs_search_loader).show();
            
            search_timeout = setTimeout(function() {
                $.ajax({
                    type: "POST",
                    url: base_path + 'index.php?rand=' + new Date().getTime(),
                    dataType: 'json',
                    async: true,
                    cache: false,
                    data: {
                        ajax: true,
                        token: "",
                        controller: 'AjaxForm',
                        fc: 'module',
                        module: 'faqs',
                        action: 'getSearchPreview',
                        search_query: search_query,
                        id_shop: $('input[name="id_shop"]').val(),
                        id_lang: $('input[name="id_lang"]').val()
                    },
                    success: function (response) {
                        $(faqs_search_preview_container).html(response['template']).show();
                    },
                    error: function() {
                        alert("Ajax request has failed! Please contact us!");
                    },
                    complete: function () {
                        $(faqs_search_loader).hide();
                    }
                });
            }, 1000);
        });
        
        $(document).on("focus", faqs_search_input, function(event) {
            event.preventDefault();
            $(faqs_search_input_group).addClass("search-faqs-input-focused");
        });

        $(document).on("blur", faqs_search_input, function(event) {
            event.preventDefault();
            $(faqs_search_input_group).removeClass("search-faqs-input-focused");
        });
    
        $(document).mouseup(function (e) {
            // if the target of the click isn't the container nor a descendant of the container
            if (!$(faqs_search_input_group).is(e.target) && $(faqs_search_input_group).has(e.target).length === 0) {
                $(faqs_search_preview_container).html("").hide();
                $(faqs_search_loader).hide();
            }
        });


        var asked_by_user_icon = ".questions.change_item .mpm-faqs-user-1";
        var asked_by_user_popup_msg = ".questions.change_item .user-assoc-popup";

        $(asked_by_user_icon).hover(function() {
            $(this).siblings(asked_by_user_popup_msg).show();
        }, function() {
            $(this).siblings(asked_by_user_popup_msg).hide();
        });

        positionPopupDialogue();
        $(window).resize(function() {
            positionPopupDialogue();
        });

        $(document).on("click", ".usefulness_button", function(event) {
            event.preventDefault();
            setUsefulness($(this));
        });

    });

    function positionPopupDialogue() {
        var asked_by_user_popup_msg = ".questions.change_item .user-assoc-popup";
        var faqs_block_width = $(".gomakoil_faq_page").outerWidth();
        var popup_dialogue_width = $(asked_by_user_popup_msg).outerWidth() + 15;

        if ($(window).width() <= (faqs_block_width + popup_dialogue_width)) {
            $(asked_by_user_popup_msg).addClass("display-right");
        } else {
            $(asked_by_user_popup_msg).removeClass("display-right");
        }
    }
})();

function setUsefulness(self) {

    var id_faq = self.closest('.usefulness_row').data('id');
    var name_cookies = 'faq_usefulness_'+id_faq;
    var usefulness_cookies = getCookie(name_cookies);
    var usefulness = self.data('type');

    if (usefulness_cookies && usefulness_cookies == usefulness) {
        return false;
    }

    setCookie( name_cookies, usefulness, 100 );

    $.ajax({
        type: "POST",
        url: $('.basePath').val() + 'index.php?rand=' + new Date().getTime(),
        dataType: 'json',
        async: true,
        cache: false,
        data: {
            ajax: true,
            token: "",
            controller: 'AjaxForm',
            fc: 'module',
            module: 'faqs',
            action: 'setUsefulness',
            usefulness: usefulness,
            usefulness_cookies: usefulness_cookies,
            id_faq: id_faq,

        },
        success: function (response) {
            if (response['success']) {
                self.closest('.usefulness_row').find('.usefulness_like').html(response['likes']);
                self.closest('.usefulness_row').find('.usefulness_dislike').html(response['dislikes']);
            }
        }
    });

}

function searchFags(val, url) {
    if (val.length > 0) {
        location = url + val;
    }
}

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
    var cookieName = name + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookieArray = decodedCookie.split(';');

    for (var i = 0; i < cookieArray.length; i++) {
        var cookie = cookieArray[i];

        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1);
        }

        if (cookie.indexOf(cookieName) === 0) {
            return cookie.substring(cookieName.length, cookie.length);
        }
    }
    return null;
}

