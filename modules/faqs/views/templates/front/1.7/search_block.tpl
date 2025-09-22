<div id="search_faqs_container" data-base-path="{$basePath|escape:'htmlall':'UTF-8'}">
    <section id="search_faqs_content">
        <h1 id="search_faqs_title"><a href="{$infos['faqUrl']}">{l s='FREQUENTLY ASKED QUESTIONS'  mod='faqs'}</a></h1>
        <div id="search_faqs_input_group">
            <img class="loader"  src="{$img_dir}loading.svg">

            {if $rewrite_settings}
                <input type="text" id="search_faqs_input" placeholder="{l s='Search FAQs'  mod='faqs'}"><button type="submit"   {if isset($faqUrl) && $faqUrl}onclick="searchFags($('#search_faqs_input').val(), '{$faqUrl|escape:'htmlall':'UTF-8'}search/'); return false;"  {/if}  id="search_faqs_submit_button" class="button btn-primary">
                    <span id="search_faqs_submit_button_icon"><i class="mpm-faqs-search"></i></span>
                </button>
            {else}
                <input type="text" id="search_faqs_input" placeholder="{l s='Search FAQs'  mod='faqs'}"><button type="submit"  onclick="searchFags($('#search_faqs_input').val(), '{$faqUrl|escape:'htmlall':'UTF-8'}&search='); return false;"  id="search_faqs_submit_button" class="button btn-primary">
                    <span id="search_faqs_submit_button_icon"><i class="mpm-faqs-search"></i></span>
                </button>
            {/if}

            <div id="mpm_faqs_search_preview_container"></div>
        </div>
    </section>
</div>