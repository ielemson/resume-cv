<header>
    <div class="header-content">

        <!--Mobile Header-->
        <div class="header-mobile">
            <a class="header-toggle"><i class="fas fa-bars"></i></a>
            <h2>Elemson Ifeanyi</h2>
        </div>

        <!--Main Header-->
        <div class="header-main" data-simplebar>
            <div class="image-container">
                <h2 class="header-name">Elemson Ifeanyi</h2>
                <img src="/resume/img/profile-img.jpg" alt="profile-pic">
            </div>

            <!--Nav Menus-->
            <nav class="nav-menu">
                <ul>
                    <li><a href="#home" class="pt-link active"><span class="nav-menu-icon"><i class="lnr lnr-home"></i></span>Home </a> </li>
                    <li><a href="#about" class="pt-link"><span class="nav-menu-icon"><i class="lnr lnr-user"></i></span>About Me</a></li>
                    <li><a href="#resume" class="pt-link"><span class="nav-menu-icon"><i class="lnr lnr-license"></i></span>Resume</a></li>
                    <li><a href="#portfolio" class="pt-link"><span class="nav-menu-icon"><i class="lnr lnr-briefcase"></i></span>Portfolio</a></li>
                    {{-- <li><a href="#blog" class="pt-link"><span class="nav-menu-icon"><i class="lnr lnr-book"></i></span>Account</a></li> --}}
                    <li><a href="#contact" class="pt-link"><span class="nav-menu-icon"><i class="lnr lnr-envelope"></i></span>Contact</a></li>
                  
                    @auth
                    <li><a href="{{ route('home') }}" class="pt-link"><span class="nav-menu-icon"><i class="lnr lnr-user"></i></span> {{ Auth::user()->name }}</a></li>  
                    <li><a href="{{ route('logout') }}" id="logoutLink" class="pt-link"><span class="nav-menu-icon"><i class="lnr lnr-exit"></i></span>Log Out</a></li>  
  
                    <form id="account-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                    @else
                    <li><a href="{{route('login')}}" class="pt-link"><span class="nav-menu-icon"><i class="lnr lnr-lock"></i></span>Account</a></li>
                    @endauth
                    
                </ul>
            </nav>

            <!--Nav Footer-->
            <div class="nav-footer">
                <!--Social Links-->
                <ul class="social">
                    <li><a href="https://web.facebook.com/ielemson" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="https://twitter.com/IAM_SOFTBONE" target="_blank" class="fab fa-twitter-square"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/ielemson/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                    {{-- <li><a href="#"><i class="fab fa-dribbble-square"></i></a></li> --}}
                    {{-- <li><a href="#"><i class="fab fa-behance-square"></i></a></li> --}}
                </ul>
                <!--Copyright Text-->
                <div class="copy">
                    <p>ielemson {{Date('Y')}} &copy;<br>All Right Reserved.</p>
                </div>
            </div>

        </div>
    </div>
</header>

@once
@push('custom-scripts')
<script>
    $(document).ready(function(){
      $("#logoutLink").on('click',function(e){
          e.preventDefault();
         $("#account-logout-form").submit()
      })
    });
</script>
@endpush
@endonce