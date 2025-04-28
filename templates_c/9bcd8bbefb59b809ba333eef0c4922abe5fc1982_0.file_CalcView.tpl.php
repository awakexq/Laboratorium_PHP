<?php
/* Smarty version 5.4.2, created on 2025-04-28 21:45:32
  from 'file:CalcView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_680ff6fcea07d8_50818855',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9bcd8bbefb59b809ba333eef0c4922abe5fc1982' => 
    array (
      0 => 'CalcView.tpl',
      1 => 1745876245,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_680ff6fcea07d8_50818855 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/php_08_bd/app/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1313522109680ff6fce825f1_08890890', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1313522109680ff6fce825f1_08890890 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/php_08_bd/app/views';
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
<section id="main" class="container" style="padding-bottom: 250px;">
				<section class="box special" id="lista_wynikow" style="position: relative;">
					<div class="history-box">
    <h3>Ostatnie obliczenia:</h3>
    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('history')) > 0) {?>
        <table class="pure-table">
            <thead>
                <tr>
                    <th>Kwota</th>
                    <th>Lata</th>
                    <th>Oprocentowanie</th>
                    <th>Rata</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('history'), 'h');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('h')->value) {
$foreach2DoElse = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getValue('h')['kwota'];?>
 zł</td>
                    <td><?php echo $_smarty_tpl->getValue('h')['lat'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('h')['procent'];?>
%</td>
                    <td><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('h')['rata'],2);?>
 zł</td>
                    <td><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('h')['data'],"Y-m-d H:i");?>
</td>
                </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>Brak zapisanych wyników</p>
    <?php }?>
</div>
				</section>
			</section>

<style>
.history-box {
    margin-top: 30px;
    padding: 15px;
    background: #f5f5f5;
    border-radius: 5px;
}
.history-box table {
    width: 100%;
}
.result {
    margin: 20px 0;
    padding: 10px;
    background: #e6f7ff;
    border-radius: 5px;
}
</style>
<?php
}
}
/* {/block 'content'} */
}
