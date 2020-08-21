{if empty($hookContent)}
    {include file="CRM/Mdash/Page/MdashboardDashlet.tpl"}
{else}
    {if $hookContentPlacement != 2 && $hookContentPlacement != 3}
        {include file="CRM/Mdash/Page/MdashboardDashlet.tpl"}
    {/if}

    {foreach from=$hookContent key=title item=content}
    <fieldset><legend>{$title}</legend>
        {$content}
    </fieldset>
    {/foreach}

    {if $hookContentPlacement == 2}
        {include file="CRM/Mdash/Page/MdashboardDashlet.tpl"}
    {/if}
{/if}
