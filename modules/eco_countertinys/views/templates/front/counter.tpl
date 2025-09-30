<div class="eco-counter-container">
    <picture class="eco-counter-logo-container">
        <source srcset="{$module_dir}views/img/background-golden-dragon-logo.webp" type="image/webp">
        <img src="{$module_dir}views/img/background-golden-dragon-logo.webp" alt="{l s='Eco Counter Tinys' mod='eco_countertinys'}" class="eco-counter-logo">
    </picture>
    <picture class="eco-counter-text-container">
        <source srcset="{$module_dir}views/img/background-golden-dragon-text.webp" type="image/webp">
        <img src="{$module_dir}views/img/background-golden-dragon-text.webp" alt="{l s='Eco Counter Tinys' mod='eco_countertinys'}" class="eco-counter-text">
    </picture>
    <div id="eco-counter-display" class="eco-counter-display">
        <div class="eco-counter-unit">
            <span id="eco-counter-months" class="eco-counter-value">0</span>
            <span class="eco-counter-label">{l s='Meses' mod='eco_countertinys'}</span>
        </div>
        <div class="eco-counter-unit">
            <span id="eco-counter-days" class="eco-counter-value">0</span>
            <span class="eco-counter-label">{l s='Días' mod='eco_countertinys'}</span>
        </div>
        <div class="eco-counter-unit">
            <span id="eco-counter-hours" class="eco-counter-value">0</span>
            <span class="eco-counter-label">{l s='Horas' mod='eco_countertinys'}</span>
        </div>
        <div class="eco-counter-unit">
            <span id="eco-counter-minutes" class="eco-counter-value">0</span>
            <span class="eco-counter-label">{l s='Minutos' mod='eco_countertinys'}</span>
        </div>
        <div class="eco-counter-unit">
            <span id="eco-counter-seconds" class="eco-counter-value">0</span>
            <span class="eco-counter-label">{l s='Segundos' mod='eco_countertinys'}</span>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var startDate = "{$startDate|escape:'javascript':'UTF-8'}";
        
        if (startDate) {
            var startTimestamp = new Date(startDate.replace(/-/g, '/')).getTime();
            
            setInterval(function() {
                var now = new Date().getTime();
                var difference = now - startTimestamp;
                
                if (difference > 0) {
                    var seconds = Math.floor(difference / 1000);
                    var minutes = Math.floor(seconds / 60);
                    var hours = Math.floor(minutes / 60);
                    var days = Math.floor(hours / 24);
                    var years = Math.floor(days / 365.25);
                    
                    var remainingDays = days % 365.25;
                    
                    var months = years * 12 + Math.floor(remainingDays / 30.4375);
                    var days = Math.floor(remainingDays % 30.4375);
                    
                    hours = hours % 24;
                    minutes = minutes % 60;
                    seconds = seconds % 60;
                    
                    document.getElementById('eco-counter-months').innerHTML = months;
                    document.getElementById('eco-counter-days').innerHTML = days;
                    document.getElementById('eco-counter-hours').innerHTML = hours;
                    document.getElementById('eco-counter-minutes').innerHTML = minutes;
                    document.getElementById('eco-counter-seconds').innerHTML = seconds;
                }
            }, 1000);
        }
    });
</script>