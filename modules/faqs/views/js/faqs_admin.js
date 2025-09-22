(function() {
    $(document).ready(function() {
        PS_ALLOW_ACCENTED_CHARS_URL = 0;

         /**
         *
         * Set default language when multilang is active
         */
        var language_id = 1;
        var active_translatable_field = ".translatable-field:not([style*='none']) a";

        if ($(active_translatable_field).attr("href")) {
            language_id = getLanguageId($(active_translatable_field).attr("href"));
        }

        $(document).on("click", ".translatable-field:not([style*='none']) a", function() {
         language_id = getLanguageId($(this).attr("href"));
         });



        var faq_reset_link_rewrite_btn = "#gomakoil_faq_form .faqs-new-question-link-rewrite-form-group .reset-link-rewrite-btn";

        if (isAddNewQuestionPage() && typeof tinymce !== 'undefined' && $('#question_' + language_id).length > 0) {
            setTimeout(function() {
                tinymce.get("question_" + language_id).on("keyup input change live", function () {
                    $(faq_reset_link_rewrite_btn).trigger("click");
                });
            }, 500);
        }

        $(document).on("click", faq_reset_link_rewrite_btn, function(e) {
            e.preventDefault();

            var question_link_rewrite_input_field = "#gomakoil_faq_form .faqs-new-question-link-rewrite-form-group input[name=link_rewrite_" + language_id + "]";
            var question_content_from_tinymce = tinymce.get("question_" + language_id).getContent();
            var question_stripped_from_html = stripHTML(question_content_from_tinymce);
            var link_rewrite_from_question = faqsStr2Url(question_stripped_from_html, 0);

            $(question_link_rewrite_input_field).val(link_rewrite_from_question);
        });


        var faq_category_reset_link_rewrite_btn = "#gomakoil_faq_category_form .faqs-new-category-link-rewrite-form-group .reset-link-rewrite-btn";

        if (isAddNewCategoryPage()) {
            var category_title_input_field = "#gomakoil_faq_category_form .faqs-new-category-title-form-group input";
            $(document).on("keyup input change live", category_title_input_field, function() {
                $(faq_category_reset_link_rewrite_btn).trigger("click");
            });
        }

        $(document).on("click", ".AdminFaqsSettings .nav-tabs a[href='#support']", function(e) {
            var url = $('.support_url').val();
            var win = window.open(url, '_blank');
            win.focus();
           $(".AdminFaqsSettings .nav-tabs a[href=#general]").click();
        });


        $(document).on("click", faq_category_reset_link_rewrite_btn, function(e) {
            e.preventDefault();

            var category_name_input = "input[name='name_"+language_id+"']";
            var category_link_rewrite_input_field = "#gomakoil_faq_category_form .faqs-new-category-link-rewrite-form-group input[name=link_rewrite_" + language_id + "]";
            $(category_link_rewrite_input_field).val(faqsStr2Url($(category_name_input).val(), 0));
        });


        /**
         *
         * Activate codemirror plugin
         */
        var CodeMirrorActive = false;
        var faqs_admin_tab = "#gomakoil_faq_settings_form .nav-tabs li a";

        $(document).on("click", faqs_admin_tab, function () {
            var codemirror_tab_is_picked = $(this).attr("href") === "#code_mirror";

            if (codemirror_tab_is_picked && !CodeMirrorActive) {
                CodeMirror.fromTextArea(document.getElementById("css_code"), {
                    mode: "css",
                    lineNumbers: "true",
                    readOnly: false
                });

                CodeMirrorActive = true;
            }
        });


        /**
         *
         * Show additional config options when button 'Ask Question' is active in left/right column
         */
        var button_ask_question_in_columns_switch = "#gomakoil_faq_settings_form input[name=button]";
        var button_ask_question_in_columns_only_on_faq_page_switch = "#gomakoil_faq_settings_form .button_faqs";
        var is_active_button_ask_question_in_columns_config_switch = $(button_ask_question_in_columns_switch + ":checked").val() === "1";

        if (is_active_button_ask_question_in_columns_config_switch) {
            $(button_ask_question_in_columns_only_on_faq_page_switch).show();
        } else {
            $(button_ask_question_in_columns_only_on_faq_page_switch).hide();
        }

        $(document).on("change", button_ask_question_in_columns_switch, function() {
            $(button_ask_question_in_columns_only_on_faq_page_switch).toggle();
        });


        /**
         *
         * Show additional config options when Show FAQ Categories in left/right column is active
         */
        var show_faq_categories_in_columns_switch = "#gomakoil_faq_settings_form input[name=categories]";
        var show_faq_categories_in_columns_only_on_faq_page_switch = "#gomakoil_faq_settings_form .categories_faq";
        var is_active_show_faq_categories_in_columns_switch = $(show_faq_categories_in_columns_switch + ":checked").val() === "1";

        if (is_active_show_faq_categories_in_columns_switch) {
            $(show_faq_categories_in_columns_only_on_faq_page_switch).show();
        }

        $(document).on("change", show_faq_categories_in_columns_switch, function () {
            $(show_faq_categories_in_columns_only_on_faq_page_switch).toggle();
        });


        /**
         *
         * Show additional config options when Show Featured FAQs in left/right column is active
         */
        var show_featured_faqs_in_columns_switch = "#gomakoil_faq_settings_form input[name=featured]";
        var show_featured_faqs_in_columns_only_on_faq_page_switch = "#gomakoil_faq_settings_form .featured_faq";
        var is_active_show_featured_faqs_in_columns_switch = $(show_faq_categories_in_columns_switch + ":checked").val() === "1";

        if (is_active_show_featured_faqs_in_columns_switch) {
            $(show_featured_faqs_in_columns_only_on_faq_page_switch).show();
        }

        $(document).on("change", show_featured_faqs_in_columns_switch, function () {
            $(show_featured_faqs_in_columns_only_on_faq_page_switch).toggle();
        });


        /**
         *
         * Show category/product association settings block if the option is active
         */
        var prod_cat_associations_switch = "#gomakoil_faq_form input[name=association]";

        $(document).on("change", prod_cat_associations_switch, function () {
            var prod_cat_associations_settings_block = "#gomakoil_faq_form .block_more_settings";
            $(prod_cat_associations_settings_block).toggleClass("hide_form_settings");
        });

        /**
         *
         * Show additional config options when Show distinct icon for customer questions is active
         */
        var icon_for_questions_sent_by_customer = "#gomakoil_faq_settings_form input[name=icon_for_sent_by_customer]";
        var popup_for_questions_sent_by_customer = "#gomakoil_faq_settings_form input[name=popup_for_sent_by_customer]";
        var popup_for_questions_sent_by_customer_form_group = $(popup_for_questions_sent_by_customer).closest(".form-group");
        var is_active_show_icon_for_questions_sent_by_customer = $(icon_for_questions_sent_by_customer + ":checked").val() === "1";

        if (is_active_show_icon_for_questions_sent_by_customer) {
            $(popup_for_questions_sent_by_customer_form_group).show();
        } else {
            $(popup_for_questions_sent_by_customer_form_group).hide();
        }

        $(document).on("change", icon_for_questions_sent_by_customer, function () {
            $(popup_for_questions_sent_by_customer_form_group).toggle();
        });

        /**
         * Add associated product
         */
        var add_assoc_product_button = "#gomakoil_faq_form #add_products_item";
        $(document).on("click", add_assoc_product_button, function () {
            addProductItem();
        });

        /**
         * Remove associated product
         */
        var remove_assoc_product_button = "#gomakoil_faq_form .table_list_delete a";
        $(document).on("click", remove_assoc_product_button, function () {
            var product_item_id = $(this).attr("data-id-product");
            removeProductItem(product_item_id);
        });

        /**
         * Activate select2 plugin for products search
         */
        var is_add_question_page = $("#productIds").length > 0;

        if (is_add_question_page) {
            select2Include();
        }
    
        var show_consent_switch = "input[name='show_consent_checkbox']";
        var show_consent_switch_on = "#show_consent_checkbox_on";
        var consent_checkbox_message_textarea = ".consent_checkbox_message_textarea";
    
        if ($(show_consent_switch_on).is(":checked")) {
            $(consent_checkbox_message_textarea).show();
        } else {
            $(consent_checkbox_message_textarea).hide();
        }
    
        $(document).on("click change", show_consent_switch, function() {
            if ($(show_consent_switch_on).is(":checked")) {
                $(consent_checkbox_message_textarea).show();
            } else {
                $(consent_checkbox_message_textarea).hide();
            }
        });
    });
})();

function faqsStr2Url(str, allow_accented_chars_url, ucfirst)
{
    str = str.toUpperCase();
    str = str.toLowerCase();
    if (allow_accented_chars_url) {
        str = str.replace(/[^a-z0-9\s\'\:\/\[\]-]\\u00A1-\\uFFFF/g,'');
    } else {
        /* Lowercase */
        str = str.replace(/[\u00E0\u00E1\u00E2\u00E3\u00E5\u0101\u0103\u0105\u0430]/g, 'a');
        str = str.replace(/[\u0431]/g, 'b');
        str = str.replace(/[\u00E7\u0107\u0109\u010D\u0446]/g, 'c');
        str = str.replace(/[\u010F\u0111\u0434]/g, 'd');
        str = str.replace(/[\u00E8\u00E9\u00EA\u00EB\u0113\u0115\u0117\u0119\u011B\u0435\u044D]/g, 'e');
        str = str.replace(/[\u0444]/g, 'f');
        str = str.replace(/[\u011F\u0121\u0123\u0433\u0491]/g, 'g');
        str = str.replace(/[\u0125\u0127]/g, 'h');
        str = str.replace(/[\u00EC\u00ED\u00EE\u00EF\u0129\u012B\u012D\u012F\u0131\u0438\u0456]/g, 'i');
        str = str.replace(/[\u0135\u0439]/g, 'j');
        str = str.replace(/[\u0137\u0138\u043A]/g, 'k');
        str = str.replace(/[\u013A\u013C\u013E\u0140\u0142\u043B]/g, 'l');
        str = str.replace(/[\u043C]/g, 'm');
        str = str.replace(/[\u00F1\u0144\u0146\u0148\u0149\u014B\u043D]/g, 'n');
        str = str.replace(/[\u00F2\u00F3\u00F4\u00F5\u00F8\u014D\u014F\u0151\u043E]/g, 'o');
        str = str.replace(/[\u043F]/g, 'p');
        str = str.replace(/[\u0155\u0157\u0159\u0440]/g, 'r');
        str = str.replace(/[\u015B\u015D\u015F\u0161\u0441]/g, 's');
        str = str.replace(/[\u00DF]/g, 'ss');
        str = str.replace(/[\u0163\u0165\u0167\u0442]/g, 't');
        str = str.replace(/[\u00F9\u00FA\u00FB\u0169\u016B\u016D\u016F\u0171\u0173\u0443]/g, 'u');
        str = str.replace(/[\u0432]/g, 'v');
        str = str.replace(/[\u0175]/g, 'w');
        str = str.replace(/[\u00FF\u0177\u00FD\u044B]/g, 'y');
        str = str.replace(/[\u017A\u017C\u017E\u0437]/g, 'z');
        str = str.replace(/[\u00E4\u00E6]/g, 'ae');
        str = str.replace(/[\u0447]/g, 'ch');
        str = str.replace(/[\u0445]/g, 'kh');
        str = str.replace(/[\u0153\u00F6]/g, 'oe');
        str = str.replace(/[\u00FC]/g, 'ue');
        str = str.replace(/[\u0448]/g, 'sh');
        str = str.replace(/[\u0449]/g, 'ssh');
        str = str.replace(/[\u044F]/g, 'ya');
        str = str.replace(/[\u0454]/g, 'ye');
        str = str.replace(/[\u0457]/g, 'yi');
        str = str.replace(/[\u0451]/g, 'yo');
        str = str.replace(/[\u044E]/g, 'yu');
        str = str.replace(/[\u0436]/g, 'zh');

        /* Uppercase */
        str = str.replace(/[\u0100\u0102\u0104\u00C0\u00C1\u00C2\u00C3\u00C4\u00C5\u0410]/g, 'A');
        str = str.replace(/[\u0411]/g, 'B');
        str = str.replace(/[\u00C7\u0106\u0108\u010A\u010C\u0426]/g, 'C');
        str = str.replace(/[\u010E\u0110\u0414]/g, 'D');
        str = str.replace(/[\u00C8\u00C9\u00CA\u00CB\u0112\u0114\u0116\u0118\u011A\u0415\u042D]/g, 'E');
        str = str.replace(/[\u0424]/g, 'F');
        str = str.replace(/[\u011C\u011E\u0120\u0122\u0413\u0490]/g, 'G');
        str = str.replace(/[\u0124\u0126]/g, 'H');
        str = str.replace(/[\u0128\u012A\u012C\u012E\u0130\u0418\u0406]/g, 'I');
        str = str.replace(/[\u0134\u0419]/g, 'J');
        str = str.replace(/[\u0136\u041A]/g, 'K');
        str = str.replace(/[\u0139\u013B\u013D\u0139\u0141\u041B]/g, 'L');
        str = str.replace(/[\u041C]/g, 'M');
        str = str.replace(/[\u00D1\u0143\u0145\u0147\u014A\u041D]/g, 'N');
        str = str.replace(/[\u00D3\u014C\u014E\u0150\u041E]/g, 'O');
        str = str.replace(/[\u041F]/g, 'P');
        str = str.replace(/[\u0154\u0156\u0158\u0420]/g, 'R');
        str = str.replace(/[\u015A\u015C\u015E\u0160\u0421]/g, 'S');
        str = str.replace(/[\u0162\u0164\u0166\u0422]/g, 'T');
        str = str.replace(/[\u00D9\u00DA\u00DB\u0168\u016A\u016C\u016E\u0170\u0172\u0423]/g, 'U');
        str = str.replace(/[\u0412]/g, 'V');
        str = str.replace(/[\u0174]/g, 'W');
        str = str.replace(/[\u0176\u042B]/g, 'Y');
        str = str.replace(/[\u0179\u017B\u017D\u0417]/g, 'Z');
        str = str.replace(/[\u00C4\u00C6]/g, 'AE');
        str = str.replace(/[\u0427]/g, 'CH');
        str = str.replace(/[\u0425]/g, 'KH');
        str = str.replace(/[\u0152\u00D6]/g, 'OE');
        str = str.replace(/[\u00DC]/g, 'UE');
        str = str.replace(/[\u0428]/g, 'SH');
        str = str.replace(/[\u0429]/g, 'SHH');
        str = str.replace(/[\u042F]/g, 'YA');
        str = str.replace(/[\u0404]/g, 'YE');
        str = str.replace(/[\u0407]/g, 'YI');
        str = str.replace(/[\u0401]/g, 'YO');
        str = str.replace(/[\u042E]/g, 'YU');
        str = str.replace(/[\u0416]/g, 'ZH');

        str = str.toLowerCase();

        str = str.replace(/[^a-z0-9\s\'\:\/\[\]-]/g,'');
    }

    str = str.replace(/[\u0028\u0029\u0021\u003F\u002E\u0026\u005E\u007E\u002B\u002A\u002F\u003A\u003B\u003C\u003D\u003E]/g, '');
    str = str.replace(/[\s\'\:\/\[\]-]+/g, ' ');

    // Add special char not used for url rewrite
    str = str.replace(/[ ]/g, '-');
    str = str.replace(/[\/\\"'|,;%]*/g, '');

    if (ucfirst == 1) {
        var first_char = str.charAt(0);
        str = first_char.toUpperCase()+str.slice(1);
    }

    var max_char = 128;

    if (str.length > max_char) {
        str = str.slice(0, max_char);
    }

    return str;
}

function getLanguageId(href_with_id) {
    if (href_with_id === false) {
        return null;
    }

    return href_with_id.replace(/\D+/g, '');
}

function select2Include() {
    $('.attendee').select2({
        placeholder: "Search for a repository",
        minimumInputLength: 1,
        width: '345px',
        dropdownCssClass: "bootstrap",
        ajax: {
            url: 'index.php',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params,
                    ajax: true,
                    token: $('input[name=token_faq]').val(),
                    controller: 'AdminFaqsPost',
                    action: 'searchProduct'
                };
            },
            results: function (data) {
                if (data) {
                    return {results: data};
                }
                else {
                    return {
                        results: []
                    }
                }
            }
        },
        formatResult: productFormatResult,
        formatSelection: productFormatSelection,
    })
}

function productFormatResult(item) {
    var itemTemplate = "<div class='media'>";
    itemTemplate += "<div class='pull-left'>";
    itemTemplate += "<img class='media-object' width='40' src='" + item.image + "' alt='" + item.name + "'>";
    itemTemplate += "</div>";
    itemTemplate += "<div class='media-body'>";
    itemTemplate += "<h4 class='media-heading'>" + item.name + "</h4>";
    itemTemplate += "<span>REF: " + item.ref + "</span>";
    itemTemplate += "</div>";
    itemTemplate += "</div>";

    return itemTemplate;
}

function productFormatSelection(item) {
    return item.name;
}

function removeProductItem(id) {
    var products = $('#productIds').val();
    if (products) {
        var new_products = products.split(',');
        var index = $.inArray(id, new_products);
        new_products.splice(index, 1);

        $('#productIds').val(new_products);
        $('.row_' + id).remove();
    }
}

function addProductItem() {
    var id = $('#attendee').val();
    var products = $('#productIds').val();
    var new_products = [];

    if (!products) {
        new_products = [id];
    } else {
        new_products = products.split(',');
        var index = $.inArray(id, new_products);
        if (index < 0) {
            new_products.push(id);
        }
    }

    $.ajax({
        type: "POST",
        url: 'index.php?rand=' + new Date().getTime(),
        dataType: 'json',
        async: true,
        cache: false,
        data: {
            ajax: true,
            token: $('input[name=token_faq]').val(),
            controller: 'AdminFaqsPost',
            fc: 'module',
            module: 'faqs',
            action: 'addProduct',
            idLang: $("input[name='idLang']").val(),
            idShop: $("input[name='idShop']").val(),
            products: new_products,
        },
        success: function (json) {
            if (json['list']) {
                $('#productIds').val(json['products']);
                $('.added_products_list').replaceWith(json['list']);
            }
        }
    });
}

function isAddNewCategoryPage()
{
    var url_obj = new URL(window.location.href);
    var add_page_param = "addgomakoil_faq_category";
    return url_obj.searchParams.has(add_page_param);
}

function isAddNewQuestionPage()
{
    var url_obj = new URL(window.location.href);
    var add_page_param = "addgomakoil_faq";
    return url_obj.searchParams.has(add_page_param);
}

