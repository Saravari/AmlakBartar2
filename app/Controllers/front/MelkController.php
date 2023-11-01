<?php

namespace App\Controllers\front;

use Rakit\Validation\Validator;
use App\Models\Melk;
use App\Models\Image;

class MelkController extends HomeController
{
    public function showInformation()
    {

        $id = trim($_POST['id']);
        $_SESSION['melk'] = Melk::where('id', $id)->get();
        foreach($_SESSION['melk'] as $melk) {
            $_SESSION['lat'] = $melk->lat;
            $_SESSION['lng'] = $melk->lng;
        }
        $_SESSION['image'] = Image::where('melk_id', $id)->get();
        $this->render('front/melk/melkInformation');
    }

    public function melkRegister()
    {
        $_SESSION['error'] = 0;
        $_SESSION['message'] = 0;
        $_SESSION['owner'] = '';
        $_SESSION['phone'] = '';
        $_SESSION['Address'] = '';
        $_SESSION['Construction'] = '';
        $_SESSION['Meterage'] = '';
        $_SESSION['Rooms'] = '';
        $_SESSION['Direction'] = '';
        $_SESSION['Floors'] = '';
        $_SESSION['units'] = '';
        $_SESSION['Floor'] = '';

        $this->render('front/melk/melkRegister');
    }

    public function Search()
    {

        $search = trim($_POST['search']);

        $melks = Melk::orwhere('Sell_rent', 'LIKE', "{$search}%")->groupBy('status')->get();

        foreach($melks as $melk) {
            $count = Melk::where('Sell_rent', $melk->Sell_rent)->count();
            echo
            "
                        <hr />
                        <p><span id='$melk->status' class='$melk->Sell_rent'>$melk->Sell_rent&nbsp$melk->status</span><b style='opacity: 0.5; float: left;'>$count آگهی</b></p>
                        ";
        }

        $melks = Melk::where('status', 'LIKE', "{$search}%")->groupBy('Sell_rent')->get();
        
        foreach($melks as $melk) {
            $count = Melk::where('Sell_rent', $melk->Sell_rent)->count();
            echo
            "
                        <hr />
                        <p><span id='$melk->status' class='$melk->Sell_rent'>$melk->Sell_rent&nbsp$melk->status</span><b style='opacity: 0.5; float: left;'>$count آگهی</b></p>
                        ";
        }

        $melks = Melk::where('district', 'LIKE', "{$search}%")->groupBy('district')->get();
        foreach($melks as $melk) {
            $count = Melk::where('district', $melk->district)->count();
            echo
            "
                        <input type='hidden' class='district' value='$melk->district'>
                        <hr />
                        <p><span class='district'>$melk->district</span><b style='opacity: 0.5; float: left;'>$count آگهی</b></p>
                        ";
        }
    }

    public function districtSearch()
    {

        $district = trim($_POST['district']);
        $melks = Melk::all()->where('district', $district);
        foreach($melks as $melk) {
            $melk_id = $melk->id;
            $image = Image::firstWhere('melk_id', $melk_id);
            if($image){
                echo "
                <div class='form-group'>
                    <div class='col-xs-6 col-md-3'>
                        <dive class='thumbnail'>
                            <img src='assets/images/$image->image' width='400' height='250'><br>
                            <h4>$melk->Address</h4>
                            <h4>$melk->Meterage متر-$melk->Rooms خوابه</h4>
                            <form action='melkInformation' method='POST'>
                                <input type='hidden' name='id' value= $melk->id>
                                <input type='submit' class='alert-info' value='اطلاعات بیشتر'>
                            </form>
                        </div>
                    </div>
                </div>
                ";            
            }else{
                echo "
                <div class='form-group'>
                    <div class='col-xs-6 col-md-3'>
                        <dive class='thumbnail'>
                            <h4>$melk->Address</h4>
                            <h4>$melk->Meterage متر-$melk->Rooms خوابه</h4>
                            <form action='melkInformation' method='POST'>
                                <input type='hidden' name='id' value= $melk->id>
                                <input type='submit' class='alert-info' value='اطلاعات بیشتر'>
                            </form>
                        </div>
                    </div>
                </div>
                ";            
            }
        }
    }

    public function statusSearch()
    {

        $Sell_rent = trim($_POST['Sell_rent']);
        $status = trim($_POST['status']);
        $melks = Melk::where([
            'status' => $status,
            'Sell_rent' => $Sell_rent,
            ])->get();

            foreach($melks as $melk) {
                $melk_id = $melk->id;
                $image = Image::firstWhere('melk_id', $melk_id);
            if($image){
                    echo "
                    <div class='form-group'>
                        <div class='col-xs-6 col-md-3'>
                            <dive class='thumbnail'>
                                <img src='assets/images/$image->image' width='400' height='250'><br>
                                <h4>$melk->Address</h4>
                                <h4>$melk->Meterage متر-$melk->Rooms خوابه</h4>
                                <form action='melkInformation' method='POST'>
                                    <input type='hidden' name='id' value= $melk->id>
                                    <input type='submit' class='alert-info' value='اطلاعات بیشتر'>
                                </form>
                            </div>
                        </div>
                    </div>
                    ";            
                }else{
                    echo "
                    <div class='form-group'>
                        <div class='col-xs-6 col-md-3'>
                            <dive class='thumbnail'>
                                <h4>$melk->Address</h4>
                                <h4>$melk->Meterage متر-$melk->Rooms خوابه</h4>
                                <form action='melkInformation' method='POST'>
                                    <input type='hidden' name='id' value= $melk->id>
                                    <input type='submit' class='alert-info' value='اطلاعات بیشتر'>
                                </form>
                            </div>
                        </div>
                    </div>
                    ";            
                }
            }
    }

    public function store()
    {

        $_SESSION['error'] = 0;
        $_SESSION['message'] = 0;
        $_SESSION['owner'] =  trim($_POST['owner']);
        $_SESSION['phone'] =  trim($_POST['phone']);
        $_SESSION['Address'] =  trim($_POST['Address']);
        $_SESSION['district'] =  trim($_POST['district']);
        $_SESSION['status'] =  trim($_POST['status']);
        $_SESSION['Construction'] =  trim($_POST['Construction']);
        $_SESSION['Meterage'] =  trim($_POST['Meterage']);
        $_SESSION['Rooms'] =  trim($_POST['Rooms']);
        $_SESSION['Direction'] =  trim($_POST['Direction']);
        $_SESSION['Floors'] =  trim($_POST['Floors']);
        $_SESSION['units'] =  trim($_POST['units']);
        $_SESSION['Floor'] =  trim($_POST['Floor']);
        $_SESSION['Sell_rent'] =  trim($_POST['Sell_rent']);
        $_SESSION['Elevator'] =  trim($_POST['Elevator']);
        $_SESSION['Parking'] =  trim($_POST['Parking']);

        $validator = new Validator();
        $validation = $validator->validate($_POST + $_FILES, [
            'phone' => 'numeric'
        ]);
        if ($validation->fails()) {
            $errors = $validation->errors();
            $_SESSION['error'] = $errors->firstOfAll();
            $this->render('front/melk/melkRegister');
            exit;
        }

        if (
            !empty($_POST['owner'])
            && !empty($_POST['phone'])
            && !empty($_POST['Address'])
            && !empty($_POST['Construction'])
            && !empty($_POST['Meterage'])
            && !empty($_POST['Rooms'])
            && !empty($_POST['Floors'])
            && !empty($_POST['units'])
            && !empty($_POST['Floor'])) {

            $owner = trim($_POST['owner']);
            $_SESSION['name'] = $owner;
            $phone = trim($_POST['phone']);
            $Address = trim($_POST['Address']);
            $district = trim($_POST['district']);
            $Construction = trim($_POST['Construction']);
            $Meterage = trim($_POST['Meterage']);
            $Rooms = trim($_POST['Rooms']);
            $Direction = trim($_POST['Direction']);
            $Floors = trim($_POST['Floors']);
            $units = trim($_POST['units']);
            $Floor = trim($_POST['Floor']);
            $status = trim($_POST['status']);
            if (!empty($_POST['Elevator'])) {
                $Elevator = trim($_POST['Elevator']);
            } else {
                $Elevator = "";
            }
            if (!empty($_POST['Parking'])) {
                $Parking = trim($_POST['Parking']);
            } else {
                $Parking = "";
            }
            $Sell_rent = trim($_POST['Sell_rent']);
            if (!empty($_POST['description'])) {
                $description = trim($_POST['description']);
            } else {
                $description = "";
            }
            if (!empty($_POST['lat'])) {
                $lat = trim($_POST['lat']);
            } else {
                $lat = "";
            }
            if (!empty($_POST['lng'])) {
                $lng = trim($_POST['lng']);
            } else {
                $lng = "";
            }

            $melks = Melk::firstWhere([
                ['Address', $Address],
                ['owner', $_SESSION['name']]
                ]);
            if($melks) {
                $_SESSION['error'] = ' ملک  ' . $Address . '  قبلا ثبت شده است';
                $this->render('front/melk/melkRegister');
            } else {
                Melk::insert([
                    'owner' => $owner,
                    'phone' => $phone,
                    'Address' => $Address,
                    'district' => $district,
                    'Construction' => $Construction,
                    'Meterage' => $Meterage,
                    'Rooms' => $Rooms,
                    'Direction' => $Direction,
                    'Floors' => $Floors,
                    'units' => $units,
                    'Floor' => $Floor,
                    'status' => $status,
                    'Elevator' => $Elevator,
                    'Parking' => $Parking,
                    'description' => $description,
                    'Sell_rent' => $Sell_rent,
                    'lat' => $lat,
                    'lng' => $lng,
                ]);
                if (!empty(array_filter($_FILES['images']['name']))) {
                    $melks = Melk::where('Address', $Address)->get();
                    foreach($melks as $melk) {
                        $melk_id = $melk->id;
                    }
                    foreach($_FILES['images']['name'] as $id => $val) {

                        $imageName = $_FILES['images']['name'][$id];
                        $imageType = $_FILES['images']['type'][$id];
                        $tmp_name = $_FILES['images']['tmp_name'][$id];
                        $dir = 'assets/images/';
                        $offset = 0;
                        while ($strpos = strpos($imageName, '.', $offset)) {
                            $offset = $strpos + 1;
                            $extension = strtolower(substr($imageName, $offset));
                        }
                        if (($extension == 'jpg' || $extension == 'jpeg') && $imageType == 'image/jpeg') {
                            if (move_uploaded_file($tmp_name, $dir . $imageName)) {
                                Image::insert([
                                    'melk_id' => $melk_id,
                                    'image' => $imageName,
                                ]);
                                $_SESSION['message'] = 'ملک شما با موفقیت ثبت شد';
                                $this->render('front/melk/melkRegister');
                            }
                        } else {
                            $_SESSION['error'] = 'تصویر باید از نوع jpg/jpeg باشد';
                            $this->render('front/melk/melkRegister');
                        }
                    }
                } else {
                    $_SESSION['message'] = 'ملک شما با موفقیت ثبت شد';
                    $this->render('front/melk/melkRegister');
                }
            }
        } else {
            $_SESSION['error'] = 'لطفا فیلدهای خالی را وارد کنید';
            $this->render('front/melk/melkRegister');
        }
    }

    public function melkList()
    {
        $melks = melk::firstWhere('owner', $_SESSION['name']);
        if($melks) {
            $melks = melk::where('owner', $_SESSION['name'])->get();
            $this->render('users/melkList', compact('melks'));
        } else {
            $_SESSION['error'] = "هیچ ملکی برای شما ثبت نشده است";
            $this->render('users/amlakbartar');
        }
    }

    public function melkEdit()
    {
        $Address = $_POST['Address'];
        $melks = melk::where([
            ['Address', $Address],
            ['owner', $_SESSION['name']]
            ])->get();
        foreach($melks as $melk) {
            $_SESSION['error'] = 0;
            $_SESSION['message'] = 0;
            $melk_id = $melk->id;
            $_SESSION['owner'] =  $melk->owner;
            $_SESSION['phone'] =  $melk->phone;
            $_SESSION['Address'] =  $melk->Address;
            $_SESSION['Construction'] =  $melk->Construction;
            $_SESSION['Meterage'] =  $melk->Meterage;
            $_SESSION['Direction'] =  $melk->Direction;
            $_SESSION['Floors'] =  $melk->Floors;
            $_SESSION['units'] =  $melk->units;
            $_SESSION['Floor'] =  $melk->Floor;
            $_SESSION['Elevator'] =  $melk->Elevator;
            $_SESSION['Parking'] =  $melk->Parking;
            $_SESSION['Sell_rent'] =  $melk->Sell_rent;
            $_SESSION['location'] =  $melk->Location;

        }
        $images = Image::where('melk_id', $melk_id)->get();

        $this->render('users/melkEdit', compact('images'));
    }

    public function melkUpdate()
    {

        if (
            !empty($_POST['owner'])
            && !empty($_POST['phone'])
            && !empty($_POST['Address'])
            && !empty($_POST['Construction'])
            && !empty($_POST['Meterage'])
            && !empty($_POST['Floors'])
            && !empty($_POST['units'])
            && !empty($_POST['Floor'])) {


            $owner = trim($_POST['owner']);
            $phone = trim($_POST['phone']);
            $Address = trim($_POST['Address']);
            $Construction = trim($_POST['Construction']);
            $Meterage = trim($_POST['Meterage']);
            $Direction = trim($_POST['Direction']);
            $Floors = trim($_POST['Floors']);
            $units = trim($_POST['units']);
            $Floor = trim($_POST['Floor']);
            if (!empty($_POST['Elevator'])) {
                $Elevator = trim($_POST['Elevator']);
            } else {
                $Elevator = "";
            }
            if (!empty($_POST['Parking'])) {
                $Parking = trim($_POST['Parking']);
            } else {
                $Parking = "";
            }
            $Sell_rent = trim($_POST['Sell_rent']);
            if (!empty($_POST['description'])) {
                $description = trim($_POST['description']);
            } else {
                $description = "";
            }
            if (!empty($_POST['location'])) {
                $location = trim($_POST['location']);
            } else {
                $location = "";
            }

            Melk::where('owner', $_SESSION['name'])->update([
                'owner' => $owner,
                'phone' => $phone,
                'Address' => $Address,
                'Construction' => $Construction,
                'Meterage' => $Meterage,
                'Direction' => $Direction,
                'Floors' => $Floors,
                'units' => $units,
                'Floor' => $Floor,
                'Elevator' => $Elevator,
                'Parking' => $Parking,
                'description' => $description,
                'Sell_rent' => $Sell_rent,
                'location' => $location
            ]);
            $_SESSION['message'] = 'ویرایش ملک با موفقیت ثبت شد';
            $this->render('users/melkEdit');
        } else {
            $_SESSION['error'] = 'لطفا فیلدهای خالی را وارد کنید';
            $this->render('users/melkEdit');
        }

    }

    public function comments()
    {
        $db = new DataBase();
        $row = $db->select("SELECT * FROM users WHERE id='" . $_SESSION['user_id'] . "'");
        $name = $row['name'];
        $email = $row['email'];
        $error = 0;
        $errors = 0;
        $message = 0;

        $this->render('users/comments', compact('errors', 'error', 'message', 'name', 'email'));
    }

    public function commentStore()
    {
        if(!empty($_POST['message'])) {
            $description = $_POST['message'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $error = 0;
            $errors = 0;

            $db = new DataBase();
            if($db->insert("INSERT  INTO comments VALUES ('','" . $_SESSION['user_id'] . "','$name','$email','$description')")) {
                $message = 'پیام شما با موفقیت ارسال شد';
                $this->render('users/comments', compact('errors', 'error', 'message', 'name', 'email'));
            }

        } else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $error = 'لطفا پیشنهاد خود را بنویسید';
            $errors = 0;
            $message = 0;
            $this->render('users/comments', compact('errors', 'error', 'message', 'name', 'email'));
        }


    }
}