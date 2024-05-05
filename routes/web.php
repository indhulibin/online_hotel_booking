<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminloginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminPageController;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\VideoController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\TermConditionController;
use App\Http\Controllers\Front\PrivacyPolicyController;
use App\Http\Controllers\Front\ContactController;



/* Front */

//HomeController
Route::get('/',[HomeController::class,'index'])->name('home');

//AboutController
Route::get('/about',[AboutController::class,'index'])->name('about');

//BlogController
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/blog/post/{id}',[BlogController::class,'singlePost'])->name('post');

//PhotoController
Route::get('/photo',[PhotoController::class,'index'])->name('photo');

//VideoController
Route::get('/video',[VideoController::class,'index'])->name('video');

//FaqController
Route::get('/faq',[FaqController::class,'index'])->name('faq');

//AboutController
Route::get('/about',[AboutController::class,'index'])->name('about');

//TermConditionController
Route::get('/terms_conditions',[TermConditionController::class,'index'])->name('term_condition');

//PrivacyPolicyController
Route::get('/privacy_policy',[PrivacyPolicyController::class,'index'])->name('privacy_policy');

//ContactController
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact/send_email',[ContactController::class,'send_email'])->name('contact_send_email');

/* Admin */

//AdminHomeController
Route::get('/admin/home',[AdminHomeController::class,'index'])->name('admin_home')->middleware('admin:admin');


//AdminLoginController
Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin_login');
Route::post('/admin/login/submit',[AdminLoginController::class,'loginSubmit'])->name('admin_login_submit');
Route::get('/admin/logout',[AdminLoginController::class,'logout'])->name('admin_logout');
Route::get('/admin/fogetpassword',[AdminLoginController::class,'forget_password'])->name('admin_forget_password');
Route::post('/admin/fogetpassword/submit',[AdminLoginController::class,'forget_password_submit'])->name            ('admin_forget_password_submit');
Route::get('/admin/reset-password/{token}/{email}',[AdminLoginController::class,'reset_password'])->name   ('reset_password');
Route::post('/admin/rest_password/submit',[AdminLoginController::class,'rest_password_submit'])->name            ('admin_reset_password_submit');


//AdminProfileContrller
Route::get('/admin/edit_profile',[AdminProfileController::class,'index'])->name('edit_profile')->middleware('admin:admin');
Route::post('/admin/edit_profile_submit',[AdminProfileController::class,'profile_submit'])->name('admin_profile_submit')->middleware('admin:admin');


// AdminSliderController
Route::get('/admin/slider/view',[AdminSliderController::class,'index'])->name('slide_view')->middleware('admin:admin');
Route::get('/admin/slider/add',[AdminSliderController::class,'add'])->name('slider_add')->middleware('admin:admin');
Route::post('/admin/slide/store',[AdminSliderController::class,'store'])->name('slide_store')->middleware('admin:admin');
Route::get('/admin/slider/edit/{id}',[AdminSliderController::class,'edit'])->name('slider_edit')->middleware('admin:admin');
Route::post('/admin/slide/update/{id}',[AdminSliderController::class,'update'])->name('slide_update')->middleware('admin:admin');
Route::get('/admin/slider/delete/{id}',[AdminSliderController::class,'delete'])->name('slider_delete')->middleware('admin:admin');


// AdminFeatureController
Route::get('/admin/feature/view',[AdminFeatureController::class,'index'])->name('feature_view')->middleware('admin:admin');
Route::get('/admin/feature/add',[AdminFeatureController::class,'add'])->name('feature_add')->middleware('admin:admin');
Route::post('/admin/feature/store',[AdminFeatureController::class,'store'])->name('feature_store')->middleware('admin:admin');
Route::get('/admin/feature/edit/{id}',[AdminFeatureController::class,'edit'])->name('feature_edit')->middleware('admin:admin');
Route::post('/admin/feature/update/{id}',[AdminFeatureController::class,'update'])->name('feature_update')->middleware('admin:admin');
Route::get('/admin/feature/delete/{id}',[AdminFeatureController::class,'delete'])->name('feature_delete')->middleware('admin:admin');


//AdminTestimonialController
Route::get('/admin/testmonial/view',[AdminTestimonialController::class,'index'])->name('testmonial_view')->middleware('admin:admin');
Route::get('/admin/testmonial/add',[AdminTestimonialController::class,'add'])->name('testmonial_add')->middleware('admin:admin');
Route::post('/admin/testmonial/store',[AdminTestimonialController::class,'store'])->name('testmonial_store')->middleware('admin:admin');
Route::get('/admin/testmonial/edit/{id}',[AdminTestimonialController::class,'edit'])->name('testmonial_edit')->middleware('admin:admin');
Route::post('/admin/testmonial/update/{id}',[AdminTestimonialController::class,'update'])->name('testmonial_update')->middleware('admin:admin');
Route::get('/admin/testmonial/delete/{id}',[AdminTestimonialController::class,'delete'])->name('testmonial_delete')->middleware('admin:admin');


//AdminPostController
Route::get('/admin/post/view',[AdminPostController::class,'index'])->name('post_view')->middleware('admin:admin');
Route::get('/admin/post/add',[AdminPostController::class,'add'])->name('post_add')->middleware('admin:admin');
Route::post('/admin/post/store',[AdminPostController::class,'store'])->name('post_store')->middleware('admin:admin');
Route::get('/admin/post/edit/{id}',[AdminPostController::class,'edit'])->name('post_edit')->middleware('admin:admin');
Route::post('/admin/post/update/{id}',[AdminPostController::class,'update'])->name('post_update')->middleware('admin:admin');
Route::get('/admin/post/delete/{id}',[AdminPostController::class,'delete'])->name('post_delete')->middleware('admin:admin');


//AdminPhotoController
Route::get('/admin/photo/view',[AdminPhotoController::class,'index'])->name('photo_view')->middleware('admin:admin');
Route::get('/admin/photo/add',[AdminPhotoController::class,'add'])->name('photo_add')->middleware('admin:admin');
Route::post('/admin/photo/store',[AdminPhotoController::class,'store'])->name('photo_store')->middleware('admin:admin');
Route::get('/admin/photo/edit/{id}',[AdminPhotoController::class,'edit'])->name('photo_edit')->middleware('admin:admin');
Route::post('/admin/photo/update/{id}',[AdminPhotoController::class,'update'])->name('photo_update')->middleware('admin:admin');
Route::get('/admin/photo/delete/{id}',[AdminPhotoController::class,'delete'])->name('photo_delete')->middleware('admin:admin');


//AdminVideoController
Route::get('/admin/video/view',[AdminVideoController::class,'index'])->name('video_view')->middleware('admin:admin');
Route::get('/admin/video/add',[AdminVideoController::class,'add'])->name('video_add')->middleware('admin:admin');
Route::post('/admin/video/store',[AdminVideoController::class,'store'])->name('video_store')->middleware('admin:admin');
Route::get('/admin/video/edit/{id}',[AdminVideoController::class,'edit'])->name('video_edit')->middleware('admin:admin');
Route::post('/admin/video/update/{id}',[AdminVideoController::class,'update'])->name('video_update')->middleware('admin:admin');
Route::get('/admin/video/delete/{id}',[AdminVideoController::class,'delete'])->name('video_delete')->middleware('admin:admin');



//AdminFaqController
Route::get('/admin/faq/view',[AdminFaqController::class,'index'])->name('faq_view')->middleware('admin:admin');
Route::get('/admin/faq/add',[AdminFaqController::class,'add'])->name('faq_add')->middleware('admin:admin');
Route::post('/admin/faq/store',[AdminFaqController::class,'store'])->name('faq_store')->middleware('admin:admin');
Route::get('/admin/faq/edit/{id}',[AdminFaqController::class,'edit'])->name('faq_edit')->middleware('admin:admin');
Route::post('/admin/faq/update/{id}',[AdminFaqController::class,'update'])->name('faq_update')->middleware('admin:admin');
Route::get('/admin/faq/delete/{id}',[AdminFaqController::class,'delete'])->name('faq_delete')->middleware('admin:admin');


//AdminPageController

//1.About
Route::get('/admin/page/about/edit',[AdminPageController::class,'about'])->name('about_edit')->middleware('admin:admin');
Route::post('/admin/page/about/update',[AdminPageController::class,'about_update'])->name('admin_page_about_update')->middleware('admin:admin');
//2.Terms and Conditions
Route::get('/admin/page/terms/edit',[AdminPageController::class,'terms'])->name('terms_edit')->middleware('admin:admin');
Route::post('/admin/page/terms/update',[AdminPageController::class,'terms_update'])->name('admin_page_terms_update')->middleware('admin:admin');
//3.Privacy Policy
Route::get('/admin/page/privacy/edit',[AdminPageController::class,'privacy'])->name('privacy_edit')->middleware('admin:admin');
Route::post('/admin/page/privacy/update',[AdminPageController::class,'privacy_update'])->name('admin_page_privacy_update')->middleware('admin:admin');
//4.Contact
Route::get('/admin/page/contact/edit',[AdminPageController::class,'contact'])->name('contact_edit')->middleware('admin:admin');
Route::post('/admin/page/contact/update',[AdminPageController::class,'contact_update'])->name('admin_page_contact_update')->middleware('admin:admin');
//5.Photo Gallery
Route::get('/admin/page/photo_gallery/edit',[AdminPageController::class,'photo_gallery'])->name('photo_gallery_edit')->middleware('admin:admin');
Route::post('/admin/page/photo_gallery/update',[AdminPageController::class,'photo_gallery_update'])->name('admin_page_photo_gallery_update')->middleware('admin:admin');
//5.Video Gallery
Route::get('/admin/page/video_gallery/edit',[AdminPageController::class,'video_gallery'])->name('video_gallery_edit')->middleware('admin:admin');
Route::post('/admin/page/video_gallery/update',[AdminPageController::class,'video_gallery_update'])->name('admin_page_video_gallery_update')->middleware('admin:admin');
//6.Faq
Route::get('/admin/page/faq/edit',[AdminPageController::class,'faq'])->name('faq_edit')->middleware('admin:admin');
Route::post('/admin/page/faq/update',[AdminPageController::class,'faq_update'])->name('admin_page_faq_update')->middleware('admin:admin');
//7.Blog
Route::get('/admin/page/blog/edit',[AdminPageController::class,'blog'])->name('blog_edit')->middleware('admin:admin');
Route::post('/admin/page/blog/update',[AdminPageController::class,'blog_update'])->name('admin_page_blog_update')->middleware('admin:admin');
