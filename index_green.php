<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>netPrint.ru</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="format-detection" content="telephone=no" />

		<?php
			$theme = "green";
			if( isset( $_GET["theme"] ) ) {
				$theme = $_GET["theme"];
			}
		?>

		<link href="/assets/css/screen.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="/assets/css/colors_<?php echo $theme; ?>.css" media="screen" rel="stylesheet" type="text/css" />

        <script src="/assets/js/vendor/mobile-fixes.js"></script>
        <script src="/assets/js/vendor/jquery-1.10.2.min.js"></script>
        <script src="/assets/js/vendor/fotorama.js"></script>
        <script src="/assets/js/vendor/slick.min.js"></script>
        <script src="/assets/js/main.js"></script>

		<!--[if lt IE 9]>
		<script src="/assets/js/vendor/html5shiv.js"></script>
		<![endif]-->
	</head>
	<body class="color-global-background">
		<div class="l-page b-page--js color-global-background">
			
			<header class="b-header color-header-background">
				<div class="b-header__content l-content">
					<h1 class="b-header__content__logo">
						<a href="/index_green.php"><img src="/assets/i/themes/green/logo.png" alt=""/></a>
					</h1>
				</div>
			</header>

			<nav class="b-nav color-navigation-background">
				<ul class="b-nav__content l-content">
					<!-- Текущей странице присваиваетя класс  b-nav__content__element--nav--current (см. пункт меню Каталог) -->
					<li class="b-nav__content__element b-nav__content__element--nav"><a class="b-nav__content__element__link color-navigation-link" href="?page=howitworks">Как это работает</a></li>
					<li class="b-nav__content__element b-nav__content__element--nav b-nav__content__element--nav--current"><a class="b-nav__content__element__link color-navigation-link" href="/">Каталог</a></li>
					<li class="b-nav__content__element b-nav__content__element--nav"><a class="b-nav__content__element__link color-navigation-link" href="?page=faq">Способы оформления</a></li>
					<li class="b-nav__content__element b-nav__content__element--nav"><a class="b-nav__content__element__link color-navigation-link" href="?page=delivery">Доставка и оплата</a></li>
					<li class="b-nav__content__element b-nav__content__element--nav"><a class="b-nav__content__element__link color-navigation-link" href="?page=help"><span class="b-icon color-icon-nav"></span>Помощь</a></li>

					<li class="b-nav__content__element b-nav__content__element--sandwich b-nav__aside-menu--js"><a class="b-nav__content__element__link color-navigation-link" href="#"><span class="b-icon b-icon--huge color-icon-nav"></span>Меню</a></li>

					<li class="b-nav__content__element b-nav__content__element--auth b-button b-button--nav color-button"><a class="b-nav__content__element__link popup-trigger--js" data-popup=".b-popup--register--js" href="#">Зарегистрироваться</a></li>
					<li class="b-nav__content__element b-nav__content__element--auth"><a class="b-nav__content__element__link color-navigation-link popup-trigger--js" data-popup=".b-popup--login--js" href="#"><span class="b-icon color-icon-nav"></span>Войти</a></li>
				</ul>
			</nav>

			<div class="b-content__wrap">
	            <?php
	                $page = isset($_GET["page"]) ? $_GET["page"] : "index";
	                include("tpl/" . $page . ".php");
	            ?>
			</div>

			<div class="b-page__shift-overlay b-page__shift-overlay--js"></div>
			<div class="b-header__mobile__icons">
				<div class="b-header__mobile__icon b-header__mobile__icons__sandwich b-nav__aside-menu--js">
					<a class="b-nav__content__element__link color-navigation-mobile-link" href="#"><span class="b-icon b-icon--huge"></span></a>
				</div>
				<div class="b-header__mobile__icon b-header__mobile__icons__login popup-trigger--js" data-popup=".b-popup--login--js">
					<a class="b-nav__content__element__link color-navigation-mobile-link" href="#"><span class="b-icon b-icon--huge"></span></a>
				</div>
			</div>

			<div class="footer-buffer"></div>
		</div>

		<div class="l-aside color-aside">
			<ul class="b-aside__nav">
				<li class="b-aside__nav__element">
					<a class="b-aside__nav__element__link color-aside-link" href="?page=howitworks">Как это работает</a>
				</li>
				<li class="b-aside__nav__element">
					<a class="b-aside__nav__element__link color-aside-link" href="/">Каталог</a>
				</li>
				<li class="b-aside__nav__element">
					<a class="b-aside__nav__element__link color-aside-link" href="#">Способы оформления</a>
				</li>
				<li class="b-aside__nav__element">
					<a class="b-aside__nav__element__link color-aside-link" href="?page=delivery">Доставка и оплата</a>
				</li>
				<li class="b-aside__nav__element">
					<a class="b-aside__nav__element__link color-aside-link" href="?page=help">Помощь</a>
				</li>
			</ul>

			<div class="b-aside__footer color-aside-footer">
				<div class="b-aside__footer__block">
					© 2014 Printtunnel. ООО «Теремок». Москва, Котляковская 3, стр. 13, офис 505<br />
					ИНН 223322223. ОГРН 2255567932
				</div>

				<div class="b-aside__footer__block">
					Работает на технологии <a class="b-footer__block__link color-footer-link" target="_blank" href="http://netprint.ru">netPrint.ru</a>
				</div>

				<div class="b-aside__footer__block"><a class="b-footer__block__link color-footer-link" href="#">Соглашение об использовании сервиса</a></div>
			</div>
		</div>

		<footer class="l-footer color-footer b-footer--js">
			<div class="b-footer l-content">
				<div class="b-footer__block b-footer__address">
					© 2014 Printtunnel. ООО «Теремок». Москва, Котляковская 3, стр. 13, офис 505<br />
					ИНН 223322223. ОГРН 2255567932
				</div>

				<div class="b-footer__block b-footer__copyrights">
					Работает на технологии <a class="b-footer__block__link color-footer-link" target="_blank" href="http://netprint.ru">netPrint.ru</a><br />
					<a class="b-footer__block__link color-footer-link" href="/?page=agreement">Соглашение об использовании сервиса</a>
				</div>
			</div>
		</footer>

		<div class="b-popup-bg">&nbsp;</div>
		<div class="b-popup b-popup--login b-popup--login--js">
			<div class="b-auth b-popup__content color-popup">
				<div class="b-popup__close b-popup__close--js"></div>

				<h2 class="b-content__heading color-heading">Вход</h2>

				<div class="b-auth__credentials color-auth-credentials">
					<form action="">
						<fieldset>
							<div class="b-row b-auth__note color-article">
								Нет аккаунта? Пройдите <a class="popup-trigger--js" data-popup=".b-popup--register--js" href="#">регистрацию</a>
							</div>
							<div class="b-row">
								<input class="b-input b-input--auth color-input" placeholder="Логин" type="text" />
							</div>
							<div class="b-row">
								<input class="b-input b-input--auth color-input" placeholder="Пароль"  type="password" />
							</div>
							<div class="b-row">
								<div class="b-auth__params color-article">
									<a href="#" class="popup-trigger--js" data-popup=".b-popup--amnesia--js">Забыли пароль?</a>

									<label class="b-checkbox b-checkbox--js b-auth__params__remember__checkbox">
										<span class="b-checkbox__custom"><span class="b-icon b-icon--checkmark--js"></span></span>
										<input class="b-checkbox__input" type="checkbox" /> Запомнить меня
									</label>
								</div>

								<div class="b-button b-button--auth color-button">
									<a href="#">Войти</a>
								</div>
							</div>
						</fieldset>
					</form>

					<div class="b-auth__bubble color-auth-bubble">или</div>
				</div>

				<div class="b-auth__socials">
					<div class="b-row b-auth__note color-article">
						Авторизоваться через соц. сети
					</div>

					<div class="b-auth__social-buttons">
						<div class="b-auth__social-buttons__button b-auth__social-buttons__button--vk">
							<div class="b-auth__social-buttons__button__icon">
								<img src="/assets/i/icon-vk.png" alt=""/>
							</div>
							ВКонтакте
						</div><div
							class="b-auth__social-buttons__button b-auth__social-buttons__button--ok">
							<div class="b-auth__social-buttons__button__icon">
								<img src="/assets/i/icon-ok.png" alt=""/>
							</div>
							Одноклассники
						</div><div
							class="b-auth__social-buttons__button b-auth__social-buttons__button--fb">
							<div class="b-auth__social-buttons__button__icon">
								<img src="/assets/i/icon-fb.png" alt=""/>
							</div>
							Facebook
						</div><div
							class="b-auth__social-buttons__button b-auth__social-buttons__button--mail">
							<div class="b-auth__social-buttons__button__icon">
								<img src="/assets/i/icon-mail.png" alt=""/>
							</div>
							Мой мир
						</div>
					</div>
				</div>
			</div>
		</div>

<!--		Reg-->
		<div class="b-popup b-popup--login b-popup--register--js">
			<div class="b-auth b-popup__content color-popup">
				<div class="b-popup__close b-popup__close--js"></div>

				<h2 class="b-content__heading color-heading">Регистрация</h2>

				<div class="b-auth__credentials color-auth-credentials">
					<form action="">
						<fieldset>
							<div class="b-row b-auth__note color-article">
								Укажите e-mail или телефон
							</div>
							<div class="b-row">
								<input class="b-input b-input--auth color-input" placeholder="E-mail" type="text" />
							</div>
							<div class="b-row">
								<input class="b-input b-input--auth color-input" placeholder="Телефон"  type="text" />
							</div>
							<div class="b-row">
								<div class="b-button b-button--auth b-button--register color-button">
									<a href="#">Зарегистрироваться</a>
								</div>
							</div>
						</fieldset>
					</form>

					<div class="b-auth__bubble color-auth-bubble">или</div>
				</div>

				<div class="b-auth__socials">
					<div class="b-row b-auth__note color-article">
						Зарегистрироваться через соц. сети
					</div>

					<div class="b-auth__social-buttons">
						<div class="b-auth__social-buttons__button b-auth__social-buttons__button--vk">
							<div class="b-auth__social-buttons__button__icon">
								<img src="/assets/i/icon-vk.png" alt=""/>
							</div>
							ВКонтакте
						</div><div
							class="b-auth__social-buttons__button b-auth__social-buttons__button--ok">
							<div class="b-auth__social-buttons__button__icon">
								<img src="/assets/i/icon-ok.png" alt=""/>
							</div>
							Одноклассники
						</div><div
							class="b-auth__social-buttons__button b-auth__social-buttons__button--fb">
							<div class="b-auth__social-buttons__button__icon">
								<img src="/assets/i/icon-fb.png" alt=""/>
							</div>
							Facebook
						</div><div
							class="b-auth__social-buttons__button b-auth__social-buttons__button--mail">
							<div class="b-auth__social-buttons__button__icon">
								<img src="/assets/i/icon-mail.png" alt=""/>
							</div>
							Мой мир
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Amnesia -->
		<div class="b-popup b-popup--login b-popup--amnesia--js">
			<div class="b-auth b-popup__content color-popup">
				<div class="b-popup__close b-popup__close--js"></div>

				<h2 class="b-content__heading color-heading">Восстановление пароля</h2>

				<div class="b-auth__credentials b-auth__credentials--amnesia color-auth-credentials">
					<form action="">
						<fieldset>
							<div class="b-row">
								<input class="b-input b-input--auth color-input" placeholder="Логин" type="text" />
							</div>
							<div class="b-row">
								<input class="b-input b-input--auth color-input" placeholder="E-mail"  type="text" />
							</div>
							<div class="b-row">
								<div class="b-button b-button--auth b-button--register color-button">
									<a href="#">Восстановить</a>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>

		<div class="b-popup b-popup--login b-popup--zoom-1--js">
			<div class="b-auth b-popup__content color-popup">
				<div class="b-popup__close b-popup__close--js"></div>

				<img src="/assets/i/temp/image-big.jpg" alt=""/>
			</div>
		</div>
	</body>
</html>