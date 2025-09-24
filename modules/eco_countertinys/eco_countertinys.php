<?php

if(!defined('_PS_VERSION_'))
    {
        exit;
    }

class Eco_countertinys extends Module
{
    public function __construct()
    {
        $this->name = 'eco_countertinys';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Ecoitec';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Gold Dragon Counter');
        $this->description = $this->l('A counter that measures the time without finding the golden dragon');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        return parent::install() 
        && $this->registerHook('displayHome')
        && $this->registerHook('displayHeader');
    }
    public function uninstall()
    {
        return parent::uninstall();
    }
    public function getContent()
    {
        $output = null;

        if (Tools::isSubmit('submitEcoCounter')) {
            $startDate = Tools::getValue('eco_counter_start_date');

            if (!$startDate || empty($startDate)) {
                $output .= $this->displayError($this->l('La fecha de inicio es requerida.'));
            } else {
                // Guarda la fecha en la base de datos de PrestaShop
                Configuration::updateValue('ECO_COUNTER_START_DATE', $startDate);
                $output .= $this->displayConfirmation($this->l('La configuración ha sido guardada.'));
            }
        }
        
        // Asigna la fecha actual para el formulario
        $startDate = Configuration::get('ECO_COUNTER_START_DATE');
        $this->context->smarty->assign('startDate', $startDate);
        
        // Muestra el formulario
        return $output . $this->display(__FILE__, 'views/templates/admin/configure.tpl');
    }
    
    public function hookDisplayHome()
    {
        // Lógica para pasar la fecha a la plantilla
        $startDate = Configuration::get('ECO_COUNTER_START_DATE');
        $this->context->smarty->assign('startDate', $startDate);
        
        return $this->display(__FILE__, 'views/templates/front/counter.tpl');
    }
    public function hookDisplayHeader()
    {
        $this->context->controller->addCSS($this->_path.'views/css/counter.css', 'all');
    }
}