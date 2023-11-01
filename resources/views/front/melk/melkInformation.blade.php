@extends('layouts.master')
@section('title')
{{ 'املاک برتر' }}
@endsection

@section('content')
@include('front.navbar')

<div style="display:flex; justify-content:center; margin-top:50px;">
    <div class="form col-xs-8 col-sm-8" style="background-color:DarkGray; border-radius: 5px;">
        @foreach($_SESSION['melk'] as $melk)
        <div class="form col-xs-2 col-sm-4" style="background-color:DarkGray;">
            <h4 style="color:blue;">مورد: {{$melk->Sell_rent}}</h4>
            <h4>{{$melk->Address}}</h4>
            <h4>{{$melk->Meterage}}متر {{$melk->Rooms}} خوابه</h4>
            <h4>سال ساخت: {{$melk->Construction}}
            </h4>
            <h4>جهت: {{$melk->Direction}}
            </h4>
            <h4>تعداد طبقات: {{$melk->Floors}}
            </h4>
            <h4>تعداد واحد در طبقه: {{$melk->units}}
            </h4>
            <h4>طبقه: {{$melk->Floor}}
            </h4>
            @if($melk->Elevator)
            <h4>آسانسور دارد</h4>
            @else
            <h4>آسانسور ندارد</h4>
            @endif
            @if($melk->Parking)
            <h4>پارکینگ دارد</h4>
            @else
            <h4>پارکینگ ندارد</h4>
            @endif
        </div>
        @endforeach

        <div class="form col-xs-8 col-sm-6" style="background-color:DarkGray;">
            @foreach($_SESSION['image'] as $image)
            @if($image->image)
            <!-- Carousel container -->
            <div id="my-pics" class="carousel slide" data-ride="carousel"
                style="width:350px; height:170px; margin:20px;">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#my-pics" data-slide-to="0" class="active"></li>
                    <li data-target="#my-pics" data-slide-to="1"></li>
                    <li data-target="#my-pics" data-slide-to="2"></li>
                    <li data-target="#my-pics" data-slide-to="3"></li>

                </ol>

                <!-- Content -->
                <div class="carousel-inner" role="listbox">
                    @foreach($_SESSION['image'] as $image)
                    <div class="item active">
                        <img src="assets/images/{{$image->image}}" width="400" height="250">
                    </div>
                    @break
                    @endforeach

                    @foreach($_SESSION['image'] as $image)
                    <div class="item">
                        <img src="assets/images/{{$image->image}}" width="400" height="250">
                    </div>
                    @endforeach

                </div>

                <!-- Previous/Next controls -->
                <a class="left carousel-control" href="#my-pics" role="button" data-slide="prev">
                    <span class="icon-prev" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#my-pics" role="button" data-slide="next">
                    <span class="icon-next" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                @endif
                @break
                @endforeach

            </div>
        </div>
    </div>
</div>
<section style=" display:flex; justify-content:center; margin:auto; border-radius: 5px;">
    <div class="form-group col-sm-6">
        <h4>
            <p style="text-align:center;">موقعیت ملک روی نقشه</p>
        </h4>
        <input type="hidden" id="lat" name="lat" value="{{$_SESSION['lat']}}">
        <input type="hidden" id="lng" name="lng" value="{{$_SESSION['lng']}}">
        <div id="mylocation" style="height: 166px;"></div>
    </div>
</section>

@endsection