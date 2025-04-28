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
<section id="main" class="container" style="padding-bottom: 250px;">
				<section class="box special" id="lista_wynikow" style="position: relative;">
					<div class="history-box">
    <h3>Ostatnie obliczenia:</h3>
    {if count($history) > 0}
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
                {foreach $history as $h}
                <tr>
                    <td>{$h.kwota} zł</td>
                    <td>{$h.lat}</td>
                    <td>{$h.procent}%</td>
                    <td>{$h.rata|number_format:2} zł</td>
                    <td>{$h.data|date_format:"Y-m-d H:i"}</td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    {else}
        <p>Brak zapisanych wyników</p>
    {/if}
</div>
				</section>
			</section>

<style>
.history-box {
    margin-top: 25px;
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
{/block}