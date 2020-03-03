<?php

$sMetadataVersion = '2.0';

$aModule = array(
    'id'          => 'rs-deliverysetlist',
    'title'       => '*RS Delivery Set List',
    'description' => 'Display delivery method in the checkout as list (WAVE theme)',
    'thumbnail'   => '',
    'version'     => '1.0.1',
    'author'      => '',
    'url'         => '',
    'email'       => '',
    'extend'      => array(
        \OxidEsales\Eshop\Application\Model\DeliverySet::class => \rs\deliverysetlist\Application\Model\DeliverySet::class,
    ),
    'templates' => array(
        'rs/deactivate/views/tpl/page/details/inc/productmain__details_productmain_productlinks.tpl' => 'rs/deactivate/views/tpl/page/details/inc/productmain__details_productmain_productlinks.tpl',
        'rs/deactivate/views/tpl/widget/footer/services__footer_services_items.tpl' => 'rs/deactivate/views/tpl/widget/footer/services__footer_services_items.tpl',
        'rs/deactivate/views/tpl/widget/header/servicebox__widget_header_servicebox_items.tpl' => 'rs/deactivate/views/tpl/widget/header/servicebox__widget_header_servicebox_items.tpl',
        'rs/deactivate/views/tpl/page/account/dashboard__account_dashboard_col1.tpl' => 'rs/deactivate/views/tpl/page/account/dashboard__account_dashboard_col1.tpl',
        'rs/deactivate/views/tpl/page/account/dashboard__account_dashboard_col2.tpl' => 'rs/deactivate/views/tpl/page/account/dashboard__account_dashboard_col2.tpl',
        'rs/deactivate/views/tpl/page/account/inc/account_menu__account_menu.tpl' => 'rs/deactivate/views/tpl/page/account/inc/account_menu__account_menu.tpl',
    ),
    'blocks'      => array(
        array(
            'template' => 'page/checkout/payment.tpl',
            'block'    => 'change_shipping',
            'file'     => '/views/blocks/page/checkout/payment__change_shipping.tpl',
        ),
    ),
    'settings'    => array(
    ),
);