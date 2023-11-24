$(document).ready(function () {
  var modal = "#enterCode";
  $(modal)
    .find(".close")
    .click(function () {
      $(modal).find("#display").html("");
      $(modal).find("#code").val("");
    });
    $(modal).find("input").keyup(function(){
      $(modal).find("#display").html("");
    });
  $(modal)
    .find("#send")
    .click(function () {
      var code = $("#code").val();
      if (code == "") {
        $(modal).find("#display").html("لطفا کد را وارد کنید");
      } else {
        $(modal).find("#display").html("");
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
            } else {
              $(modal).find("#display").html('کد وارد شده اشتباه است');
            }
          },
        });
      }
      return false;
    });
});
