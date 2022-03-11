<section id="blog" class="blog-section pt-page">
    <div class="section-container">

        <!--Page Heading-->
        <div class="page-heading">
            <span class="icon"><i class="lnr lnr-lock"></i></span>
            <h2>My Account.</h2>
        </div>
        <div class="row ">
            <div class="col-lg-8  offset-lg-2">
                <div class="subheading">
                    <h3>Account Login</h3>
                </div>

                <!--Form Start-->
                <div class="card fat">
                    <div class="card-body">
                        {{-- <h4 class="card-title">Login</h4> --}}
                        <form method="POST" class="my-login-validation" novalidate="">
                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                <div class="invalid-feedback">
                                    Email is invalid
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password
                                    
                                </label>
                                <input id="password" type="password" class="form-control" name="password" required data-eye>
                                <div class="invalid-feedback">
                                    Password is required
                                </div>
                            </div>

                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
                            </div>
                           
                        </form>
                    </div>
                </div>
                <!--Form End-->

            </div>
        </div>
    </div>
</section>