<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class ExpandCombinations extends Module
{
    public function __construct()
    {
        $this->name = 'expandcombinations';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Tu Nombre';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = ['min' => '8.0', 'max' => _PS_VERSION_];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Expand Product Combinations');
        $this->description = $this->l('Displays each product combination as a separate product on category pages.');
    }

    public function install()
    {
        return parent::install() && $this->registerHook('actionProductSearchAfter');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }
public function hookActionProductSearchAfter($params)
{
    // 1. Obtenemos el objeto ProductSearchResult, que contiene los resultados
    /** @var \PrestaShop\PrestaShop\Core\Product\Search\ProductSearchResult $result */
    $result = $params['result'];

    // 2. Usamos el método getProducts() para obtener la lista de productos
    $originalProducts = $result->getProducts();

    // 3. Verificamos si hay productos antes de continuar
    if (empty($originalProducts)) {
        return;
    }

    $expandedProducts = [];
    $id_lang = $this->context->language->id;

    // --- El resto de la lógica para expandir las combinaciones es idéntica ---
    foreach ($originalProducts as $productData) {
        $product = new Product($productData['id_product'], true, $id_lang);

        if ($product->hasAttributes()) {
            $combinations = $product->getAttributeCombinations($id_lang);
            
            $groupedCombinations = [];
            foreach ($combinations as $combination) {
                $groupedCombinations[$combination['id_product_attribute']]['attributes'][] = $combination;
                if (!isset($groupedCombinations[$combination['id_product_attribute']]['reference'])) {
                     $groupedCombinations[$combination['id_product_attribute']]['reference'] = $combination['reference'];
                }
            }

            foreach ($groupedCombinations as $id_product_attribute => $comboData) {
                $comboProduct = $productData;
                $comboProduct['id_product_attribute'] = $id_product_attribute;
                
                $attribute_description = '';
                foreach ($comboData['attributes'] as $attribute) {
                    $attribute_description .= $attribute['group_name'] . ': ' . $attribute['attribute_name'] . ', ';
                }
                $comboProduct['name'] = rtrim($attribute_description, ', ');
                $comboProduct['main_product_name'] = $product->name;
                $comboProduct['reference'] = $comboData['reference'];

                $combinationImages = $product->getCombinationImages($id_lang);
                if (isset($combinationImages[$id_product_attribute][0]['id_image'])) {
                    $id_image = $combinationImages[$id_product_attribute][0]['id_image'];
                    $comboProduct['id_image'] = $id_image;
                    // Actualizamos también la imagen de portada que usa la plantilla
                    $comboProduct['cover']['id_image'] = $id_image;
                }
                
                $comboProduct['price'] = Product::getPriceStatic($product->id, true, $id_product_attribute);
                $expandedProducts[] = $comboProduct;
            }
        } else {
            $expandedProducts[] = $productData;
        }
    }
    
    // 4. Usamos el método setProducts() para reemplazar la lista original con la nuestra
    $result->setProducts($expandedProducts);
}
}