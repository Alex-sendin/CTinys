{if $products}
    <section class="faqs-products faqs-card-block">
        <div class="header_related_products">
            <h4 class="title_related_products">
                {l s='Related Products'  mod='faqs'}
            </h4>
            <div class="related_products_arrows"></div>
        </div>
        <div class="products products-slider">
            {foreach from=$products item="product"}
                {include file='catalog/_partials/miniatures/product.tpl' variants=$product.main_variants}
            {/foreach}
        </div>
    </section>
{/if}

