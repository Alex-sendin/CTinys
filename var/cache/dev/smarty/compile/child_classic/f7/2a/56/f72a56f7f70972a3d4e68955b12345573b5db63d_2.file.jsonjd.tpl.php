<?php
/* Smarty version 4.3.4, created on 2025-09-30 15:27:20
  from 'C:\xampp\htdocs\ctinys\modules\faqs\views\templates\front\all_versions\jsonjd.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68dbdab86af1b8_30850918',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f72a56f7f70972a3d4e68955b12345573b5db63d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctinys\\modules\\faqs\\views\\templates\\front\\all_versions\\jsonjd.tpl',
      1 => 1758608428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68dbdab86af1b8_30850918 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if (!empty($_smarty_tpl->tpl_vars['categories']->value) && !empty($_smarty_tpl->tpl_vars['categories']->value[0]['faqs'])) {?>

    <?php $_smarty_tpl->_assignInScope('current_question_index', 0);?>
    <?php $_smarty_tpl->_assignInScope('total_number_of_questions', 0);?>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category', false, 'key');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
        <?php if ((isset($_smarty_tpl->tpl_vars['category']->value['faqs'])) && $_smarty_tpl->tpl_vars['category']->value['faqs']) {?>
            <?php $_smarty_tpl->_assignInScope('total_number_of_questions', $_smarty_tpl->tpl_vars['total_number_of_questions']->value+count($_smarty_tpl->tpl_vars['category']->value['faqs']));?>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php echo '<script'; ?>
 type="application/ld+json">
        {
          "@context"  : "https://schema.org",
          "@type"     : "FAQPage",
          "mainEntity": [
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category', false, 'key');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value['faqs'], 'faq', false, 'k');
$_smarty_tpl->tpl_vars['faq']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['faq']->value) {
$_smarty_tpl->tpl_vars['faq']->do_else = false;
?>
                        <?php $_smarty_tpl->_assignInScope('current_question_index', $_smarty_tpl->tpl_vars['current_question_index']->value+1);?>
                        {
                            "@type": "Question",
                            "name": "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'trim' ][ 0 ], array( preg_replace('!<[^>]*?>!', ' ', (string) str_replace('"','\'',$_smarty_tpl->tpl_vars['faq']->value['question'])) ));?>
",
                            "acceptedAnswer": {
                              "@type": "Answer",
                              "text": "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( str_replace('"','\'',$_smarty_tpl->tpl_vars['faq']->value['answer']) ));?>
"
                            }
                        }<?php if ($_smarty_tpl->tpl_vars['current_question_index']->value < $_smarty_tpl->tpl_vars['total_number_of_questions']->value) {?>,<?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              ]
          }
   <?php echo '</script'; ?>
>
<?php }?>


<?php if (!empty($_smarty_tpl->tpl_vars['questions']->value)) {?>
    <?php $_smarty_tpl->_assignInScope('current_question_index', 0);?>
    <?php $_smarty_tpl->_assignInScope('total_number_of_questions', count($_smarty_tpl->tpl_vars['questions']->value));?>
    <?php echo '<script'; ?>
 type="application/ld+json">
        {
          "@context"  : "https://schema.org",
          "@type"     : "FAQPage",
          "mainEntity": [
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value, 'faq', false, 'k');
$_smarty_tpl->tpl_vars['faq']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['faq']->value) {
$_smarty_tpl->tpl_vars['faq']->do_else = false;
?>
                    <?php $_smarty_tpl->_assignInScope('current_question_index', $_smarty_tpl->tpl_vars['current_question_index']->value+1);?>
                    {
                        "@type": "Question",
                        "name": "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'trim' ][ 0 ], array( preg_replace('!<[^>]*?>!', ' ', (string) str_replace('"','\'',$_smarty_tpl->tpl_vars['faq']->value['question'])) ));?>
",
                        "acceptedAnswer": {
                          "@type": "Answer",
                          "text": "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( str_replace('"','\'',$_smarty_tpl->tpl_vars['faq']->value['answer']) ));?>
"
                        }
                    }<?php if ($_smarty_tpl->tpl_vars['current_question_index']->value < $_smarty_tpl->tpl_vars['total_number_of_questions']->value) {?>,<?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              ]
          }
   <?php echo '</script'; ?>
>
<?php }?>


<?php if (!empty($_smarty_tpl->tpl_vars['question_item']->value)) {?>
    <?php echo '<script'; ?>
 type="application/ld+json">
        {
          "@context"  : "https://schema.org",
          "@type"     : "FAQPage",
          "mainEntity": [
                {
                    "@type": "Question",
                    "name": "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'trim' ][ 0 ], array( preg_replace('!<[^>]*?>!', ' ', (string) str_replace('"','\'',$_smarty_tpl->tpl_vars['question_item']->value['question'])) ));?>
",
                    "acceptedAnswer": {
                      "@type": "Answer",
                      "text": "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( str_replace('"','\'',$_smarty_tpl->tpl_vars['question_item']->value['answer']) ));?>
"
                    }
                }
              ]
          }
   <?php echo '</script'; ?>
>
<?php }?>

<?php }
}
