$(document).ready(function() {
 
    $("#search_user").keyup(function() {
 
        var name = $('#search_user').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: type
                },
                success: function(response) {
                    $("#display").html(response).show();
                }
 
            });
        }
    });


    $("#search_user_depo").keyup(function() {
 
        var name = $('#search_user_depo').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_depo_user").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'users_depo'
                },
                success: function(response) {
                    $("#display_depo_user").html(response).show();
                }
 
            });
        }
    });

 $("#search_user_bonus").keyup(function() {
 
        var name = $('#search_user_bonus').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_bonus_user").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'users_bonus'
                },
                success: function(response) {
                    $("#display_bonus_user").html(response).show();
                }
 
            });
        }
    });


$("#Notification").keyup(function() {
 
        var name = $('#Notification').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#displayNotification").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'Notification'
                },
                success: function(response) {
                    $("#displayNotification").html(response).show();
                }
 
            });
        }
    });


 $("#search_user_fin1").keyup(function() {
 
        var name = $('#search_user_fin1').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_fin1").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'fin1'
                },
                success: function(response) {
                    $("#display_fin1").html(response).show();
                }
 
            });
        }
    });

 $("#search_user_fin2").keyup(function() {
 
        var name = $('#search_user_fin2').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_fin2").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'fin2'
                },
                success: function(response) {
                    $("#display_fin2").html(response).show();
                }
 
            });
        }
    });

  $("#search_user_fin3").keyup(function() {
 
        var name = $('#search_user_fin3').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_fin3").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'fin3'
                },
                success: function(response) {
                    $("#display_fin3").html(response).show();
                }
 
            });
        }
    });

   $("#search_user_fin4").keyup(function() {
 
        var name = $('#search_user_fin4').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_fin4").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'fin4'
                },
                success: function(response) {
                    $("#display_fin4").html(response).show();
                }
 
            });
        }
    });

    $("#search_user_fin5").keyup(function() {
 
        var name = $('#search_user_fin5').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_fin5").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'fin5'
                },
                success: function(response) {
                    $("#display_fin5").html(response).show();
                }
 
            });
        }
    });

     $("#search_user_fin6").keyup(function() {
 
        var name = $('#search_user_fin6').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_fin6").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'fin6'
                },
                success: function(response) {
                    $("#display_fin6").html(response).show();
                }
 
            });
        }
    });

    $("#search_user_fin7").keyup(function() {
 
        var name = $('#search_user_fin7').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_fin7").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'fin7'
                },
                success: function(response) {
                    $("#display_fin7").html(response).show();
                }
 
            });
        }
    });


    $("#search_user_point1").keyup(function() {
 
        var name = $('#search_user_point1').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_point1").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'point1'
                },
                success: function(response) {
                    $("#display_point1").html(response).show();
                }
 
            });
        }
    });

    $("#search_user_point2").keyup(function() {
 
        var name = $('#search_user_point2').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_point2").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'point2'
                },
                success: function(response) {
                    $("#display_point2").html(response).show();
                }
 
            });
        }
    });

    $("#search_user_point3").keyup(function() {
 
        var name = $('#search_user_point3').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_point3").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'point3'
                },
                success: function(response) {
                    $("#display_point3").html(response).show();
                }
 
            });
        }
    });


    $("#search_user_robot1").keyup(function() {
 
        var name = $('#search_user_robot1').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_robot1").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'robot1'
                },
                success: function(response) {
                    $("#display_robot1").html(response).show();
                }
 
            });
        }
    });


    $("#search_user_robot2").keyup(function() {
 
        var name = $('#search_user_robot2').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_robot2").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'robot2'
                },
                success: function(response) {
                    $("#display_robot2").html(response).show();
                }
 
            });
        }
    });


    $("#search_user_robot3").keyup(function() {
 
        var name = $('#search_user_robot3').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_robot3").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'robot3'
                },
                success: function(response) {
                    $("#display_robot3").html(response).show();
                }
 
            });
        }
    });


    $("#search_user_robot4").keyup(function() {
 
        var name = $('#search_user_robot4').val();
        var type = $ ("#type").val();

        if (name === "") {

            $("#display_robot4").html("");
        }
        else {
 
            $.ajax({
                type: "POST", 
                url: "../adminaka/handler.php", 
                data: {
                    search: name,
                    types: 'robot4'
                },
                success: function(response) {
                    $("#display_robot4").html(response).show();
                }
 
            });
        }
    });

});

function fill_users(Value) {
 
    $('#search_user').val(Value); 
    
    $('#display').hide(); 
 
}

function fill_users_depo(Value) {

    $('#search_user_depo').val(Value); 
    
    $('#display_depo_user').hide(); 
}

function fill_users_bonus(Value) {

    $('#search_user_bonus').val(Value); 
    
    $('#display_bonus_user').hide(); 
}

function fill_fin1(Value) {

    $('#search_user_fin1').val(Value); 
    
    $('#display_fin1').hide(); 
}
function fill_fin2(Value) {

    $('#search_user_fin2').val(Value); 
    
    $('#display_fin2').hide(); 
}
function fill_fin3(Value) {

    $('#search_user_fin3').val(Value); 
    
    $('#display_fin3').hide(); 
}
function fill_fin4(Value) {

    $('#search_user_fin4').val(Value); 
    
    $('#display_fin4').hide(); 
}
function fill_fin5(Value) {

    $('#search_user_fin5').val(Value); 
    
    $('#display_fin5').hide(); 
}
function fill_fin6(Value) {

    $('#search_user_fin6').val(Value); 
    
    $('#display_fin6').hide(); 
}
function fill_fin7(Value) {

    $('#search_user_fin7').val(Value); 
    
    $('#display_fin7').hide(); 
}


function fill_point1(Value) {

    $('#search_user_point1').val(Value); 
    
    $('#display_point1').hide(); 
}
function fill_point2(Value) {

    $('#search_user_point2').val(Value); 
    
    $('#display_point2').hide(); 
}
function fill_point3(Value) {

    $('#search_user_point3').val(Value); 
    
    $('#display_point3').hide(); 
}

function fill_robot1(Value) {

    $('#search_user_robot1').val(Value); 
    
    $('#display_robot1').hide(); 
}
function fill_robot2(Value) {

    $('#search_user_robot2').val(Value); 
    
    $('#display_robot2').hide(); 
}
function fill_robot3(Value) {

    $('#search_user_robot3').val(Value); 
    
    $('#display_robot3').hide(); 
}
function fill_robot4(Value) {

    $('#search_user_robot4').val(Value); 
    
    $('#display_robot4').hide(); 
}
function fill_Notification(Value) {

    $('#Notification').val(Value); 
    
    $('#displayNotification').hide(); 
}