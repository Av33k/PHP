<?php
/* Smarty version 4.5.5, created on 2025-03-24 15:51:57
  from 'F:\XAMPP\htdocs\php_smartyKalkulator\templates\main.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67e1718db3b4d5_21864564',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa70138f38adb4ea25302c3175d177c694f8dfa2' => 
    array (
      0 => 'F:\\XAMPP\\htdocs\\php_smartyKalkulator\\templates\\main.html',
      1 => 1742827916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67e1718db3b4d5_21864564 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>
">
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Kalkulator" ?? null : $tmp);?>
</title>

    <!-- Style -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/noscript.css">
    
    <!-- Skrypty -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/main.js"><?php echo '</script'; ?>
>
</head>
<body class="is-preload">

    <div id="wrapper">
        <header id="header">
            <h1><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</h1>
            <p><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>
</p>
        </header>

        <div id="main" class="content-wrapper">
            <section id="content">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_137622947567e1718db3a690_13028662', 'content');
?>

            </section>
        </div>

        <footer id="footer">
            <p><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8402921967e1718db3af04_13056621', 'footer');
?>
</p>
        </footer>
    </div>

</body>
</html>
<?php }
/* {block 'content'} */
class Block_137622947567e1718db3a690_13028662 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_137622947567e1718db3a690_13028662',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_8402921967e1718db3af04_13056621 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_8402921967e1718db3af04_13056621',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść stopki... <?php
}
}
/* {/block 'footer'} */
}
