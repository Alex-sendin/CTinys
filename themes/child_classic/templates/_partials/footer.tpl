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
<div class="container">
</div>
<div class="footer-container">
  <div style="padding: 0 1rem;">
    <div class="footer-info">
      <picture>
        <img src="{$urls.theme_assets}img/logo-ctinys.webp" alt="Logo Ctinys" style="width:auto;">
      </picture>
      {block name='hook_footer'}
        {hook h='displayFooter'}
      {/block}
    </div>
    <div class="row">
      <div class="col-md-12">
        <p class="text-sm-center">
          {block name='copyright_link'}
            <a href="https://www.grupoecotisa.com/" target="_blank" rel="noopener noreferrer nofollow">
              {l s='Hecho con ❤️ desde |%Ecoitec%| - %year%' sprintf=['%Ecoitec%' => 'Ecoitec™', '%year%' => 'Y'|date, '%copyright%' => '©'] d='Shop.Theme.Global'}
            </a>
          {/block}
        </p>
      </div>
    </div>
  </div>
  {block name="external-archives"}
    <script src="{$urls.theme_assets}js/owl.carousel.min.js" defer></script>
    <link rel="stylesheet" href="{$urls.theme_assets}css/owl.carousel.min.css">
    <link rel="stylesheet" href="{$urls.theme_assets}css/owl.theme.default.min.css">
  {/block}
</div>
