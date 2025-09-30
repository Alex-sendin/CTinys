<?php
/* Smarty version 4.3.4, created on 2025-09-30 15:27:56
  from 'module:ps_emailsubscriptionviewstemplateshookps_emailsubscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68dbdadc56e552_55033257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '307dc6bd4724d29d1572cc301dd7148e962604ef' => 
    array (
      0 => 'module:ps_emailsubscriptionviewstemplateshookps_emailsubscription.tpl',
      1 => 1758608447,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68dbdadc56e552_55033257 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin C:\xampp\htdocs\ctinys/themes/child_classic/modules/ps_emailsubscription/views/templates/hook/ps_emailsubscription.tpl -->
<div class="block_newsletter" id="blockEmailSubscription_<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['hookName']->value, ENT_QUOTES, 'UTF-8');?>
">
  <p class="h4">Suscríbete a nuestra Newsletter!</p>
      <form action="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['urls']->value['current_url'], ENT_QUOTES, 'UTF-8');?>
#blockEmailSubscription_<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['hookName']->value, ENT_QUOTES, 'UTF-8');?>
" method="post">
            <div class="input-wrapper">
              <input name="email" type="email" value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8');?>
" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your email address','d'=>'Shop.Forms.Labels'),$_smarty_tpl ) );?>
" aria-labelledby="block-newsletter-label" required>
              <button class="btn-newsletter" name="submitNewsletter" type="submit" >
                  <img src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['urls']->value['theme_assets'], ENT_QUOTES, 'UTF-8');?>
/img/icons/newsletter-icon.webp" />
              </button>
            </div>
            <input type="hidden" name="blockHookName" value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['hookName']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <input type="hidden" name="action" value="0">
      </form>
</div>

<!-- end C:\xampp\htdocs\ctinys/themes/child_classic/modules/ps_emailsubscription/views/templates/hook/ps_emailsubscription.tpl --><?php }
}
