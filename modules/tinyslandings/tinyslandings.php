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
        $this->author = 'Ecoitec';
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
    $routes = [];

    $jsonFilePath = _PS_MODULE_DIR_ . $this->name . '/assets/json/data.json';
    
    if (file_exists($jsonFilePath)) {
        $jsonContent = file_get_contents($jsonFilePath);
        $landingPages = json_decode($jsonContent, true);

        if (!empty($landingPages)) {
            foreach ($landingPages['landings'] as $page) {
                $pageName = $page['url'];

                $routes[$pageName] = [
                    'controller' => 'tinyslanding',
                    'rule' => $pageName,
                    'keywords' => [],
                    'params' => [
                        'fc' => 'module',
                        'module' => $this->name,
                        'page' => $pageName,
                    ],
                ];
            }
        }
    }

    return $routes;
}

    public function hookDisplayHeader()
    {
        $this->context->controller->addCSS($this->_path.'views/css/front.css');
    }
    public function hookDisplayTinysLandingProductsCarousel(){}
    public function hookDisplayTinysLandingContentCards(){}
}