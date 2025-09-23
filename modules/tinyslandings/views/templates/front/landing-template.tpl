{extends file=$layout}

{block name='head_seo'}
  <title>{$meta_title}</title>
  <meta name="description" content="{$meta_description}">
{/block}

{block name='content'}
  <div id="tinys-landing-page" >

    <div class="{$class_name}">
        {if $class_name == 'tea-landing'}
            <div class="landing-header-content">
                <h1>{$meta_title nofilter}</h1>
            </div>
        {/if}
    </div>

    <section class="tinys-landing-primary-content container">
        {$primary_content nofilter}
    </section>

    <section class="tinys-landing-products-carousel container-fluid">
        {hook h='displayTinysLandingProductsCarousel'}
    </section>

    <section class="tinys-landing-secondary-content container">
        {$secondary_content nofilter}
    </section>

    <section class="tinys-landing-content-cards container">
        {hook h='displayTinysLandingContentCards'}
    </section>

  </div>
{/block}