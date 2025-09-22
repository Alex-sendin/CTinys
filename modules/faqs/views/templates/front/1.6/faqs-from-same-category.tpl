{if $faqs}
    <section class="">
        <h1 class="title_category_page">{l s='FAQs From Same Category'  mod='faqs'}</h1>
            {assign var='count_question' value=0}
            {foreach from=$faqs item=question}
                {if ($question['association'] && !$question['hide_faq']) || !$question['association']}
                    {$count_question = $count_question + 1}
                    <div class="questions change_item{if $question['as_url']} as_url{/if}"  >
                        {if $question['by_customer'] && $customer_questions_config['icon']}
                            {if $customer_questions_config['popup']}
                                <div class="user-assoc-popup">
                                    <div><b>{l s='Asked by:'  mod='faqs'}</b> {$question['name']|escape:'htmlall':'UTF-8'}</div>
                                    <div><b>{l s='Date:'  mod='faqs'}</b> {$question['date_add']|escape:'htmlall':'UTF-8'}</div>
                                </div>
                            {/if}

                            <i class="mpm-faqs-user-1 left-side-icon"></i>
                        {else}
                            <i class="mpm-faqs-file-2 left-side-icon"></i>
                        {/if}

                        {if $question['as_url']}
                            <i class="mpm-faqs-external-link-symbol"></i>
                        {else}
                            <i class="mpm-faqs-arrow-point-to-right"></i>
                        {/if}

                        {if $rewrite_settings}
                            <a href="{$faqUrl|escape:'htmlall':'UTF-8'}{$question['link_rewrite_cat']|escape:'htmlall':'UTF-8'}/{$question['link_rewrite']|escape:'htmlall':'UTF-8'}.html" class="icon_fag"><i class="mpm-faqs-link-2"></i></a>
                        {else}
                            <a href="{$faqUrl|escape:'htmlall':'UTF-8'}&category={$question['link_rewrite_cat']|escape:'htmlall':'UTF-8'}&question={$question['link_rewrite']|escape:'htmlall':'UTF-8'}" class="icon_fag"><i class="mpm-faqs-link-2"></i></a>
                        {/if}

                        {$question['question']|strip_tags|substr:0:250|escape:'htmlall':'UTF-8'}{if strlen($question['question']) > 250} . . .{/if}
                    </div>

                    {if !$question['as_url']}
                        <div class="answer_faq">
                            {$question['answer']|escape:'htmlall'|unescape}
                            {if $usefulness}
                                {include file="{$path_tpl|escape:'htmlall':'UTF-8'}all_versions/usefulness.tpl" usefulness = [
                                'id_faq'  => $question['id_gomakoil_faq'],
                                'like'    => $question['like'],
                                'dislike' => $question['dislike'],
                                'page'    => 'faq'
                                ]}
                            {/if}
                        </div>
                    {/if}
                    <hr/>
                {/if}
            {/foreach}

    </section>
    {include file="{$path_tpl|escape:'htmlall':'UTF-8'}all_versions/jsonjd.tpl" questions = $faqs }
{/if}