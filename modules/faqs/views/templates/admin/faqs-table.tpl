
<div class="list_faqs faqs_list">
    <table class="table faqs">
        <thead>
            <tr class="column-headers">
                <th class="table_checkbox">--</th>
                <th class="table_id">{l s='ID' mod='faqs'}</th>
                <th class="table_name">{l s='Name' mod='faqs'}</th>
            </tr>
        </thead>
        <tbody>
            {if $faqs}
                {foreach $faqs as $faq}
                    <tr>
                        <td class="table_checkbox">
                            <input {if $selected && in_array($faq['id_gomakoil_faq'], $selected)}checked{/if} id="faq_{$faq['id_gomakoil_faq']}" type="checkbox" name="cart_faqs[]" value="{$faq['id_gomakoil_faq']}">
                        </td>
                        <td class="table_id">
                            <label for="faq_{$faq['id_gomakoil_faq']}" >{$faq['id_gomakoil_faq']}</label>
                        </td>
                        <td class="table_name">
                            <label for="faq_{$faq['id_gomakoil_faq']}" >{$faq['question']}</label>
                        </td>
                    </tr>
                {/foreach}
            {else}
                <tr>
                    <td colspan="3"><span class="table_empty">{l s='No data' mod='faqs'}</span></td>
                </tr>
            {/if}
        </tbody>
    </table>
</div>