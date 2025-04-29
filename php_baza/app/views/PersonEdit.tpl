{extends file="main.tpl"}

{block name=content}

<h2>Edit person</h2>

<form action="{$conf->action_root}savePerson" method="post" class="pure-form pure-form-aligned bottom-margin">
    <fieldset>
        <div class="pure-control-group">
            <label for="idperson">ID</label>
            <input id="idperson" type="text" placeholder="ID" name="idperson" value="{$form->id}" readonly/>
        </div>
        <div class="pure-control-group">
            <label for="name">First name</label>
            <input id="name" type="text" placeholder="First name" name="name" value="{$form->name}"/>
        </div>
        <div class="pure-control-group">
            <label for="surname">Last name</label>
            <input id="surname" type="text" placeholder="Last name" name="surname" value="{$form->surname}"/>
        </div>
        <div class="pure-control-group">
            <label for="birthdate">Date of birth</label>
            <input id="birthdate" type="text" placeholder="YYYY-MM-DD" name="birthdate" value="{$form->birthdate}"/>
        </div>
        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary">Save</button>
            <a class="pure-button button-secondary" href="{$conf->action_root}listPersons">Return</a>
        </div>
    </fieldset>
</form>

{/block}
