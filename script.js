var n = 0

$(document).ready(function(){

$("#offense").click(function(){
$("#offensive").show();
    $("#defensive").hide();
    $("#kicking").hide();
   });

    $("#defense").click(function(){
$("#defensive").show();
        $("#kicking").hide();
        $("#offensive").hide();
});
    
        $("#kicker").click(function(){
$("#kicking").show();
             $("#offensive").hide();
            $("#defensive").hide();
            
});
    
});