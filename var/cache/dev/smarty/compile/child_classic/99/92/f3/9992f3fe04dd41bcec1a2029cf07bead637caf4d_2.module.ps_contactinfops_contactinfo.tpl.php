<?php
/* Smarty version 4.3.4, created on 2025-09-21 22:20:12
  from 'module:ps_contactinfops_contactinfo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68d05dfc5e04f4_89750826',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9992f3fe04dd41bcec1a2029cf07bead637caf4d' => 
    array (
      0 => 'module:ps_contactinfops_contactinfo.tpl',
      1 => 1758392555,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68d05dfc5e04f4_89750826 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ctinys\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!-- begin C:\xampp\htdocs\ctinys/themes/child_classic/modules/ps_contactinfo/ps_contactinfo.tpl -->
<div class="block-contact links wrapper">
  <div class="title clearfix hidden-md-up" data-target="#contact-infos" data-toggle="collapse">
    <span class="h3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Store information','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</span>
    <span class="float-xs-right">
      <span class="navbar-toggler collapse-icons">
        <i class="material-icons add">keyboard_arrow_down</i>
        <i class="material-icons remove">keyboard_arrow_up</i>
      </span>
    </span>
  </div>

  <p class="h4 text-uppercase block-contact-title hidden-sm-down"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Contact','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</p>
  <div id="contact-infos" class="collapse">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'[1]%contact_info%[/1]','sprintf'=>array('[1]'=>"<p>",'[/1]'=>'</p>','%contact_info%'=>$_smarty_tpl->tpl_vars['contact_infos']->value['address']['formatted']),'d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>

    <?php if ($_smarty_tpl->tpl_vars['contact_infos']->value['phone']) {?>
            <?php ob_start();
echo htmlspecialchars((string) smarty_modifier_replace($_smarty_tpl->tpl_vars['contact_infos']->value['phone'],' ',''), ENT_QUOTES, 'UTF-8');
$_prefixVariable1=ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'[1]%phone%[/1]','sprintf'=>array('[1]'=>"<a href='tel:".$_prefixVariable1."'>",'[/1]'=>'</a>','%phone%'=>$_smarty_tpl->tpl_vars['contact_infos']->value['phone']),'d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>

    <?php }?>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_83139066068d05dfc5de376_93141504', "contact-us");
?>

          </div>
</div>
<!-- end C:\xampp\htdocs\ctinys/themes/child_classic/modules/ps_contactinfo/ps_contactinfo.tpl --><?php }
/* {block "contact-us"} */
class Block_83139066068d05dfc5de376_93141504 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contact-us' => 
  array (
    0 => 'Block_83139066068d05dfc5de376_93141504',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <div class="contact-infos-contact">
            <p>Contacta con nosotros <br> Únete a nuestro equipo</p>
        </div>
    <?php
}
}
/* {/block "contact-us"} */
}
