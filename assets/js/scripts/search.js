$(document).ready(function () {
  $(document).click(function(){
    $("#mycard").css("display", "none");
    $("#search").val('');
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
              $(this).css({ color: "blue"});
            },
            function () {
              $(this).css("color", "black");
            }
          );
          $("#mycard").click(function () {
            var district = $("#mycard span").html();
            if(district==$("#mycard input").val()){
              $.ajax({
                type: "POST",
                url: "/districtSearch",
                data: { district: district },
                success: function (result) {
                  $("#mysearch").html(result);
                },
              });
            }else{
              var Sell_rent = $("#mycard #Sell_rent").val();
              var status = $("#mycard #status").val();
              $.ajax({
                type: "POST",
                url: "/statusSearch",
                data: { Sell_rent: Sell_rent , status: status },
                success: function (result) {
                  if(result!=''){
                    $("#mysearch").html(result);
                  }else{
                    $("#mysearch").html('موردی یافت نشد!');
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
