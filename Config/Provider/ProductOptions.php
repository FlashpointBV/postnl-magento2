<?php
/**
 *
 *          ..::..
 *     ..::::::::::::..
 *   ::'''''':''::'''''::
 *   ::..  ..:  :  ....::
 *   ::::  :::  :  :   ::
 *   ::::  :::  :  ''' ::
 *   ::::..:::..::.....::
 *     ''::::::::::::''
 *          ''::''
 *
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Creative Commons License.
 * It is available through the world-wide-web at this URL:
 * http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to servicedesk@tig.nl so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future. If you wish to customize this module for your
 * needs please contact servicedesk@tig.nl for more information.
 *
 * @copyright   Copyright (c) Total Internet Group B.V. https://tig.nl/copyright
 * @license     http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 */
namespace TIG\PostNL\Config\Provider;

/**
 * This class contains all configuration options related to the product options.
 * This will cause that it is too long for Code Sniffer to check.
 *
 * @codingStandardsIgnoreStart
 */
class ProductOptions extends AbstractConfigProvider
{
//    const XPATH_SUPPORTED_PRODUCT_OPTIONS               = 'tig_postnl/delivery_settings/supported_options';
    const XPATH_DEFAULT_PRODUCT_OPTION                  = 'tig_postnl/delivery_settings/default_option';
    const XPATH_USE_ALTERNATIVE_DEFAULT_OPTION          = 'tig_postnl/delivery_settings/use_alternative_default';
    const XPATH_ALTERNATIVE_DEFAULT_MIN_AMOUNT          = 'tig_postnl/delivery_settings/alternative_default_min_amount';
    const XPATH_ALTERNATIVE_DEFAULT_PRODUCT_OPTION      = 'tig_postnl/delivery_settings/alternative_default_option';
    const XPATH_DEFAULT_EVENING_PRODUCT_OPTION          = 'tig_postnl/evening_delivery_nl/default_evening_option';
    const XPATH_DEFAULT_EXTRAATHOME_PRODUCT_OPTION      = 'tig_postnl/extra_at_home/default_extraathome_option';
    const XPATH_DEFAULT_PAKJEGEMAK_PRODUCT_OPTION       = 'tig_postnl/post_offices/default_pakjegemak_option';
    const XPATH_DEFAULT_EVENING_BE_PRODUCT_OPTION       = 'tig_postnl/evening_delivery_be/default_evening_be_option';
    const XPATH_DEFAULT_PAKJEGEMAK_EARLY_PRODUCT_OPTION = 'tig_postnl/post_offices/default_pakjegemak_early_option';
    const XPATH_DEFAULT_SUNDAY_PRODUCT_OPTION           = 'tig_postnl/sunday_delivery/default_sunday_option';

    /**
     * Since 1.5.1 all product options are automaticly supported.
     * @return array
     */
    public function getSupportedProductOptions()
    {
        return $this->productOptions->getAllProductCodes();
    }

    /**
     * @return string|int
     */
    public function getDefaultProductOption()
    {
        return $this->getConfigFromXpath(self::XPATH_DEFAULT_PRODUCT_OPTION);
    }

    /**
     * @return string|int
     */
    public function getUseAlternativeDefault()
    {
        return $this->getConfigFromXpath(self::XPATH_USE_ALTERNATIVE_DEFAULT_OPTION);
    }

    /**
     * @return string|int
     */
    public function getAlternativeDefaultMinAmount()
    {
        if (!$this->getUseAlternativeDefault()) {
            return '0';
        }

        return $this->getConfigFromXpath(self::XPATH_ALTERNATIVE_DEFAULT_MIN_AMOUNT);
    }

    /**
     * @return string|int|bool
     */
    public function getAlternativeDefaultProductOption()
    {
        if (!$this->getUseAlternativeDefault()) {
            return false;
        }

        return $this->getConfigFromXpath(self::XPATH_ALTERNATIVE_DEFAULT_PRODUCT_OPTION);
    }

    /**
     * @return string|int
     */
    public function getDefaultEveningProductOption()
    {
        return $this->getConfigFromXpath(self::XPATH_DEFAULT_EVENING_PRODUCT_OPTION);
    }

    /**
     * @return string|int
     */
    public function getDefaultExtraAtHomeProductOption()
    {
        return $this->getConfigFromXpath(self::XPATH_DEFAULT_EXTRAATHOME_PRODUCT_OPTION);
    }

    /**
     * @return string|int
     */
    public function getDefaultEveningBeProductOption()
    {
        return $this->getConfigFromXpath(self::XPATH_DEFAULT_EVENING_BE_PRODUCT_OPTION);
    }

    /**
     * @return mixed
     */
    public function getDefaultPakjeGemakProductOption()
    {
        return $this->getConfigFromXpath(self::XPATH_DEFAULT_PAKJEGEMAK_PRODUCT_OPTION);
    }

    /**
     * @return string|int
     */
    public function getDefaultPakjeGemakEarlyProductOption()
    {
        return $this->getConfigFromXpath(self::XPATH_DEFAULT_PAKJEGEMAK_EARLY_PRODUCT_OPTION);
    }

    /**
     * @return string|int
     */
    public function getDefaultSundayProductOption()
    {
        return $this->getConfigFromXpath(self::XPATH_DEFAULT_SUNDAY_PRODUCT_OPTION);
    }
}
/**
 * codingStandardsIgnoreEnd
 */
