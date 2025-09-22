<?php
/* Smarty version 4.3.4, created on 2025-09-21 22:20:12
  from 'C:\xampp\htdocs\ctinys\themes\child_classic\templates\_partials\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68d05dfc2a7fc6_73360692',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e182101157c60a42925e5770e8196d35671911f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctinys\\themes\\child_classic\\templates\\_partials\\footer.tpl',
      1 => 1758392556,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68d05dfc2a7fc6_73360692 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<div class="container">
</div>
<div class="footer-container">
  <div style="padding: 0 1rem;">
    <div class="footer-info">
      <picture>
        <img src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['urls']->value['theme_assets'], ENT_QUOTES, 'UTF-8');?>
img/logo-ctinys.webp" alt="Logo Ctinys" style="width:auto;">
      </picture>
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_55506057268d05dfc29b040_44696619', 'hook_footer');
?>

    </div>
    <div class="row">
      <div class="col-md-12">
        <p class="text-sm-center">
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_150390354968d05dfc29d514_69473853', 'copyright_link');
?>

        </p>
      </div>
    </div>
  </div>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_117623493168d05dfc2a33d7_68009664', "external-archives");
?>

</div>
<?php }
/* {block 'hook_footer'} */
class Block_55506057268d05dfc29b040_44696619 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer' => 
  array (
    0 => 'Block_55506057268d05dfc29b040_44696619',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooter'),$_smarty_tpl ) );?>

      <?php
}
}
/* {/block 'hook_footer'} */
/* {block 'copyright_link'} */
class Block_150390354968d05dfc29d514_69473853 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'copyright_link' => 
  array (
    0 => 'Block_150390354968d05dfc29d514_69473853',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <a href="https://www.grupoecotisa.com/" target="_blank" rel="noopener noreferrer nofollow">
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hecho con ❤️ desde |%Ecoitec%| - %year%','sprintf'=>array('%Ecoitec%'=>'Ecoitec™','%year%'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date' ][ 0 ], array( 'Y' )),'%copyright%'=>'©'),'d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>

            </a>
          <?php
}
}
/* {/block 'copyright_link'} */
/* {block "external-archives"} */
class Block_117623493168d05dfc2a33d7_68009664 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'external-archives' => 
  array (
    0 => 'Block_117623493168d05dfc2a33d7_68009664',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['urls']->value['theme_assets'], ENT_QUOTES, 'UTF-8');?>
js/owl.carousel.min.js" defer><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['urls']->value['theme_assets'], ENT_QUOTES, 'UTF-8');?>
css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['urls']->value['theme_assets'], ENT_QUOTES, 'UTF-8');?>
css/owl.theme.default.min.css">
  <?php
}
}
/* {/block "external-archives"} */
}
