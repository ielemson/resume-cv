<section id="portfolio" class="portfolio-section pt-page">
    <div class="section-container">

        <!--Page Heading-->
        <div class="page-heading">
            <span class="icon"><i class="lnr lnr-briefcase"></i></span>
            <h2>Portfolio.</h2>
        </div>

        <div class="row">
            <!--Portfolio Filter-->

            <div class="subheading mx-auto">
                <h3>Here are my portfolio catalogues.</h3>
            </div>


            <div class="col-md-12 portfolio-filter text-center">
                <ul>
                    <li class="active" data-filter="*">All</li>
                     @foreach ($categories as $category)
                    <li data-filter=".{{$category->name}}">{{$category->name}}</li>
                    @endforeach 
                </ul>
            </div>
        </div>

        <!--Portfolio Items-->
        <div class="row portfolio-items mb-50">

            @foreach ($categories as $category)
          
            @foreach ($category->portfolios as $portfolio)
                    <!--Portfolio Item-->
              <div class="item col-lg-4 col-sm-6 {{$category->name}}">
                <a class="ajax-link" data-id="{{$portfolio->id}}" href="{{url('portfolio/show/'.$portfolio->id)}}">
                    <figure>
                        <img src="{{$portfolio->img}}" alt="">
                        <figcaption>
                            <h4>{{$category->name}}</h4>
                            <p>{{$portfolio->name}}</p>
                        </figcaption>
                    </figure>
                </a>
            </div>
            @endforeach

            @endforeach 

          

        </div>
    </div>
</section>