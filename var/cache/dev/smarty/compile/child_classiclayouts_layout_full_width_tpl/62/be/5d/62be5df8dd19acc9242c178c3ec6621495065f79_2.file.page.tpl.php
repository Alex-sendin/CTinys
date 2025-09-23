<?php
/* Smarty version 4.3.4, created on 2025-09-23 09:24:38
  from 'C:\xampp\htdocs\ctinys\themes\classic\templates\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68d24b365e84e1_52319113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62be5df8dd19acc9242c178c3ec6621495065f79' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctinys\\themes\\classic\\templates\\page.tpl',
      1 => 1758608447,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68d24b365e84e1_52319113 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_193054500568d24b365dea17_72656705', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_167447151768d24b365e01d3_57311499 extends Smarty_Internal_Block
{
public $callsChild = 'true';
public $hide = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <header class="page-header">
          <h1><?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
</h1>
        </header>
      <?php
}
}
/* {/block 'page_title'} */
/* {block 'page_header_container'} */
class Block_78308979168d24b365df4f9_44929192 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_167447151768d24b365e01d3_57311499', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_198020822968d24b365e3a50_89255510 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_157191271368d24b365e48e8_43050842 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_188435488768d24b365e3072_48853088 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <div id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_198020822968d24b365e3a50_89255510', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_157191271368d24b365e48e8_43050842', 'page_content', $this->tplIndex);
?>

      </div>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_111554079068d24b365e69e4_81720270 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_20652308468d24b365e6057_05588537 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_111554079068d24b365e69e4_81720270', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_193054500568d24b365dea17_72656705 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_193054500568d24b365dea17_72656705',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_78308979168d24b365df4f9_44929192',
  ),
  'page_title' => 
  array (
    0 => 'Block_167447151768d24b365e01d3_57311499',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_188435488768d24b365e3072_48853088',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_198020822968d24b365e3a50_89255510',
  ),
  'page_content' => 
  array (
    0 => 'Block_157191271368d24b365e48e8_43050842',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_20652308468d24b365e6057_05588537',
  ),
  'page_footer' => 
  array (
    0 => 'Block_111554079068d24b365e69e4_81720270',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_78308979168d24b365df4f9_44929192', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_188435488768d24b365e3072_48853088', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20652308468d24b365e6057_05588537', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
