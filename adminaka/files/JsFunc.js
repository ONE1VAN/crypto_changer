$(document).ready(function() {

    $('#deposit').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if (result['status'] == '2') {
                    $("#result_deposits").html(result['error']);
                    if (result['clear'] == '2') {
                        $("#deposit")[0].reset();
                    }
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 

                } else {
                    $("#result_deposits").html(result['error']);
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 
                }
            },

        });

    });

    //form of enter
    $('#enter').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if (result['status'] == '2') {
                    $("#result_enter").html(result['error']);
                    if (result['clear'] == '2') {
                        $("#enter")[0].reset();
                    }
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 

                } else {
                    $("#result_enter").html(result['error']);
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 
                }
            },

        });

    });

    //form of user
    $('#NewUser').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if (result['status'] == '2') {
                    $("#result_user").html(result['error']);
                    if (result['clear'] == '2') {
                        $("#NewUser")[0].reset();
                    }
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 

                } else {
                    $("#result_user").html(result['error']);
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 
                }
            },

        });

    });

    //form of output
    $('#output').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if (result['status'] == '2') {
                    $("#result_output").html(result['error']);
                    if (result['clear'] == '2') {
                        $("#output")[0].reset();
                    }
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 

                } else {
                    $("#result_output").html(result['error']);
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 
                }
            },

        });

    });

    //form of bonus
    $('#bonus').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if (result['status'] == '2') {
                    $("#result_bonus").html(result['error']);
                    if (result['clear'] == '2') {
                        $("#bonus")[0].reset();
                    }
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 

                } else {
                    $("#result_bonus").html(result['error']);
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 
                }
            },

        });
    });


    //form of deposits
    $('#deposits').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if (result['status'] == '2') {
                    $("#result_deposits").html(result['error']);
                    if (result['clear'] == '2') {
                        $("#deposits")[0].reset();
                    }
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 

                } else {
                    $("#result_deposits").html(result['error']);
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 
                }
            },

        });

    });


    //form of point
    $('#point').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if (result['status'] == '2') {
                    $("#result_point").html(result['error']);
                    if (result['clear'] == '2') {
                        $("#point")[0].reset();
                    }
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 

                } else {
                    $("#result_point").html(result['error']);
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 
                }
            },

        });

    });

    //form of pay_robot
    $('#pay_robot').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if (result['status'] == '2') {
                    $("#result_pay_robot").html(result['error']);
                    if (result['clear'] == '2') {
                        $("#pay_robot")[0].reset();
                    }
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 

                } else {
                    $("#result_pay_robot").html(result['error']);
                    //setTimeout(function() { $("#result_enter").fadeOut('fast');}, 5000); 
                }
            },

        });

    });
});