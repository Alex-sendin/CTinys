{**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 * ... (resto de la cabecera) ...
 *}

<section class="new-products">

  <p class="h1 products-section-title" style="color:var(--primary-color);">{l s='Novedades' mod='ps_newproducts'}</p>
  
  <div class="carrusel_products owl-carousel owl-theme" autoWidth="true" dots="false" nav="true" isautoplay="true" autoplayTimeout="10000" loop="true">
    {* Iteramos sobre 'products', que ahora contiene nuestras combinaciones formateadas *}
    {foreach from=$products item="combination"}
        <article class="js-product-miniature" data-id-product="{$combination.id_product}" data-id-product-attribute="{$combination.id_product_attribute}">
          <div class="combination-card-container">
            <a href="{$combination.url}" class="thumbnail product-thumbnail">
                <img src="{$combination.image_url}" alt="{$combination.name}">
            </a>
            <div class="product-description">
              <p class="product-title"><a href="{$combination.url}">{$combination.name}</a></p>
              {if $combination.attributes}
                <div class="product-combination-attributes">
                  {foreach from=$combination.attributes item='attribute'}
                    <span class="product-attribute">
                      <strong>{$attribute.group_name|truncate:10:""}:</strong> {$attribute.name}
                    </span>
                  {/foreach}
                </div>
              {/if}
                <div class="product-price-and-shipping">
                  <span class="price">{Tools::displayPrice($combination.price)}</span>
                </div>  
            </div>
          </div>
        </article>
    {/foreach}
  </div>
</section>