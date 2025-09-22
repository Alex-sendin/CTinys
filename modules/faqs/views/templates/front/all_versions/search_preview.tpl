<div>
    {if !empty($search_results)}
        {foreach $search_results as $question}
            {if $rewrite_settings}
                <a class="mpm-faqs-search-result" href="{$base_url|escape:'htmlall':'UTF-8'}{$question['link_rewrite_cat']|escape:'htmlall':'UTF-8'}/{$question['link_rewrite']|escape:'htmlall':'UTF-8'}.html">
            {else}
                <a class="mpm-faqs-search-result" href="{$base_url|escape:'htmlall':'UTF-8'}&category={$question['link_rewrite_cat']|escape:'htmlall':'UTF-8'}&question={$question['link_rewrite']|escape:'htmlall':'UTF-8'}">
            {/if}
                {$question['question']|strip_tags|escape:'htmlall':'UTF-8'}
            </a>
        {/foreach}
    {else}
        <div class="mpm-faqs-search-result">
            {l s='No questions has been found!' mod='faqs'}
        </div>
    {/if}
</div>