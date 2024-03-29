<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Store
Breadcrumbs::for('store', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('店舗一覧', route('store'));
});
// Home > Price
Breadcrumbs::for('price', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('料金一覧', route('price'));
});
// Home > Price > price-detail
Breadcrumbs::for('price-detail', function (BreadcrumbTrail $trail, $store_name) {
    $trail->parent('price');
    $trail->push($store_name . 'の料金詳細', route('price'));
});

// Home > Alert
Breadcrumbs::for('alert', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('通知一覧', route('alert'));
});

// Home > Alert > Alert_detail
Breadcrumbs::for('alert_detail', function (BreadcrumbTrail $trail, $alert_title) {
    $trail->parent('alert');
    $trail->push($alert_title, route('alert'));
});

// Home > Contact
Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('お問い合わせ', route('contact'));
});

// Home > Service
Breadcrumbs::for('service', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('サービス紹介', route('service'));
});
