<?php
/* Smarty version 5.4.2, created on 2025-04-07 01:17:17
  from 'file:CalcView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67f30b7d749c66_14133106',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '012d5c6bff12b8edf3512f15b44d1578c63fd5b1' => 
    array (
      0 => 'CalcView.tpl',
      1 => 1743981001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67f30b7d749c66_14133106 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_06_namespaces\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_165560295667f30b7d677ec1_75777570', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_165560295667f30b7d677ec1_75777570 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_06_namespaces\\app\\views';
?>

<section id="main" class="container" style="padding-bottom: 250px;">
	<section class="box special" id="kalkulator">
		<header class="major">
			<h2>Przedstawiamy kalkulator kredytowy
			<br />
			oblicz swoją ratę!</h2>
			<p>Wpisz kwotę kredytu, ilość lat oraz oprocentowanie</p>
		</header>
		<div class="pure-g">
			<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
				<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
calcCompute" method="post">
					<fieldset>
						<label for="kwota">Kwota kredytu</label>
						<input id="kwota" type="text" placeholder="Podaj kwotę" name="kwota" value="<?php echo $_smarty_tpl->getValue('form')->kwota;?>
">

						<label for="lata">Liczba lat</label>
						<input id="lata" type="text" placeholder="Podaj liczbę lat" name="lata" value="<?php echo $_smarty_tpl->getValue('form')->lata;?>
">
						<label for="oprocentowanie">Oprocentowanie (%)</label>
						<input id="oprocentowanie" type="text" placeholder="Podaj oprocentowanie" name="oprocentowanie" value="<?php echo $_smarty_tpl->getValue('form')->oprocentowanie;?>
">
						<button type="submit" class="button special big">Oblicz</button>
					</fieldset>
				</form>
			</div>
			<div class="l-box-lrg pure-u-1 pure-u-med-3-5">
									<?php if ($_smarty_tpl->getValue('msgs')->isError()) {?>
						<h4>Wystąpiły błędy: </h4>
						<ol class="err">
						<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getErrors(), 'err');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('err')->value) {
$foreach0DoElse = false;
?>
						<li><?php echo $_smarty_tpl->getValue('err');?>
</li>
						<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
						</ol>
						<?php }?>
												<?php if ($_smarty_tpl->getValue('msgs')->isInfo()) {?>
							<h4>Informacje: </h4>
							<ol class="inf">
							<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getInfos(), 'inf');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('inf')->value) {
$foreach1DoElse = false;
?>
							<li><?php echo $_smarty_tpl->getValue('inf');?>
</li>
							<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
							</ol>
						<?php }?>
						
						<?php if ((null !== ($_smarty_tpl->getValue('res')->result ?? null))) {?>
							<h4>Rata wynosi:</h4>
							<p class="res">Rata: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('res')->result,2,'.',' ');?>
</p>
						<?php }?>
			</div>
		</div>
	</section>
</section>
<?php
}
}
/* {/block 'content'} */
}
