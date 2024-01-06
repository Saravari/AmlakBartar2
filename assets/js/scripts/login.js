$(document).ready(function () {
  $(".modal-open").click(function () {
    var modal = $(this).attr("href");
    $(modal).animate(
      {
        top: "20%",
      },
      600
    );
    $(modal)
      .find("input")
      .keyup(function () {
        $(modal).find("#display").html("");
      });
    $(modal)
      .find(".close")
      .click(function () {
        $(modal).find("#display").html("");
        $(modal).find("#email").val("");
      });
    $(modal)
      .find("#send")
      .click(function () {
        var email = $(modal).find("#email").val();
        if (email == "") {
          $(modal).find("#display").html("لطفا ایمیل را وارد کنید");
        } else {
          $(modal).find("#display").html("");
          $.ajax({
            type: "POST",
            url: "/login",
            data: { email: email },
            cache: false,
            success: function (response) {
              var jsonData = JSON.parse(response);
              if (jsonData.result == true) {
                $(modal).modal("hide");
                $("input#temp").val(modal);
                $("#enterCode").modal("show");
                $("#enterCode")
                  .find("#display")
                  .html(jsonData.msg)
                  .css("color", "blue");
                $("#enterCode").animate(
                  {
                    top: "20%",
                  },
                  600
                );
              } else if (jsonData.result == false) {
                $(modal).find("#display").html(jsonData.msg);
              } else {
                $(modal).find("#display").html(jsonData.msg);
              }
            },
          });
        }
        return false;
      });
  });
});
