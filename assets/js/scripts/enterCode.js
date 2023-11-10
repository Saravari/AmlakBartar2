$(document).ready(function () {
  var modal = "#enterCode";
  $(modal)
    .find(".close")
    .click(function () {
      $(modal).find("#display").html("");
      $(modal).find("#code").val("");
    });
  $(modal)
    .find("#send")
    .click(function () {
      var code = $("#code").val();
      if (code == "") {
        $(modal).find("#display").html("لطفا کد را وارد کنید");
      } else {
        $.ajax({
          type: "POST",
          url: "/checkCode",
          data: { code: code },
          cache: false,
          success: function (result) {
            var temp = $("input#temp").val();
            if (result == "true" && temp == "#Advertising") {
              $(modal).modal("hide");
              window.location.href = "/melkRegister";
            } else if (result == "true" && temp == "#login") {
              $(modal).modal("hide");
              var tagA = $("a[href='#login']");
              $(tagA).html("خروج").css('color','red');
              $(tagA).attr('href','/logOut');
              $("a[href='#Advertising']").attr('href','/melkRegister');
              $(tagA).html("خروج").css('color','red');
            } else {
              $(modal).find("#display").html('کد وارد شده اشتباه است');
            }
          },
        });
      }
      return false;
    });
});
