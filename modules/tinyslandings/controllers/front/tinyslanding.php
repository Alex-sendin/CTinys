<?php

class TinysLandingsTinysLandingModuleFrontController extends ModuleFrontController
{

    private function assignPageContent($metaTitle, $metaDescription, $className, $primaryContent, $secondaryContent)
    {
        $this->context->smarty->assign([
            'meta_title' => $metaTitle,
            'meta_description' => $metaDescription,
            'class_name' => $className,
            'primary_content' => $primaryContent,
            'secondary_content' => $secondaryContent,
            'layout' => 'layouts/layout-full-width.tpl'
        ]);
    }

    public function initContent()
    {
        parent::initContent();

        $pageName = Tools::getValue('page');

        switch ($pageName) {
            case 'fidget-figuras-articuladas':
                $this->assignPageContent(
                    'Fidget | Tinys, figuras articulables y coleccionables',
                    'Descubre los Fidget de nueva generación...',
                    'fidget-landing',
                    '<h1>Fidget. Figuras articuladas y coleccionables</h1>...',
                    '<p>Descubre la nueva generación de Fidget con los Tinys, figuras articulables y coleccionables que despiertan la creatividad en niños y adultos.
                    Cada Tiny tiene personalidad propia y ofrece una experiencia única: crear, coleccionar y compartir.
                    En Tinys hemos reinventado el concepto Fidget con diseños exclusivos que no solo se articulan y coleccionan, sino que también inspiran historias y momentos especiales.
                    Perfectos para jugar en casa, compartir con amigos, llevar a cualquier lugar y sorprender como regalo.
                    Nuestras miniaturas están diseñadas para todos los niños, incluyendo aquellos con TEA o autismo, favoreciendo el juego inclusivo y la interacción familiar.
                    Un Tiny es mucho más que una simple figura: es un universo de creatividad. Permite a los niños crear escenas y aventuras llenas de imaginación.</p>'
                );
                $this->setTemplate('module:tinyslandings/views/templates/front/layout_landings.tpl');
                break;
            
            case 'miniaturas':
                $this->assignPageContent(
                    'Miniaturas | Figuras articuladas coleccionables y de fantasía',
                    'Explora nuestro mundo de miniaturas...',
                    'miniaturas-landing',
                    '<h1>Miniaturas de fantasía y coleccionables</h1>...',
                    '<h2>¿Por qué coleccionar miniaturas Tinys?</h2>...'
                );
                $this->setTemplate('module:tinyslandings/views/templates/front/layout_landings.tpl');
                break;
            
            case 'figuras-coleccionables':
                $this->assignPageContent(
                    'Figuras coleccionables | La colección más especial de Tinys',
                    'Colecciona las figuras más exclusivas de Tinys...',
                    'coleccionables-landing',
                    '<h1>Figuras coleccionables exclusivas</h1>...',
                    '<h2>Crea, colecciona y comparte</h2>...'
                );
                $this->setTemplate('module:tinyslandings/views/templates/front/layout_landings.tpl');
                break;
            
            case 'material-tea':
                $this->assignPageContent(
                    'Material TEA | Juguetes inclusivos para niños con autismo',
                    'Tinys ofrece figuras articuladas ideales como material sensorial...',
                    'tea-landing',
                    '<h1>Juguetes inclusivos y material sensorial</h1>...',
                    '<h2>Juego y terapia en un solo objeto</h2>...'
                );
                $this->setTemplate('module:tinyslandings/views/templates/front/layout_landings.tpl');
                break;
            
            case 'regalo-ninos':
                $this->assignPageContent(
                    'Regalo para niños | El mejor juguete creativo de Tinys',
                    'Buscas el regalo perfecto para un niño?...',
                    'regalo-landing',
                    '<h1>El regalo perfecto que siempre aciertas</h1>...',
                    '<h2>Diversión y creatividad en cada figura</h2>...'
                );
                $this->setTemplate('module:tinyslandings/views/templates/front/layout_landings.tpl');
                break;

            default:
                header('HTTP/1.1 404 Not Found');
                header('Status: 404 Not Found');
                $this->setTemplate('errors/not-found.tpl');
                break;
        }
    }
}