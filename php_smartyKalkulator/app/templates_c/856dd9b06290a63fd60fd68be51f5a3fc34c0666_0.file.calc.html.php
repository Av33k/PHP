<?php
/* Smarty version 4.5.5, created on 2025-03-24 16:01:34
  from 'F:\XAMPP\htdocs\php_smartyKalkulator\templates\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67e173ce075b15_81684790',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '856dd9b06290a63fd60fd68be51f5a3fc34c0666' => 
    array (
      0 => 'F:\\XAMPP\\htdocs\\php_smartyKalkulator\\templates\\calc.html',
      1 => 1742828454,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67e173ce075b15_81684790 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_114750692767e173ce06b707_78290760', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_114750692767e173ce06b707_78290760 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_114750692767e173ce06b707_78290760',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'F:\\XAMPP\\htdocs\\php_smartyKalkulator\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<section class="content">
    <h2 class="content-head is-center">Kalkulator</h2>
    <div class="box">
        <form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php" method="post">
            <label for="x">Liczba 1:</label>
            <input id="x" type="text" name="x" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['x'];?>
" placeholder="Podaj liczbę">

            <label for="op">Operacja:</label>
            <select name="op">
                <?php if ((isset($_smarty_tpl->tpl_vars['form']->value['op_name']))) {?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['form']->value['op'];?>
"><?php echo $_smarty_tpl->tpl_vars['form']->value['op_name'];?>
</option>
                    <option value="" disabled>---</option>
                <?php }?>
                <option value="plus">+</option>
                <option value="minus">-</option>
                <option value="times">*</option>
                <option value="div">/</option>
            </select>

            <label for="y">Liczba 2:</label>
            <input id="y" type="text" name="y" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['y'];?>
" placeholder="Podaj liczbę">
            
            <label for="loan_amount">Kwota kredytu:</label>
            <input id="loan_amount" type="text" name="loan_amount" placeholder="Podaj kwotę">

            <label for="loan_years">Ilość lat:</label>
            <input id="loan_years" type="text" name="loan_years" placeholder="Podaj ilość lat">

            <label for="interest_rate">Oprocentowanie (% roczne):</label>
            <input id="interest_rate" type="text" name="interest_rate" placeholder="Podaj oprocentowanie">

            <button type="submit" class="button big">Oblicz</button>
        </form>
    </div>

    <?php if ((isset($_smarty_tpl->tpl_vars['messages']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?>
 
    <?php }?>

    <?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
        <div class="box success">
            <h4>Wynik:</h4>
            <p><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
</p>
        </div>
    <?php }?>
</section>
<?php
}
}
/* {/block 'content'} */
}
