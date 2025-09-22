{if $products}
    <section class="faqs-products faqs-products-ps-16">
        <div class="header_related_products">
            <h4 class="title_related_products">
                {l s='Related Products'  mod='faqs'}
            </h4>
            <div class="related_products_arrows"></div>
        </div>
        <div class="products products-slider">
            {foreach from=$products item="product"}

                <article class="mpm-faq-product-miniature mpm-faq-ps16 product-miniature product-miniature-slider js-product-miniature" data-id-product="{$product.id_product|escape:'html':'UTF-8'}" data-id-product-attribute="{$product.id_product_attribute|escape:'html':'UTF-8'}" itemscope itemtype="http://schema.org/Product">
                    <div class="mpm-faq-img-container" >
                        <a href="{$product.link|escape:'html':'UTF-8'}" class="{*thumbnail product-thumbnail*}">
                            {if $settings->show_product_flags}
                                <ul class="product-flags">
                                    {if !empty($product.specific_prices) && isset($product.specific_prices.reduction_type) && $product.specific_prices.reduction_type === 'percentage'}
                                        <li class="product-flag flag-price-reduction">-{$product.specific_prices.reduction * 100}%</li>
                                    {/if}
                                    {if !empty($product.new)}
                                        <li class="product-flag flag-new">{l s='new' mod='faqs'}</li>
                                    {/if}
                                    {if !empty($product.on_sale) && !empty($product.show_price)}
                                        <li class="product-flag flag-onsale">{l s='sale' mod='faqs'}</li>
                                    {/if}
                                </ul>
                            {/if}

                            <img class="mpm-faq-img" src="{$link->getImageLink($product.link_rewrite, $product.id_image, $settings->type_image)|escape:'html':'UTF-8'}" {*alt="{$product.cover.legend}"  data-full-size-image-url="{$product.cover.large.url}"*} >
                        </a>
                    </div>

                    <div class="mpm-faq-product-info-container">
                        <div class="mpm-faq-product-title-block">
                            <h3 class="mpm-faq-product-title" itemprop="name">
                                <a class="product-name" href="{$product.link}">{$product.name|truncate:30:'...'|escape:'html':'UTF-8'}</a>
                            </h3>
                        </div>
                        <div class="mpm-faq-product-price-block content_price">
                            {if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
                                {hook h="displayProductPriceBlock" product=$product type='before_price'}
                                {if $product.price_without_reduction > 0 && isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
                                    {hook h="displayProductPriceBlock" product=$product type="old_price"}
                                    <span class="old-price product-price">
                                    {displayWtPrice p=$product.price_without_reduction}
                                </span>
                                    {hook h="displayProductPriceBlock" id_product=$product.id_product type="old_price"}
                                {/if}
                                <span class="price product-price">
                                {if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
                            </span>
                                {hook h="displayProductPriceBlock" product=$product type="price"}
                                {hook h="displayProductPriceBlock" product=$product type="unit_price"}
                                {hook h="displayProductPriceBlock" product=$product type='after_price'}
                            {/if}
                        </div>

                    </div>

                </article>
            {/foreach}
        </div>
    </section>
{/if}

