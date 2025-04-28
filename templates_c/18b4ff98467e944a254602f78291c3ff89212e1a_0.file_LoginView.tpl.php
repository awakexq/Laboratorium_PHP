<?php
/* Smarty version 5.4.2, created on 2025-04-15 07:46:58
  from 'file:LoginView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67fe0ef2e92a52_33707405',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18b4ff98467e944a254602f78291c3ff89212e1a' => 
    array (
      0 => 'LoginView.tpl',
      1 => 1744703050,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_67fe0ef2e92a52_33707405 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/php_07_routing_test/app/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_148910728367fe0ef2e821b0_35167113', 'content');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_148910728367fe0ef2e821b0_35167113 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/php_07_routing_test/app/views';
?>

<section id="main" class="container" style="padding-bottom: 250px;">
	<section class="box special" id="kalkulator">
		<header class="major">
			<h2>Logowanie do kalkulatora</h2>
			<p>Wpisz swój login i hasło, aby się zalogować i uzyskać dostęp do kalkulatora</p>
		</header>
		<div class="pure-g">
			<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
				<form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
login" method="post" class="pure-form pure-form-aligned">
					<fieldset>
						<div class="pure-control-group">
							<label for="id_login">Wpisz login: </label>
							<input id="id_login" type="text" name="login" />
						</div>
						<div class="pure-control-group">
							<label for="id_pass">Wpisz hasło: </label>
							<input id="id_pass" type="password" name="pass" />
						</div>
						<div class="pure-controls">
						<input type="submit" value="Zaloguj się" style="background-color: #28a745; color: white; font-size: 20px; font-weight: bold; padding: 10px 30px; border-radius: 7px; border: none; cursor: pointer;">

						</div>
					</fieldset>
				</form>
			</div>
		</div>
<?php $_smarty_tpl->renderSubTemplate('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
	</section>
</section>


<?php
}
}
/* {/block 'content'} */
}
