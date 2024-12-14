 <!--==========================
        TOPBAR PART START
    ===========================-->
 <section id="wsus__topbar">
     <div class="container">
         <div class="row">
             <div class="col-xl-6 col-md-7 d-none d-md-block">
                 <ul class="wsus__topbar_left">
                     <li><a href="mailto:support@websolutionus.com"><i class="fal fa-envelope"></i>
                             support@websolutionus.com</a></li>
                     <li><a href="callto:+6958474522655"><i class="fal fa-phone-alt"></i>+6958474522655</a></li>
                 </ul>
             </div>
             @if(!Auth::check())
             <div class="col-xl-6 col-md-6">
                 <div class="row">
                     <div class="col">
                         <div class="wsus__topbar_right">
                             <a href="{{route('user.login')}}"><i class="fas fa-user"></i> Login</a>
                             <a href="{{route('user.register')}}"><i class="fas fa-user"></i> Register</a>
                         </div>
                         <div class="wsus__topbar_right">
                         </div>
                     </div>
                 </div>
             </div>
             @else
             <div class="col-xl-6 col-md-6">
                 <div class="row">
                     <div class="col">
                         <div class="wsus__topbar_right">
                             <a href="{{route('user.dashboard')}}"><i class="fas fa-user"></i></a>
                         </div>
                         <div class="wsus__topbar_right">
                         </div>
                     </div>
                 </div>
             </div>
             @endif
         </div>
     </div>
 </section>
 <!--==========================
        TOPBAR PART END
    ===========================-->


 <!--==========================
        MENU PART START
    ===========================-->
 <nav class="navbar navbar-expand-lg main_menu">
     <div class="container">
         <a class="navbar-brand" href="index.html">
             <img src="images/logo.png" alt="DB.Card">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <i class="far fa-bars"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <!-- <a class="btn btn-primary" href="">hiii</a> -->
             <ul class="navbar-nav m-auto">
                 <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="{{route('frontend.index')}}">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="about.html">about</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="listing_grid_view.html">listing</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="pricing.html">pricing</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">pages <i class="far fa-chevron-down"></i></a>
                     <ul class="menu_droapdown">
                         <li><a href="list_category.html">list category</a></li>
                         <li><a href="{{route('user.listing.packages')}}">Packages</a></li>
                         <li><a href="listing_details.html">listing details</a></li>
                         <li><a href="dsahboard.html">dashboard</a></li>
                         <li><a href="agent_public_profile.html">agent profile</a></li>
                         <li><a href="payment_page.html">Payment Page</a></li>
                         <li><a href="privacy_policy.html">Privacy Policy</a></li>
                         <li><a href="terms_conditions.html">Terms Conditions</a></li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="blog.html">blog</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="contact.html">contact us</a>
                 </li>
             </ul>
             <a class="user_btn" href="dsahboard.html"><i class="far fa-plus"></i> add listing</a>
         </div>
     </div>
 </nav>
 <!--==========================
        MENU PART END
    ===========================-->