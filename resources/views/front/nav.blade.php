<nav class="navbar navbar-default" style="border-radius:5px;">
        <div class="navbar-header">
        <a class="navbar-brand" href="/" style="color:blue;">املاک برتر</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                    <li>
                        <button class="btn btn-danger btn-sm" onclick="location.href='{{'logOut'}}'; ">خروج</button>
                    </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a data-toggle="dropdown" href="#">کارهای ملکی<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{'melk'}}">ثبت ملک جدید</a></li>
                            <li><a href="{{'melkList'}}" >ویرایش ملک</a></li>
                        </ul>
                </li>
                <li class="col-sx-2"><a href="{{'profile'}}">ویرایش پروفایل</a></li>
            </ul>
        </div>
</nav>