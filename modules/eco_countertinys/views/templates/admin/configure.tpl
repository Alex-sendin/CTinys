<div class="panel">
    <h3><i class="icon icon-cogs"></i> {l s='Configuración del Contador' mod='eco_countertinys'}</h3>
    <p>{l s='Ingresa la fecha y hora de inicio para el contador incremental.' mod='eco_countertinys'}</p>

    <form action="{$current_url|escape:'htmlall':'UTF-8'}" method="post">
        <div class="form-group">
            <label for="eco_counter_start_date" class="control-label col-lg-3">
                <span class="label-tooltip" data-toggle="tooltip" title="{l s='Formato: YYYY-MM-DD HH:MM:SS' mod='eco_countertinys'}">
                    {l s='Fecha y Hora de Inicio' mod='eco_countertinys'}
                </span>
            </label>
            <div class="col-lg-9">
                <input type="text" name="eco_counter_start_date" id="eco_counter_start_date" value="{$startDate|escape:'htmlall':'UTF-8'}" placeholder="{l s='YYYY-MM-DD HH:MM:SS' mod='eco_countertinys'}" />
                <p class="help-block">{l s='Ejemplo: 2023-10-27 15:30:00' mod='eco_countertinys'}</p>
            </div>
        </div>

        <div class="panel-footer">
            <button type="submit" value="1" name="submitEcoCounter" class="btn btn-default pull-right">
                <i class="process-icon-save"></i> {l s='Guardar' mod='eco_countertinys'}
            </button>
        </div>
    </form>
</div>