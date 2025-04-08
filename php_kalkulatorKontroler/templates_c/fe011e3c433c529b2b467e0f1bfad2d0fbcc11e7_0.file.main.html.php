<?php
/* Smarty version 4.5.5, created on 2025-03-31 14:46:26
  from 'F:\XAMPP\htdocs\php_smartyKalkulator2\templates\main.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67ea8ea2a2a3e0_10438128',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe011e3c433c529b2b467e0f1bfad2d0fbcc11e7' => 
    array (
      0 => 'F:\\XAMPP\\htdocs\\php_smartyKalkulator2\\templates\\main.html',
      1 => 1743424923,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67ea8ea2a2a3e0_10438128 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Kalkulatory" ?? null : $tmp);?>
</title>

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/noscript.css">

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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_62982399467ea8ea2a296a4_88582492', 'content');
?>

            </section>
        </div>

        <footer id="footer">
            <p><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_112050207967ea8ea2a29e04_11773502', 'footer');
?>
</p>
        </footer>
    </div>

</body>
</html>
<?php }
/* {block 'content'} */
class Block_62982399467ea8ea2a296a4_88582492 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_62982399467ea8ea2a296a4_88582492',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_112050207967ea8ea2a29e04_11773502 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_112050207967ea8ea2a29e04_11773502',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
}
