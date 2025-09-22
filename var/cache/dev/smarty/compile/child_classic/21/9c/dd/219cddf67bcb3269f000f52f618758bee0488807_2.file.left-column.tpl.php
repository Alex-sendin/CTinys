<?php
/* Smarty version 4.3.4, created on 2025-09-21 22:19:42
  from 'C:\xampp\htdocs\ctinys\modules\faqs\views\templates\front\1.7\left-column.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68d05ddee410c4_18869901',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '219cddf67bcb3269f000f52f618758bee0488807' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctinys\\modules\\faqs\\views\\templates\\front\\1.7\\left-column.tpl',
      1 => 1758392409,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68d05ddee410c4_18869901 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['layout']->value == 'layouts/layout-both-columns.tpl' && $_smarty_tpl->tpl_vars['infos']->value['hookName'] == 'displayRightColumn') {?> <?php } else { ?>

  <?php if ((isset($_smarty_tpl->tpl_vars['infos']->value['button'])) && $_smarty_tpl->tpl_vars['infos']->value['button']) {?>
    <div class="block block-faq-left-column">
      <h4 class="title_block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Need Help?','mod'=>'faqs'),$_smarty_tpl ) );?>
</h4>
      <div class="block_content list-block">
        <button type="submit" class="button-ask-question">
          <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'ASK A QUESTION','mod'=>'faqs'),$_smarty_tpl ) );?>
</span>
        </button>

        <input type="hidden" name="basePath" class="basePath" value="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['basePath']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
        <input type="hidden" name="id_shop" class="id_shop" value="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['id_shop']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
        <input type="hidden" name="id_lang" class="id_lang" value="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['id_lang']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
      </div>
    </div>
  <?php }?>

  <?php if ((isset($_smarty_tpl->tpl_vars['infos']->value['faqCategories'])) && $_smarty_tpl->tpl_vars['infos']->value['faqCategories']) {?>
    <div class="block block-faq-left-column">
      <h4 class="title_block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Faq categories','mod'=>'faqs'),$_smarty_tpl ) );?>
</h4>
      <div class="block_content list-block">
        <ul class="categories">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value['faqCategories'], 'faqCategory');
$_smarty_tpl->tpl_vars['faqCategory']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['faqCategory']->value) {
$_smarty_tpl->tpl_vars['faqCategory']->do_else = false;
?>
            <li>
                <?php if ($_smarty_tpl->tpl_vars['rewrite_settings']->value) {?>
                    <a class="name_<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faqCategory']->value['id_gomakoil_faq_category'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 change_item"  href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['infos']->value['faqUrl'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faqCategory']->value['link_rewrite'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
.html">
                        <span class="faqs-category-name"><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'substr' ][ 0 ], array( $_smarty_tpl->tpl_vars['faqCategory']->value['name'],0,250 )),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
if (strlen($_smarty_tpl->tpl_vars['faqCategory']->value['name']) > 250) {?> . . .<?php }?></span>
                        <span class="faqs-num-items-in-category">[<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faqCategory']->value['number_of_questions'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]</span>
                    </a>
                <?php } else { ?>
                  <a class="name_<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faqCategory']->value['id_gomakoil_faq_category'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 change_item"  href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['infos']->value['faqUrl'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
&category=<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faqCategory']->value['link_rewrite'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
                    <span class="faqs-category-name"><?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'substr' ][ 0 ], array( $_smarty_tpl->tpl_vars['faqCategory']->value['name'],0,250 )),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
if (strlen($_smarty_tpl->tpl_vars['faqCategory']->value['name']) > 250) {?> . . .<?php }?></span>
                    <span class="faqs-num-items-in-category">[<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faqCategory']->value['number_of_questions'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]</span>
                  </a>
                <?php }?>
            </li>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
      </div>
    </div>
  <?php }?>

  <?php if ((isset($_smarty_tpl->tpl_vars['infos']->value['mostFaq'])) && $_smarty_tpl->tpl_vars['infos']->value['mostFaq']) {?>
    <div class="block block-faq-left-column">
      <h4 class="title_block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Featured FAQs','mod'=>'faqs'),$_smarty_tpl ) );?>
</h4>
      <div class="block_content list-block">
        <ul class="categories">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value['mostFaq'], 'most');
$_smarty_tpl->tpl_vars['most']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['most']->value) {
$_smarty_tpl->tpl_vars['most']->do_else = false;
?>
            <?php if (($_smarty_tpl->tpl_vars['most']->value['association'] && !$_smarty_tpl->tpl_vars['most']->value['hide_faq']) || !$_smarty_tpl->tpl_vars['most']->value['association']) {?>
              <li>
                  <?php if ($_smarty_tpl->tpl_vars['rewrite_settings']->value) {?>
                    <a class="questions change_item" href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['infos']->value['faqUrl'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['most']->value['link_rewrite_cat'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
/<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['most']->value['link_rewrite'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
.html">

                        <?php if ($_smarty_tpl->tpl_vars['most']->value['by_customer'] && $_smarty_tpl->tpl_vars['customer_questions_config']->value['icon']) {?>
                            <?php if ($_smarty_tpl->tpl_vars['customer_questions_config']->value['popup']) {?>
                                <div class="user-assoc-popup">
                                    <div><b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Asked by:','mod'=>'faqs'),$_smarty_tpl ) );?>
</b> <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['most']->value['name'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</div>
                                    <div><b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Date:','mod'=>'faqs'),$_smarty_tpl ) );?>
</b> <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['most']->value['date_add'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</div>
                                </div>
                            <?php }?>

                            <i class="mpm-faqs-user-1 left-side-icon"></i>
                        <?php } else { ?>
                            <i class="mpm-faqs-file-2 left-side-icon"></i>
                        <?php }?>

                        <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'substr' ][ 0 ], array( preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['most']->value['question']),0,250 )),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
if (strlen($_smarty_tpl->tpl_vars['most']->value['question']) > 250) {?> . . .<?php }?>
                    </a>
                  <?php } else { ?>
                    <a class="questions change_item" href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['infos']->value['faqUrl'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
&category=<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['most']->value['link_rewrite_cat'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
&question=<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['most']->value['link_rewrite'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">

                        <?php if ($_smarty_tpl->tpl_vars['most']->value['by_customer'] && $_smarty_tpl->tpl_vars['customer_questions_config']->value['icon']) {?>
                            <?php if ($_smarty_tpl->tpl_vars['customer_questions_config']->value['popup']) {?>
                                <div class="user-assoc-popup">
                                    <div><b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Asked by:','mod'=>'faqs'),$_smarty_tpl ) );?>
</b> <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['most']->value['name'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</div>
                                    <div><b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Date:','mod'=>'faqs'),$_smarty_tpl ) );?>
</b> <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['most']->value['date_add'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</div>
                                </div>
                            <?php }?>

                            <i class="mpm-faqs-user-1 left-side-icon"></i>
                        <?php } else { ?>
                            <i class="mpm-faqs-file-2 left-side-icon"></i>
                        <?php }?>

                        <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'substr' ][ 0 ], array( preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['most']->value['question']),0,250 )),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
if (strlen($_smarty_tpl->tpl_vars['most']->value['question']) > 250) {?> . . .<?php }?>
                    </a>
                  <?php }?>
              </li>
            <?php }?>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
      </div>
    </div>
  <?php }
}?>

<?php if ((isset($_smarty_tpl->tpl_vars['product_category_assoc_faqs']->value)) && $_smarty_tpl->tpl_vars['product_category_assoc_faqs']->value != false) {?>
  <div class="block block-faq-left-column">
    <h4 class="title_block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product category FAQs','mod'=>'faqs'),$_smarty_tpl ) );?>
</h4>
    <div class="block_content list-block">
      <ul class="categories">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product_category_assoc_faqs']->value, 'faq');
$_smarty_tpl->tpl_vars['faq']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['faq']->value) {
$_smarty_tpl->tpl_vars['faq']->do_else = false;
?>
            <li>
                <?php if ($_smarty_tpl->tpl_vars['rewrite_settings']->value) {?>
                  <a class="questions change_item"
                     href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['infos']->value['faqUrl'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faq']->value['link_rewrite_cat'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
/<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faq']->value['link_rewrite'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
.html">

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

                      <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'substr' ][ 0 ], array( preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['faq']->value['question']),0,250 )),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
if (strlen($_smarty_tpl->tpl_vars['faq']->value['question']) > 250) {?> . . .<?php }?>
                  </a>
                <?php } else { ?>
                  <a class="questions change_item"
                     href="<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['infos']->value['faqUrl'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faq']->value['link_rewrite_cat'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
/<?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['faq']->value['link_rewrite'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
.html">

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

                      <?php echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'substr' ][ 0 ], array( preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['faq']->value['question']),0,250 )),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');
if (strlen($_smarty_tpl->tpl_vars['faq']->value['question']) > 250) {?> . . .<?php }?>
                  </a>
                <?php }?>
            </li>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>
    </div>
  </div>
<?php }
}
}
