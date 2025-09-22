<?php
/* Smarty version 4.3.4, created on 2025-09-21 22:20:00
  from 'C:\xampp\htdocs\ctinys\modules\faqs\views\templates\front\1.7\tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68d05df0806c50_93813372',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b92c0f509b6a2d175aed2c5a965a40dca137861' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctinys\\modules\\faqs\\views\\templates\\front\\1.7\\tab.tpl',
      1 => 1758392409,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68d05df0806c50_93813372 (Smarty_Internal_Template $_smarty_tpl) {
if ((((isset($_smarty_tpl->tpl_vars['faqs']->value))) && $_smarty_tpl->tpl_vars['faqs']->value) || ((isset($_smarty_tpl->tpl_vars['button_on_product_page']->value)) && $_smarty_tpl->tpl_vars['button_on_product_page']->value !== false)) {?>
    <div class="page-product-box gomakoil_faq_page" >

        <div class="association_faqs rte">
            <?php if ((isset($_smarty_tpl->tpl_vars['faqs']->value)) && $_smarty_tpl->tpl_vars['faqs']->value) {?>
                <ul class="block_faq_product_page">
                    <?php $_smarty_tpl->_assignInScope('count_most', 0);?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['faqs']->value, 'faq');
$_smarty_tpl->tpl_vars['faq']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['faq']->value) {
$_smarty_tpl->tpl_vars['faq']->do_else = false;
?>
                        <?php $_smarty_tpl->_assignInScope('count_most', $_smarty_tpl->tpl_vars['count_most']->value+1);?>
                        <div class="questions change_item<?php if ($_smarty_tpl->tpl_vars['faq']->value['as_url']) {?> as_url<?php }?>" >

                            <?php if ($_smarty_tpl->tpl_vars['faq']->value['by_customer'] && $_smarty_tpl->tpl_vars['customer_questions_config']->value['icon']) {?>
                                <?php if ($_smarty_tpl->tpl_vars['customer_questions_config']->value['popup']) {?>
                                    <div class="user-assoc-popup">
                                        <div><b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Asked by:','mod'=>'faqs'),$_smarty_tpl ) );?>
</b> <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faq']->value['name'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</div>
                                        <div><b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Date:','mod'=>'faqs'),$_smarty_tpl ) );?>
</b> <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faq']->value['date_add'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</div>
                                    </div>
                                <?php }?>

                                <i class="mpm-faqs-user-1 left-side-icon"></i>
                            <?php } else { ?>
                                <i class="mpm-faqs-file-2 left-side-icon"></i>
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['faq']->value['as_url']) {?>
                                <i class="mpm-faqs-external-link-symbol"></i>
                            <?php } else { ?>
                                <i class="mpm-faqs-arrow-point-to-right"></i>
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['rewrite_settings']->value) {?>
                                <a href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faqUrl']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faq']->value['link_rewrite_cat'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
/<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faq']->value['link_rewrite'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
.html" class="icon_fag"><i class="mpm-faqs-link-2"></i></a>
                            <?php } else { ?>
                                <a href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faqUrl']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
&category=<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faq']->value['link_rewrite_cat'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
&question=<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faq']->value['link_rewrite'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="icon_fag"><i class="mpm-faqs-link-2"></i></a>
                            <?php }?>

                            <span><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'substr' ][ 0 ], array( preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['faq']->value['question']),0,250 )),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
if (strlen($_smarty_tpl->tpl_vars['faq']->value['question']) > 250) {?> ...<?php }?></span>
                        </div>

                        <?php if (!$_smarty_tpl->tpl_vars['faq']->value['as_url']) {?>
                            <div class="answer_faq">
                                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faq']->value['answer'],'htmlall','UTF-8' ));?>

                                <?php if ($_smarty_tpl->tpl_vars['usefulness']->value) {?>
                                    <?php ob_start();
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path_tpl']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable3."all_versions/usefulness.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('usefulness'=>array('id_faq'=>$_smarty_tpl->tpl_vars['faq']->value['id_gomakoil_faq'],'like'=>$_smarty_tpl->tpl_vars['faq']->value['like'],'dislike'=>$_smarty_tpl->tpl_vars['faq']->value['dislike'],'page'=>'product_tab')), 0, true);
?>
                                <?php }?>
                            </div>
                        <?php }?>
                        <hr/>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            <?php }?>
        </div>


        <div class="block-faq-product-page">
            <?php if ((isset($_smarty_tpl->tpl_vars['button_on_product_page']->value)) && $_smarty_tpl->tpl_vars['button_on_product_page']->value) {?>
                <button type="submit" class="button btn-primary button-ask-question">
                    <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Ask a question','mod'=>'faqs'),$_smarty_tpl ) );?>
</span>
                </button>
            <?php }?>
            <input type="hidden" name="basePath" class="basePath" value="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['basePath']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
            <input type="hidden" name="id_shop" class="id_shop" value="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['id_shop']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
            <input type="hidden" name="id_lang" class="id_lang" value="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['id_lang']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
            <input type="hidden" name="id_product" class="id-product" value="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['id_product']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
        </div>

        <?php ob_start();
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path_tpl']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable4."all_versions/jsonjd.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('questions'=>$_smarty_tpl->tpl_vars['faqs']->value), 0, true);
?>
    </div>
<?php }
}
}
