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
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminCustomerController;


use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\VideoController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\TermConditionController;
use App\Http\Controllers\Front\PrivacyPolicyController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\SubscriberController;
use App\Http\Controllers\Front\RoomController;
use App\Http\Controllers\Front\BookingController;

use App\Http\Controllers\Customer\CustomerHomeController;
use App\Http\Controllers\Customer\CustomerloginController;
use App\Http\Controllers\Customer\CustomerProfileContrller;
use App\Http\Controllers\Customer\CustomerOrderContrller;

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

//SubscriberController
Route::post('/subscriber/send_email',[SubscriberController::class,'send_email'])->name('subceriber_send_email');
Route::get('/subscriber/verify/{email}/{token}',[SubscriberController::class,'verify'])->name('subceriber_verify');


//RoomController
Route::get('/allroom',[RoomController::class,'index'])->name('allrooms');
Route::get('/room/{id}',[RoomController::class,'singleroom'])->name('room');

//BookingController
Route::post('/booking/submit',[BookingController::class,'booking_submit'])->name('cart_submit');
Route::get('/cart',[BookingController::class,'cart_view'])->name('cart_view');
Route::get('/cart/item/delete/{id}',[BookingController::class,'cart_delete'])->name('cart_delete');
Route::get('/checkout',[BookingController::class,'check_out'])->name('checkout');
Route::post('/payment',[BookingController::class,'payment'])->name('paymentDetails');
Route::post('/paypal/{price}',[BookingController::class,'paypal'])->name('paypal');
Route::get('/success',[BookingController::class,'success'])->name('success');
Route::get('/cancel',[BookingController::class,'cancel'])->name('cancel');
Route::post('/payment/stripe/{price}',[BookingController::class,'stripe'])->name('stripe');

/* Customer */

//CustomerloginController
Route::get('/login',[CustomerloginController::class,'index'])->name('customer_login');
Route::post('/login/submit',[CustomerloginController::class,'loginSubmit'])->name('customer_login_submit');
Route::get('/logout',[CustomerloginController::class,'logout'])->name('customer_logout');
Route::get('/signup',[CustomerloginController::class,'signup'])->name('customer_signup');
Route::post('/signup/submit',[CustomerloginController::class,'signupSubmit'])->name('customer_signup_submit');
Route::get('/signup/verify/{email}/{token}',[CustomerloginController::class,'verify'])->name('customer_verify');
Route::get('/fogetpassword',[CustomerloginController::class,'forget_password'])->name('customer_forget_password');
Route::post('/fogetpassword/submit',[CustomerloginController::class,'forget_password_submit'])->name            ('customer_forget_password_submit');
Route::get('/reset-password/{token}/{email}',[CustomerloginController::class,'reset_password'])->name   ('reset_password');
Route::post('/rest_password/submit',[CustomerloginController::class,'rest_password_submit'])->name            ('customer_reset_password_submit');


Route::group(['middleware' =>['customer:customer']],function () {

    //CustomerHomeController
    Route::get('/customer/home',[CustomerHomeController::class,'index'])->name('customer_home'); 

    //CustomerProfileContrller
    Route::get('/customer/edit_profile',[CustomerProfileContrller::class,'index'])->name('customer_edit_profile');
    Route::post('/customer/edit_profile_submit',[CustomerProfileContrller::class,'profile_submit'])->name('customer_profile_submit');

    //CustomerOrderContrller
    Route::get('/customer/order/view',[CustomerOrderContrller::class,'index'])->name('customer_order_view');
    Route::get('/customer/invoice/{id}',[CustomerOrderContrller::class,'invoice'])->name('customer_invoice');


});

/* Admin */

//AdminLoginController
Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin_login');
Route::post('/admin/login/submit',[AdminLoginController::class,'loginSubmit'])->name('admin_login_submit');
Route::get('/admin/logout',[AdminLoginController::class,'logout'])->name('admin_logout');
Route::get('/admin/fogetpassword',[AdminLoginController::class,'forget_password'])->name('admin_forget_password');
Route::post('/admin/fogetpassword/submit',[AdminLoginController::class,'forget_password_submit'])->name            ('admin_forget_password_submit');
Route::get('/admin/reset-password/{token}/{email}',[AdminLoginController::class,'reset_password'])->name   ('reset_password');
Route::post('/admin/rest_password/submit',[AdminLoginController::class,'rest_password_submit'])->name            ('admin_reset_password_submit');

Route::group(['middleware' =>['admin:admin']],function () {
    
    //AdminHomeController
    Route::get('/admin/home',[AdminHomeController::class,'index'])->name('admin_home');     
    
    //AdminProfileContrller
    Route::get('/admin/edit_profile',[AdminProfileController::class,'index'])->name('edit_profile');
    Route::post('/admin/edit_profile_submit',[AdminProfileController::class,'profile_submit'])->name('admin_profile_submit');


    // AdminSliderController
    Route::get('/admin/slider/view',[AdminSliderController::class,'index'])->name('slide_view');
    Route::get('/admin/slider/add',[AdminSliderController::class,'add'])->name('slider_add');
    Route::post('/admin/slide/store',[AdminSliderController::class,'store'])->name('slide_store');
    Route::get('/admin/slider/edit/{id}',[AdminSliderController::class,'edit'])->name('slider_edit');
    Route::post('/admin/slide/update/{id}',[AdminSliderController::class,'update'])->name('slide_update');
    Route::get('/admin/slider/delete/{id}',[AdminSliderController::class,'delete'])->name('slider_delete');


    // AdminFeatureController
    Route::get('/admin/feature/view',[AdminFeatureController::class,'index'])->name('feature_view');
    Route::get('/admin/feature/add',[AdminFeatureController::class,'add'])->name('feature_add');
    Route::post('/admin/feature/store',[AdminFeatureController::class,'store'])->name('feature_store');
    Route::get('/admin/feature/edit/{id}',[AdminFeatureController::class,'edit'])->name('feature_edit');
    Route::post('/admin/feature/update/{id}',[AdminFeatureController::class,'update'])->name('feature_update');
    Route::get('/admin/feature/delete/{id}',[AdminFeatureController::class,'delete'])->name('feature_delete');


    //AdminTestimonialController
    Route::get('/admin/testmonial/view',[AdminTestimonialController::class,'index'])->name('testmonial_view');
    Route::get('/admin/testmonial/add',[AdminTestimonialController::class,'add'])->name('testmonial_add');
    Route::post('/admin/testmonial/store',[AdminTestimonialController::class,'store'])->name('testmonial_store');
    Route::get('/admin/testmonial/edit/{id}',[AdminTestimonialController::class,'edit'])->name('testmonial_edit');
    Route::post('/admin/testmonial/update/{id}',[AdminTestimonialController::class,'update'])->name('testmonial_update');
    Route::get('/admin/testmonial/delete/{id}',[AdminTestimonialController::class,'delete'])->name('testmonial_delete');


    //AdminPostController
    Route::get('/admin/post/view',[AdminPostController::class,'index'])->name('post_view');
    Route::get('/admin/post/add',[AdminPostController::class,'add'])->name('post_add');
    Route::post('/admin/post/store',[AdminPostController::class,'store'])->name('post_store');
    Route::get('/admin/post/edit/{id}',[AdminPostController::class,'edit'])->name('post_edit');
    Route::post('/admin/post/update/{id}',[AdminPostController::class,'update'])->name('post_update');
    Route::get('/admin/post/delete/{id}',[AdminPostController::class,'delete'])->name('post_delete');


    //AdminPhotoController
    Route::get('/admin/photo/view',[AdminPhotoController::class,'index'])->name('photo_view');
    Route::get('/admin/photo/add',[AdminPhotoController::class,'add'])->name('photo_add');
    Route::post('/admin/photo/store',[AdminPhotoController::class,'store'])->name('photo_store');
    Route::get('/admin/photo/edit/{id}',[AdminPhotoController::class,'edit'])->name('photo_edit');
    Route::post('/admin/photo/update/{id}',[AdminPhotoController::class,'update'])->name('photo_update');
    Route::get('/admin/photo/delete/{id}',[AdminPhotoController::class,'delete'])->name('photo_delete');


    //AdminVideoController
    Route::get('/admin/video/view',[AdminVideoController::class,'index'])->name('video_view');
    Route::get('/admin/video/add',[AdminVideoController::class,'add'])->name('video_add');
    Route::post('/admin/video/store',[AdminVideoController::class,'store'])->name('video_store');
    Route::get('/admin/video/edit/{id}',[AdminVideoController::class,'edit'])->name('video_edit');
    Route::post('/admin/video/update/{id}',[AdminVideoController::class,'update'])->name('video_update');
    Route::get('/admin/video/delete/{id}',[AdminVideoController::class,'delete'])->name('video_delete');



    //AdminFaqController
    Route::get('/admin/faq/view',[AdminFaqController::class,'index'])->name('faq_view');
    Route::get('/admin/faq/add',[AdminFaqController::class,'add'])->name('faq_add');
    Route::post('/admin/faq/store',[AdminFaqController::class,'store'])->name('faq_store');
    Route::get('/admin/faq/edit/{id}',[AdminFaqController::class,'edit'])->name('faq_edit');
    Route::post('/admin/faq/update/{id}',[AdminFaqController::class,'update'])->name('faq_update');
    Route::get('/admin/faq/delete/{id}',[AdminFaqController::class,'delete'])->name('faq_delete');


    //AdminPageController

    //1.About
    Route::get('/admin/page/about/edit',[AdminPageController::class,'about'])->name('about_edit');
    Route::post('/admin/page/about/update',[AdminPageController::class,'about_update'])->name('admin_page_about_update');
    //2.Terms and Conditions
    Route::get('/admin/page/terms/edit',[AdminPageController::class,'terms'])->name('terms_edit');
    Route::post('/admin/page/terms/update',[AdminPageController::class,'terms_update'])->name('admin_page_terms_update');
    //3.Privacy Policy
    Route::get('/admin/page/privacy/edit',[AdminPageController::class,'privacy'])->name('privacy_edit');
    Route::post('/admin/page/privacy/update',[AdminPageController::class,'privacy_update'])->name('admin_page_privacy_update');
    //4.Contact
    Route::get('/admin/page/contact/edit',[AdminPageController::class,'contact'])->name('contact_edit');
    Route::post('/admin/page/contact/update',[AdminPageController::class,'contact_update'])->name('admin_page_contact_update');
    //5.Photo Gallery
    Route::get('/admin/page/photo_gallery/edit',[AdminPageController::class,'photo_gallery'])->name('photo_gallery_edit');
    Route::post('/admin/page/photo_gallery/update',[AdminPageController::class,'photo_gallery_update'])->name('admin_page_photo_gallery_update');
    //5.Video Gallery
    Route::get('/admin/page/video_gallery/edit',[AdminPageController::class,'video_gallery'])->name('video_gallery_edit');
    Route::post('/admin/page/video_gallery/update',[AdminPageController::class,'video_gallery_update'])->name('admin_page_video_gallery_update');
    //6.Faq
    Route::get('/admin/page/faq/edit',[AdminPageController::class,'faq'])->name('faq_edit');
    Route::post('/admin/page/faq/update',[AdminPageController::class,'faq_update'])->name('admin_page_faq_update');
    //7.Blog
    Route::get('/admin/page/blog/edit',[AdminPageController::class,'blog'])->name('blog_edit');
    Route::post('/admin/page/blog/update',[AdminPageController::class,'blog_update'])->name('admin_page_blog_update');
    //8 Cart
    Route::get('/admin/page/cart/edit',[AdminPageController::class,'cart'])->name('cart_edit');
    Route::post('/admin/page/cart/update',[AdminPageController::class,'cart_update'])->name('admin_page_cart_update');
    //9 Checkout
    Route::get('/admin/page/checkout/edit',[AdminPageController::class,'checkout'])->name('checkout_edit');
    Route::post('/admin/page/checkout/update',[AdminPageController::class,'checkout_update'])->name('admin_page_checkout_update');
    //10 Payment
    Route::get('/admin/page/payment/edit',[AdminPageController::class,'payment'])->name('payment_edit');
    Route::post('/admin/page/payment/update',[AdminPageController::class,'payment_update'])->name('admin_page_payment_update');
    //11 Signup
    Route::get('/admin/page/signup/edit',[AdminPageController::class,'signup'])->name('signup_edit');
    Route::post('/admin/page/signup/update',[AdminPageController::class,'signup_update'])->name('admin_page_signup_update');
    //12 Signin
    Route::get('/admin/page/signin/edit',[AdminPageController::class,'signin'])->name('signin_edit');
    Route::post('/admin/page/signin/update',[AdminPageController::class,'signin_update'])->name('admin_page_signin_update');
    //13 Room
    Route::get('/admin/page/rooms/edit',[AdminPageController::class,'rooms'])->name('rooms_edit');
    Route::post('/admin/page/rooms/update',[AdminPageController::class,'rooms_update'])->name('admin_page_rooms_update');

    //AdminSubscriberController
    Route::get('admin/subscriber/show',[AdminSubscriberController::class,'index'])->name('subscriber_show');
    Route::get('admin/subscriber/send_email',[AdminSubscriberController::class,'send_mail'])->name('send_mail_to_subscriber');
    Route::post('admin/subscriber/send_email/submit',[AdminSubscriberController::class,'send_mail_submision'])->name('mail_to_subsribers_submit');



    //AdminAmenityController
    Route::get('admin/amenities/show',[AdminAmenityController::class,'index'])->name('amenity_show');
    Route::get('admin/amenities/add',[AdminAmenityController::class,'add'])->name('amenity_add');
    Route::post('/admin/amenities/store',[AdminAmenityController::class,'store'])->name('amenity_store');
    Route::get('/admin/amenities/edit/{id}',[AdminAmenityController::class,'edit'])->name('amenity_edit');
    Route::post('/admin/amenities/update/{id}',[AdminAmenityController::class,'update'])->name('amenity_update');
    Route::get('/admin/amenities/delete/{id}',[AdminAmenityController::class,'delete'])->name('amenity_delete');



    //AdminRoomController
    Route::get('admin/room/view',[AdminRoomController::class,'index'])->name('room_view');
    Route::get('admin/room/add',[AdminRoomController::class,'add'])->name('room_add');
    Route::post('admin/room/store',[AdminRoomController::class,'store'])->name('room_store');
    Route::get('admin/room/edit/{id}',[AdminRoomController::class,'edit'])->name('room_edit');
    Route::post('/admin/room/update/{id}',[AdminRoomController::class,'update'])->name('room_update');
    Route::get('admin/room/delete/{id}',[AdminRoomController::class,'delete'])->name('room_delete');

    Route::get('admin/room/photo/gallery/{id}',[AdminRoomController::class,'add_gallery'])->name('add_room_photo_gallery');
    Route::post('admin/room/photo/gallery/store/{id}',[AdminRoomController::class,'store_gallery'])->name('room_photo_store');
    Route::get('admin/room/photo/galery/delete/{id}',[AdminRoomController::class,'delete_gallery'])->name('room_photo_delete');


    //AdminCustomerController
    Route::get('/admin/customers/view',[AdminCustomerController::class,'index'])->name('admin_customers');
    Route::get('/admin/customers/status/change/{id}',[AdminCustomerController::class,'statusChange'])->name('customer_status_change');
});
