$(document).ready(function(){
    
    $(".product_check").click(function(){
        var action = 'data';
        var brand = get_filter_text('brand');
        
        $.ajax({
           url: 'action.php',
           method: 'POST',
           data: {action:action,brand:brand},
           success:function(response){
               $("#result").html(response);
               $("#textChange").text("Filtered Products");
           }
        });
    });
    
    function get_filter_text(text_id){
        var filterData = [];
        $('#'+text_id+':checked').each(function(){
           filterData.push($(this).val()); 
        });
        return filterData;
    } 
});