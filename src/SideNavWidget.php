<?php

namespace mathiax90\sidenav;

use yii\base\Widget;
use yii\base\Exception;
use Yii;
use mathiax90\sidenav\SideNavWidgetAsset;

class SideNavWidget extends Widget {

    public $items;
    private $html;

    public function init() {
        parent::init();
        SideNavWidgetAsset::register($this->getView());
        $html = '<div class="sidenav" id="mySidenav"><ul class="nav nav-pills nav-stacked kv-sidenav">';
        Yii::info(print_r($this->items, true));
        $html .= $this->echo_items($this->items, 2);

        $html = $html . "</ul></div>";
        $this->html = $html;
    }

    private function echo_items($items, $level) {
        $result = "";
        Yii::info(print_r($items, true));
        foreach ($items as $item) {
            if (!is_array($item)) {
                throw new Exception('item isn\'t array!');
            } else {
                if (array_key_exists('items', $item)) {
                    if ($level == 0) {
                        throw new Exception('SideNavWidget has only 3 levels (hardcoded)!');
                    } else {
                        if (!(isset($item['label']) )) {
                            throw new Exception('no label in' . PHP_EOL . print_r($item, true));
                        } else {
                            $result .= '<li><a href="#" class="kv-toggle"><span class="opened" style="display:none"><i class="indicator glyphicon glyphicon-chevron-down"></i></span><span class="closed"><i class="indicator glyphicon glyphicon-chevron-right"></i></span>' . $item["label"] . '</a><ul class="nav nav-pills nav-stacked">'
                                    . $this->echo_items($item['items'], $level - 1)
                                    . '</ul></li>';
                        }
                    }
                } else {
                    if (!(isset($item['label']) or!isset($item['url']))) {
                        throw new Exception('no label or url in item');
                    } else {
                        $result .= '<li><a href="' . $item['url'][0] . '">' . ($level != 2 ? "» " : "") . $item['label'] . '</a></li>';
                    }
                }
            }
        }
        return $result;
    }

    public function run() {

        return $this->html;
    }

}
