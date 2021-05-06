<?php
namespace mathiax90\sidenav;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\web\AssetBundle;

/**
 * Description of newPHPClass
 *
 * @author tsoydi
 */
class SideNavWidgetAsset extends AssetBundle {

    public $sourcePath = '@vendor/mathiax90/yii2-sidenav-widget/src/assets';
    public $css = [
        'css/sidenav.css',
    ];
    public $js = [
        'js/sidenav.js'
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];

}
