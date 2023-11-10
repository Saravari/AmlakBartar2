$(document).ready(function(){
    $("#mysearch .thumbnail").click(function(e){
        $("#dropdown").css("display", "none");
        $("#search").css("display", "none"); 
        $(this).find("#formsubmit").submit();
        
    });
});