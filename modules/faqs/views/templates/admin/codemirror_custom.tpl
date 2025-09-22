/*init*/

{if isset($css_code) && $css_code}
    {$css_code|escape:'htmlall'|unescape}
{/if}