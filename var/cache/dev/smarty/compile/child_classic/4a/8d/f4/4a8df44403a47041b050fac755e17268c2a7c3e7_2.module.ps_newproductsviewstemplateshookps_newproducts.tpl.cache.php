<?php
/* Smarty version 4.3.4, created on 2025-09-21 22:12:54
  from 'module:ps_newproductsviewstemplateshookps_newproducts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68d05c46a84e10_81542144',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a8df44403a47041b050fac755e17268c2a7c3e7' => 
    array (
      0 => 'module:ps_newproductsviewstemplateshookps_newproducts.tpl',
      1 => 1758392554,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68d05c46a84e10_81542144 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '38542416468d05c46a64752_13669436';
?>
<!-- begin C:\xampp\htdocs\ctinys/themes/child_classic/modules/ps_newproducts/views/templates/hook/ps_newproducts.tpl -->
<section class="new-products">

  <p class="h1 products-section-title" style="color:var(--primary-color);"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Novedades','mod'=>'ps_newproducts'),$_smarty_tpl ) );?>
</p>
  
  <div class="carrusel_products owl-carousel owl-theme" autoWidth="true" dots="false" nav="true" isautoplay="true" autoplayTimeout="10000" loop="true">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'combination');
$_smarty_tpl->tpl_vars['combination']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['combination']->value) {
$_smarty_tpl->tpl_vars['combination']->do_else = false;
?>
        <article class="js-product-miniature" data-id-product="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['combination']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['combination']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
">
          <div class="combination-card-container">
            <a href="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['combination']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="thumbnail product-thumbnail">
                <img src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['combination']->value['image_url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['combination']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
            </a>
            <div class="product-description">
              <p class="product-title"><a href="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['combination']->value['url'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['combination']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a></p>
              <?php if ($_smarty_tpl->tpl_vars['combination']->value['attributes']) {?>
                <div class="product-combination-attributes">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['combination']->value['attributes'], 'attribute');
$_smarty_tpl->tpl_vars['attribute']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
$_smarty_tpl->tpl_vars['attribute']->do_else = false;
?>
                    <span class="product-attribute">
                      <strong><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['attribute']->value['group_name'],10,'' )), ENT_QUOTES, 'UTF-8');?>
:</strong> <?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['attribute']->value['name'], ENT_QUOTES, 'UTF-8');?>

                    </span>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
              <?php }?>
                <div class="product-price-and-shipping">
                  <span class="price"><?php echo htmlspecialchars((string) Tools::displayPrice($_smarty_tpl->tpl_vars['combination']->value['price']), ENT_QUOTES, 'UTF-8');?>
</span>
                </div>  
            </div>
          </div>
        </article>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
</section><!-- end C:\xampp\htdocs\ctinys/themes/child_classic/modules/ps_newproducts/views/templates/hook/ps_newproducts.tpl --><?php }
}
