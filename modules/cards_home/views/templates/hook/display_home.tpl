{if !empty($mi_modulo_imagenes)}
<h2 class="card-container-title" style="display: flex; justify-content: center; width: 100%;">Tinys coleccionables</h2>
<div class="card-container">
    {foreach from=$mi_modulo_imagenes item=item}
        <div class="card-content">
            <img src="{$item.url}" alt="{$item.desc|escape:'html':'UTF-8'}" />
            <p>{$item.desc|escape:'html':'UTF-8'}</p>
        </div>
    {/foreach}
</div>
{/if}