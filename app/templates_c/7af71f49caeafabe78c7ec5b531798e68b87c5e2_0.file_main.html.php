<?php
/* Smarty version 5.4.2, created on 2025-03-25 02:12:16
  from 'file:C:\xampp\htdocs\php_04_szablony_smarty\app\../templates/main.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67e202f0503f54_44356203',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7af71f49caeafabe78c7ec5b531798e68b87c5e2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_szablony_smarty\\app\\../templates/main.html',
      1 => 1742865022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e202f0503f54_44356203 (\Smarty\Template $_smarty_tpl) {
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
						<li><a href="#instrukcja" class="button">Dowiedz się więcej</a></li>
					</ul>
				</section>
	<!-- Instrukcja -->
	<section id="main" class="container" style="padding-bottom: 250px;">
		<section class="box special features" id="instrukcja">
			<div class="features-row">
				<section>
					<span class="icon solid major fa-bolt accent2"></span>
					<h3>Kliknij w kalkulator</h3>
					<p>Przejdź do kalkulatora kredytowego, aby obliczyć wysokość raty kredytu. Znajdziesz go poniżej na stronie.</p>
				</section>
				<section>
					<span class="icon solid major fa-chart-area accent3"></span>
					<h3>Wpisz kwotę kredytu</h3>
					<p>Wprowadź kwotę kredytu, jaką chcesz pożyczyć. Pamiętaj, że możesz dostosować tę wartość w zależności od swoich potrzeb finansowych.</p>
				</section>
			</div>
			<div class="features-row">
				<section>
					<span class="icon solid major fa-cloud accent4"></span>
					<h3>Liczba lat</h3>
					<p>Wybierz, na jak długo chcesz zaciągnąć kredyt. Im dłuższy okres, tym niższa rata, ale łącznie zapłacisz więcej odsetek.</p>
				</section>
				<section>
					<span class="icon solid major fa-lock accent5"></span>
					<h3>Oprocentowanie</h3>
					<p>Określ oprocentowanie kredytu. Zwykle jest ono uzależnione od Twojej zdolności kredytowej oraz wybranej oferty banku.</p>
				</section>
			</div>
		</section>
	</section>
			<!-- Kalkulator -->
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
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
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
	


<!-- Kontakt-->
<section id="main" class="container medium" style="padding-bottom: 250px;">
	<header>
		<h2>Skontaktuj się ze mną</h2>
		<p>Możesz napisać co sądzisz o moim kalkulatorze</p>
	</header>
	<div class="box">
		<form method="post" action="#">
			<div class="row gtr-50 gtr-uniform">
				<div class="col-6 col-12-mobilep">
					<input type="text" name="name" id="name" value="" placeholder="Imię" />
				</div>
				<div class="col-6 col-12-mobilep">
					<input type="email" name="email" id="email" value="" placeholder="E-mail" />
				</div>
				<div class="col-12">
					<input type="text" name="subject" id="subject" value="" placeholder="Temat" />
				</div>
				<div class="col-12">
					<textarea name="message" id="message" placeholder="Wpisz swoją wiadomość" rows="6"></textarea>
				</div>
				<div class="col-12">
					<ul class="actions special">
						<li><input type="submit" class="button special big" value="Wyślij wiadomość" /></li>
					</ul>
				</div>
			</div>
		</form>
	</div>
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
