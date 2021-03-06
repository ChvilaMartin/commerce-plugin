<?php namespace Pixiu\Commerce\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Pixiu\Commerce\Classes\CurrencyHandler;

/**
 * Currency Form Widget
 */
class Currency extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'pixiu_commerce_currency';

    private $currencyHandler;

    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->currencyHandler = \App::make('CurrencyHandler');
    }

    public function setCurrencyHandler(CurrencyHandler $currencyHandler)
    {
        $this->currencyHandler = $currencyHandler;
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('currency');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] =$this->currencyHandler->getValueForInput($this->getLoadValue());
        $this->vars['model'] = $this->model;

        /*
         *  FORMAT SETTINGS
         *  these settings can be centralised in CommerceSettings
         */
        $this->vars['currencySymbol'] = $this->currencyHandler->currencySymbol;
        $this->vars['decimalSymbol'] = $this->currencyHandler->decimalSymbol;
        $this->vars['format'] = $this->currencyHandler->format;
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/currency.css', 'Pixiu.commerce');
        $this->addJs('js/jquery.formatcurrency.min.js', 'Pixiu.commerce');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $this->currencyHandler->getValueFromInput($value);
    }
}
