<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{url('backend/img/profile_small.jpg')}}"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{Auth::user()->name}}</span>
                    </a>
                </div>
                <div class="logo-element">
                    Admin
                </div>
            </li>
            <li class="active">
                <a href="{{route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Manage User</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('add.user')}}"><i class="fa fa-plus"></i> Add User</a></li>
                    <li><a href="{{route('manage.user')}}"><i class="fa fa-th-large"></i> Users</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Manage Pages</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('manage.page')}}"><i class="fa fa-th-large"></i> Pages</a></li>
                    <li><a href="{{route('manage.additional.page')}}"><i class="fa fa-th-large"></i> Additional Pages</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Manage Slider</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('add.slider')}}"><i class="fa fa-plus"></i> Add Slider</a></li>
                    <li><a href="{{route('manage.slider')}}"><i class="fa fa-th-large"></i> Sliders</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Manage Product</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('manage.category')}}"><i class="fa fa-th-large"></i> Categories</a></li>
                    <li><a href="{{route('manage.sub.category')}}"><i class="fa fa-th-large"></i> Subcategories</a></li>
                    <li><a href="{{route('manage.variant')}}"><i class="fa fa-th-large"></i> Manage Variant</a></li>
                    <li><a href="{{route('manage.product')}}"><i class="fa fa-th-large"></i> Products</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Manage Social Media</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('add.social.media')}}"><i class="fa fa-plus"></i> Add Social Media</a></li>
                    <li><a href="{{route('manage.social.media')}}"><i class="fa fa-th-large"></i> Social Media</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Manage Media</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('add.media')}}"><i class="fa fa-plus"></i> Add Media</a></li>
                    <li><a href="{{route('manage.media')}}"><i class="fa fa-th-large"></i> Media</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Manage Testimonials</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('add.testimonial')}}"><i class="fa fa-plus"></i> Add Testimonial</a></li>
                    <li><a href="{{route('manage.testimonial')}}"><i class="fa fa-th-large"></i> Testimonials</a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('website.setting')}}"><i class="fa fa-user"></i> <span class="nav-label">Settings</span></a>
            </li>

        </ul>

    </div>
</nav>