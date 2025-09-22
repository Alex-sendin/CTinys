var close_notification_button_id = "#mpm_faqs_notification_close_button";
var reset_trigger = "#mpm_faqs_notification_reset_button";

var faqsForm = {
    overlay: {
        id: "#mpm_faqs_form_overlay"
    },
    container: {
        id: "#mpm_faqs_form_container"
    },
    close_button: {
        id: "#mpm_faqs_form_close_button"
    },
    submit_button: {
        id: "#mpm_faqs_form_submit_button"
    },
    input_fields: {
        name_customer: {
            form_group_id: "#name_customer_form_group"
        },
        email_customer: {
            form_group_id: "#email_customer_form_group"
        },
        category_question: {
            form_group_id: "#category_question_form_group"
        },
        question_customer: {
            form_group_id: "#question_customer_form_group"
        },
        captcha_res: {
            form_group_id: "#captcha_res_form_group"
        },
        focused_input_id: "mpm-faqs-focused-input",
        invalid_input_id: "mpm-faqs-validation-error",
        invalid_input_message_block_id: "mpm-faqs-form-validation-message"
    },
    consent_checkbox: "#mpm_faqs_form_container #consent_checkbox",
    recaptcha_block: "#mpm_faqs_form_container .g-recaptcha",
    open: function() {
        var basePath = $('input[name="basePath"]').val();
        var overlay = this.overlay.id;
        var container = this.container.id;
        var id_shop = $('input[name="id_shop"]').val();
        var id_lang = $('input[name="id_lang"]').val();
        var id_product = $('input[name="id_product"]').val();
        
        $.ajax({
            type: "POST",
            url: basePath + 'index.php?rand=' + new Date().getTime(),
            dataType: 'json',
            async: true,
            cache: false,
            data: {
                ajax: true,
                token: "",
                controller: 'AjaxForm',
                fc: 'module',
                module: 'faqs',
                action: 'showForm',
                id_shop: id_shop,
                id_lang: id_lang,
            },
            success: function (json) {
                if (json['form']) {
                    $("body").prepend(json['form']);
                    faqsForm.scroll(1);
                    stylizeSelect();
                    $(overlay).fadeIn(300);
                    $(container).fadeIn(300);
                }
            },
        });
    },
    close: function () {
        var overlay = this.overlay.id;
        var container = this.container.id;
        $(overlay).fadeOut(300);
        $(container).fadeOut(300);
        
        setTimeout(function(){
            $(overlay).remove();
            $(container).remove();
        }, 700);
    },
    send: function () {
        if ($(faqsForm.consent_checkbox).length && !$(faqsForm.consent_checkbox).is(":checked")) {
            return false;
        }
        
        var basePath = $('input[name="basePath"]').val();
        var thisObject = $(this);
        
        if (thisObject.data("requestRunning")) {
            return;
        }
        
        thisObject.data("requestRunning", true);
        
        $.ajax({
            type: "POST",
            url: basePath + 'index.php?rand=' + new Date().getTime(),
            dataType: 'json',
            async: true,
            cache: false,
            data: {
                ajax: true,
                token: "",
                controller: 'AjaxForm',
                fc: 'module',
                module: 'faqs',
                action: 'send',
                id_shop: $('input[name="id_shop"]').val(),
                id_lang: $('input[name="id_lang"]').val(),
                id_product: $('input[name="id_product"]').val(),
                name: $('input[name="name_customer"]').val(),
                email: $('input[name="email_customer"]').val(),
                captcha: $('input[name="captcha_res"]').val(),
                category: $('select[name="category_question"]').val(),
                question: $('textarea[name="question_customer"]').val(),
            },
            success: function (json) {
                if (json['error_field']) {
                    var form_input_names = ["name_customer", "email_customer", "question_customer", "captcha_res"];
                    var error_field = json["error_field"];
                    var error_message = json["error_message"];
                    
                    if (form_input_names.indexOf(error_field) !== -1) {
                        faqsForm.input_fields.validationError(error_field, error_message);
                    }
                } else if (json['form']) {
                    $(faqsForm.container.id).replaceWith(json['form']);
                    $(faqsForm.container.id).fadeIn(300);
                    faqsForm.scroll(1);
                }
            },
            complete: function() {
                thisObject.data("requestRunning", false);
            }
        });
    },
    scroll: function (show) {
        if ($(this.container.id).length > 0) {
            $(this.container.id).css('margin-top', '0px');
            
            var top = $(document).scrollTop();
            var height_window = $(window).outerHeight();
            var height_form = $(this.container.id).outerHeight();
            var margin = (height_window - height_form) / 2;
            var form_offset = $(this.container.id).offset().top;
            
            if (show && margin < 11) {
                margin = 11;
            }
            
            if (margin > 10) {
                var margin_top = margin + top;
                $(this.container.id).css('top', margin_top + 'px');
            }
            else {
                if (direction >= 0) {
                    if (top < form_offset) {
                        $(this.container.id).css({top: (top + 10)});
                    }
                }
                if (direction < 0) {
                    if (top > (height_form + 10 - height_window)) {
                        $(this.container.id).css({top: (top - (height_form - height_window + 10))});
                    }
                }
            }
        }
    },
    reset: function () {
        this.close();
        this.open();
    },
    getConsentForProcessingData: function() {
        var validated = true;
        
        if ($(faqsForm.consent_checkbox).length && !$(faqsForm.recaptcha_block).length) {
            validated = $(faqsForm.consent_checkbox).is(":checked");
        } else if ($(faqsForm.recaptcha_block).length && !$(faqsForm.consent_checkbox).length) {
            validated = grecaptcha.getResponse() != 0;
        } else if ($(faqsForm.recaptcha_block).length && $(faqsForm.consent_checkbox).length) {
            validated = $(faqsForm.consent_checkbox).is(":checked") && grecaptcha.getResponse() != 0;
        }
        
        if (validated) {
            $(faqsForm.submit_button.id).attr("disabled", false);
            $(faqsForm.submit_button.id).removeClass("disabled-submit-btn");
        } else {
            $(faqsForm.submit_button.id).attr("disabled", true);
            $(faqsForm.submit_button.id).addClass("disabled-submit-btn");
        }
    }
};

faqsForm.input_fields.focus = function (input_field_name) {
    $(faqsForm.container.id + " .form-group").removeClass(this.focused_input_id);
    $(this[input_field_name].form_group_id).addClass(this.focused_input_id);
};

faqsForm.input_fields.blur = function (input_field_name, eventRelatedTargetId) {
    if (eventRelatedTargetId == "mpm_faqs_form_submit_button") {
        $(faqsForm.submit_button.id).trigger("click");
    }
    
    $(this[input_field_name].form_group_id).removeClass(this.focused_input_id + " " +  this.invalid_input_id);
};

faqsForm.input_fields.validationError = function (error_field_name, error_message) {
    $(faqsForm.container.id + " .form-group").removeClass(this.focused_input_id + " " + this.invalid_input_id);
    
    $(this[error_field_name].form_group_id + " .form-control").focus();
    $(this[error_field_name].form_group_id).removeClass(this.focused_input_id).addClass(this.invalid_input_id);
    $(this[error_field_name].form_group_id + " ." + this.invalid_input_message_block_id).text(error_message);
};

faqsForm.closeTriggers = [faqsForm.close_button.id, faqsForm.overlay.id, close_notification_button_id];


$(document).ready(function() {
    
    $(document).on("focus", faqsForm.container.id + " .form-control", function(e) {
        e.preventDefault();
        faqsForm.input_fields.focus($(this).attr("name"));
    });
    
    $(document).on("blur", faqsForm.container.id + " .form-control", function(e) {
        e.preventDefault();
        var eventRelatedTargetId = "";
        
        if (e.relatedTarget && e.relatedTarget.id) {
            eventRelatedTargetId = e.relatedTarget.id;
        }
        
        faqsForm.input_fields.blur($(this).attr("name"), eventRelatedTargetId);
    });
    
    $(document).keydown(function(e) {
        var key = e.keyCode;
        
        if (key === 13 && e.target.localName !== "textarea") {
            $(faqsForm.submit_button.id).trigger("click");
        } else if (key === 27) {
            $(faqsForm.close_button.id).trigger("click");
        }
    });
    
    $(document).on('click', faqsForm.closeTriggers.join(", "), function() {
        faqsForm.close()
    });
    
    $(document).on('click', '.button-ask-question', function() {
        faqsForm.open()
    });
    
    $(document).on('click', faqsForm.submit_button.id, function(e) {
        e.preventDefault();
        faqsForm.send()
    });
    
    $(document).on("click", reset_trigger, function() {
        faqsForm.reset()
    });
    
    $(document).scroll(function() {
        faqsForm.scroll(0)
    });
    
    
    $(document).on("click", "#module-faqs-display", function() {
        if($('#mpm_faqs_select_wrapper .content').find('.list').is(':visible')) {
            $('#mpm_faqs_select_wrapper .content').find('.list').hide();
            $('#mpm_faqs_select_wrapper .content').css({"border-radius" : "0 3px 3px 0"});
            $("#category_question_form_group .input-group-addon").css({"border-radius":"3px 0 0 3px"});
            
            $(faqsForm.container.id + " .form-group").removeClass("mpm-faqs-focused-input");
        }
    });
    
    $(document).on('click','#mpm_faqs_select_wrapper .content', function(e) {
        e.stopPropagation();
        if( $(e.target).parent().hasClass('list') ){
            return false;
        }
        
        if($(this).find('.list').is(':visible')) {
            $(this).find('.list').hide();
            $(this).css({"border-radius" : "0 3px 3px 0"});
            $("#category_question_form_group .input-group-addon").css({"border-radius":"3px 0 0 3px"});
            
            $(faqsForm.container.id + " .form-group").removeClass("mpm-faqs-focused-input");
        } else {
            $(this).find('.list').show();
            $(this).css({"border-radius" : "0 3px 0 0"});
            $("#category_question_form_group .input-group-addon").css({"border-radius":"3px 0 0 0"});
            
            $(faqsForm.container.id + " .form-group").removeClass("mpm-faqs-focused-input");
            $("#category_question_form_group").addClass("mpm-faqs-focused-input");
        }
    });
    
    $(document).on("click","#mpm_faqs_select_wrapper .content .list span", function(e) {
        var chosen_option_val = $(this).data("value");
        
        if (chosen_option_val != "0") {
            $("#mpm_faqs_select_wrapper .content").css({"color": "#232323"});
        } else {
            $("#mpm_faqs_select_wrapper .content").css({"color": "#c1c2d1"});
        }
    });
    
    $(document).on('click','#mpm_faqs_select_wrapper .content .list span', function() {
        var parent = $(this).parents('#mpm_faqs_select_wrapper');
        
        parent.find('select').val($(this).attr('data-value'));
        parent.find('.selected').html($(this).text());
        parent.find('select').change();
        parent.find('.list').hide();
        
        $("#category_question_form_group .input-group-addon").css({"border-radius":"3px 0 0 3px"});
    });
    
    $(document).on('change','#mpm_faqs_select_wrapper select', function() {
        var selected = $(this).parent().find('.selected');
        var currentText = $.trim(selected.text());
        var selectedText = $.trim($(this).find('option[value='+$(this).val()+']').text());
        
        if( selectedText !== currentText ){
            selected.html(selectedText);
        }
    });
    
    faqsForm.getConsentForProcessingData();
    $(document).on("click change", faqsForm.consent_checkbox, function() {
        faqsForm.getConsentForProcessingData();
    });
});

function stylizeSelect() {
    $.each($('#mpm_faqs_select_wrapper'), function (value) {
        if( $(this).find('.content').length > 0 ){
            return;
        }
        
        $(this).css('max-width', ($(this).find('select').width() + 35) + 'px');
        var current_value = $(this).find('select').val();
        var span = $('<span class="content"><span class="list"></span></span>');
        var selected = '';
        $.each($(this).find('select option'), function (key, value) {
            if( $(this).attr('value') == current_value){
                selected = '<span class="selected">'+$(this).text()+'</span>';
            }
            span.find('.list').append('<span data-value="'+$(this).attr('value')+'">'+$(this).text()+'</span>');
        });
        
        span.prepend(selected);
        
        $(this).append(span);
    });
}

function checkIfRecaptchaIsVerified() {
    faqsForm.getConsentForProcessingData();
}