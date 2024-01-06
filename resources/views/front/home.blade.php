@extends('layouts.master')
@section('title')
{{ 'املاک برتر' }}
@endsection

@section('content')

<div id="mysearch" style="justify-content:center; margin-top:10px">
    <div class="form-group">
        @foreach($_SESSION['melks'] as $melk)
        <div class="col-xs-6 col-md-3">
            <div class='thumbnail'>
                @foreach($_SESSION['image'] as $image)
                @if($melk->id==$image->melk_id)
                <img src="assets/images/{{$image->image}}" style="width: 350px; height: 200px;">
                @break
                @endif
                @endforeach

                <h4>{{$melk->Address}}</h4>

                @if($melk->status == 'دفتر کار')
                <b>{{$melk->status}}:</b> {{$melk->Meterage}}متر، {{$melk->Rooms}} اتاق
                @endif
                @if($melk->status == 'مغازه' || $melk->status == 'تجاری')
                <b>{{$melk->status}}:</b> {{$melk->Meterage}} متری
                @endif
                @if($melk->status == 'آپارتمان' || $melk->status == 'خانه و ویلا' )
                <b>{{$melk->status}}:</b> {{$melk->Meterage}}متر، {{$melk->Rooms}} خوابه
                @endif
                <form id='formsubmit' action="{{ 'melkInformation' }}" method="POST">
                    <input type='hidden' name='id' value='{{$melk->id}}'>
                </form>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection