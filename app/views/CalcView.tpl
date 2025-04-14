{extends file="main.tpl"}

{block name=content}
<section id="main" class="container" style="padding-bottom: 250px;">
	<section class="box special" id="kalkulator" style="position: relative;">
		<header class="major">
			<h2>Przedstawiamy kalkulator kredytowy
			<br />
			oblicz swoją ratę!</h2>
			<p>Wpisz kwotę kredytu, ilość lat oraz oprocentowanie</p>
		</header>

		<!-- Dodanie "Wyloguj" i informacji o użytkowniku w prawym górnym rogu kalkulatora -->
		<div style="position: absolute; top: 20px; right: 20px; text-align: right;">
			<a href="{$conf->action_url}logout" class="pure-menu-heading pure-menu-link" style="text-decoration: none; font-size: 22px; font-weight: bold; color: red;">Wyloguj</a>
			<div style="color: #555; font-size: 17px; margin-top: 5px; font-weight: bold;">
				Użytkownik: {$user->login} <br>
				Rola: {$user->role}
			</div>
		</div>

		<div class="pure-g">
			<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
				<form class="pure-form pure-form-stacked" action="{$conf->action_url}calcCompute" method="post">
					<fieldset>
						<label for="kwota">Kwota kredytu</label>
						<input id="kwota" type="text" placeholder="Podaj kwotę" name="kwota" value="{$form->kwota}">

						<label for="lata">Liczba lat</label>
						<input id="lata" type="text" placeholder="Podaj liczbę lat" name="lata" value="{$form->lata}">

						<label for="oprocentowanie">Oprocentowanie (%)</label>
						<input id="oprocentowanie" type="text" placeholder="Podaj oprocentowanie" name="oprocentowanie" value="{$form->oprocentowanie}">

						<button type="submit" class="button special big">Oblicz</button>
					</fieldset>
				</form>
			</div>

			<div class="l-box-lrg pure-u-1 pure-u-med-3-5">
				{if $msgs->isError()}
					<h4>Wystąpiły błędy: </h4>
					<ol class="err">
						{foreach $msgs->getErrors() as $err}
							{strip}
								<li>{$err}</li>
							{/strip}
						{/foreach}
					</ol>
				{/if}
				
				{if $msgs->isInfo()}
					<h4>Informacje: </h4>
					<ol class="inf">
						{foreach $msgs->getInfos() as $inf}
							{strip}
								<li>{$inf}</li>
							{/strip}
						{/foreach}
					</ol>
				{/if}
				
				{if isset($res->result)}
					<h4>Rata wynosi:</h4>
					<p class="res">Rata: {$res->result|number_format:2:'.':' '}</p>
				{/if}
			</div>
		</div>
	</section>
</section>

{/block}
