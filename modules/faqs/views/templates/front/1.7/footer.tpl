<div class="col-md-2 links links_blog">
    <h3 class="h3 hidden-sm-down">{l s='Featured FAQs'  mod='faqs'}</h3>
    <div class="title clearfix hidden-md-up" data-target="#footer_sub_menu_blog" data-toggle="collapse">
        <span class="h3">{l s='Featured FAQs'  mod='faqs'}</span>
        <span class="pull-xs-right">
          <span class="navbar-toggler collapse-icons">
            <i class="material-icons add"></i>
            <i class="material-icons remove"></i>
          </span>
        </span>
    </div>
    <ul id="footer_sub_menu_blog" class="collapse">
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
</div>