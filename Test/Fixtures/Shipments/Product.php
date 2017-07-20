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

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Attribute\Source\Status;
use Magento\Catalog\Model\Product\Type;
use Magento\Catalog\Model\Product\Visibility;
use Magento\Customer\Model\Group;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\ObjectManager;

Bootstrap::getInstance()->reinitialize();

/** @var ObjectManager $objectManager */
$objectManager = Bootstrap::getObjectManager();

/** @var $product Product */
$product = $objectManager->create(Product::class);
$product->isObjectNew(true);
$product->setTypeId(Type::TYPE_SIMPLE);
$product->setId(1);
$product->setAttributeSetId(4);
$product->setWebsiteIds([1]);
$product->setName('PostNL Product');
$product->setSku('postbk_simple');
$product->setPrice(10);
$product->setWeight(1);
$product->setShortDescription("PostNL product");
$product->setTaxClassId(0);
$product->setTierPrice([
    [
        'website_id' => 0,
        'cust_group' => Group::CUST_GROUP_ALL,
        'price_qty'  => 2,
        'price'      => 8,
    ],
    [
        'website_id' => 0,
        'cust_group' => Group::CUST_GROUP_ALL,
        'price_qty'  => 5,
        'price'      => 5,
    ],
    [
        'website_id' => 0,
        'cust_group' => Group::NOT_LOGGED_IN_ID,
        'price_qty'  => 3,
        'price'      => 5,
    ],
]);
$product->setDescription('Description with <b>html tag</b>');
$product->setMetaTitle('meta title');
$product->setMetaKeyword('meta keyword');
$product->setMetaDescription('meta description');
$product->setVisibility(Visibility::VISIBILITY_BOTH);
$product->setStatus(Status::STATUS_ENABLED);
$product->setStockData([
    'use_config_manage_stock' => 1,
    'qty' => 100,
    'is_qty_decimal' => 0,
    'is_in_stock' => 1,
]);
$product->setCanSaveCustomOptions(true);
$product->setHasOptions(true);

/** @var ProductRepositoryInterface $productRepositoryFactory */
$productRepositoryFactory = $objectManager->create(ProductRepositoryInterface::class);
$productRepositoryFactory->save($product);
