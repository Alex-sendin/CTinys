<section class="footer-block col-xs-12 col-sm-2 links_blog">
    <h4 class="h3 hidden-sm-down">{l s='Featured FAQs'  mod='faqs'}</h4>
    <ul id="footer_sub_menu_blog" class="toggle-footer">
        {foreach from=$faqs item=value}
            <li>
                {if $rewrite_settings}
                    <a id="link-blog" class="cms-page-link" href="{$blogUrl|escape:'htmlall':'UTF-8'}{$value['link_rewrite_cat']|escape:'htmlall':'UTF-8'}/{$value['link_rewrite']|escape:'htmlall':'UTF-8'}.html" >
                        {$value['question']|strip_tags|substr:0:250|escape:'htmlall':'UTF-8'}{if strlen($value['question']) > 250} ...{/if}
                    </a>
                {else}
                    <a id="link-blog" class="cms-page-link" href="{$blogUrl|escape:'htmlall':'UTF-8'}&category={$value['link_rewrite_cat']|escape:'htmlall':'UTF-8'}&question={$value['link_rewrite']|escape:'htmlall':'UTF-8'}" >
                        {$value['question']|strip_tags|substr:0:250|escape:'htmlall':'UTF-8'}{if strlen($value['question']) > 250} ...{/if}
                    </a>
                {/if}
            </li>
        {/foreach}
    </ul>
</section>
