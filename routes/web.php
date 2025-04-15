<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ActualiteController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\EvenementController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\Admin\PollController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;




// Route pour le dashboard admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
});

Route::get('/', function () {
    return view('layouts.home');
})->name('home');

Route::get('/profile', function () {
    return view('layouts.profile');
})->name('profile');

Route::middleware('auth')->group(function() {
   // Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class,'update'])->name('profile.update');
    Route::put('/profile/avatar', [ProfileController::class,'updateAvatar'])->name('profile.avatar');
    Route::put('/profile/password', [ProfileController::class,'updatePassword'])->name('password.update');
});

// Route A propos
Route::get('/about',function (){
    return view('layouts.a-propos');
})->name('about');

//Route actualités
Route::get('/actualites',[ ActualiteController::class, 'indexNews'])->name('actualites');

//Route actualités detail
Route::get('/actualites/show/{id}',[ActualiteController::class,'show'])->name('actualites.show');


//Route évenements
Route::get('/evenements',[ EvenementController::class, 'indexNews'])->name('evenements');
//Route évenements detail
Route::get('/evenements/show/{id}',[EvenementController::class,'show'])->name('evenements.show');


//Route Contact
Route::get('/contact',function (){
    return view('layouts.contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

// Route Vote
Route::get('/sondage/fneb', [PollController::class, 'indexPolls'])->name('sondages');
Route::post('/polls/{poll}/vote', [VoteController::class, 'vote'])->name('polls.vote');

//Route Connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//Route Inscription
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

//Route Déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



//Route ACTUALITES ADMIN
Route::get('/admin/actualites', [ActualiteController::class, 'index'])->name('admin.actualites.index');
Route::get('/admin/actualites/create', [ActualiteController::class, 'create'])->name('admin.actualites.create');
Route::post('/admin/actualites', [ActualiteController::class, 'store'])->name('admin.actualites.store');
Route::get('/admin/actualites/{actualite}/edit', [ActualiteController::class, 'edit'])->name('admin.actualites.edit');
Route::put('/admin/actualites/{actualite}', [ActualiteController::class, 'update'])->name('admin.actualites.update');
Route::delete('/admin/actualites/{actualite}', [ActualiteController::class, 'destroy'])->name('admin.actualites.destroy');



//Route Evenements ADMIN
Route::get('/admin/evenements', [EvenementController::class, 'index'])->name('admin.evenements.index');
Route::get('/admin/evenements/create', [EvenementController::class, 'create'])->name('admin.evenements.create');
Route::post('/admin/evenements', [EvenementController::class, 'store'])->name('admin.evenements.store');    
Route::get('/admin/evenements/{evenement}/edit', [EvenementController::class, 'edit'])->name('admin.evenements.edit');
Route::put('/admin/evenements/{evenement}', [EvenementController::class, 'update'])->name('admin.evenements.update');
Route::delete('/admin/evenements/{evenement}', [EvenementController::class, 'destroy'])->name('admin.evenements.destroy');


//Route Poll ADMIN
Route::get('/admin/polls', [PollController::class, 'index'])->name('admin.polls.index');
Route::get('/admin/polls/create', [PollController::class, 'create'])->name('admin.polls.create');
Route::post('/admin/polls/store', [PollController::class, 'store'])->name('admin.polls.store');
Route::get('/admin/polls/{poll}/edit', [PollController::class, 'edit'])->name('admin.polls.edit');
Route::put('/admin/polls/{poll}', [PollController::class, 'update'])->name('admin.polls.update');
Route::delete('/admin/polls/{poll}', [PollController::class, 'destroy'])->name('admin.polls.destroy');
Route::get('/admin/polls/{poll}', [PollController::class, 'show'])->name('admin.polls.show');

//Route Posts ADMIN

Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
Route::post('/admin/posts', [PostController::class, 'store'])->name('admin.posts.store');
Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
Route::put('/admin/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');

// Ratings
Route::post('/posts/{post}/rate', [RatingController::class, 'store'])->name('posts.rate');

// Comments
Route::middleware('auth')->group(function () {
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

 // Route Blog 
 Route::get('/blog', [PostController::class, 'indexBlog'])->name('blog');
 Route::get('/blog/{post}', [PostController::class, 'showPost'])->name('post.show');


 //Route NewsLetter 
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])
->name('newsletter.subscribe');

Route::get('/newsletter/unsubscribe/{token}', [NewsletterController::class, 'unsubscribe'])
->name('newsletter.unsubscribe');


//Route Ajout Membre 
Route::get('/admin/member', [MemberController::class, 'index'])->name('members.index');
Route::get('/admin/member/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/admin/member/store', [MemberController::class, 'store'])->name('members.store');
Route::get('/admin/member/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
Route::put('/admin/member/{member}', [MemberController::class, 'update'])->name('members.update');
Route::delete('/admin/member/{member}', [MemberController::class, 'delete'])->name('members.destroy');





