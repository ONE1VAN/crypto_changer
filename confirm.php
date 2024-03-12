<?

    include_once('cfg.php');
    include_once('ini.php');

    $res = db_result_to_array(DB::Query('SELECT * FROM `tranzactions` ORDER BY `id` DESC LIMIT 1'));
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<link href="/images/Logo-White.svg" rel="shortcut icon" type="image/png">
	<title>CryptoSolve - cryptocurrency exchange</title>
	<meta content="CryptoSolve - cryptocurrency exchange" name="title">
	<meta content="The leading cryptocurrency exchange platform offers different trading options, provides 24/7 customer support, high level of security." name="description">
	<link href="/css/1fbf120d/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/bootstrap-reboot.min.css" rel="stylesheet">
	<link href="/css/animate.min.css" rel="stylesheet">
	<link href="/css/fonts.css" rel="stylesheet">
	<link href="/css/style.min.css" rel="stylesheet">
	<link href="/css/main.css" rel="stylesheet">
	<script>
	const AJAX_URL = '/ajax';
	</script>
	<script>
	               let bonus = 2.5 + 100;
	               let minUSD = 30;
	               let maxUSD = 200000;
	</script>
</head>
<body style="overflow: auto;">
	<div class="wrapper">
		<div class="preloader" style="display: none;">
			<div class="preloader__circle"></div>
		</div>
		<header class="header wow animate__fadeInDown" style="visibility: visible; animation-name: fadeInDown;">
			<div class="container header__container">
				<div class="header__body">
					<a class="header__logo header__logo-hide" href="/"><img alt="logo" src="/images/Logo-White.svg"></a>
					<div class="header__hide">
						<a class="header__logo" href="/"><img alt="logo" src="/images/Logo-White.svg"></a>
						<nav class="header__nav">
							<ul class="header__list">
								<li class="header__item">
									<a class="header__link" href="../#about">About</a>
								</li>
								<li class="header__item">
									<a class="header__link" href="../#exchange">Exchange</a>
								</li>
								<li class="header__item">
									<a class="header__link" href="../#how-exchange">How exchange</a>
								</li>
								<li class="header__item">
									<a class="header__link" href="../#transactions">Transactions</a>
								</li>
								<li class="header__item">
									<a class="header__link" href="../#support">Support</a>
								</li>
							</ul>
						</nav>
						<div class="header__wrapper">
							<!-- <div class="header__lang">
                        <div class="header__lang-lang">
                            <a class="header__lang-wrapper" href="">
                                <img src="/images/ua.svg" alt="ua">
                                <div class="header__lang-text">
                                    Eng
                                </div>
                            </a>
                            <a class="header__lang-wrapper header__lang-dropdown"
                                href="#">
                                <img src="/images/ru.svg" alt="ru">
                                <div class="header__lang-text">
                                    Ru
                                </div>
                            </a>
                        </div>
                        <img class="header__lang-arrow" src="/images/arrow.svg" alt="arrow">
                    </div> -->
							 <a class="header__btn" href="../#exchange">Exchange</a>
						</div>
					</div>
					<div class="header__burger">
						<span></span> <span></span> <span></span>
					</div>
				</div>
				<div class="header__burger-content">
					<nav class="header__nav">
						<ul class="header__list">
							<li class="header__item">
								<a class="header__link" href="../#about">About</a>
							</li>
							<li class="header__item">
								<a class="header__link" href="../#exchange">Exchange</a>
							</li>
							<li class="header__item">
								<a class="header__link" href="../#how-exchange">How exchange</a>
							</li>
							<li class="header__item">
								<a class="header__link" href="../#transactions">Transactions</a>
							</li>
							<li class="header__item">
								<a class="header__link" href="../#support">Support</a>
							</li>
						</ul>
					</nav>
					<div class="header__wrapper">
						<!-- <div class="header__lang">
                    <div class="header__lang-lang">
                        <a class="header__lang-wrapper" href="">
                            <img src="/images/ua.svg" alt="ua">
                            <div class="header__lang-text">
                                Eng
                            </div>
                        </a>
                        <a class="header__lang-wrapper header__lang-dropdown" href="#">
                            <img src="/images/ru.svg" alt="ru">
                            <div class="header__lang-text">
                                Ru
                            </div>
                        </a>
                    </div>
                    <img class="header__lang-arrow" src="/images/arrow.svg" alt="arrow">
                </div> -->
						 <a class="header__btn" href="../#exchange">Exchange</a>
					</div>
				</div>
			</div>
		</header>
		<main class="main">
			<section class="transaction">
				<div class="container transaction__container wow animate__fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
					<h1 class="transaction__title" id="transaction__title_val">Exchange<br>
					<?=$res[0]['first_ps']?> on <?=$res[0]['second_ps']?></h1>
					<div class="transaction__order">
						Order ID <?=$res[0]['id']?>
					</div>
					<div class="transaction-4">
						<div class="transaction__status transaction__status_blue">
							WAITING FOR CONFIRMATIONS
						</div>
						<div class="transaction__status-text">
							We are waiting to receive at least one confirmation!
						</div>
					</div>
					<div class="transaction__btns">
						<a class="transaction__btn" href="/"><img alt="home" src="/images/home.svg"> Get back</a>
					</div>
				</div>
			</section>
			<script>
			     // setInterval(function () {
			     //     location.reload();
			     // }, 5000);
			</script>
		</main>
		<footer class="footer">
			<div class="container footer__container">
				<div class="footer__start">
					<img alt="logo" class="footer__logo" src="/images/Logo&#32;small&#32;white.svg">
					<div class="footer__text">
						ALL RIGHTS RESERVED © <?=date("Y")?>
					</div>
				</div>
				<div class="footer__end">
					<a class="footer__link" href="https://t.me/chto_poluchaetsa"><img alt="tg" src="/images/tg(1).svg"></a>
				</div>
			</div>
		</footer>
	</div>
	<script>
	 
	                   var check2 = document.querySelector("#transaction__title_val").textContent;
	                     
	                   if (check2 === "") {
	                       window.location.href = '../';
	                   } 
	</script> 
	<script src="/js/c5411d66/jquery.js">
	</script> 
	<script src="/js/b7c8d7ad/yii.js">
	</script> 
	<script src="/js/script.js">
	</script> 
	<script src="/js/wow.min.js">
	</script> 
	<script src="/js/transaction.js">
	</script>
</body>
</html>