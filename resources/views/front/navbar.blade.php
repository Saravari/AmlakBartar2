<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header" style="padding-top:7px">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar"
                aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/" style="color:steelblue;">املاک برتر</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav" style="padding-top:7px">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">دسته ها<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li style="margin: 0;"><a>فروش<span class="flash"></span></a>
                            <ul class="submenu">
                                <li>
                                    <h4>
                                        <p>فروش مسکونی</p>
                                    </h4>
                                    <ul>
                                        <li><a class="sell">آپارتمان</a>
                                        <li><a class="sell">خانه و ویلا</a>
                                        <li><a class="sell">زمین و کلنگی</a>
                                    </ul>
                                </li>
                                <li>
                                    <h4>
                                        <p>فروش دفاتر اداری</p>
                                    </h4>
                                    <ul>
                                        <li><a class="sell">دفتر کار</a>
                                        <li><a class="sell">مغازه</a>
                                        <li><a class="sell">دفتر تجاری</a>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li style="margin: 0;"><a>اجاره <span class="flash"></span></a>
                            <ul class="submenu">
                                <li>
                                    <h4>
                                        <p>اجاره مسکونی</p>
                                    </h4>
                                    <ul>
                                        <li><a class="rent">آپارتمان</a>
                                        <li><a class="rent">خانه و ویلا</a>
                                    </ul>
                                </li>
                                <li>
                                    <h4>
                                        <p>اجاره دفاتر اداری</p>
                                    </h4>
                                    <ul>
                                        <li><a class="rent">دفتر کار</a>
                                        <li><a class="rent">مغازه</a>
                                        <li><a class="rent">دفتر تجاری</a>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
            </ul>
            <ul class="nav navbar-form">
                <li class="form-group" style="padding-top:7px">
                    <input type="text" id="search" name="search" class="form-control" placeholder="همه آگهی ها">
                </li>
                <ul class="navbar-left">
                    <li class="form-group">
                        <a href="#login" data-toggle="modal" class="btn-lg modal-open">ورود<i class="fa fa-sign-in"></i></a>
                    </li>
                    <li class="form-group">
                        <a href="#Advertising" data-toggle="modal" class="btn btn-info btn-lg modal-open"
                            style="color:blue;">ثبت آگهی</a>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
</nav>
<div id="mycard"></div>
<div class="modal fade" id="Advertising" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ورود به حساب کاربری</h4>
            </div>
            <div class="modal-body">
                <h4>قبل از ثبت آگهی، لطفاً وارد حساب خود شوید.</h4><br>
                <p>کد تأیید به این ایمیل فرستاده می‌شود.</p>

                <div class="form-group">
                    <input type="email" class="form-control" placeholder="ایمیل" id="email" name="email">
                    <div id="display" style="color:red;"></div>
                </div>
                <div class="row modal-footer">
                    <input type="button" id="send" class="btn btn-primary" value="ورود">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ورود به حساب کاربری</h4>
            </div>
            <div class="modal-body">
                <h4>برای ورود ایمیل خود را وارد کنید</h4><br />
                <p>کد تأیید به این ایمیل فرستاده می‌شود.</p>

                <div class="form-group">
                    <input type="email" class="form-control" placeholder="ایمیل" id="email" name="email">
                    <div id="display" style="color:red;"></div>
                </div>
                <div class="row modal-footer">
                    <input type="button" id="send" class="btn btn-primary" value="ورود">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="enterCode" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">وارد کردن کد تایید</h4>
            </div>
            <div class="modal-body">
                <p>کد تایید را وارد کنید</p>

                <div class="form-group">
                    <input type="code" class="form-control" placeholder="کد تایید" id="code" name="code">
                    <div id="display" style="color:red;"></div>
                </div>
                <div class="row modal-footer">
                    <button type="submit" id="send" class="btn btn-primary">تایید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="temp" value="">