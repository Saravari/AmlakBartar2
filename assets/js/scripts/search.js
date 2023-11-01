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
          $("#mycard span").click(function () {
            var span_class = $(this).attr("class");
            if (span_class == "district") {
              data = $(this).html();
              $.ajax({
                type: "POST",
                url: "/districtSearch",
                data: { district: data },
                success: function (result) {
                  $("#mysearch").html(result);
                },
              });
            } else {
              var status = $(this).attr("id");
              var Sell_rent = $(this).attr("class");
              $.ajax({
                type: "POST",
                url: "/statusSearch",
                data: { status: status, Sell_rent: Sell_rent },
                success: function (result) {
                  if (result != "") {
                    $("#mysearch").html(result);
                  } else {
                    $("#mysearch").html("موردی یافت نشد!");
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
