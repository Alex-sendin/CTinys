{**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 *}
{block name='header_banner'}
  <div class="header-banner">
    {hook h='displayBanner'}
  </div>
{/block}

{block name='header_nav'}
  <div class="header-advisor">{l s="Obtén un 10% de descuento en tu primera compra" d="Shop.Theme.Global"} &nbsp <a href="">¡Quiero mi descuento!</a></div>
  <nav class="header-nav">
    <div class="container">
      <div class="row">
        <div class="hidden-sm-down">
        {* <div class="col-md-5 col-xs-12">
            {hook h='displayNav1'}
          </div> *}
          {* <div class="right-nav">
              {hook h='displayNav2'}
          </div> *}
        </div>
        <div class="hidden-md-up text-sm-center mobile">
			<div class="top-logo col-xs-7" id="_mobile_logo"></div>
          	{* <div id="_mobile_cart"></div>
          	<div id="_mobile_user_info"></div> *}
		  	<div id="menu-icon">
            	<i class="material-icons d-inline">&#xE5D2;</i>
          	</div>
          	{*<div class="clearfix"></div>*}
        </div>
      </div>
    </div>
  </nav>
{/block}

{block name='header_top'}
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-m-3 col-md-2 hidden-sm-down" id="_desktop_logo">
          {if $shop.logo_details}
            {if $page.page_name == 'index'}
            {*  <h1> *}
                {renderLogo}
             {* </h1> *}
            {else}
              {renderLogo}
            {/if}
          {/if}
        </div>
        <div class="top-title hidden-sm-down">
          <p><strong>MINI MODELS 3D</strong></p>
          <p>Big Play - Dream Builders</p>
        </div>
        <div class="header-top-right position-static">
            {hook h='displayTop'}
        </div>
        <div class="right-nav">
            {hook h='displayNav2'}
        </div>
      </div>
      <div id="mobile_top_menu_wrapper" class="row hidden-md-up" style="display:none;">
        <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
        <div class="js-top-menu-bottom">
          <div id="_mobile_currency_selector"></div>
          <div id="_mobile_language_selector"></div>
          <div id="_mobile_contact_link"></div>
          <div class="user-actions-menu_mobile">
            <div id="_mobile_user_info"></div>
            <div id="_mobile_cart"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-top-secondary">
  <p><strong>Aviso importante:</strong> Este producto no es un juguete. Son figuras de colección articuladas diseñadas para uso decorativo y coleccionismo. Recomendado únicamente para personas mayores de 14 años.<p>
  <img src="{$urls.img_url}mas_catorce.webp" alt="Logo mayores de catorce años">
  </div>
  {hook h='displayNavFullWidth'}
{/block}
