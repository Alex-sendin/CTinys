<?php 
if(!defined('_PS_VERSION_')){
    exit;
}

class Cards_Home extends Module{
    
    public function __construct()
    {
        $this->name = 'cards_home';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Alex Sendin Coque';
        $this->need_instance = 0 ;
        $this->ps_versions_compliancy = ['min' => '8.0.0', 'max' => _PS_VERSION_];
        $this-> bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Home CTinys Cards');
        $this->description = $this->l('Añade un bloque de imagenes en formato Card personalizable.');
    }

    public function install(){
        return parent::install() &&
        $this->registerHook('displayHome') && $this->registerHook('displayHeader');
    }   

    public function uninstall(){
        for ($i = 1; $i <= 4; $i++) {
            Configuration::deleteByName('CARD_IMG' . $i);
            Configuration::deleteByName('CARD_IMG_' . $i . '_DESC');
        }
        return parent::uninstall();
    }

    public function getContent()
    {
        $output = '';
        if (Tools::isSubmit('submit' . $this->name)) {
            for ($i = 1; $i <= 4; $i++) {
                // Procesar subida de imagen
                if (isset($_FILES['CARD_IMG' . $i]) && !empty($_FILES['CARD_IMG' . $i]['tmp_name'])) {
                    $fileName = 'banner_' . $i . '_' . date('YmdHis') . '.' . pathinfo($_FILES['CARD_IMG' . $i]['name'], PATHINFO_EXTENSION);
                    $targetPath = _PS_MODULE_DIR_ . $this->name . '/img/' . $fileName;
                    if (move_uploaded_file($_FILES['CARD_IMG' . $i]['tmp_name'], $targetPath)) {
                        Configuration::updateValue('CARD_IMG' . $i, $fileName);
                    }
                }

                Configuration::updateValue('CARD_IMG' . $i . '_DESC', Tools::getValue('CARD_IMG' . $i . '_DESC'));
            }
        }

        return $output . $this->displayForm();
    }

    public function displayForm()
    {
        $formFields = [
            'form' => [
                'legend' => [
                    'title' => $this->l('Configuración de Imágenes'),
                    'icon' => 'icon-cogs',
                ],
                'input' => [],
                'submit' => ['title' => $this->l('Guardar')],
            ],
        ];

        for ($i = 1; $i <= 4; $i++) {
            $formFields['form']['input'][] = [
                'type' => 'file',
                'label' => $this->l('Imagen ') . $i,
                'name' => 'CARD_IMG' . $i,
                'desc' => $this->l('Sube la imagen para el banner ') . $i,
                'thumb' => $this->getImgUrl(Configuration::get('CARD_IMG' . $i)),
            ];
            $formFields['form']['input'][] = [
                'type' => 'textarea',
                'label' => $this->l('Descripción ') . $i,
                'name' => 'CARD_IMG' . $i . '_DESC',
            ];
        }

        $helper = new HelperForm();
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;
        $helper->default_form_language = (int) Configuration::get('PS_LANG_DEFAULT'); 
        $helper->allow_employee_form_lang = 0;
        $helper->title = $this->displayName;
        $helper->submit_action = 'submit' . $this->name;

        // Recuperar los valores no multilingües
        for ($i = 1; $i <= 4; $i++) {
            $helper->fields_value['CARD_IMG' . $i] = Configuration::get('CARD_IMG' . $i);
            $helper->fields_value['CARD_IMG' . $i . '_DESC'] = Configuration::get('CARD_IMG' . $i . '_DESC');
        }

        return $helper->generateForm([$formFields]);
    }

    public function hookDisplayHome()
    {
        $images = [];
        for ($i = 1; $i <= 4; $i++) {
            $imageName = Configuration::get('CARD_IMG' . $i);
            if ($imageName) {
                $images[] = [
                    'url' => $this->getImgUrl($imageName),
                    'desc' => Configuration::get('CARD_IMG' . $i . '_DESC'),
                ];
            }
        }
        $this->context->smarty->assign('mi_modulo_imagenes', $images);
        return $this->display(__FILE__, 'views/templates/hook/display_home.tpl');
    }

    public function hookDisplayHeader()
    {
        $this->context->controller->addCSS($this->_path . 'views/css/style.css');
    }

    protected function getImgUrl($imageName)
    {
        if (!$imageName) {
            return '';
        }
        return $this->_path . 'img/' . $imageName;
    }
}