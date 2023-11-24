$(document).ready(function () {
  $(".modal-open").click(function () {
    var modal = $(this).attr("href");
    $(modal).animate(
      {
        top: "20%",
      },
      600
    );
    $(modal).find("input").keyup(function(){
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
            success: function (result) {
              if (result == "true") {
                $(modal).modal("hide");
                $("input#temp").val(modal);
                $("#enterCode").modal("show");
                $("#enterCode").animate(
                  {
                    top: "20%",
                  },
                  600
                );
              } else {
                $(modal).find("#display").html(result);
              }
            },
          });
        }
        return false;
      });
  });
});
