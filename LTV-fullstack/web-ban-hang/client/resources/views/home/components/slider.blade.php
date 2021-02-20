<section id="slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i = 0; $i < count($sliders); $i++)
                            <li data-target="#slider-carousel" data-slide-to="{{ $i }}"
                                class="{{ $i == 0 ? 'active' : '' }}"></li>
                        @endfor
                    </ol>

                    <div class="carousel-inner">
                        @foreach($sliders as $index=>$slider)
                            <div class="item {{ $index === 0 ? 'active' : '' }}">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>{{ $slider->name }}</h2>
                                    <p>{{ $slider->description }}</p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ env('BACKEND_URL') . $slider->image_path }}"
                                         class="girl img-responsive" alt=""/>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
