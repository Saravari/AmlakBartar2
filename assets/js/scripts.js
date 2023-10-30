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
          $.ajax({
            type: "POST",
            url: "/login",
            data: { email: email },
            cache: false,
            success: function (result) {
              if (result == "true") {
                $(modal).modal("hide");
                $("#enterCode").modal("show");
                $("#enterCode").animate(
                  {
                    top: "20%",
                  },
                  600
                );
              }else {
                $(modal).find("#display").html(result);
              }
            },
          });
        }
        return false;
      });
  });
});

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
            if (result == "true") {
              $("#enterCode").modal("hide");
              
              window.location.href = "/melk";

            } else {
              $(modal).find("#display").html(result);
            }
          },
        });
      }
      return false;
    });
});

$(document).ready(function () {
  $(".dropdown-menu li").css("cursor", "pointer");
  $(".dropdown-menu li").hover(
    function () {
      $(this).find(".submenu").slideDown("2000");
      $(this).find(".submenu").css("cursor", "pointer");
    },
    function () {
      $(this).find(".submenu").slideUp("2000");
    }
  );
});

var map = L.map("map").setView([35.69, 51.38], 10);
L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution:
    '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

map.on("dblclick", function (e) {
  var marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
  document.getElementById("lat").value = e.latlng.lat;
  document.getElementById("lng").value = e.latlng.lng;
});
