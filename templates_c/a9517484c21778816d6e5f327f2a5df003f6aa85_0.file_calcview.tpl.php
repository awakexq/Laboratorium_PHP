<?php
/* Smarty version 5.4.2, created on 2025-04-28 21:10:34
  from 'file:calcview.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_680feecabfc178_46842910',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9517484c21778816d6e5f327f2a5df003f6aa85' => 
    array (
      0 => 'calcview.tpl',
      1 => 1745874198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:ResultList.tpl' => 1,
  ),
))) {
function content_680feecabfc178_46842910 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/php_07_routing_test/app/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1474894552680feecabd8b78_95658403', 'content');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_297409158680feecabf9be9_41631105', 'lista_wynikow');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1474894552680feecabd8b78_95658403 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/php_07_routing_test/app/views';
?>

<section id="main" class="container" style="padding-bottom: 250px;">
	<section class="box special" id="kalkulator" style="position: relative;">
		<header class="major">
			<h2>Przedstawiamy kalkulator kredytowy
			<br />
			oblicz swoją ratę!</h2>
			<p>Wpisz kwotę kredytu, ilość lat oraz oprocentowanie</p>
		</header>

		<div style="position: absolute; top: 20px; right: 20px; text-align: right;">
			<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
logout" class="pure-menu-heading pure-menu-link" style="text-decoration: none; font-size: 22px; font-weight: bold; color: red;">Wyloguj</a>
			<div style="color: #555; font-size: 17px; margin-top: 5px; font-weight: bold;">
				Użytkownik: <?php echo $_smarty_tpl->getValue('user')->login;?>
 <br>
				Rola: <?php echo $_smarty_tpl->getValue('user')->role;?>

			</div>
		</div>

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
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('err')->value) {
$foreach1DoElse = false;
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
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('inf')->value) {
$foreach2DoElse = false;
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
/* {block 'lista_wynikow'} */
class Block_297409158680feecabf9be9_41631105 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/php_07_routing_test/app/views';
?>

    <?php $_smarty_tpl->renderSubTemplate('file:ResultList.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block 'lista_wynikow'} */
}
