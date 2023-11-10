$(document).ready(function () {
  $(document).click(function () {
    $("#mycard").css("display", "none");
    $("#search").val("");
  });
  $("#search").keyup(function () {
    $("#mycard").css("display", "inline");
    var search = $(this).val();
    if (search != "") {
      $.ajax({
        type: "POST",
        url: "/search",
        data: { search: search },
        success: function (result) {
          $("#mycard").html(result).css("cursor", "pointer");
          $("#mycard span").hover(
            function () {
              $(this).css({ color: "blue" });
            },
            function () {
              $(this).css("color", "black");
            }
          );
          $("#mycard p").click(function () {
            var span_class = $(this).find('span').attr("class");
            if (span_class == "district") {
              var district = $(this).find('span').attr("district");
              var status = $(this).find('span').attr("id");
              var Sell_rent = $(this).find('span').attr("name");
              $.ajax({
                type: "POST",
                url: "/districtSearch",
                data: { status: status, Sell_rent: Sell_rent, district: district},
                success: function (result) {
                  $("#mysearch").html(result).css("cursor", "pointer");
                },
              });
            } else {
              var status = $(this).find('span').attr("id");
              var Sell_rent = $(this).find('span').attr("class");
              $.ajax({
                type: "POST",
                url: "/statusSearch",
                data: { status: status, Sell_rent: Sell_rent },
                success: function (result) {
                  if (result != "") {
                    $("#mysearch").html(result).css("cursor", "pointer");
                  } else {
                    $("#mysearch").html('<div class = "alert alert-danger">موردی یافت نشد!</div>');
                  }
                },
              });
            }
          });
        },
      });
    } else {
      $("#mycard").css("display", "none");
    }
  });
});
