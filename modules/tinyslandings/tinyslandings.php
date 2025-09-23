<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class TinysLandings extends Module
{
    public function __construct()
    {
        $this->name = 'tinyslandings';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Tu Nombre';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Tinys Landings');
        $this->description = $this->l('Módulo para crear páginas de aterrizaje personalizadas con contenido dinámico.');

        $this->ps_versions_compliancy = ['min' => '1.7', 'max' => _PS_VERSION_];
    }

    public function install()
    {
        return parent::install() &&
               $this->registerHook('moduleRoutes') &&
               $this->registerHook('displayHeader') &&
               $this->registerHook('displayTinysLandingProductsCarousel') &&
               $this->registerHook('displayTinysLandingContentCards');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }
    
    public function hookModuleRoutes($params)
    {
        return [
            'tinys-fidget-figuras-articuladas' => [
                'controller' => 'tinyslanding',
                'rule' => 'fidget-figuras-articuladas',
                'keywords' => [],
                'params' => [
                    'fc' => 'module',
                    'module' => $this->name,
                    'page' => 'fidget-figuras-articuladas',
                ],
            ],
            'tinys-miniaturas' => [
                'controller' => 'tinyslanding',
                'rule' => 'miniaturas',
                'keywords' => [],
                'params' => [
                    'fc' => 'module',
                    'module' => $this->name,
                    'page' => 'miniaturas',
                ],
            ],
            'tinys-figuras-coleccionables' => [
                'controller' => 'tinyslanding',
                'rule' => 'figuras-coleccionables',
                'keywords' => [],
                'params' => [
                    'fc' => 'module',
                    'module' => $this->name,
                    'page' => 'figuras-coleccionables',
                ],
            ],
            'tinys-material-tea' => [
                'controller' => 'tinyslanding',
                'rule' => 'material-tea',
                'keywords' => [],
                'params' => [
                    'fc' => 'module',
                    'module' => $this->name,
                    'page' => 'material-tea',
                ],
            ],
            'tinys-regalo-ninos' => [
                'controller' => 'tinyslanding',
                'rule' => 'regalo-ninos',
                'keywords' => [],
                'params' => [
                    'fc' => 'module',
                    'module' => $this->name,
                    'page' => 'regalo-ninos',
                ],
            ],
        ];
    }

    public function hookDisplayHeader()
    {
        $this->context->controller->addCSS($this->_path.'views/css/front.css');
    }
    public function hookDisplayTinysLandingProductsCarousel(){}
    public function hookDisplayTinysLandingContentCards(){}
}