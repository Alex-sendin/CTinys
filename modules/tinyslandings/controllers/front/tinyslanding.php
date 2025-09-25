<?php

class TinysLandingsTinysLandingModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        $pageName = Tools::getValue('page');

        // Paso 1: Leer y decodificar el archivo JSON
        $jsonFilePath = _PS_MODULE_DIR_ . $this->module->name . '/assets/json/data.json';
        
        if (file_exists($jsonFilePath)) {
            $jsonContent = file_get_contents($jsonFilePath);
            $landingPages = json_decode($jsonContent, true); // true para obtener un array asociativo
        } else {
            // Manejar el error si el archivo no existe (puedes redirigir a 404)
            header('HTTP/1.1 404 Not Found');
            header('Status: 404 Not Found');
            $this->setTemplate('errors/not-found.tpl');
            return;
        }

        // Paso 2: Buscar el case en los datos del JSON
        $pageData = null;
        foreach ($landingPages['landings'] as $page) {
            if ($page['url'] === $pageName) {
                $pageData = $page;
                break;
            }
        }

        if ($pageData) {
            $this->context->smarty->assign('page_data', $pageData);
            $this->setTemplate('module:tinyslandings/views/templates/front/'.$pageData['template']);
        } 
        else {
            // Manejar el caso si el 'pageName' no se encuentra en el JSON
            header('HTTP/1.1 404 Not Found');
            header('Status: 404 Not Found');
            $this->setTemplate('errors/not-found.tpl');
        }
    }
}
