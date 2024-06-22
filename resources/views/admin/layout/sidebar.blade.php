<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home')? 'active':'' }}"><a class="nav-link" href="{{ route('admin_home') }}"><i class="fa fa-hand-o-right"></i> <span>Dashboard</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/amenity/show')||
            Request::is('admin/room/view')
            ? 'active':'' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Hotel Section</span></a>
            <ul class="dropdown-menu">

                <li class="{{ Request::is('admin/amenity/show') ? 'active':'' }}"><a class="nav-link" href="{{ route('amenity_show') }}"><i class="fa fa-angle-right"></i>Amenities</a></li>  
                
                <li class="{{ Request::is('admin/room/view') ? 'active':'' }}"><a class="nav-link" href="{{ route('room_view') }}"><i class="fa fa-angle-right"></i>Rooms</a></li>    


            </ul>
        </li>

            <li class="nav-item dropdown {{ Request::is('admin/page/about/edit')|| 
                Request::is('admin/page/terms/edit')|| 
                Request::is('admin/page/privacy/edit')||
                Request::is('admin/page/contact/edit') ||
                Request::is('/admin/page/photo_gallery/edit')||
                Request::is('/admin/page/video_gallery/edit')||
                Request::is('/admin/page/faq/edit')||
                Request::is('/admin/page/blog/edit')||
                Request::is('/admin/page/cart/edit')||
                Request::is('/admin/page/checkout/edit')||
                Request::is('/admin/page/payment/edit')||
                Request::is('/admin/page/signup/edit')||
                Request::is('/admin/page/signin/edit')||
                Request::is('/admin/page/rooms/edit')
                ? 'active':'' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Pages</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::is('admin/page/about/edit') ? 'active':'' }}"><a class="nav-link" href="{{ route('about_edit') }}"><i class="fa fa-angle-right"></i> About</a></li>
                   
                    <li class="{{ Request::is('admin/page/terms/edit')? 'active':'' }}"><a class="nav-link" href="{{ route('terms_edit') }}"><i class="fa fa-angle-right"></i>Terms and Conditions</a></li>

                    <li class="{{ Request::is('admin/page/privacy/edit')? 'active':'' }}"><a class="nav-link" href="{{ route('privacy_edit') }}"><i class="fa fa-angle-right"></i>Privacy Policy</a></li>

                    <li class="{{ Request::is('admin/page/contact/edit')? 'active':'' }}"><a class="nav-link" href="{{ route('contact_edit') }}"><i class="fa fa-angle-right"></i>Contact</a></li>

                    <li class="{{ Request::is('/admin/page/photo_gallery/edit')? 'active':'' }}"><a class="nav-link" href="{{ route('photo_gallery_edit') }}"><i class="fa fa-angle-right"></i>Photo Gallery</a></li>

                    <li class="{{ Request::is('/admin/page/video_gallery/edit')? 'active':'' }}"><a class="nav-link" href="{{ route('video_gallery_edit') }}"><i class="fa fa-angle-right"></i>Video Gallery</a></li>

                    <li class="{{ Request::is('/admin/page/faq/edit')? 'active':'' }}"><a class="nav-link" href="{{ route('faq_edit') }}"><i class="fa fa-angle-right"></i>FAQ</a></li>

                    <li class="{{ Request::is('/admin/page/blog/edit')? 'active':'' }}"><a class="nav-link" href="{{ route('blog_edit') }}"><i class="fa fa-angle-right"></i>Blog</a></li>

                    <li class="{{ Request::is('/admin/page/cart/edit')? 'active':'' }}"><a class="nav-link" href="{{ route('cart_edit') }}"><i class="fa fa-angle-right"></i>Cart</a></li>

                    <li class="{{ Request::is('/admin/page/checkout/edit')? 'active':'' }}"><a class="nav-link" href="{{ route('checkout_edit') }}"><i class="fa fa-angle-right"></i>Checkout</a></li>

                    <li class="{{ Request::is('/admin/page/payment/edit')? 'active':'' }}"><a class="nav-link" href="{{ route('payment_edit') }}"><i class="fa fa-angle-right"></i>Payment</a></li>

                    <li class="{{ Request::is('/admin/page/signup/edit')? 'active':'' }}"><a class="nav-link" href="{{ route('signup_edit') }}"><i class="fa fa-angle-right"></i>SignUp</a></li>

                    <li class="{{ Request::is('/admin/page/signin/edit')? 'active':'' }}"><a class="nav-link" href="{{ route('signin_edit') }}"><i class="fa fa-angle-right"></i>SignIn</a></li>

                    <li class="{{ Request::is('/admin/page/rooms/edit')? 'active':'' }}"><a class="nav-link" href="{{ route('rooms_edit') }}"><i class="fa fa-angle-right"></i>Room</a></li>

                </ul>
            </li>

            <li class="{{ Request::is('/admin/customers/view')? 'active':'' }}"><a class="nav-link" href="{{ route('admin_customers') }}"><i class="fa fa-hand-o-right"></i> <span>Customers</span></a></li>

            <li class="{{ Request::is('admin/slider/view')? 'active':'' }}"><a class="nav-link" href="{{ route('slide_view') }}"><i class="fa fa-hand-o-right"></i> <span>Slide</span></a></li>
            
            <li class="{{ Request::is('admin/feature/view')? 'active':'' }}"><a class="nav-link" href="{{ route('feature_view') }}"><i class="fa fa-hand-o-right"></i> <span>Feature</span></a></li>
            
            <li class="{{ Request::is('admin/testmonial/view')? 'active':'' }}"><a class="nav-link" href="{{ route('testmonial_view') }}"><i class="fa fa-hand-o-right"></i> <span>Testmonial</span></a></li>
           
            <li class="{{ Request::is('admin/post/view')? 'active':'' }}"><a class="nav-link" href="{{ route('post_view') }}"><i class="fa fa-hand-o-right"></i> <span>Post</span></a></li>

            <li class="{{ Request::is('admin/photo/view')? 'active':'' }}"><a class="nav-link" href="{{ route('photo_view') }}"><i class="fa fa-hand-o-right"></i> <span>Photo</span></a></li>

            <li class="{{ Request::is('admin/video/view')? 'active':'' }}"><a class="nav-link" href="{{ route('video_view') }}"><i class="fa fa-hand-o-right"></i> <span>Video</span></a></li>

            <li class="{{ Request::is('admin/faq/view')? 'active':'' }}"><a class="nav-link" href="{{ route('faq_view') }}"><i class="fa fa-hand-o-right"></i> <span>FAQ</span></a></li>


        <li class="nav-item dropdown {{ Request::is('admin/subscriber/show')||
                                        Request::is('admin/subscriber/send_email')
            ? 'active':'' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Subscriber</span></a>
            <ul class="dropdown-menu">

                <li class="{{ Request::is('admin/subscriber/show') ? 'active':'' }}"><a class="nav-link" href="{{ route('subscriber_show') }}"><i class="fa fa-angle-right"></i> All Subscribers</a></li>  
                
                <li class="{{ Request::is('admin/subscriber/send_email') ? 'active':'' }}"><a class="nav-link" href="{{ route('send_mail_to_subscriber') }}"><i class="fa fa-angle-right"></i>Send Mail</a></li>  

            </ul>
        </li>

           <!-- <li class=""><a class="nav-link" href="setting.html"><i class="fa fa-hand-o-right"></i> <span>Setting</span></a></li>

            <li class=""><a class="nav-link" href="form.html"><i class="fa fa-hand-o-right"></i> <span>Form</span></a></li>

            <li class=""><a class="nav-link" href="table.html"><i class="fa fa-hand-o-right"></i> <span>Table</span></a></li>

            <li class=""><a class="nav-link" href="invoice.html"><i class="fa fa-hand-o-right"></i> <span>Invoice</span></a></li>-->

        </ul>
    </aside>
</div>