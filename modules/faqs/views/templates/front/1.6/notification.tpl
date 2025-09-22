<div id="mpm_faqs_form_container" class="ps-16">
    <header>
        <span id="mpm_faqs_form_close_button" onclick=""><i class="mpm-faqs-cancel_2"></i></span>
        <div id="mpm_faqs_form_header_content">
            {if ($status === 'success')}
                <span><i class="mpm-faqs-question-success-bubble"></i></span>
                <h1 class="title">{l s='AWESOME!'  mod='faqs'}</h1>
            {else}
                <span><i class="mpm-faqs-question-error-bubble"></i></span>
                <h1 class="title">{l s='WOOPS!'  mod='faqs'}</h1>
            {/if}

            <div id="mpm_faqs_form_header_addon"></div>
        </div>
    </header>

    <main>
        <div id="mpm_faqs_form_sub_title">{$msg|escape:'htmlall':'UTF-8'}</div>
    </main>

    <footer>
        <div class="form-group mpm-faqs-form-button-block">
            {if ($status === 'success')}
                <button class="button mpm-faqs-form-button" id="mpm_faqs_notification_close_button"><span>{l s='CLOSE'  mod='faqs'}</span></button>
            {else}
                <button class="button mpm-faqs-form-button" id="mpm_faqs_notification_reset_button"><span>{l s='TRY AGAIN'  mod='faqs'}</span></button>
            {/if}
        </div>
    </footer>
</div>