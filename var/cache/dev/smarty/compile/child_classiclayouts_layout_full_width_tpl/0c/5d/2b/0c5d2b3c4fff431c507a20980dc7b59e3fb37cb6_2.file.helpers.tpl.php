<?php
/* Smarty version 4.3.4, created on 2025-09-21 22:20:08
  from 'C:\xampp\htdocs\ctinys\themes\classic\templates\_partials\helpers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68d05df8b7eea9_42275777',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c5d2b3c4fff431c507a20980dc7b59e3fb37cb6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctinys\\themes\\classic\\templates\\_partials\\helpers.tpl',
      1 => 1758392560,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68d05df8b7eea9_42275777 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'renderLogo' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\ctinys\\var\\cache\\dev\\smarty\\compile\\child_classiclayouts_layout_full_width_tpl\\0c\\5d\\2b\\0c5d2b3c4fff431c507a20980dc7b59e3fb37cb6_2.file.helpers.tpl.php',
    'uid' => '0c5d2b3c4fff431c507a20980dc7b59e3fb37cb6',
    'call_name' => 'smarty_template_function_renderLogo_15556839968d05df8b75402_63130639',
  ),
));
?> 

<?php }
/* smarty_template_function_renderLogo_15556839968d05df8b75402_63130639 */
if (!function_exists('smarty_template_function_renderLogo_15556839968d05df8b75402_63130639')) {
function smarty_template_function_renderLogo_15556839968d05df8b75402_63130639(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

  <a href="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
">
    <img
      class="logo img-fluid"
      src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['logo_details']['src'], ENT_QUOTES, 'UTF-8');?>
"
      alt="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
"
      width="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['logo_details']['width'], ENT_QUOTES, 'UTF-8');?>
"
      height="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['logo_details']['height'], ENT_QUOTES, 'UTF-8');?>
">
  </a>
<?php
}}
/*/ smarty_template_function_renderLogo_15556839968d05df8b75402_63130639 */
}
