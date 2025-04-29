{extends file="main.tpl"}

{block name=content}

<form action="{$conf->action_root}login" method="post" class="pure-form pure-form-aligned bottom-margin">
    <fieldset>
        <div class="pure-control-group">
            <label for="login">Login</label>
            <input id="login" type="text" placeholder="Login" name="login" value="{$form->login}"/>
        </div>
        <div class="pure-control-group">
            <label for="pass">Password</label>
            <input id="pass" type="password" placeholder="Password" name="pass" value="{$form->password}"/>
        </div>
        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary">Login</button>
        </div>
    </fieldset>
</form>

{/block}
