<?php
use Kernel\Router;
use Controller\FrontendController;
use Controller\ErrorController;
use Controller\AdminController;
use Controller\ProductController;
use Controller\CommentController;

//home routes
Router::add('/', [FrontendController::class, 'homepage']);

//product routes
Router::add('/json/show-products', [ProductController::class, 'showProducts'], 'get');

//admin routes
Router::add('/admin/login', [AdminController::class, 'login'], 'get');
Router::add('/admin/login', [AdminController::class, 'jsonLogin'], 'post');
Router::add('/admin/logout', [AdminController::class, 'logout'], 'get');
Router::add('/admin/dashboard', [AdminController::class, 'dashboard']);
Router::add('/json/approve-comment', [AdminController::class, 'approveComment'], 'post');
Router::add('/json/disapprove-comment', [AdminController::class, 'disapproveComment'], 'post');

//comment routes
Router::add('/json/show-approved-comments', [CommentController::class, 'showApprovedComments'], 'get');
Router::add('/json/show-unapproved-comments', [CommentController::class, 'showUnapprovedComments'], 'get');
Router::add('/json/add-comment', [CommentController::class, 'addComment'], 'post');

//error routes
Router::pathNotFound([ErrorController::class, 'notFound']);
