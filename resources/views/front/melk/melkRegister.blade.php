@extends('layouts.master')
@section('title')
{{ 'املاک برتر' }}
@endsection

@section('content')
@include('front.nav')
<section style="display:flex; margin-top:10px; justify-content:center;">
    @include('front.error')
    @include('front.message')
</section>
<div style="display:flex; justify-content:center; margin-top:10px;">
    <div class="form col-xs-8 col-sm-10" style="background-color:DarkGray; border-radius: 5px;">
        <h4>
            <p style="text-align:center;">ثبت ملک جدید</p>
        </h4>

        <form action="{{ 'melkStore' }}" method="POST" enctype="multipart/form-data">
            <div class="form col-xs-8 col-sm-6" style="background-color:DarkGray ;">

                <div class="form-group">
                    <h4>
                        <input type="radio" class="Sell_rent" name="Sell_rent" value="فروش" checked> فروش
                        <input type="radio" class="Sell_rent" name="Sell_rent" value="اجاره"> اجاره
                    </h4>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="مالک" name="owner"
                        value="{{ $_SESSION['owner'] }}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="شماره همراه" name="phone"
                        value="{{ $_SESSION['phone']}}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="آدرس" name="Address"
                        value="{{ $_SESSION['Address']}}">
                </div>
                <div class="form-group">
                    <select name="district" class="form-control">
                        @if($_SESSION['district'])
                        <option value="{{$_SESSION['district']}}">{{$_SESSION['district']}}</option>
                        @endif
                        <option value="انتخاب منطقه">-- انتخاب منطقه --</option>
                        <option value="افسریه">افسریه</option> 
                        <option value="الهیه">الهیه</option>
                        <option value="بهشتی">بهشتی</option>
                        <option value="پاسداران">پاسداران</option>
                        <option value="بهشتی">بهشتی</option>
                        <option value="پیروزی">پیروزی</option>
                        <option value="تجریش">تجریش</option>
                        <option value="سهروردی">سهروردی</option>
                        <option value="شهر ری">شهر ری</option>
                        <option value="صادقیه">صادقیه</option>
                        <option value="کهریزک">کهریزک</option>
                        <option value="منیریه">منیریه</option>
                        <option value="میرداماد">میرداماد</option>
                    </select>
                </div>

                <div class="form-group">
                    <select name="status" class="form-control">
                        @if($_SESSION['status'])
                        <option value="{{$_SESSION['status']}}">{{$_SESSION['status']}}</option>
                        @else
                        <option value="آپارتمان">-- آپارتمان --</option>
                        @endif
                        <option value="آپارتمان">آپارتمان</option>
                        <option value="خانه و ویلا">خانه و ویلا</option>
                        <option value="زمین و کلنگی">زمین و کلنگی</option>
                        <option value="دفتر کار">دفتر کار</option>
                        <option value="مغازه">مغازه</option>
                        <option value="تجاری">تجاری</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="سال ساخت" name="Construction"
                        value="{{ $_SESSION['Construction']}}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="متراژ" name="Meterage"
                        value="{{ $_SESSION['Meterage']}}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="تعداد اتاق" name="Rooms"
                        value="{{ $_SESSION['Rooms']}}">
                </div>

                <div class="form-group">
                    <select name="Direction" class="form-control">
                        @if($_SESSION['Direction'])
                        <option value="{{$_SESSION['Direction']}}">{{$_SESSION['Direction']}}</option>
                        @else
                        <option value="شمالی">-- شمالی --</option>
                        @endif
                        <option value="شمالی">شمالی</option>
                        <option value="جنوبی">جنوبی</option>
                        <option value="شرقی">شرقی</option>
                        <option value="غربی">غربی</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="تعداد طبقات" name="Floors"
                        value="{{ $_SESSION['Floors']}}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="تعداد واحد در طبقه" name="units"
                        value="{{ $_SESSION['units']}}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="طبقه چندم" name="Floor"
                        value="{{ $_SESSION['Floor']}}">
                </div>
            </div>

            <div class="form col-xs-8 col-sm-6" style="background-color:DarkGray;"><br /><br />

                <div class="form-group">
                <h4>
                        <input type="checkbox" name="Elevator" value="1"> آسانسور 
                        <input type="checkbox" name="Parking" value="1"> پارکینگ 
                </h4>
                </div>

                <div class="row form-group">
                    <textarea type="text" class="form-control" name="description" placeholder="توضیحات" cols="30"
                        rows="5"></textarea>
                </div>

                <div class="row form-group">
                    <p style="text-align:center;">افزودن تصاویر ملک</p>
                    <input type="file" name="images[]" class="form-control" multiple>
                </div>

                <div class="row form-group">

                    <div style="text-align:center;">
                        <h4>
                            <p>تعیین موقعیت ملک روی نقشه</p>
                        </h4>
                        <p>در نقطه مورد نظر دابل کلیک کنید</p>
                    </div>
                    <input type="hidden" id="lat" name="lat">
                    <input type="hidden" id="lng" name="lng">
                    <div id="map" style="height: 166px;"></div>
                </div><br>

                <div class="form-group" style="text-align:center;">
                    <button type="submit" name="submit" class="btn btn-primary"> ثبت ملک </button>

                </div>
            </div>

        </form>
    </div>

</div>
@endsection