function fill(Value) {
    $('#search').val(Value);
    $('#display').hide();
 }
 $(document).ready(function() {
    $("#search").keyup(function() {
        var categories = $('#search').val();
        if (categories == "") {
            $("#display").html("");
        }
        else {
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    search: categories
                },
                success: function(html) {
                    
                    $("#display").html(html).show();
                }
            });
        }
    });
 });