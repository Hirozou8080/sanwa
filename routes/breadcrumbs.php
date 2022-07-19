<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Store
Breadcrumbs::for('store', function ($trail) {
    $trail->parent('home');
    $trail->push('店舗一覧', route('store'));
});
// Home > Store > Price
Breadcrumbs::for('price', function ($trail) {
    $trail->parent('home');
    $trail->push('料金一覧', route('price'));
});