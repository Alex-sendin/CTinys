<?php
/* Smarty version 4.3.4, created on 2025-09-30 15:27:53
  from 'C:\xampp\htdocs\ctinys\themes\classic\templates\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68dbdad9e73796_73209549',
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
function content_68dbdad9e73796_73209549 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_174411551668dbdad9e6bfe4_26530760', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_96253343068dbdad9e6d171_06968824 extends Smarty_Internal_Block
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
class Block_87540412268dbdad9e6c7b7_71824331 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_96253343068dbdad9e6d171_06968824', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_26501408768dbdad9e6fef1_30382986 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_15933653268dbdad9e70a69_70499833 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_96285404368dbdad9e6f6e3_29586209 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <div id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_26501408768dbdad9e6fef1_30382986', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15933653268dbdad9e70a69_70499833', 'page_content', $this->tplIndex);
?>

      </div>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_4532586068dbdad9e72318_31172060 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_83198707668dbdad9e71bc2_33624745 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4532586068dbdad9e72318_31172060', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_174411551668dbdad9e6bfe4_26530760 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_174411551668dbdad9e6bfe4_26530760',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_87540412268dbdad9e6c7b7_71824331',
  ),
  'page_title' => 
  array (
    0 => 'Block_96253343068dbdad9e6d171_06968824',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_96285404368dbdad9e6f6e3_29586209',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_26501408768dbdad9e6fef1_30382986',
  ),
  'page_content' => 
  array (
    0 => 'Block_15933653268dbdad9e70a69_70499833',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_83198707668dbdad9e71bc2_33624745',
  ),
  'page_footer' => 
  array (
    0 => 'Block_4532586068dbdad9e72318_31172060',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_87540412268dbdad9e6c7b7_71824331', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_96285404368dbdad9e6f6e3_29586209', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_83198707668dbdad9e71bc2_33624745', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
