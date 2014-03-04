<?php

  /**
   * IWPriceFormat is to format input text fields or any HTML element as prices. 
   * For example, if you type 123456 in a input or set a p tag with this value, 
   * the extension updates it to US$ 1,234.56. It is costumizable, so you can use 
   * other prefixes and separators (for example, use it to get R$ 1.234,55).
   * 
   * Credits to Eduardo Cuducos and Flávio Silveira for jQuery script.
   * http://jquerypriceformat.com
   *
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @since 1.0
   */
  class IWPriceFormat extends CInputWidget
  {

    /**
     * Default options.
     * @var array
     */
    public $options = array(
      'prefix' => '',
      'centsSeparator' => ',',
      'thousandsSeparator' => '.',
      'centsLimit' => 2,
      'allowNegative' => FALSE,
    );

    /**
     * Default HTML options.
     * @var array
     */
    public $htmlOptionsPlugin = array();

    /**
     * Initializes the widget.
     * This method is called by {@link CBaseController::createWidget}
     * and {@link CBaseController::beginWidget} after the widget's
     * properties have been initialized.
     */
    public function init()
    {
      $this->publishAssets();
    }

    /**
     * Executes the widget.
     * This method is called by {@link CBaseController::endWidget}.
     */
    public function run()
    {
      list($name, $id) = $this->resolveNameID();

      $this->htmlOptions = $this->htmlOptionsPlugin;

      if (isset($this->htmlOptions['id']))
      {
        $id = $this->htmlOptions['id'];
      } else
      {
        $this->htmlOptions['id'] = $id;
      }

      if (isset($this->htmlOptions['name']))
      {
        $name = $this->htmlOptions['name'];
      } else
      {
        $this->htmlOptions['name'] = $name;
      }

      if (!isset($this->htmlOptions['style']))
      {
        $this->htmlOptions['style'] = 'text-align: right;';
      }

      if ($this->hasModel())
      {
        echo CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
      } else
      {
        echo CHtml::textField($name, $this->value, $this->htmlOptions);
      }

      $options = CJavaScript::encode($this->options);
      Yii::app()->clientScript->registerScript($id, "$('#{$id}').priceFormat({$options});");
    }

    /**
     * Publish the assets.
     * @throws Exception
     */
    protected static function publishAssets()
    {
      $assets = dirname(__FILE__) . '/assets';
      $baseUrl = Yii::app()->assetManager->publish($assets, FALSE, -1, YII_DEBUG);
      if (is_dir($assets))
      {
        Yii::app()->clientScript->registerCoreScript('jquery');
        Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.price_format.2.0.min.js', CClientScript::POS_HEAD);
      } else
      {
        throw new Exception('PriceFormat - Error: Couldn\'t find assets to publish.');
      }
    }

  }
  