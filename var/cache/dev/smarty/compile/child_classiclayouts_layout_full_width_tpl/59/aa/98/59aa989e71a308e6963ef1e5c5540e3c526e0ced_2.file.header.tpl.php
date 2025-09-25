<?php
/* Smarty version 4.3.4, created on 2025-09-25 15:56:30
  from 'C:\xampp\htdocs\ctinys\themes\child_classic\templates\_partials\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68d54a0e68d8c8_07741574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59aa989e71a308e6963ef1e5c5540e3c526e0ced' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctinys\\themes\\child_classic\\templates\\_partials\\header.tpl',
      1 => 1758608447,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68d54a0e68d8c8_07741574 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_50457069568d54a0e680254_65734527', 'header_banner');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_196536208068d54a0e681a18_97157251', 'header_nav');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_45574655868d54a0e685281_94550973', 'header_top');
?>

<?php }
/* {block 'header_banner'} */
class Block_50457069568d54a0e680254_65734527 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_banner' => 
  array (
    0 => 'Block_50457069568d54a0e680254_65734527',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="header-banner">
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayBanner'),$_smarty_tpl ) );?>

  </div>
<?php
}
}
/* {/block 'header_banner'} */
/* {block 'header_nav'} */
class Block_196536208068d54a0e681a18_97157251 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_nav' => 
  array (
    0 => 'Block_196536208068d54a0e681a18_97157251',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="header-advisor"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Obtén un 10% de descuento en tu primera compra",'d'=>"Shop.Theme.Global"),$_smarty_tpl ) );?>
 &nbsp <a href=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'¡Quiero mi descuento!','d'=>"Shop.Theme.Global"),$_smarty_tpl ) );?>
</a></div>
  <nav class="header-nav">
    <div class="container">
      <div class="row">
        <div class="hidden-sm-down">
                          </div>
        <div class="hidden-md-up text-sm-center mobile">
			<div class="top-logo col-xs-7" id="_mobile_logo"></div>
          			  	<div id="menu-icon">
            	<i class="material-icons d-inline">&#xE5D2;</i>
          	</div>
          	        </div>
      </div>
    </div>
  </nav>
<?php
}
}
/* {/block 'header_nav'} */
/* {block 'header_top'} */
class Block_45574655868d54a0e685281_94550973 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_top' => 
  array (
    0 => 'Block_45574655868d54a0e685281_94550973',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-m-3 col-md-2 hidden-sm-down" id="_desktop_logo">
          <?php if ($_smarty_tpl->tpl_vars['shop']->value['logo_details']) {?>
            <?php if ($_smarty_tpl->tpl_vars['page']->value['page_name'] == 'index') {?>
                            <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'renderLogo', array(), true);?>

                         <?php } else { ?>
              <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'renderLogo', array(), true);?>

            <?php }?>
          <?php }?>
        </div>
        <div class="top-title hidden-sm-down">
          <p><strong>MINI MODELS 3D</strong></p>
          <p>Big Play - Dream Builders</p>
        </div>
        <div class="header-top-right position-static">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayTop'),$_smarty_tpl ) );?>

        </div>
        <div class="right-nav">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNav2'),$_smarty_tpl ) );?>

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
  <img src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['urls']->value['img_url'], ENT_QUOTES, 'UTF-8');?>
mas_catorce.webp" alt="Logo mayores de catorce años">
  </div>
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNavFullWidth'),$_smarty_tpl ) );?>

<?php
}
}
/* {/block 'header_top'} */
}
