$(document).ready(function () {
  $(".dropdown-menu a").css("cursor", "pointer");
  $("#dropdown").click(function () {
    $("#mycard").css('display','none');
    $("#search").val('');
  });
  $(".dropdown-menu li").hover(
    function () {
      $(this).find(".submenu").slideDown("2000");
    },
    function () {
      $(this).find(".submenu").slideUp("2000");
    }
  );
  $(".submenu li a").click(function(){
    var status = $(this).html();
    $class = $(this).attr('class');
    if($class=='sell'){
      var Sell_rent = 'فروش';
    }else{
      Sell_rent = 'اجاره';
    }
    $.ajax({
      type: "POST",
      url: "/statusSearch",
      data: { status: status , Sell_rent: Sell_rent },
      success: function (result) {
        if(result!=''){
          $("#mysearch").html(result);
        }else{
          $("#mysearch").html('<div class = "alert alert-danger">موردی یافت نشد!</div>');
        }
      },
    });
  });
});

