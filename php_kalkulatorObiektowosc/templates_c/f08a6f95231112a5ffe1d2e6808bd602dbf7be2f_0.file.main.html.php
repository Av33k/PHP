<?php
/* Smarty version 4.5.5, created on 2025-03-31 14:47:25
  from 'F:\XAMPP\htdocs\php_kalkulatorObiektowosc\templates\main.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67ea8edd84bfd7_32575592',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f08a6f95231112a5ffe1d2e6808bd602dbf7be2f' => 
    array (
      0 => 'F:\\XAMPP\\htdocs\\php_kalkulatorObiektowosc\\templates\\main.html',
      1 => 1743424923,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67ea8edd84bfd7_32575592 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_56245444867ea8edd84b2e5_46187335', 'content');
?>

            </section>
        </div>

        <footer id="footer">
            <p><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15020086967ea8edd84ba26_99913472', 'footer');
?>
</p>
        </footer>
    </div>

</body>
</html>
<?php }
/* {block 'content'} */
class Block_56245444867ea8edd84b2e5_46187335 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_56245444867ea8edd84b2e5_46187335',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_15020086967ea8edd84ba26_99913472 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_15020086967ea8edd84ba26_99913472',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
}
