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
// Home > Price
Breadcrumbs::for('price-detail', function (BreadcrumbTrail $trail, $store_name) {
    $trail->parent('price');
    $trail->push($store_name . 'の料金詳細', route('price'));
});
