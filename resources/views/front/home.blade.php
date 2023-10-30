@extends('layouts.master')
@section('title')
{{ 'املاک برتر' }}
@endsection

@section('content')

@include('front.navbar')
<div id="mysearch" style="justify-content:center; margin-top:10px">
    <div class="form-group">
        @foreach($_SESSION['melks'] as $melk)
        <div class="col-xs-6 col-md-3">
            <dive class="thumbnail">
                @foreach($_SESSION['image'] as $image)
                @if($melk->id==$image->melk_id)
                <img src="assets/images/{{$image->image}}" width="400" height="250"><br>
                @break
                @endif
                @endforeach

                <h4>{{$melk->Address}}</h4>
                <h4>{{$melk->Meterage}}متر، {{$melk->Rooms}}خوابه</h4>
                <form action="{{ 'melkInformation' }}" method="POST">
                    <input type="hidden" name="id" value="{{$melk->id}}">
                    <input type="submit" class="alert-info" value="اطلاعات بیشتر">
                </form>
            </div>
        </div>
         @endforeach

    </div>

</div><br>

@endsection