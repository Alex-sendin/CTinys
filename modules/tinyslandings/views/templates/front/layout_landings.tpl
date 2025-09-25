{extends file=$layout}

{block name='head_seo'}
  <title>{$page_data.meta_title}</title>
  <meta name="description" content="{$page_data.meta_description}">
{/block}

{block name='content'}
  <div id="tinys-landing-page" >

    <div class="{$page_data.class_name}">
    </div>

    <section class="tinys-landing-primary-content container">
        {$page_data.primary_content nofilter}
    </section>

    <section class="tinys-landing-products-carousel container-fluid">
        {hook h='displayTinysLandingProductsCarousel'}
    </section>

    <section class="tinys-landing-secondary-content container">
        {$page_data.secondary_content nofilter}
    </section>

    <section class="tinys-landing-content-cards container-fluid">
        {hook h='displayTinysLandingContentCards'}
    </section>
    <section class="{$page_data.class_name} tinys-landing-content-image">
    </section>
    <section class="tinys-landing-terciary-content container">
        {$page_data.terciary_content nofilter}
    </section>
    {if isset($page_data.fourth_content)}
      <section class="tinys-landing-fourth-content container">
        {$page_data.fourth_content nofilter}
      </section>
    {/if}
  </div>
{/block}