$(document).ready(function(){

    // bg option
    $("select.choose_user").each(function() {
        var selected = $(this).children("option:selected").val();
        $(this).addClass("bg-"+selected);
    });

    // Change bg class on change
    $("select.choose_user").change(function(){
        var selected = $(this).children("option:selected").val();
        var classes = $(this).attr("class").split(" ");
        var $this = $(this);
        
        classes.forEach(function(item, index) {
            if (item.startsWith("bg-")) {
                $this.removeClass(item);
            }
        });
        
        $(this).addClass("bg-"+selected);
    });
});