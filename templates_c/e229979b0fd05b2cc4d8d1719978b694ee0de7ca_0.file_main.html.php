<?php
/* Smarty version 5.4.2, created on 2025-03-25 01:41:24
  from 'file:C:\xampp\htdocs\php_04_szablony_smarty\app\../templates/main.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67e1fbb40fca07_88988986',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e229979b0fd05b2cc4d8d1719978b694ee0de7ca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_szablony_smarty\\app\\../templates/main.html',
      1 => 1742863134,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e1fbb40fca07_88988986 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_04_szablony_smarty\\templates';
?><!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Alpha by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/css/main.css" />
	</head>
	<body class="landing is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<nav id="nav">
						<ul>
							<li><a href="#" class="button">Zaloguj się</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<h2>Kalkulator kredytowy</h2>
					<p>Ta strona jest przeznaczona do obliczeń przy użyciu kalkulatora kredytowego</p>
					<ul class="actions special">
						<li><a href="#kalkulator" class="button primary">Przejdź do kalkulatora</a></li>
						<li><a href="#" class="button">Dowiedz się więcej</a></li>
					</ul>
				</section>

			<!-- Main -->
				<section id="main" class="container">

					<section class="box special" id="kalkulator">
						<header class="major">
							<h2>Przedstawiamy kalkulator kredytowy
							<br />
							oblicz swoją ratę!</h2>
							<p>Wpisz kwotę kredytu, ilość lat oraz oprocentowanie</p>
						</header>
						<div class="pure-g">
							<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
								<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/calc.php" method="post">
									<fieldset>
										<label for="kwota">Kwota kredytu</label>
										<input id="kwota" type="text" placeholder="Podaj kwotę" name="kwota" value="<?php echo $_smarty_tpl->getValue('form')['kwota'];?>
">

										<label for="lata">Liczba lat</label>
										<input id="lata" type="text" placeholder="Podaj liczbę lat" name="lata" value="<?php echo $_smarty_tpl->getValue('form')['lata'];?>
">

										<label for="oprocentowanie">Oprocentowanie (%)</label>
										<input id="oprocentowanie" type="text" placeholder="Podaj oprocentowanie" name="oprocentowanie" value="<?php echo $_smarty_tpl->getValue('form')['oprocentowanie'];?>
">
										<button type="submit" class="button special big">Oblicz</button>
									</fieldset>
								</form>
							</div>
							<div class="l-box-lrg pure-u-1 pure-u-med-3-5">
								<?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null)) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?>
									<h4>Wystąpiły błędy:</h4>
									<ol class="err">
									<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach2DoElse = false;
?>
										<li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
									<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
									</ol>
								<?php }?>
								<?php if ((null !== ($_smarty_tpl->getValue('rata') ?? null))) {?>
									<h4>Miesięczna rata kredytu</h4>
									<p class="res"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('rata'),2,',',' ');?>
</p>
								<?php }?>
							</div>
						</div>
					</section>

				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="https://github.com/awakexq" class="icon brands fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon brands fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Wszystkie prawa zastrzeżone</li><li>Stworzył: <a href="https://github.com/awakexq">Oskar Brandt</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
		 
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/js/jquery.dropotron.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/js/browser.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/js/breakpoints.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/js/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/js/main.js"><?php echo '</script'; ?>
>

	</body>
</html>
<?php }
}
