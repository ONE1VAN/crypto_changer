$(document).ready(function() {
    $('#continue_btn').click(function() {

        var min = 250;




        var send = $('#u_send').val();
        var receive = $('#u_receive').val();
        var promo = $('#referral_code').val();
        var receive_address = $('#receive-address').val();
        var email = $('.exchange__block-input-email').val();
        var cr_send = document.getElementById("cr_send");
        var crSend = cr_send.innerText;
        var cr_receive = document.getElementById("cr_receive");
        var crReceive = cr_receive.innerText;
        var check_min = crSend.match(/\((.+?)\)/)[1];
        fetch(`https://min-api.cryptocompare.com/data/price?fsym=${check_min}&tsyms=Usdt`)
            .then(res => res.json())
            .then(json => {

                delenie()


                function delenie() {
                    var usd = json.USDT;
                    var result = send * usd;
                    var min_usd = Math.ceil(result)

                    if (min_usd >= min) {
                        $('.min').html(``);

                        if ((crSend === "BITCOIN (BTC)" && crReceive === "BITCOIN (BTC)") || (crSend === "ETHEREUM (ETH)" && crReceive === "ETHEREUM (ETH)") || (crSend === "BINANCE COIN (BNB)" && crReceive === "BINANCE COIN (BNB)") || (crSend === "SOLANA (SOL)" && crReceive === "SOLANA (SOL)") || (crSend === "RIPPLE (XRP)" && crReceive === "RIPPLE (XRP)") || (crSend === "MONERO (XMR)" && crReceive === "MONERO (XMR)") || (crSend === "TRON (TRX)" && crReceive === "TRON (TRX)") || (crSend === "DASH (DASH)" && crReceive === "DASH (DASH)") || (crSend === "LITECOIN (LTC)" && crReceive === "LITECOIN (LTC)") || (crSend === "STELLAR (XLM)" && crReceive === "STELLAR (XLM)") || (crSend === "DOGECOIN (DOGE)" && crReceive === "DOGECOIN (DOGE)") || (crSend === "CARDANO (ADA)" && crReceive === "CARDANO (ADA)") || (crSend === "TETHER (USDT)" && crReceive === "TETHER (USDT)") || (crSend === "SHIBA INU (SHIB)" && crReceive === "SHIBA INU (SHIB)") || (crSend === "POLYGON (MATIC)" && crReceive === "POLYGON (MATIC)")) {
                            $('.min').html(`unavailable currency pair`);
                        } else {
                            $('.min').html(``);
                            if (send !== "" && receive !== "" && crSend !== "" && crReceive !== "" && receive_address !== "" && email !== "") {
                                $.ajax({
                                    url: "sends.php",
                                    type: "post",
                                    dataType: "json",
                                    data: {
                                        "promo": promo,
                                        "receive": receive,
                                        "send": send,
                                        "crSend": crSend,
                                        "crReceive": crReceive,
                                        "receive_address": receive_address,
                                        "email": email,
                                        "amount": send
                                    },

                                    success: function(data) {
                                       
                                        window.location.href = '/';
                                    },
                                    error: function(xhr, ajaxOptions, thrownerror) {
                                        window.location.href = '../order.php';
                                    }
                                });
                            } else {
                                console.log("error")
                            }
                        }
                    } else {
                        $('.min').html(`minimum of ${min}`);
                    }
                }

            })
    });
});