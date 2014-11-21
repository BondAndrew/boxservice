<?php
/**
 * Created by PhpStorm.
 * User: andrewbondarenko
 * Date: 30.10.14
 * Time: 19:48
 */


class yaMap extends CWidget
{
    public $visible = true;
    public $points = '';
    public $params = array('zoom'=>13,'width'=>'400px','height'=>'200px');

    public function init()
    {
        // Don't do anything if I'm not visible
        if(!$this->visible) {
            return;
        }
        // If we have no points, just don't do anything
        if(count($this->points) == 0 || $this->points=='') {
            $this->visible = false;
            return;
        }

        Yii::app()->clientScript->registerScript(0,
            'yaMapPoints='.CJSON::encode($this->points).';'.
            'yaMapParams='.CJSON::encode($this->params).';',
            CClientScript::POS_READY
        );

        $this->publishAssets();

        parent::init();
    }

    public function run()
    {
        $this->render('yaMap');
    }

    public function publishAssets()
    {
        $assets = dirname(__FILE__).'/assets';
        $baseUrl = Yii::app()->assetManager->publish($assets);
        if(is_dir($assets))
        {
            Yii::app()->clientScript->registerCoreScript('jquery');
            Yii::app()->clientScript->registerScriptFile('http://api-maps.yandex.ru/2.1/?load=package.full&lang=ru-RU');
            Yii::app()->clientScript->registerScriptFile($baseUrl . '/yamap.js', CClientScript::POS_HEAD);
        } else
        {
            throw new Exception('yaMap - Error: Couldn\'t find assets to publish.');
        }
    }
}