<?php


namespace crazycharlyday\vue;

/**
 * Affichage des listes
 * @package wishlist\views
 */
class VueBesoin extends Vue
{

    public function vue(string $vue)
    {
        switch ($vue) {
            case 'showAll':
                $this->showAll();
                break;
            default:
                break;
        }
    }

    /**
     * Affiche toutes les listes
     */
    private function showAll()
    {
        $this->content.= "coucou";
    }

    public function render($sel)
    {
        // TODO: Implement render() method.
    }
}