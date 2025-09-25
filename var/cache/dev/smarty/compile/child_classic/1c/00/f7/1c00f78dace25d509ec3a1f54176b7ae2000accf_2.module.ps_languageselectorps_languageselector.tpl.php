<?php
/* Smarty version 4.3.4, created on 2025-09-25 15:56:30
  from 'module:ps_languageselectorps_languageselector.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68d54a0ebb8039_75553532',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c00f78dace25d509ec3a1f54176b7ae2000accf' => 
    array (
      0 => 'module:ps_languageselectorps_languageselector.tpl',
      1 => 1758608447,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68d54a0ebb8039_75553532 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin C:\xampp\htdocs\ctinys/themes/child_classic/modules/ps_languageselector/ps_languageselector.tpl --><div id="_desktop_language_selector">
<div class="language-selector-wrapper">
<span id="language-selector-label" class="hidden-md-up"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Language:','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</span>
<div class="language-selector">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language', false, NULL, 'language_loop', array (
  'first' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_language_loop']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_language_loop']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_language_loop']->value['index'];
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_language_loop']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_language_loop']->value['first'] : null)) {?><span> | </span><?php }?><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'language','id'=>$_smarty_tpl->tpl_vars['language']->value['id_lang']),$_smarty_tpl ) );?>
" class="" data-iso-code="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) mb_strtoupper((string) $_smarty_tpl->tpl_vars['language']->value['iso_code'] ?? '', 'UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
</div>
</div>
<!-- end C:\xampp\htdocs\ctinys/themes/child_classic/modules/ps_languageselector/ps_languageselector.tpl --><?php }
}
