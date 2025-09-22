<div id="mpm_faqs_form_overlay"></div>
<div id="mpm_faqs_form_container" class="ps-16">
    <header>
        <span id="mpm_faqs_form_close_button" onclick=""><i class="mpm-faqs-cancel_2"></i></span>
        <div id="mpm_faqs_form_header_content">
            <span><i class="mpm-faqs-question-speech-bubble"></i></span>
            <h1 class="title">{l s='ASK A QUESTION'  mod='faqs'}</h1>
            <div id="mpm_faqs_form_header_addon"></div>
        </div>
    </header>

    <main>
        <div id="mpm_faqs_form_sub_title">{l s='Please enter valid data. We will answer your questions as soon as possible'  mod='faqs'}</div>

        <section id="mpm_faqs_form_content">
            <div class="form-group" id="name_customer_form_group">
                <div class="mpm-faqs-form-validation-message"></div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <span class="input-group-addon-inner">
                                <i class="mpm-faqs-user-silhouette"></i>
                            </span>
                        </span>
                    <input type="text" name="name_customer" class="name_customer form-control" placeholder="{l s='Name'  mod='faqs'}">
                    <i class="mpm-faqs-error mpm-faqs-form-input-info-sign"></i>
                </div>
            </div>

            <div class="form-group" id="email_customer_form_group">
                <div class="mpm-faqs-form-validation-message"></div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <span class="input-group-addon-inner">
                                <i class="mpm-faqs-black-back-closed-envelope-shape"></i>
                            </span>
                        </span>
                    <input type="text" name="email_customer" class="email_customer form-control" placeholder="{l s='Email'  mod='faqs'}">
                    <i class="mpm-faqs-error mpm-faqs-form-input-info-sign"></i>
                </div>
            </div>

            <div class="form-group" id="category_question_form_group">
                <div class="input-group">
                        <span class="input-group-addon">
                            <span class="input-group-addon-inner">
                                <i class="mpm-faqs-menu-3"></i>
                            </span>
                        </span>
                    <div id="mpm_faqs_select_wrapper" class="form-control">
                        <select name="category_question">
                            <option value="0">{l s='Select Topic'  mod='faqs'}</option>
                            {foreach $faqCategories as $category}
                                <option size="1" value="{$category['id_gomakoil_faq_category']|escape:'htmlall':'UTF-8'}">{$category['name']|escape:'htmlall':'UTF-8'}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group" id="question_customer_form_group">
                <div class="mpm-faqs-form-validation-message"></div>
                <textarea name="question_customer" class="question_customer form-control" placeholder="{l s='Question'  mod='faqs'}"></textarea>
                <i class="mpm-faqs-error mpm-faqs-form-input-info-sign"></i>
            </div>

            {if $enable_recaptcha}
                <div class="form-group recaptcha_res-form-group">
                    <script src='https://www.google.com/recaptcha/api.js'></script>
                    <div class="g-recaptcha" data-callback="checkIfRecaptchaIsVerified" data-expired-callback="checkIfRecaptchaIsVerified" data-sitekey="{$recaptcha_key|escape:'htmlall':'UTF-8'}"></div>
                </div>
            {/if}

            {if (isset($consent_message)) && $consent_message != false}
                <label id="consent_checkbox_container">
                    <input type='checkbox' name="consent_checkbox" id="consent_checkbox">
                    <span class="custom-checkbox"></span>
                    {$consent_message|escape:'htmlall':'UTF-8'|unescape}
                </label>
            {/if}
        </section>
    </main>

    <footer>
        <div class="form-group mpm-faqs-form-button-block" id="mpm_faqs_form_submit_button_block">
            <button type="submit" id="mpm_faqs_form_submit_button" class="button mpm-faqs-form-button {if $consent_message}disabled-submit-btn{/if}" {if $consent_message}disabled{/if}>
                <span>{l s='SEND MESSAGE'  mod='faqs'}</span>
                <input type="hidden" name="basePath" value="{$base_url|escape:'htmlall':'UTF-8'}">
                <input type="hidden" name="id_lang" value="{$id_lang|escape:'htmlall':'UTF-8'}">
                <input type="hidden" name="id_shop" value="{$id_shop|escape:'htmlall':'UTF-8'}">
            </button>
        </div>
    </footer>
</div>