{if ((isset($faqs)) && $faqs) || (isset($button_on_product_page) && $button_on_product_page !== false)}
    <div class="page-product-box gomakoil_faq_page" >

        <div class="association_faqs rte">
            {if isset($faqs) && $faqs}
                <ul class="block_faq_product_page">
                    {assign var='count_most' value=0}
                    {foreach from=$faqs item=faq}
                        {$count_most = $count_most + 1}
                        <div class="questions change_item{if $faq['as_url']} as_url{/if}" >

                            {if $faq['by_customer'] && $customer_questions_config['icon']}
                                {if $customer_questions_config['popup']}
                                    <div class="user-assoc-popup">
                                        <div><b>{l s='Asked by:'  mod='faqs'}</b> {$faq['name']|escape:'htmlall':'UTF-8'}</div>
                                        <div><b>{l s='Date:'  mod='faqs'}</b> {$faq['date_add']|escape:'htmlall':'UTF-8'}</div>
                                    </div>
                                {/if}

                                <i class="mpm-faqs-user-1 left-side-icon"></i>
                            {else}
                                <i class="mpm-faqs-file-2 left-side-icon"></i>
                            {/if}

                            {if $faq['as_url']}
                                <i class="mpm-faqs-external-link-symbol"></i>
                            {else}
                                <i class="mpm-faqs-arrow-point-to-right"></i>
                            {/if}

                            {if $rewrite_settings}
                                <a href="{$faqUrl|escape:'htmlall':'UTF-8'}{$faq['link_rewrite_cat']|escape:'htmlall':'UTF-8'}/{$faq['link_rewrite']|escape:'htmlall':'UTF-8'}.html" class="icon_fag"><i class="mpm-faqs-link-2"></i></a>
                            {else}
                                <a href="{$faqUrl|escape:'htmlall':'UTF-8'}&category={$faq['link_rewrite_cat']|escape:'htmlall':'UTF-8'}&question={$faq['link_rewrite']|escape:'htmlall':'UTF-8'}" class="icon_fag"><i class="mpm-faqs-link-2"></i></a>
                            {/if}

                            <span>{$faq['question']|strip_tags|substr:0:250|escape:'htmlall':'UTF-8'}{if strlen($faq['question']) > 250} ...{/if}</span>
                        </div>

                        {if !$faq['as_url']}
                            <div class="answer_faq">
                                {$faq['answer']|escape:'htmlall':'UTF-8' nofilter}
                                {if $usefulness}
                                    {include file="{$path_tpl|escape:'htmlall':'UTF-8'}all_versions/usefulness.tpl" usefulness = [
                                    'id_faq'  => $faq['id_gomakoil_faq'],
                                    'like'    => $faq['like'],
                                    'dislike' => $faq['dislike'],
                                    'page'    => 'product_tab'
                                    ]}
                                {/if}
                            </div>
                        {/if}
                        <hr/>
                    {/foreach}
                </ul>
            {/if}
        </div>


        <div class="block-faq-product-page">
            {if isset($button_on_product_page) && $button_on_product_page}
                <button type="submit" class="button btn-primary button-ask-question">
                    <span>{l s='Ask a question'  mod='faqs'}</span>
                </button>
            {/if}
            <input type="hidden" name="basePath" class="basePath" value="{$basePath|escape:'htmlall':'UTF-8'}">
            <input type="hidden" name="id_shop" class="id_shop" value="{$id_shop|escape:'htmlall':'UTF-8'}">
            <input type="hidden" name="id_lang" class="id_lang" value="{$id_lang|escape:'htmlall':'UTF-8'}">
            <input type="hidden" name="id_product" class="id-product" value="{$id_product|escape:'htmlall':'UTF-8'}">
        </div>

        {include file="{$path_tpl|escape:'htmlall':'UTF-8'}all_versions/jsonjd.tpl" questions = $faqs }
    </div>
{/if}