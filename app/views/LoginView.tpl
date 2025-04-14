{extends file="main.tpl"}

{block name=content}
<section id="main" class="container" style="padding-bottom: 250px;">
	<section class="box special" id="kalkulator">
		<header class="major">
			<h2>Logowanie do kalkulatora</h2>
			<p>Wpisz swój login i hasło, aby się zalogować i uzyskać dostęp do kalkulatora</p>
		</header>
		<div class="pure-g">
			<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
				<form action="{$conf->action_url}login" method="post" class="pure-form pure-form-aligned">
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
{include file='messages.tpl'}
	</section>
</section>


{/block}
