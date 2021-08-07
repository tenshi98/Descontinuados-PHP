<?php
/**
 * Jouele, a beautiful audio player for the web
 *
 * @author Stanislav Karassyov <stanislav.krsv@gmail.com>
 * @version 0.1
 * @package extensions.jouele
 * @link http://stanislavkrsv.github.com/yii-jouele-widget
 */
class Jouele extends \CWidget
{
    /**
	 * Assets package ID.
	 */
	const PACKAGE_ID = 'jouele-player';

    /**
     * @var string link to MP3 file
     */
    public $file;

    /**
     * @var string file description
     */
    public $name;

    /**
     * @var string tag player
     */
    public $tag = 'div';

    /**
     * @var array additional HTML options to be rendered in the input tag
     */
    public $htmlOptions=array();


    /**
     * Executes the widget.
     */
    public function run()
    {
        parent::run();
        echo CHtml::tag($this->tag, $this->htmlOptions, CHtml::link($this->name, $this->file, array('class'=>'jouele')));
        $this->registerScripts();
    }

    /**
     * Register CSS and Script.
     */
    protected function registerScripts()
    {
        // @var $cs \CClientScript
        $cs = Yii::app()->clientScript;

        if (!isset($cs->packages[self::PACKAGE_ID])) {
            // @var $am \CAssetManager
            $am = Yii::app()->assetManager;

            $cs->packages[self::PACKAGE_ID] = array(
                'basePath' => dirname(__FILE__) . '/assets',
                'baseUrl'  => $am->publish(dirname(__FILE__) . '/assets'),
                'js' => array(
                    'jquery.jplayer.min.js',
                    'jouele.js',
                ),
                'css' => array(
                    'jouele.css',
                ),
                'depends' => array(
                    'jquery',
                ),
            );
        }

        $cs->registerPackage(self::PACKAGE_ID);
    }
}