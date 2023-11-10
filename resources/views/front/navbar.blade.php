<nav class="navbar navbar-default" style="border-radius:5px; padding:0;">
    <div class="navbar-header">
        <a class="navbar-brand" href="/" style="color:blue;">املاک برتر</a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a data-toggle="dropdown" id="dropdown" href="#">دسته ها<span class="caret"></span></a>
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
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <div class="navbar-form" role="search">
                <div class="form-group">
                    <span><i class="fa fa-search"></i></span>
                    <input type="text" id="search" name="search" class="form-control" placeholder="همه آگهی ها">
                </div>
            </div>
        </ul>
        <ul class="nav navbar-nav navbar-left">
            <li class="nav navbar-nav form-group">
                    <a href="#login" data-toggle="modal" class="btn-lg modal-open">ورود<i class="fa fa-sign-in"></i></a>
            </li>
            <li class="nav navbar-nav">
                <a href="#Advertising" data-toggle="modal" class="btn alert-danger btn-lg modal-open"
                    style="color:blue; margin:0">ثبت آگهی</a>
            </li>
        </ul>
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
                <p>قبل از ثبت آگهی، لطفاً وارد حساب خود شوید.</p><br>
                <p>کد تأیید به این ایمیل فرستاده می‌شود.</p>

                <div class="row form-group">
                    <label class="col-xs-4 col-md-2" for="email">ایمیل:</label>
                    <input class="col-xs-8 col-md-9" type="email" class="form-control" placeholder="ایمیل" id="email"
                        name="email">
                </div>
                <div id="display" style="color:red;"></div>
                <div class="modal-footer">
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

                <div class="row form-group">
                    <label class="col-xs-4 col-md-2" for="email">ایمیل:</label>
                    <input class="col-xs-8 col-md-9" type="email" class="form-control" placeholder="ایمیل" id="email"
                        name="email">
                </div>
                <div id="display" style="color:red;"></div>
                <div class="modal-footer">
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

                <div class="row form-group">
                    <label class="col-xs-4 col-md-2" for="code">کد تایید:</label>
                    <input class="col-xs-8 col-md-9" type="code" class="form-control" placeholder="کد تایید" id="code"
                        name="code">
                </div>
                <div id="display" style="color:red;"></div>
                <div class="modal-footer">
                    <button type="submit" id="send" class="btn btn-primary">تایید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="temp" value="">