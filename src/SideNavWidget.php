<?php 
namespace mathiax90\SideNavWidget;

use yii\base\Widget;
//use yii\helpers\Html;
use mathiax90\SideNavWidget\SideNavWidgetAsset;

class SideNavWidget extends Widget
{
    public $items;
    private $html;
    public function init()
    {
        parent::init();
        SideNavWidgetAsset::register($this->getView());
        $html = '<div class="sidenav" id="mySidenav"><ul class="nav nav-pills nav-stacked kv-sidenav">';

        $html.= $this->echo_items($this->items,2);
        
        $html = $html . "</ul></div>";
        $this->html = $html;
    }
    
    private function echo_items($items,$level){
        $result = "";
        foreach ($items as $item){
            if (!is_array($item)){
                throw new Exception('SideNavWidget item isn\'t array!');
            }
            if (array_key_exists('label', $item))
            {
                $result .= '<li><a href="' . $item['url'][0] . '">' . $item['label'] . '</a></li>';
            }else {
                if ($level == 0){
                    throw new Exception('SideNavWidget item has no label on level 0!');
                } else {
                    $result .= echo_items($item, $level-1);
                }
            }
            
        }
        return $result;
    }

    public function run()
    {
        
        return $this->html;
    }
}