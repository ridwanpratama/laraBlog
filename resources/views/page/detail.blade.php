<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $post->title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body>

    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="js-fullheight">
            <nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                </ul>
                @foreach ($tags as $item)
                    <ul>
                        <li><a href="fashion.html">{{ $item->tags }}</a></li>
                    </ul>
                @endforeach
            </nav>

        </aside> <!-- END COLORLIB-ASIDE -->
        <div id="colorlib-main">
            <section class="ftco-section ftco-no-pt ftco-no-pb">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-lg-8 px-md-5 py-5">
                            <div class="row pt-md-4">
                                <h1 class="mb-3">{{ $post->title }}</h1>
                                <p>{!! $post->content !!}</p>

                                <div class="tag-widget post-tag-container mb-5 mt-5">
                                    <div class="tagcloud">
                                        <a href="#" class="tag-cloud-link mt-4">{{ $post->tags->tags }}</a>
                                    </div>
                                </div>




                                <div class="pt-5 mt-5">
                                    <h4 class="mb-5 font-weight-bold">=================================</h3>

                                    <div id="disqus_thread"></div>

                                    <!-- END comment-list -->

                                </div>
                                
                            </div><!-- END-->
                        </div>
                        <div class="col-lg-4 sidebar ftco-animate bg-light pt-5">

                            <div class="sidebar-box ftco-animate">
                                <h3 class="sidebar-heading">Categories</h3>
                                @foreach ($tags as $item)
                                    <ul class="categories">
                                        <li><a href="#">{{ $item->tags }} <span>9</span></a></li>
                                    </ul>
                                @endforeach
                            </div>

                            <div class="sidebar-box ftco-animate">
                                <h3 class="sidebar-heading">Popular Articles</h3>
                                @foreach ($related_post as $item)
                                    <div class="block-21 mb-4 d-flex">
                                        <a href="/post/{{$item->slug}}" class="img img-2">
                                            <img class="blog-img mr-4" src="{{asset('image/'. $item->image)}}">
                                        </a>
                                        
                                        <div class="text">
                                            <h3 class="heading"><a href="#">{{ $item->title }}</a></h3>
                                            <div class="meta">
                                                <div><span class="icon-calendar">{{ $item->created_at->todatestring() }} </span>
                                                </div>
                                                <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>

                            <div class="sidebar-box ftco-animate">
                                <h3 class="sidebar-heading">Tag Cloud</h3>
                                @foreach ($tags as $item)
                                <ul class="tagcloud">
                                    <a href="#" class="tag-cloud-link" style="display: flex">{{ $item->tags }}</a>
                                </ul>
                                @endforeach
                            </div>

                        </div>
                    </div>



                </div><!-- END COL -->
        </div>
    </div>
    </section>
    </div><!-- END COLORLIB-MAIN -->
    </div><!-- END COLORLIB-PAGE -->

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="{{ asset('frontend/js/google-map.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://larablog-4upc3djqfe.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

</body>

</html>
