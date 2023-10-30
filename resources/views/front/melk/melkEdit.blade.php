@extends('layouts.master')
@section('title')
    {{ 'املاک برتر' }}
@endsection

@section('content')
@include('users.navbar')
<section  style="display:flex; margin-top:50px; justify-content:center;">
        @include('users.error')
        @include('users.message')
</section>
    <div style="display:flex; justify-content:center; margin-top:10px;">
        <div class="form col-xs-8 col-sm-10" style="background-color:DarkGray; border-radius: 5px;">
            <h4>
                <p style="text-align:center;">ویرایش ملک</p>
            </h4><br>

            <form name="melkEdit" action="{{ 'melkUpdate' }}" method="POST" enctype="multipart/form-data">
                <div class="form col-xs-8 col-sm-5" style="background-color:DarkGray ;">
                   
                    <div class="form-group">
                    مالک: <input type="text" class="form-control" placeholder="مالک" name="owner"
                            value="{{ $_SESSION['owner'] }}">
                    </div>

                    <div class="form-group">
                    شماره همراه: <input type="text" class="form-control" placeholder="شماره همراه" name="phone"
                            value="{{ $_SESSION['phone']}}">
                    </div>

                    <div class="form-group">
                    آدرس: <input type="text" class="form-control" placeholder="آدرس" name="Address"
                            value="{{ $_SESSION['Address']}}">
                    </div>

                    <div class="form-group">
                    سال ساخت: <input type="text" class="form-control" placeholder="سال ساخت" name="Construction"
                            value="{{ $_SESSION['Construction']}}">
                    </div>

                    <div class="form-group">
                    متراژ: <input type="text" class="form-control" placeholder="متراژ" name="Meterage"
                            value="{{ $_SESSION['Meterage']}}">
                    </div>

                    <div class="form-group">
                        <select name="Direction" class="form-control">
                            <option value="شمالی">-- شمالی --</option>
                            <option value="جنوبی">جنوبی</option>
                            <option value="شرقی">شرقی</option>
                            <option value="غربی">غربی</option>
                        </select>
                    </div>

                    <div class="form-group">
                    تعداد طبقات: <input type="text" class="form-control" placeholder="تعداد طبقات" name="Floors"
                            value="{{ $_SESSION['Floors']}}">
                    </div>

                    <div class="form-group">
                    واحد در طبقه: <input type="text" class="form-control" placeholder="تعداد واحد در طبقه" name="units"
                            value="{{ $_SESSION['units']}}">
                    </div>

                    <div class="form-group">
                    طبقه: <input type="text" class="form-control" placeholder="طبقه چندم" name="Floor"
                            value="{{ $_SESSION['Floor']}}">
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="Elevator" value="1"> آسانسور <br>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="Parking" value="1"> پارکینگ
                    </div>

                    <div class="form-group">
                        <input type="radio" name="Sell_rent" value="فروش" checked> فروش
                        <input type="radio" name="Sell_rent" value="اجاره"> اجاره
                    </div>
                </div>

                <div class="form col-xs-8 col-sm-7" style="background-color:DarkGray;"><br>

                    <div class="row form-group">
                        <textarea type="text" class="form-control" name="description" placeholder="توضیحات" cols="30" rows="5"></textarea>
                    </div>

                    <div class="row form-group">
                        <p style="text-align:center;">افزودن تصاویر ملک</p>
                        <input type="file" name="image" class="form-control"><br>
                            @if($images)                        
                               
                                @foreach($images as $image)
                                    <div class="col-sm-3 thumbnail">
                                        <img src="assets/images/{{$image->image}}" width="150" height="90">
                                    </div>
                                @endforeach
                            @endif
                    </div>

                    <div class="row form-group">

                        <div style="text-align:center;">
                            <h4>
                                <p>موقعیت ملک روی نقشه</p>
                            </h4>
                        </div>
                            <input type="hidden" id="location" name="location" value="{{ $_SESSION['location']}}">
                            <div id="map" style="height: 166px;"></div>
                            <script src="assets/js/script2.js"></script>                            
                            
                        </div><br>

                    <div class="form-group" style="text-align:center;">
                        <button type="submit" name="submit" class="btn btn-primary"> ثبت </button>

                    </div>
                </div>

            </form>
        </div>

    </div>   
@endsection
