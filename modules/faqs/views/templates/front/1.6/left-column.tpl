{if isset($infos['button']) && $infos['button']}
    <div class="block block-faq-left-column-16">
        <h4 class="title_block">{l s='Need Help?'  mod='faqs'}</h4>
        <div class="block_content list-block">
            <button type="submit" class="button-ask-question">
                <span>{l s='ASK A QUESTION'  mod='faqs'}</span>
            </button>
            <input type="hidden" name="basePath" class="basePath" value="{$basePath|escape:'htmlall':'UTF-8'}">
            <input type="hidden" name="id_shop" class="id_shop" value="{$id_shop|escape:'htmlall':'UTF-8'}">
            <input type="hidden" name="id_lang" class="id_lang" value="{$id_lang|escape:'htmlall':'UTF-8'}">
        </div>
    </div>
{/if}

{if isset($infos['faqCategories']) && $infos['faqCategories']}
    <div class="block block-faq-left-column-16">
        <h4 class="title_block">{l s='Faq categories'  mod='faqs'}</h4>
        <div class="block_content list-block">
            <ul class="categories">
                {foreach from=$infos['faqCategories'] item=faqCategory}
                    <li>
                        {if $rewrite_settings}
                            <a class="name_{$faqCategory['id_gomakoil_faq_category']|escape:'htmlall':'UTF-8'} change_item"  href="{$infos['faqUrl']|escape:'htmlall':'UTF-8'}{$faqCategory['link_rewrite']|escape:'htmlall':'UTF-8'}.html">
                                <span class="faqs-category-name">{$faqCategory['name']|substr:0:250|escape:'htmlall':'UTF-8'}{if strlen($faqCategory['name']) > 250} . . .{/if}</span>
                                <span class="faqs-num-items-in-category">[{$faqCategory['number_of_questions']|escape:'htmlall':'UTF-8'}]</span>
                            </a>
                        {else}
                            <a class="name_{$faqCategory['id_gomakoil_faq_category']|escape:'htmlall':'UTF-8'} change_item"  href="{$infos['faqUrl']|escape:'htmlall':'UTF-8'}&category={$faqCategory['link_rewrite']|escape:'htmlall':'UTF-8'}">
                                <span class="faqs-category-name">{$faqCategory['name']|substr:0:250|escape:'htmlall':'UTF-8'}{if strlen($faqCategory['name']) > 250} . . .{/if}</span>
                                <span class="faqs-num-items-in-category">[{$faqCategory['number_of_questions']|escape:'htmlall':'UTF-8'}]</span>
                            </a>
                        {/if}
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>
{/if}

{if isset($infos['mostFaq']) && $infos['mostFaq']}
    <div class="block block-faq-left-column-16">
        <h4 class="title_block">{l s='Featured FAQs'  mod='faqs'}</h4>
        <div class="block_content list-block">
            <ul class="categories">
                {foreach from=$infos['mostFaq'] item=most}
                    {if ($most['association'] && !$most['hide_faq']) || !$most['association']}
                        <li>
                            {if $rewrite_settings}
                                <a class="questions change_item" href="{$infos['faqUrl']|escape:'htmlall':'UTF-8'}{$most['link_rewrite_cat']|escape:'htmlall':'UTF-8'}/{$most['link_rewrite']|escape:'htmlall':'UTF-8'}.html">

                                    {if $most['by_customer'] && $customer_questions_config['icon']}
                                        {if $customer_questions_config['popup']}
                                            <div class="user-assoc-popup">
                                                <div><b>{l s='Asked by:'  mod='faqs'}</b> {$most['name']|escape:'htmlall':'UTF-8'}</div>
                                                <div><b>{l s='Date:'  mod='faqs'}</b> {$most['date_add']|escape:'htmlall':'UTF-8'}</div>
                                            </div>
                                        {/if}

                                        <i class="mpm-faqs-user-1 left-side-icon"></i>
                                    {else}
                                        <i class="mpm-faqs-file-2 left-side-icon"></i>
                                    {/if}

                                    {$most['question']|strip_tags|substr:0:250|escape:'htmlall':'UTF-8'}{if strlen($most['question']) > 250} . . .{/if}
                                </a>
                            {else}
                                <a class="questions change_item" href="{$infos['faqUrl']|escape:'htmlall':'UTF-8'}&category={$most['link_rewrite_cat']|escape:'htmlall':'UTF-8'}&question={$most['link_rewrite']|escape:'htmlall':'UTF-8'}">

                                    {if $most['by_customer'] && $customer_questions_config['icon']}
                                        {if $customer_questions_config['popup']}
                                            <div class="user-assoc-popup">
                                                <div><b>{l s='Asked by:'  mod='faqs'}</b> {$most['name']|escape:'htmlall':'UTF-8'}</div>
                                                <div><b>{l s='Date:'  mod='faqs'}</b> {$most['date_add']|escape:'htmlall':'UTF-8'}</div>
                                            </div>
                                        {/if}

                                        <i class="mpm-faqs-user-1 left-side-icon"></i>
                                    {else}
                                        <i class="mpm-faqs-file-2 left-side-icon"></i>
                                    {/if}

                                    {$most['question']|strip_tags|substr:0:250|escape:'htmlall':'UTF-8'}{if strlen($most['question']) > 250} . . .{/if}
                                </a>
                            {/if}
                        </li>
                    {/if}
                {/foreach}
            </ul>
        </div>
    </div>
{/if}

{if isset($product_category_assoc_faqs) && $product_category_assoc_faqs != false}
    <div class="block block-faq-left-column-16">
        <h4 class="title_block">{l s='Product category FAQs'  mod='faqs'}</h4>
        <div class="block_content list-block">
            <ul class="categories">
                {foreach from=$product_category_assoc_faqs item=faq}
                    <li>
                        {if $rewrite_settings}
                            <a class="questions change_item"
                               href="{$infos['faqUrl']|escape:'htmlall':'UTF-8'}{$faq['link_rewrite_cat']|escape:'htmlall':'UTF-8'}/{$faq['link_rewrite']|escape:'htmlall':'UTF-8'}.html">

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

                                {$faq['question']|strip_tags|substr:0:250|escape:'htmlall':'UTF-8'}{if strlen($faq['question']) > 250} . . .{/if}
                            </a>
                        {else}
                            <a class="questions change_item"
                               href="{$infos['faqUrl']|escape:'htmlall':'UTF-8'}{$faq['link_rewrite_cat']|escape:'htmlall':'UTF-8'}/{$faq['link_rewrite']|escape:'htmlall':'UTF-8'}.html">

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

                                {$faq['question']|strip_tags|substr:0:250|escape:'htmlall':'UTF-8'}{if strlen($faq['question']) > 250} . . .{/if}
                            </a>
                        {/if}
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>
{/if}

