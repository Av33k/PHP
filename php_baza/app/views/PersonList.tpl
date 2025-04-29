{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}listPersons">
    <legend>Search options</legend>
    <fieldset>
        <input type="text" placeholder="surname" name="sf_surname" value="{$searchForm->surname}" /><br />
        <button type="submit" class="pure-button pure-button-primary">Filter</button>
    </fieldset>
</form>
</div>

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}addPerson">+ New person</a>
</div>

<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Date of birth</th>
        <th>Options</th>
    </tr>
</thead>
<tbody>
{foreach $people as $p}
{strip}
    <tr>
        <td>{$p["name"]}</td>
        <td>{$p["surname"]}</td>
        <td>{$p["birthdate"]}</td>
        <td>
            <a class="button-small pure-button button-secondary" href="{$conf->action_url}editPerson&id={$p['idperson']}">Edit</a>
            &nbsp;
            <a class="button-small pure-button button-warning" href="{$conf->action_url}removePerson&id={$p['idperson']}">Delete</a>
        </td>
    </tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
