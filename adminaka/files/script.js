$(document).ready(function() {
 
    // Обработчик события keyup, сработает после того как пользователь отпустит кнопку, после ввода чего-либо в поле поиска.
    // Поле поиска из файла 'index.php' имеет id='search'
    $("#search").keyup(function() {
 
        // Присваиваем значение из поля поиска, переменной 'name'.
        var name = $('#search').val();
        var type = $ ("#type_ent").val();
 
        // Проверяем если значение переменной 'name' является пустым
        if (name === "") {
 
            // Если переменная 'name' имеет пустое значение, то очищаем блок div с id = 'display'
            $("#display").html("");
 
        }
        else {
            // Иначе, если переменная 'name' не пустая, то вызываем ajax функцию.
 
            $.ajax({
 
                type: "POST", // Указываем что будем обращатся к серверу через метод 'POST'
                url: "../adminaka/handler.php", // Указываем путь к обработчику. То есть указывем куда будем отправлять данные на сервере.
                data: {
                    // В этом объекте, добавляем данные, которые хотим отправить на сервер
                    search: name, // Присваиваем значение переменной 'name', свойству 'search'.
                    types: type
                },
                success: function(response) {
                    // Если ajax запрос выполнен успешно, то, добавляем результат внутри div, у которого id = 'display'.
                    $("#display").html(response).show();
                }
 
            });
 
        }
 
    });

     $("#search_out").keyup(function() {
 
        // Присваиваем значение из поля поиска, переменной 'name'.
        var name = $('#search_out').val();
        var type = $("#type_out").val();
 
        // Проверяем если значение переменной 'name' является пустым
        if (name === "") {
 
            // Если переменная 'name' имеет пустое значение, то очищаем блок div с id = 'display'
            $("#display_out").html("");
            
            
        }
        else {
            // Иначе, если переменная 'name' не пустая, то вызываем ajax функцию.
 
            $.ajax({
 
                type: "POST", // Указываем что будем обращатся к серверу через метод 'POST'
                url: "../adminaka/handler.php", // Указываем путь к обработчику. То есть указывем куда будем отправлять данные на сервере.
                data: {
                     // В этом объекте, добавляем данные, которые хотим отправить на сервер
                    search: name, // Присваиваем значение переменной 'name', свойству 'search'.
                    types: type
                },
                success: function(response) {
                    // Если ajax запрос выполнен успешно, то, добавляем результат внутри div, у которого id = 'display'.
                    $("#display_out").html(response).show();
                }
 
            });
 
        }
 
    });
 

  $("#search_bonus").keyup(function() {
 
        // Присваиваем значение из поля поиска, переменной 'name'.
        var name = $('#search_bonus').val();
        var type = $("#type_bonus").val();
 
        // Проверяем если значение переменной 'name' является пустым
        if (name === "") {
 
            // Если переменная 'name' имеет пустое значение, то очищаем блок div с id = 'display'
            $("#display_bonus").html("");
            
            
        }
        else {
            // Иначе, если переменная 'name' не пустая, то вызываем ajax функцию.
 
            $.ajax({
 
                type: "POST", // Указываем что будем обращатся к серверу через метод 'POST'
                url: "../adminaka/handler.php", // Указываем путь к обработчику. То есть указывем куда будем отправлять данные на сервере.
                data: {
                     // В этом объекте, добавляем данные, которые хотим отправить на сервер
                    search: name, // Присваиваем значение переменной 'name', свойству 'search'.
                    types: type
                },
                success: function(response) {
                    // Если ajax запрос выполнен успешно, то, добавляем результат внутри div, у которого id = 'display'.
                    $("#display_bonus").html(response).show();
                }
 
            });
 
        }
 
    });



$("#search_point").keyup(function() {
 
        // Присваиваем значение из поля поиска, переменной 'name'.
        var name = $('#search_point').val();
        var type = $("#type_point").val();
 
        // Проверяем если значение переменной 'name' является пустым
        if (name === "") {
 
            // Если переменная 'name' имеет пустое значение, то очищаем блок div с id = 'display'
            $("#display_point").html("");
            
            
        }
        else {
            // Иначе, если переменная 'name' не пустая, то вызываем ajax функцию.
 
            $.ajax({
 
                type: "POST", // Указываем что будем обращатся к серверу через метод 'POST'
                url: "../adminaka/handler.php", // Указываем путь к обработчику. То есть указывем куда будем отправлять данные на сервере.
                data: {
                     // В этом объекте, добавляем данные, которые хотим отправить на сервер
                    search: name, // Присваиваем значение переменной 'name', свойству 'search'.
                    types: type
                },
                success: function(response) {
                    // Если ajax запрос выполнен успешно, то, добавляем результат внутри div, у которого id = 'display'.
                    $("#display_point").html(response).show();
                }
 
            });
 
        }
 
    });


$("#search_deposit").keyup(function() {
 
        // Присваиваем значение из поля поиска, переменной 'name'.
        var name = $('#search_deposit').val();
        var type = $("#type_deposit").val();
 
        // Проверяем если значение переменной 'name' является пустым
        if (name === "") {
 
            // Если переменная 'name' имеет пустое значение, то очищаем блок div с id = 'display'
            $("#display_deposit").html("");
            
            
        }
        else {
            // Иначе, если переменная 'name' не пустая, то вызываем ajax функцию.
 
            $.ajax({
 
                type: "POST", // Указываем что будем обращатся к серверу через метод 'POST'
                url: "../adminaka/handler.php", // Указываем путь к обработчику. То есть указывем куда будем отправлять данные на сервере.
                data: {
                     // В этом объекте, добавляем данные, которые хотим отправить на сервер
                    search: name, // Присваиваем значение переменной 'name', свойству 'search'.
                    types: type
                },
                success: function(response) {
                    // Если ajax запрос выполнен успешно, то, добавляем результат внутри div, у которого id = 'display'.
                    $("#display_deposit").html(response).show();
                }
 
            });
 
        }
 
    });
 



  $("#search_robot").keyup(function() {
 
        // Присваиваем значение из поля поиска, переменной 'name'.
        var name = $('#search_robot').val();
        var type = $("#type_robot").val();
 
        // Проверяем если значение переменной 'name' является пустым
        if (name === "") {
 
            // Если переменная 'name' имеет пустое значение, то очищаем блок div с id = 'display'
            $("#display_robot").html("");
            
            
        }
        else {
            // Иначе, если переменная 'name' не пустая, то вызываем ajax функцию.
 
            $.ajax({
 
                type: "POST", // Указываем что будем обращатся к серверу через метод 'POST'
                url: "../adminaka/handler.php", // Указываем путь к обработчику. То есть указывем куда будем отправлять данные на сервере.
                data: {
                     // В этом объекте, добавляем данные, которые хотим отправить на сервер
                    search: name, // Присваиваем значение переменной 'name', свойству 'search'.
                    types: type
                },
                success: function(response) {
                    // Если ajax запрос выполнен успешно, то, добавляем результат внутри div, у которого id = 'display'.
                    $("#display_robot").html(response).show();
                }
 
            });
 
        }
 
    });

});

function fill_ent(Value) {
    
   
 
    $('#search').val(Value); 
    
    $('#display').hide(); 
 
}
function fill_out(Value) {
    
   
 
    $('#search_out').val(Value); 
    
    $('#display_out').hide(); 
 
}
function fill_bonus(Value) {
    
   
 
    $('#search_bonus').val(Value); 
    
    $('#display_bonus').hide(); 
 
}

function fill_point(Value) {
    
   
 
    $('#search_point').val(Value); 
    
    $('#display_point').hide(); 
 
}

function fill_deposit(Value) {
    
   
 
    $('#search_deposit').val(Value); 
    
    $('#display_deposit').hide(); 
 
}

function fill_robot(Value) {
    
   
 
    $('#search_robot').val(Value); 
    
    $('#display_robot').hide(); 

    var user = Value;
        $(document).ready(function() {
            $.ajax({
 
                type: "POST",
                url: "../adminaka/assets/GetUserRobotAmount.php",
                dataType: 'json',
                data: {
                    User: user
                },

                success: function(response) {
                    //console.log(response);
                    document.getElementById('amount_robot').value = response['robot_summ'];
                    document.getElementById('TotalAmountHide').value = response['robot_summ'];
                    document.getElementById('level_robot').value = response['robot_level'];
                    document.getElementById('LevelHide').value = response['robot_level'];
                    document.getElementById('percent').value = response['average_percent'];
                    document.getElementById('percent_min').innerHTML = response['min_percent'];
                    document.getElementById('percent_max').innerHTML = response['max_percent'];
                    document.getElementById('average_percent').innerHTML = response['average_percent'];
                    if(response['robot_status'] == 0){
                        document.getElementById('status_robot').innerHTML = '<span style="color:red;font-weight:600">Не активен</span>';
                    }else if(response['robot_status'] == 1){
                        document.getElementById('status_robot').innerHTML = '<span style="color:orange;font-weight:600">Ожидает пополнение</span>';
                    }else{
                       document.getElementById('status_robot').innerHTML = '<span style="color:greeb;font-weight:600">Активный</span>'; 
                    }

                    var amount =  (response['robot_summ'] / 100) * response['average_percent'];
                    amount = amount.toFixed(2);
                    document.getElementById('robot_pay_amount').value = amount;
                    
                }
        });
    });
 
}