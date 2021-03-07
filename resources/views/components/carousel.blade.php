<div class="container">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/web_security.jpg') }}" class="h-50 w-100 d-inline-block" alt="Web Security">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Web Security</h5>
                    <p>Learn more about how to be safer when using the internet and how to build safe applications</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/portfolio.jpg') }}" class="h-50 w-100 d-inline-block" alt="Portfolio">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Porfolio</h5>
                    <p>Some cool projects for your portfolio!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/coding.jpg') }}" class="h-50 w-100 d-inline-block" alt="Coding">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Coding</h5>
                    <p>Tips on how to build safer applications on the web</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>