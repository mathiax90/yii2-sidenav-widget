<?php

namespace mathiax90\sidenav;

use yii\base\Widget;
//use yii\helpers\Html;
use mathiax90\sidenav\SideNavWidgetAsset;

class SideNavWidget extends Widget {

    public $items;
    private $html;

    public function init() {
        parent::init();
        SideNavWidgetAsset::register($this->getView());
        $html = '<div class="sidenav" id="mySidenav"><ul class="nav nav-pills nav-stacked kv-sidenav">';

        $html .= $this->echo_items($this->items, 2);

        $html = $html . "</ul></div>";
        $this->html = $html;
    }

    private function echo_items($items, $level) {
        $result = "";
        foreach ($items as $item) {
            if (!is_array($item)) {
                throw new Exception('item isn\'t array!');
            }
            if (array_key_exists('items', $item)) {
                if ($level == 0) {
                    throw new Exception('SideNavWidget has only 3 levels (hardcoded)!');
                } else {
                    $result .= echo_items($item, $level - 1);
                }
            } else {
                if (!(isset($item['label']) and isset($item['url']))) {
                    throw new Exception('no label or url in item');
                } else {
                    $result .= '<li><a href="' . $item['url'] . '">' . $item['label'] . '</a></li>';
                }
            }

            // if (array_key_exists('label', $item))
            // {
            // $result .= '<li><a href="' . $item['url'][0] . '">' . $item['label'] . '</a></li>';
            // }else {
            // if ($level == 0){
            // throw new Exception('SideNavWidget item has no label on level 0!');
            // } else {
            // $result .= echo_items($item, $level-1);
            // }
            // }
        }
        return $result;
    }

    public function run() {

        return $this->html;
    }

}
