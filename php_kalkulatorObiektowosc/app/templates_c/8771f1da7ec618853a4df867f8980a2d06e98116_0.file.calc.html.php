<?php
/* Smarty version 4.5.5, created on 2025-03-31 14:48:06
  from 'F:\XAMPP\htdocs\php_kalkulatorObiektowosc\templates\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_67ea8f0620e866_04455508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8771f1da7ec618853a4df867f8980a2d06e98116' => 
    array (
      0 => 'F:\\XAMPP\\htdocs\\php_kalkulatorObiektowosc\\templates\\calc.html',
      1 => 1743424258,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67ea8f0620e866_04455508 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_156992061567ea8f061fb8e6_26325996', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_156992061567ea8f061fb8e6_26325996 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_156992061567ea8f061fb8e6_26325996',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'F:\\XAMPP\\htdocs\\php_kalkulatorObiektowosc\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<section class="content">
    <h2 class="content-head is-center">Kalkulator</h2>
    <div class="box">
        <form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php" method="post">
            <label for="x">Liczba 1:</label>
            <input id="x" type="text" name="x" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->x;?>
" placeholder="Podaj liczbę">

            <label for="op">Operacja:</label>
            <select name="op">
                <?php if ((isset($_smarty_tpl->tpl_vars['res']->value->op_name))) {?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['form']->value->op;?>
"><?php echo $_smarty_tpl->tpl_vars['res']->value->op_name;?>
</option>
                    <option value="" disabled>---</option>
                <?php }?>
                <option value="plus">+</option>
                <option value="minus">-</option>
                <option value="times">*</option>
                <option value="div">/</option>
            </select>

            <label for="y">Liczba 2:</label>
            <input id="y" type="text" name="y" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->y;?>
" placeholder="Podaj liczbę">
            
            <h3>Kalkulator kredytowy</h3>

            <label for="loan_amount">Kwota kredytu:</label>
            <input id="loan_amount" type="text" name="loan_amount" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->loan_amount;?>
" placeholder="Podaj kwotę">

            <label for="years">Ilość lat:</label>
            <input id="years" type="text" name="years" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->years;?>
" placeholder="Podaj ilość lat">

            <label for="interest_rate">Oprocentowanie (% roczne):</label>
            <input id="interest_rate" type="text" name="interest_rate" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->interest_rate;?>
" placeholder="Podaj oprocentowanie">

            <button type="submit" class="button big">Oblicz</button>
        </form>
    </div>
	
	<?php if ((isset($_smarty_tpl->tpl_vars['errors']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['errors']->value) > 0) {?>
		<div class="box error">
			<h4>Błędy:</h4>
			<ul>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
					<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ul>
		</div>
	<?php }?>


    <?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
        <div class="box success">
            <h4>Wynik operacji:</h4>
            <p><?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>
</p>
        </div>
    <?php }?>

    <?php if ((isset($_smarty_tpl->tpl_vars['res']->value->monthlyPayment))) {?>
        <div class="box success">
            <h4>Miesięczna rata kredytu:</h4>
            <p><?php echo $_smarty_tpl->tpl_vars['res']->value->monthlyPayment;?>
 PLN</p>
        </div>
    <?php }?>
</section>
<?php
}
}
/* {/block 'content'} */
}
