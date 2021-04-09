<?php
namespace mathiax90\SideNavWidget;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of newPHPClass
 *
 * @author tsoydi
 */
class SideNavWidgetAsset extends AssetBundle {

    /**
     * @inheritdoc
     */
    public function init() {
        $this->setSourcePath('@vendor/sidenav');
        $this->setupAssets('css', ['css/sidenav.css']);
        $this->setupAssets('js', ['js/sidenav.js']);
        parent::init();
    }

}
