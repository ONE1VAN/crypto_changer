function GetTypeBonus(value) {
    var id = value;

    if (id == 9) {
        $('#TypeBonusTrPlans').removeClass('show');
        $('#TypeBonusTrPlans').addClass('hide');
        $('#TypeBonusTrPlans2').removeClass('hide');
        $('#TypeBonusTrPlans2').addClass('show');
        $('#TypeBonusTrRef').removeClass('hide');
        $('#TypeBonusTrRef').addClass('show');
    } else if (id == 10) {
        $('#TypeBonusTrRef').removeClass('show');
        $('#TypeBonusTrRef').addClass('hide');
        $('#TypeBonusTrRef2').removeClass('hide');
        $('#TypeBonusTrRef2').addClass('show');
        $('#TypeBonusTrPlans').removeClass('hide');
        $('#TypeBonusTrPlans').addClass('show');
    } else {
        $('#TypeBonusTrRef').removeClass('show');
        $('#TypeBonusTrRef').addClass('hide');
        $('#TypeBonusTrRef2').removeClass('hide');
        $('#TypeBonusTrRef2').addClass('show');
        $('#TypeBonusTrPlans').removeClass('show');
        $('#TypeBonusTrPlans').addClass('hide');
        $('#TypeBonusTrPlans2').removeClass('hide');
        $('#TypeBonusTrPlans2').addClass('show');
        $(document).ready(function() {
            $.ajax({

                type: "POST",
                url: "../adminaka/assets/bonus.php",
                dataType: 'json',
                data: {
                    Typeid: id
                },

                success: function(response) {
                    console.log(response);
                    document.getElementById('typeBonusCount').innerHTML = response['total_count'];
                    document.getElementById('first_count').value = response['first_count'];
                }
            });
        });

    }


}

function GetTypeBonusPlans(value) {
    var plansId = value;

    $(document).ready(function() {
        $.ajax({

            type: "POST",
            url: "../adminaka/assets/bonusPlans.php",
            dataType: 'json',
            data: {
                Typeid: plansId
            },

            success: function(response) {
                console.log(response);
                document.getElementById('typeBonusCount').innerHTML = response['total_count'];
                document.getElementById('first_count').value = response['first_count'];
            }
        });
    });
}

function GetTypeBonusRef(value) {
    var refId = value;
    $(document).ready(function() {
        $.ajax({

            type: "POST",
            url: "../adminaka/assets/bonusRef.php",
            dataType: 'json',
            data: {
                Typeid: refId
            },

            success: function(response) {
                console.log(response);
                document.getElementById('typeBonusCount').innerHTML = response['total_count'];
                document.getElementById('first_count').value = response['first_count'];
            }
        });
    });
}

function GetWallet(value) {
    var PaymentId = value;
    var forms = 'enter';
    var userlogin = document.getElementById("search").value;
    document.getElementById('payment_system').value = PaymentId;

    document.getElementById('payment_system').innerHTML = PaymentId;
    $(document).ready(function() {
        $.ajax({

            type: "POST",
            url: "../adminaka/assets/walletUser.php",
            dataType: 'json',
            data: {
                Typeid: PaymentId,
                Typelogin: userlogin,
                Forms: forms
            },

            success: function(response) {
                if (response['status'] == 2) {
                    $('#newPayments').removeClass('show');
                    $('#newPayments').addClass('hide');
                    $('#newPayments2').removeClass('hide');
                    $('#newPayments2').addClass('show');
                    document.getElementById('purse').value = response['wallet'];
                } else {

                    document.getElementById('newPayments').innerHTML = response['wallet'];
                    $('#newPayments2').removeClass('show');
                    $('#newPayments2').addClass('hide');
                    $('#newPayments').removeClass('hide');
                    $('#newPayments').addClass('show');
                }

            }
        });
    });
}


function GetWalletOut(value) {
    var PaymentId = value;
    var forms = 'output';
    var userlogin = document.getElementById("search_out").value;
    document.getElementById('payment_systemOut').value = PaymentId;

    $(document).ready(function() {
        $.ajax({

            type: "POST",
            url: "../adminaka/assets/walletUser.php",
            dataType: 'json',
            data: {
                Typeid: PaymentId,
                Typelogin: userlogin,
                Forms: forms
            },

            success: function(response) {
                if (response['status'] == 2) {
                    $('#newPaymentsOut').removeClass('show');
                    $('#newPaymentsOut').addClass('hide');
                    $('#newPaymentsOut2').removeClass('hide');
                    $('#newPaymentsOut2').addClass('show');
                    document.getElementById('purseOut').value = response['wallet'];
                } else {

                    document.getElementById('newPaymentsOut').innerHTML = response['wallet'];
                    $('#newPaymentsOut2').removeClass('show');
                    $('#newPaymentsOut2').addClass('hide');
                    $('#newPaymentsOut').removeClass('hide');
                    $('#newPaymentsOut').addClass('show');
                }

            }
        });
    });
}

function newOutputWallet(value) {
    var PaymentId = value;
    var NamePayment = document.getElementById("payment_systemOut").value;
    var userlogin = document.getElementById("search_out").value;
    $(document).ready(function() {
        $.ajax({

            type: "POST",
            url: "../adminaka/assets/NewwalletUser.php",
            dataType: 'json',
            data: {
                Typeid: PaymentId,
                Typelogin: userlogin,
                NamePayment: NamePayment
            },

            success: function(response) {

                $('#newPaymentsOut').removeClass('show');
                $('#newPaymentsOut').addClass('hide');
                $('#newPaymentsOut2').removeClass('hide');
                $('#newPaymentsOut2').addClass('show');
                document.getElementById('purseOut').value = response['newWallet'];

            }
        });
    });
}

function newEnterWallet(value) {
    var PaymentId = value;
    var NamePayment = document.getElementById("payment_system").value;
    var userlogin = document.getElementById("search").value;
    $(document).ready(function() {
        $.ajax({

            type: "POST",
            url: "../adminaka/assets/NewwalletUser.php",
            dataType: 'json',
            data: {
                Typeid: PaymentId,
                Typelogin: userlogin,
                NamePayment: NamePayment
            },

            success: function(response) {

                $('#newPaymentsOut').removeClass('show');
                $('#newPaymentsOut').addClass('hide');
                $('#newPaymentsOut2').removeClass('hide');
                $('#newPaymentsOut2').addClass('show');
                document.getElementById('purse').value = response['newWallet'];

            }
        });
    });
}

function popUP(url, width, height) {
    if (!width) { width = 780; }
    if (!height) { height = 450; }
    var posx = 200;
    var posy = 200;
    var w = window.open(url, 'wind', 'left=' + posx + ',top=' + posy + ',width=' + width + ',height=' + height + ',status:no, help:no');
    return false;
}

function GetTarifDateStart(plan) {
    var planId = plan;
    var dateStart = document.getElementById("dateStart").value;
    var timeStart = document.getElementById("timeStart").value;
    document.getElementById('idPlanHidden').value = planId;
    $(document).ready(function() {
        $.ajax({

            type: "POST",
            url: "../adminaka/assets/GetDaysPlan.php",
            dataType: 'json',
            data: {
                id: planId
            },

            success: function(response) {
                var DateCount = response['days'];
                var Weekend = response['weekend'];
                var Period = response['period'];
                document.getElementById('planPercent').value = response['percent'];
                $("#AmountMin").html(response['minsum']);
                $("#AmountMax").html(response['maxsum']);
                $("#weekend").html(response['weekend']);
                $("#period").html(response['period']);
                $.ajax({

                    type: "POST",
                    url: "../adminaka/assets/GenerateDate.php",
                    dataType: 'json',
                    data: {
                        date: dateStart,
                        time: timeStart,
                        period: DateCount,
                        weekend: Weekend,
                        TypePeriod: Period
                    },

                    success: function(res) {

                        document.getElementById('dateEnd').value = res['dateEndInput'];
                        document.getElementById('timeEnd').value = res['timeEndInput'];
                        document.getElementById('total_count').value = res['total_works'];
                        document.getElementById('nextdate').value = res['nextdate'];
                        //document.getElementById('lastdate').value       = res['lastdate'];    
                    }
                });
            }
        });
    });
}

function IncmoeDay(value) {
    var amount = value;
    var total_works = document.getElementById("total_count").value;
    var planPercent = document.getElementById("planPercent").value;

    var amount_day = (amount / 100) * planPercent;
    var allIncome = amount_day * total_works;
    amount_day = amount_day.toFixed(2);
    allIncome = allIncome.toFixed(2);
    document.getElementById('amountDay').value = amount_day;
    $("#AmountUseInDay").html(amount_day);
    $("#AmountUseInDayAll").html(allIncome);
}


function countAfter(value) {
    var count = value;
    var total_works = document.getElementById("total_count").value;
    var dateStart = document.getElementById("dateStart").value;
    var timeStart = document.getElementById("timeStart").value;
    var amount = document.getElementById("amountDay").value;
    var period = document.getElementById("period").value;
    var weekend = document.getElementById("weekend").value;
    $.ajax({
        type: "POST",
        url: "../adminaka/assets/GenerateNewNextDate.php",
        dataType: 'json',
        data: {
            count: count,
            total_works: total_works,
            date: dateStart,
            time: timeStart,
            amount: amount,
            period: period,
            weekend: weekend
        },

        success: function(res) {
            console.log(res);
            document.getElementById('nextdate').value = res['EndDate'];
            document.getElementById('amountOutput').value = res['NewAmount'];
        }
    });
}

function NewAmountForPercent(value) {
    var percent = value;
    var TotalAmount = document.getElementById("amount_robot").value;

    var amount = (TotalAmount / 100) * percent;
    amount = amount.toFixed(2);
    document.getElementById('robot_pay_amount').value = amount;
}

function clearResultBlock(name) {
    var nameBlock = name;
    document.getElementById('result-' + nameBlock).innerHTML = "";
}

$(document).ready(function() {

    $('.regTime').submit(function() {
        var formID = $(this).attr('id'); // Получение ID формы
        var formNm = $('#' + formID);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: formNm.serialize(),
            success: function(data) {
                // Вывод текста результата отправки в текущей форме
                $("#result-RegTime").html(data);


                // setTimeout(function() { $("#result-" + formID).fadeOut('fast');}, 5000);
            }
        });
        return false;
    });

    $('#sys_mes').submit(function(event) {

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
                if (result['status'] == '1') {
                    $("#result_system_message").html(result['error']);
                    $("#sys_mes")[0].reset();
                } else {
                    $("#result_system_message").html(result['error']);
                }

                //


            },

        });

    });
    $('.sys_mesDepo').submit(function() {
        var formID = $(this).attr('id'); // Получение ID формы
        var formNm = $('#' + formID);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if (result['status'] == '1') {
                    $("#result_system_messageDepo").html(result['error']);
                } else {
                    $("#result_system_messageDepo").html(result['error']);
                }


                // setTimeout(function() { $("#result-" + formID).fadeOut('fast');}, 5000);
            }
        });
        return false;
    });

    $('#stat_USD').submit(function(event) {

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
                if (result['status'] == '1') {
                    $("#result_statistic_usd").html(result['error']);
                } else {
                    $("#result_statistic_usd").html(result['error']);
                }

            },

        });

    });
    $('#statPoint').submit(function(event) {

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
                if (result['status'] == '1') {
                    $("#result_statistic_point").html(result['error']);
                } else {
                    $("#result_statistic_point").html(result['error']);
                }

                //


            },

        });

    });

    $('#privatDoc').submit(function(event) {

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
                if (result['status'] == '1') {
                    $("#result-PrivetGenerate").html(result['error']);
                } else {
                    $("#result-PrivetGenerate").html(result['error']);
                }
            },

        });

    });
    $('#renameLogin').submit(function(event) {

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
                if (result['status'] == 2) {
                    $("#result-RenameLogin").html(result['error']);
                    $('#OldLogin').val(result['NewLogin']);
                } else if (result['status'] == 3) {
                    $("#result-RenameLogin").html(result['error']);
                    $('#OldLogin').val(result['NewLogin']);
                } else {
                    $("#result-RenameLogin").html(result['error']);
                }

                //


            },

        });

    });

    $('#renameEmail').submit(function(event) {

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
                if (result['status'] == 2) {
                    $("#result-RenameEmail").html(result['error']);
                    $('#OldEmail').val(result['NewEmail']);
                } else {
                    $("#result-RenameEmail").html(result['error']);
                }

                //


            },

        });

    });

    $('#renameSponsor').submit(function(event) {

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
                if (result['status'] == 2) {
                    $("#result-SponsorUser").html(result['error']);
                    $('#OldSponsor').val(result['NewSponsor']);
                } else {
                    $("#result-SponsorUser").html(result['error']);
                }

                //


            },

        });

    });



    $('#addBalance').submit(function(event) {

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
                if (result['status'] == 2) {
                    $("#result-addBalance").html(result['error']);
                } else {
                    $("#result-addBalance").html(result['error']);
                }

                //


            },

        });

    });


    $('#RemovePurse').submit(function(event) {

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
                if (result['status'] == '1') {
                    $("#result_ReferencePaymentPurseTrue").html(result['error']);
                } else {
                    $("#result_ReferencePaymentPurseTrue").html(result['error']);
                }
            },

        });

    });

    $('#RemovePaymentPass').submit(function(event) {

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
                if (result['status'] == '1') {
                    $("#result_ReferencePaymentPassTrue").html(result['error']);
                    $("#PaymentPassword").attr("readonly", true);
                    $("#PaymentPassword").removeClass("ActivInput");
                    $("#PaymentPassCode").removeClass("ActivInput");
                    $('#PaymentPassword').val(result['pass']);
                    $('#PaymentPassCode').val("");

                } else {
                    $("#result_ReferencePaymentPassTrue").html(result['error']);
                }
            },

        });

    });
    //END FILE

});