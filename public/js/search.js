 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"

$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input",function(){
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("Models/home.php",{term: inputVal}).done(function(data){
                resultDropdown.html(data);
            });
        }else{
            resultDropdown.empty();
        }
    });
    $(document).on("click",".result p",function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });    
});
