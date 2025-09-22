
<div class="list_categories_faq faqs_list">
    <table class="table list_categories_faq">
        <thead>
        <tr class="column-headers">
            <th class="table_checkbox">--</th>
            <th class="table_id">{l s='ID' mod='faqs'}</th>
            <th class="table_name">{l s='Name' mod='faqs'}</th>
        </tr>
        </thead>
        <tbody>

        {if $categories}
            {foreach $categories as $category}
                <tr>
                    <td class="table_checkbox">
                        <input {if $selected && in_array($category['id_gomakoil_faq_category'], $selected)}checked{/if} id="category_{$category['id_gomakoil_faq_category']}" type="checkbox" name="cart_faq_categories[]" value="{$category['id_gomakoil_faq_category']}">
                    </td>
                    <td class="table_id">
                        <label for="category_{$category['id_gomakoil_faq_category']}" >{$category['id_gomakoil_faq_category']}</label>
                    </td>
                    <td class="table_name">
                        <label for="category_{$category['id_gomakoil_faq_category']}" >{$category['name']}</label>
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