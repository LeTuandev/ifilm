<?php

use App\Models\Movie;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('cinemas', function (BreadcrumbTrail $trail) {
    $trail->push('Cinemas Manager', route('admin.cinemas'));
});

Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
   $trail->push('My Profile', route('admin.vew_profile')); 
});

Breadcrumbs::for('movies', function (BreadcrumbTrail $trail) {
    $trail->push('Movies Manager', route('admin.movie'));
});

Breadcrumbs::for('detail-movie', function (BreadcrumbTrail $trail, Movie $movie) {
    $trail->parent('movies');
    $trail->push('Detail Movie', route('admin.movie.detail', $movie));
});

// Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });