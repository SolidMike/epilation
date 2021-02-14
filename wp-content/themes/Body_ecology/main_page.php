<?php

/**
* Template Name: Главная страница
* Author: 1.1maksimchervyakov@gmail.com
*/


?>


<?php get_header(); ?>
<?php $template_url = get_template_directory_uri(); ?>

<body id="top">
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="header__logo col"><a class="logo" href="#top"><img src="<?php the_field('header_logo', 'option'); ?>" alt=""/></a></div>
				<div class="header__social hidden_md col">
					<div class="social">

						<?php
						if ( have_rows('header_social' , options) ) :
							while ( have_rows('header_social', options) ) : the_row();
								?>

								<a href="<?php echo the_sub_field('ssylka_na_socz_set') ?>" target="_blank" rel="noopener nofollow">
									<img src="<?php echo the_sub_field('ikonka_soczialnoj_seti') ?>" alt=""/>
								</a>

								<?
							endwhile;
						endif;
						?>

					</div>
				</div>
				<nav class="nav nav-bar col" id="nav-bar">
					<div class="header__social visible_md col">
						<div class="social">

							<?php
							if ( have_rows('header_social' , options) ) :
								while ( have_rows('header_social', options) ) : the_row();
									?>

									<a href="<?php echo the_sub_field('ssylka_na_socz_set') ?>" target="_blank" rel="noopener nofollow">
										<img src="<?php echo the_sub_field('ikonka_soczialnoj_seti') ?>" alt=""/>
									</a>

									<?
								endwhile;
							endif;
							?>

						</div>
					</div>
					<div class="header__links visible_sm col">
						<a class="button button_gradient" href="<?php the_field('info_franchise', 'option') ?>" target="_blank" rel="noopener nofollow">
							<span class="button__gradient"></span><span class="button__text">Информация о студиях</span>
						</a>
					</div>
					<?php $header_phone = get_field('header_phone', 'option');?>
					<div class="header__call visible_xs col">
						<a href="tel:+<?php echo preg_replace('/[^\d]+/', '', strip_tags($header_phone));?>"><?php the_field('header_phone', 'option') ?></a>
						<a class="button" href="#modal" data-toggle="modal">
							<span class="button__gradient"></span><span class="button__text">Обратный звонок</span>
						</a>
					</div>
				</nav>
				<div class="header__links hidden_sm col">
					<a class="button button_gradient" href="<?php the_field('info_franchise', 'option') ?>" target="_blank" rel="noopener nofollow">
						<span class="button__gradient"></span>
						<span class="button__text">Информация о студиях</span>
					</a>
				</div>
				<div class="header__call hidden_xs col">
					<a href="tel:+<?php echo preg_replace('/[^\d]+/', '', strip_tags($header_phone));?>"><?php the_field('header_phone', 'option') ?></b>
					</a>
					<a class="button" href="#modal" data-toggle="modal">
						<span class="button__gradient"></span>
						<span class="button__text">Обратный звонок</span>
					</a>
				</div>
				<button class="nav-toggle" type="button" data-toggle="nav" data-target="#nav-bar"><span class="_top"></span><span class="_mid"></span><span class="_bot"></span></button>
			</div>
		</div>
	</header>

	<div class="wrapper">
		<div class="screen section-main _franchise">
			<div class="screen__bg section-main__bg"></div>
			<div class="screen__overlay section-main__overlay"></div>
			<div class="container">
				<div class="row">
					<div class="main__left _franchise col">
						<h1 class="title _franchise text_uppercase" data-aos="fade-down"><?php the_field('first_screen_title') ?></h1>
						<div class="description _franchise" data-aos="fade-right" data-aos-delay="150"><?php the_field('first_screen_under_title') ?></div>
						<div class="main-advantage-row" data-aos="">

							<?php
							if ( have_rows('first_screen_adv') ) :
								while ( have_rows('first_screen_adv') ) : the_row();
									?>

									<div class="main-advantage-row__item">
										<div class="main-advantage-row__image"><img src="<?php the_sub_field('first_screen_adv_img') ?>" alt=""/></div>
										<div class="main-advantage-row__descr"><?php the_sub_field('first_screen_adv_text') ?></div>
									</div>

									<?
								endwhile;
							endif;
							?>  

						</div>
						<a class="button _franchise" href="#modal-consult" data-toggle="modal" data-aos="fade-up" data-aos-delay="300"><span class="button__gradient"></span><span class="button__text"><?php the_field('first_screen_btn_text') ?></span></a>
					</div>
				</div>
				<div class="main-device _franchise" data-aos="fade-left" data-aos-delay="500"><img class="main-device__image" src="<?php the_field('first_screen_img') ?>" alt="Лазерные аппараты"/></div>
			</div>
			<div class="scroll-down"><img src="<?php echo get_template_directory_uri(); ?>/img/scroll-down.png" alt=""/></div>
		</div>

		<div class="screen you-can">
			<div class="container">
				<div class="row">
					<div class="you-can__title title title_lg text_uppercase text_center col" data-aos="fade-up"><?php the_field('sec_title') ?></div>
					<div class="you-can__list" data-aos="">

						<?php
						if ( have_rows('sec_repeater') ) :
							while ( have_rows('sec_repeater') ) : the_row();
								?>

								<div class="you-can__item">
									<div class="you-can__item-image gradient-circle">
										<div class="gradient-circle__animation gradient-circle__animation_1"></div>
										<div class="gradient-circle__animation gradient-circle__animation_2"></div><img src="<?php the_sub_field('sec_repeater_img') ?>" alt=""/>
									</div>
									<div class="you-can__item-descr">
										<div class="you-can__item-title title title_sm"><?php the_sub_field('sec_repeater_title') ?></div>
										<div class="you-can__item-content content">
											<?php the_sub_field('sec_repeater_text') ?>
										</div>
									</div>
								</div>

								<?
							endwhile;
						endif;
						?>

					</div>
				</div>
			</div>
		</div>

		<div class="screen about">
			<div class="screen__bg about__bg"></div>
			<div class="screen__overlay about__overlay"></div>
			<div class="container">
				<div class="about__title title title_lg text_uppercase text_center" data-aos="fade-up">ВИДЕО О КОМПАНИИ IMPULS MEDICAL</div>
				<div class="about__video video-block" data-aos="fade-up">
					<div class="embed-responsive" data-video="<?php the_field('kod_video') ?>" data-poster="<?php the_field('video_poster') ?>"></div>
				</div>
				<div class="about__list row" data-aos="">
					<?php

					if ( have_rows('adv_repeater') ) :
						while ( have_rows('adv_repeater') ) : the_row();
							?>

							<div class="about__item">
								<div class="about__item-image"><img src="<?php the_sub_field('adv_repeater_img') ?>" alt=""/></div>
								<div class="about__item-descr">
									<div class="about__item-title title title_sm"><?php the_sub_field('adv_repeater_title') ?></div>
									<div class="about__item-content"><?php the_sub_field('adv_repeater_text') ?></div>
								</div>
							</div>

							<?
						endwhile;
					endif;
					?>

				</div>
			</div>
		</div>

		<div class="screen catalog">
			<div class="screen__bg catalog__bg"></div>
			<div class="screen__overlay catalog__overlay"></div>
			<div class="container">
				<div class="row">
					<div class="catalog__title title title_lg text_uppercase col" data-aos="fade-up">каталог <span>оборудования</span></div>
					<div class="catalog__tab tab">

						<?php

						if( have_rows('catalog_tabs_repeater') ):

							$i = 1;

							echo '<div class="catalog__tab-nav tab-nav" data-aos="">';

							while ( have_rows('catalog_tabs_repeater') ) : the_row();
								?>

								<a class="button button_gradient tab-nav__item <?php if($i == 1) echo 'active';?>" href="#tab_<?=$i;?>"><span class="button__gradient"></span><span class="button__text"><?php the_sub_field('catalog_tabs_name'); ?></span></a>

								<?php   $i++;

							endwhile;

							echo '</div>
							<div class="tab-content" data-aos="fade-up" data-aos-delay="300">';
							$i = 1;

							while ( have_rows('catalog_tabs_repeater') ) : the_row();
								?>

								<div class="tab-content__item <?php if($i == 1) echo 'active';?>" id="tab_<?=$i?>">

									<?php 
									if( have_rows('catalog_tabs_content') ):
										while ( have_rows('catalog_tabs_content') ) : the_row(); 
											?>

											<div class="catalog__image col">
												<div class="catalog__image-img gradient-circle">
													<div class="gradient-circle__animation gradient-circle__animation_1"></div>
													<div class="gradient-circle__animation gradient-circle__animation_2"></div><img src="<?php the_sub_field('catalog_img') ?>" alt=""/>
													<div class="catalog__image-promo"><?php the_sub_field('catalog_promo') ?></div>
												</div>
											</div>
											<div class="catalog__descr col">
												<div class="title title_sm text_center"><span><?php the_sub_field('catalog_product_name') ?></span></div>
												<div class="catalog__content content">
													<?php the_sub_field('catalog_product_descr') ?>
												</div>
												<div class="catalog__links"><a class="catalog__links-item" href="<?php the_sub_field('catalog_presentation_link') ?>" download="download">
													<div class="catalog__links-icon"><img src="<?php echo $template_url; ?>/img/icons/icon_download.png" alt=""/></div><b>Скачать презентацию</b></a><a class="catalog__links-item" href="<?php the_sub_field('catalog_videoreview') ?>" data-toggle="video">
														<div class="catalog__links-icon"><img src="<?php echo $template_url; ?>/img/icons/icon_video.png" alt=""/></div><b>Смотреть видеообзор</b></a></div><a class="catalog__button button" href="#modal" data-toggle="modal"><span class="button__gradient"></span><span class="button__text">Актуальные цены</span></a>
													</div>
													<div class="catalog__advantage col">

														<?php
														if( have_rows('catalog_advantages_repeater') ):
															while ( have_rows('catalog_advantages_repeater') ) : the_row();
																?>

																<div class="catalog__advantage-item">
																	<div class="catalog__advantage-item-title"><?php the_sub_field('catalog_advantages_title');?></div>
																	<div class="catalog__advantage-item-descr"><?php the_sub_field('catalog_advantages_descr');?></div>
																</div>

																<?
															endwhile;
														endif;
														?>

													</div>  
													<div class="catalog__table col">
														<div class="catalog__table-title title title_sm"><span>Аренда <?php the_sub_field('catalog_product_name') ?></span></div>
														<div class="catalog__table-wrapper table-responsive">

															<?php $table = get_sub_field( 'catalog_table' );

															if ( ! empty ( $table ) ) {

																echo '<table>';

																if ( ! empty( $table['caption'] ) ) {

																	echo '<caption>' . $table['caption'] . '</caption>';
																}

																if ( ! empty( $table['header'] ) ) {
																	echo '<tr>';

																	foreach ( $table['header'] as $th ) {

																		echo '<th>';
																		echo $th['c'];
																		echo '</th>';
																	}

																	echo '</tr>';
																}
																foreach ( $table['body'] as $tr ) {

																	echo '<tr>';

																	foreach ( $tr as $td ) {

																		echo '<td>';
																		echo $td['c'];
																		echo '</td>';
																	}

																	echo '</tr>';
																}
																echo '</table>';
															}
															?>
														</div>
													</div>
												</div>

												<?
											endwhile;
										endif;
										?>

										<div class="clearfix"></div>

										<?php $i++;
									endwhile;
								endif;
								echo '</div>';
								?>

							</div>
						</div>
					</div>
				</div>

				<div class="screen benefit">
					<div class="container">
						<div class="row">
							<div class="benefit__title title title_lg text_uppercase text_center col" data-aos="fade-up"><?php the_field('rent_title') ?></div>
							<div class="benefit__list" data-aos="">

								<?php
								if ( have_rows('rent_repeater') ) :
									while ( have_rows('rent_repeater') ) : the_row();
										?>

										<div class="benefit__item">
											<div class="benefit__item-image gradient-circle">
												<div class="gradient-circle__animation gradient-circle__animation_1"></div>
												<div class="gradient-circle__animation gradient-circle__animation_2"></div><img src="<?php the_sub_field('rent_repeater_img') ?>" alt=""/>
											</div>
											<div class="benefit__item-descr">
												<div class="benefit__item-title title title_sm"><?php the_sub_field('rent_repeater_title') ?></div>
												<div class="benefit__item-content content">
													<?php the_sub_field('rent_repeater_text') ?>
												</div>
											</div>
										</div>

										<?
									endwhile;
								endif;
								?>

							</div>
						</div>
					</div>
				</div>

				<div class="screen as-well">
					<div class="screen__bg as-well__bg"></div>
					<div class="screen__overlay as-well__overlay"></div>
					<div class="container">
						<div class="row">
							<div class="as-well__title title title_lg text_uppercase col" data-aos="fade-up"><?php the_field('also_title') ?></div>
							<div class="as-well__list col" data-aos="">

								<?php
								if ( have_rows('also_repeater') ) :
									while ( have_rows('also_repeater') ) : the_row();
										?>

										<div class="as-well__item">
											<div class="as-well__item-image"><img src="<?php the_sub_field('also_repeater_img') ?>" alt=""/></div>
											<div class="as-well__item-descr">
												<div class="as-well__item-title title title_sm"><?php the_sub_field('also_repeater_title') ?></div>
												<div class="as-well__item-content">
													<?php the_sub_field('also_repeater_text') ?>
												</div>
											</div>
										</div>

										<?
									endwhile;
								endif;
								?>

							</div>
							<div class="as-well__image col" data-aos="fade-right" data-aos-delay="300">
								<div class="as-well__image__img gradient-circle">
									<div class="gradient-circle__animation gradient-circle__animation_1"></div>
									<div class="gradient-circle__animation gradient-circle__animation_2"></div><img src="<?php the_field('also_img') ?>" alt=""/>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="screen together">
					<div class="container">
						<div class="row">
							<div class="together__image col" data-aos="zoom-out" data-aos-delay="150">
								<div class="together__image-img gradient-circle">
									<div class="gradient-circle__animation gradient-circle__animation_1"></div>
									<div class="gradient-circle__animation gradient-circle__animation_2"></div><img src="<?php the_field('together_img') ?>" alt=""/>
									<div class="together__image-promo"><?php the_field('together_promo') ?></div>
								</div>
							</div>
							<div class="together__descr col text_center">
								<div class="together__title title title_xl text_uppercase col" data-aos="fade-up"><?php the_field('together_title') ?></div>
								<div class="together__content content" data-aos="fade-up" data-aos-delay="150">
									<?php the_field('together_subtitle') ?>
								</div><a class="together__button button" href="<?php the_field('together_download') ?>" data-aos="fade-up" data-aos-delay="300" download="download"><span class="button__gradient"></span><span class="button__text"><?php the_field('together_btn_text') ?></span></a>
							</div>
						</div>
					</div>
				</div>

				<div class="screen salon">
					<div class="screen__bg salon__bg"></div>
					<div class="container">
						<div class="row">
							<div class="salon__title title title_lg text_uppercase text_center col" data-aos="fade-up"><?php the_field('salon_title') ?></div>
							<div class="salon-advantage" data-aos="">

								<?php
								if ( have_rows('salon_adv_repeater') ) :
									while ( have_rows('salon_adv_repeater') ) : the_row();
										?>

										<div class="salon-advantage__item">
											<div class="salon-advantage__item-image gradient-circle">
												<div class="gradient-circle__animation gradient-circle__animation_1"></div>
												<div class="gradient-circle__animation gradient-circle__animation_2"></div>
											</div>
											<div class="salon-advantage__item-title title title_sm"><?php the_sub_field('salon_adv_title') ?></div>
											<div class="salon-advantage__item-content content"><?php the_sub_field('salon_adv_subtitle') ?></div>
										</div>

										<?
									endwhile;
								endif;
								?>

							</div>
							<div class="salon-business">
								<div class="salon-business__title title title_md text_center col"><?php the_field('salon_business_title') ?></div>
								<div class="salon-business__content content text_center col" data-aos="fade-up" data-aos-delay="150"><?php the_field('salon_business_descr') ?>
								<a class="salon-business__button button" href="<?php the_field('salon_business_download') ?>" data-aos="fade-up" data-aos-delay="300" download="download"><span class="button__gradient"></span><span class="button__text"><?php the_field('salong_business_btn_text') ?></span></a>
							</div>
						</div>
						<div class="salon-business-list" data-aos="">

							<?php
							if ( have_rows('salon_business_repeater') ) :
								while ( have_rows('salon_business_repeater') ) : the_row();
									?>

									<div class="salon-business-list__item">
										<div class="salon-business-list__item-image gradient-circle">
											<div class="gradient-circle__animation gradient-circle__animation_1"></div>
											<div class="gradient-circle__animation gradient-circle__animation_2"></div><img src="<?php the_sub_field('salon_business_icon') ?>" alt=""/>
										</div>
										<div class="salon-business-list__item-content content"><?php the_sub_field('salon_business_content') ?></div>
									</div>

									<?
								endwhile;
							endif;
							?>

							<img class="salon-business-list__image" src="<?php the_field('salon_business_img') ?>" alt=""/>
						</div>
					</div>
				</div>
			</div>


			<div class="screen rent-advantage">
				<div class="container">
					<div class="row">
						<div class="rent-advantage__title title title_lg text_uppercase text_center col" data-aos="fade-up"><?php the_field('rent_adv_2_title') ?></div>
						<div class="rent-advantage__content content text_center col" data-aos="fade-up" data-aos-delay="150">
							<?php the_field('rent_adv_2_subtitle') ?>
						</div>
						<div class="rent-advantage__list" data-aos="">

							<?php
							if ( have_rows('rent_adv_2_repeater') ) :
								while ( have_rows('rent_adv_2_repeater') ) : the_row();
									?>

									<div class="rent-advantage__item">
										<div class="rent-advantage__item-image gradient-circle">
											<div class="gradient-circle__animation gradient-circle__animation_1"></div>
											<div class="gradient-circle__animation gradient-circle__animation_2"></div><img src="<?php the_sub_field('rent_adv_2_icon') ?>" alt=""/>
										</div>
										<div class="rent-advantage__item-content content"><?php the_sub_field('rent_adv_2_content') ?></div>
									</div>

									<?
								endwhile;
							endif;
							?>

						</div><a class="rent-advantage__button button" href="<?php the_field('rent_adv_2_download') ?>" data-aos="fade-up" data-aos-delay="300" download="download"><span class="button__gradient"></span><span class="button__text"><?php the_field('rent_adv_2_btn_text') ?></span></a>
						<div class="clearfix"></div>
						<div class="rent-advantage__slider-wrapper" data-aos="fade-up" data-aos-delay="150">
							<div class="rent-advantage__slider">

								<?php
								if ( have_rows('rent_adv_2_slider') ) :
									while ( have_rows('rent_adv_2_slider') ) : the_row();
										?>

										<div class="rent-advantage__slider-item">
											<div class="rent-advantage__slider-item-view"><img src="<?php the_sub_field('rent_adv_2_slide') ?>" alt=""/></div>
										</div>

										<?
									endwhile;
								endif;
								?>

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="screen partner-reviews">
				<div class="screen__bg partner-reviews__bg"></div>
				<div class="screen__overlay partner-reviews__overlay"></div>
				<div class="container">
					<div class="row">
						<div class="partner-reviews__title title title_lg text_uppercase text_center col" data-aos="fade-up"><?php the_field('partners_reviews_title') ?></div>
						<div class="partner-reviews__content content text_center col" data-aos="fade-up" data-aos-delay="150">
							<?php the_field('partners_reviews_under_title') ?>
						</div>
						<div class="partner-reviews__slider" data-aos="fade-up" data-aos-delay="300">

							<?php
							if ( have_rows('partners_reviews_repeater') ) :
								while ( have_rows('partners_reviews_repeater') ) : the_row();
									?>

									<div class="partner-reviews__slider-item">
										<div class="partner-reviews__slider-item-image"><img src="<?php the_sub_field('partners_reviews_repeater_img') ?>" alt=""/><a class="video-block__play" href="<?php the_sub_field('partners_reviews_repeater_video') ?>" data-toggle="video"></a></div>
										<div class="partner-reviews__slider-item-content">
											<div class="partner-reviews__slider-item-title text_uppercase"><?php the_sub_field('partners_reviews_repeater_name') ?></div>
											<div class="partner-reviews__slider-item-zone"><?php the_sub_field('partners_reviews_salon_device') ?></div>
											<div class="partner-reviews__slider-item-text"><?php the_sub_field('partners_reviews_name_text') ?></div>
										</div>
									</div>

									<?
								endwhile;
							endif;
							?>

						</div>
					</div>
				</div>
			</div>

			<div class="screen text-reviews">
				<div class="container">
					<div class="row">
						<div class="text-reviews__slider" data-aos="fade-up" data-aos-delay="300">

							<?php
							if ( have_rows('reviews_repeater') ) :
								while ( have_rows('reviews_repeater') ) : the_row();
									?>

									<div class="text-reviews__slider-item">
										<div class="text-reviews__slider-item-content">
											<div class="text-reviews__slider-item-title text_uppercase"><?php the_sub_field('reviews_repeater_name') ?></div>
											<div class="text-reviews__slider-item-zone"><?php the_sub_field('reviews_salon_device') ?></div>
											<div class="text-reviews__slider-item-text"><?php the_sub_field('reviews_name_text') ?></div>
										</div>
										<div class="text-reviews__slider-item-image"><img src="<?php the_sub_field('reviews_repeater_img') ?>" alt=""/></div>
									</div>

									<?
								endwhile;
							endif;
							?>

						</div>
					</div>
				</div>
			</div>

			<div class="screen section-promo">
				<div class="screen__bg section-promo__bg"></div>
				<div class="screen__overlay section-promo__overlay"></div>
				<div class="container">
					<div class="row">
						<div class="promo__content col">
							<div class="badge" data-aos="zoom-out">Акция</div>
							<div class="title text_uppercase" data-aos="fade-up" data-aos-delay="150"><?php the_field('action_title') ?></div>
							<div class="content" data-aos="fade-up" data-aos-delay="300">
								<?php the_field('action_text') ?>
							</div><a class="button" href="#modal-order" data-toggle="modal" data-aos="fade-up" data-aos-delay="450"><span class="button__gradient"></span><span class="button__text">Арендовать по акции</span></a>
						</div>
						<div class="promo__image col" data-aos="fade-left" data-aos-delay="300"><img src="<?php the_field('action_img') ?>" alt=""/></div>
					</div>
				</div>
			</div>

			<div class="screen section-contact">
				<div id="map"></div>
				<div class="container">
					<div class="row">
						<div class="contact contact_franchise" data-aos="zoom-in">

							<?php
							if ( have_rows('addresses') ) :
								while ( have_rows('addresses') ) : the_row();
									$phone = get_sub_field('addresses_phone');
									?>

									<div class="contact__title title title_md text_uppercase"><?php the_sub_field('addresses_title') ?></div>
									<div class="contact__franchise-item contact__franchise-item_address" data-coordinates="<?php the_sub_field('addresses_coordinate') ?>"><?php the_sub_field('addresses_adres') ?></div>
									<div class="contact__franchise-item contact__franchise-item_phone"><a href="tel:+<?php echo preg_replace('/[^\d]+/', '', $phone )?>"><?php the_sub_field('addresses_phone') ?></a></div>
									<div class="contact__franchise-item contact__franchise-item_schedule"><?php the_sub_field('addresses_time') ?></div>
									<div class="contact__franchise-item contact__franchise-item_email"><a href="mailto:<?php the_sub_field('addresses_email') ?>"><?php the_sub_field('addresses_email') ?></a></div>

									<?
								endwhile;
							endif;
							?>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer">
				<div class="container">
					<div class="row">
						<div class="footer__copy col"><span><?php the_field('footer_copiryght', option) ?></span><a href="#modal-policy" data-toggle="modal">Политика конфиденциальности</a></div>
						<div class="footer__social col">
							<div class="social">
								<?php
								if ( have_rows('header_social' , options) ) :
									while ( have_rows('header_social', options) ) : the_row();
										?>
										<a href="<?php echo the_sub_field('ssylka_na_socz_set') ?>" target="_blank" rel="noopener nofollow">
											<img src="<?php echo the_sub_field('ikonka_soczialnoj_seti') ?>" alt=""/>
										</a>
										<?
									endwhile;
								endif;
								?>
							</div>
						</div>
						<div class="footer__contacts col"><span>По вопросам сотрудничества:</span><a href="mailto:<?php the_field('footer_mail', option) ?>"><?php the_field('footer_mail', option) ?></a></div>
					</div>
				</div>
			</footer>
			<!-- START #back-top-->
			<div class="back-top" id="back-top"><a href="#top">
				<div class="back-top__arrow"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 256 256" style="enable-background:new 0 0 256 256;" xml:space="preserve">
					<g>
						<g>
							<polygon points="128,48.907 0,176.907 30.187,207.093 128,109.28 225.813,207.093 256,176.907"></polygon>
						</g>
					</g>
				</svg>
			</div></a></div>
			<!-- END #back-top-->



			<!-- START #modal-->
			<div class="modal mfp-hide" id="modal">
				<button class="modal-close" type="button" onClick="closePopup();"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt=""/></button>

				<?php echo do_shortcode('[contact-form-7 id="205" title="Обратный звонок" html_id="form_1" html_class="form"]') ?>

			</div>
			<!-- END #modal-->




			<!-- START #modal-consult-->
			<div class="modal mfp-hide" id="modal-consult">
				<button class="modal-close" type="button" onClick="closePopup();"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt=""/></button>
				<?php echo do_shortcode('[contact-form-7 id="206" title="Modal consult" html_id="form_2" html_class="form"]') ?>
			</div>
			<!-- END #modal-consult-->




			<!-- START #modal-order-->
			<div class="modal mfp-hide" id="modal-order">
				<button class="modal-close" type="button" onClick="closePopup();"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt=""/></button>
				<?php echo do_shortcode('[contact-form-7 id="207" title="Modal order" html_id="form_3" html_class="form"]') ?>
			</div>
			<!-- END #modal-order-->




			<!-- START #modal-->
			<div class="modal mfp-hide" id="modal-policy">
				<button class="modal-close" type="button" onClick="closePopup();"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt=""/></button>
				<div class="modal-header">
					<div class="title title_sm _f-black">Политика конфиденциальности</div>
				</div>
				<div class="content">
					<p>Данная политика конфиденциальности относится к сайту с доменным именем <strong>http://site.name/</strong> и его поддоменам. Страница содержит сведения о том, какую информацию администрация сайта или третьи лица могут получать, когда пользователь (вы) посещаете его.</p>
					<p><strong>Данные, которые собираются при посещении</strong></p>
					<p><strong>Персональные данные</strong></p>
					<p>Персональные данные при посещении сайта передаются пользователем добровольно, к ним могут относиться: имя, фамилия, отчество, номера телефонов, адреса электронной почты, адреса для доставки товаров или оказания услуг, реквизиты компании, которую представляет пользователь, должность в компании, которую представляет пользователь, аккаунты в социальных сетях, а также — прочие, заполняемые поля форм.</p>
					<p>Эти данные собираются в целях оказания услуг или продажи товаров, возможности связи с пользователем или иной активности пользователя на сайте, а также, чтобы отправлять пользователю информацию, которую он согласился получать.</p>
					<p>Мы не проверяем достоверность оставляемых данных и не гарантируем качественного исполнения заказов, оказания услуг или обратной связи с нами при предоставлении некорректных сведений.</p>
					<p>Данные собираются имеющимися на сайте формами для заполнения (например, регистрации, оформления заказа, подписки, оставления отзыва, вопроса, обратной связи и иными).</p>
					<p>Формы, установленные на сайте, могут передавать данные как напрямую на сайт, так и на сайты сторонних организаций (скрипты сервисов сторонних организаций).</p>
					<p>Данные могут собираться через технологию cookies (куки) как непосредственно сайтом, так и скриптами сервисов сторонних организаций. Эти данные собираются автоматически, отправку этих данных можно запретить, отключив cookies (куки) в браузере, в котором открывается сайт.</p>
					<p><strong>Не персональные данные</strong></p>
					<p>Кроме персональных данных при посещении сайта собираются не персональные данные, их сбор происходит автоматически веб-сервером, на котором расположен сайт, средствами CMS (системы управления сайтом), скриптами сторонних организаций, установленными на сайте. К данным, собираемым автоматически, относятся: IP адрес и страна его регистрации, имя домена, с которого вы к нам пришли, переходы посетителей с одной страницы сайта на другую, информация, которую ваш браузер предоставляет добровольно при посещении сайта, cookies (куки), фиксируются посещения, иные данные, собираемые счетчиками аналитики сторонних организаций, установленными на сайте.</p>
					<p>Эти данные носят неперсонифицированный характер и направлены на улучшение обслуживания клиентов, улучшения удобства использования сайта, анализа статистики посещаемости.</p>
					<p><strong>Предоставление данных третьим лицам</strong></p>
					<p>Мы не раскрываем личную информацию пользователей компаниям, организациям и частным лицам, не связанным с нами. Исключение составляют случаи, перечисленные ниже.</p>
					<p><strong><em>Данные пользователей в общем доступе</em></strong></p>
					<p>Персональные данные пользователя могут публиковаться в общем доступе в соответствии с функционалом сайта, например, при оставлении отзывов / вопросов, может публиковаться указанное пользователем имя, такая активность на сайте является добровольной, и пользователь своими действиями дает согласие на такую публикацию.</p>
					<p><strong><em>По требованию закона</em></strong></p>
					<p>Информация может быть раскрыта в целях воспрепятствования мошенничеству или иным противоправным действиям; по требованию законодательства и в иных случаях, предусмотренных законами РФ.</p>
					<p><strong><em>Для оказания услуг, выполнения обязательств</em></strong></p>
					<p>Пользователь соглашается с тем, что персональная информация может быть передана третьим лицам в целях оказания заказанных на сайте услуг, выполнении иных обязательств перед пользователем. К таким лицам, например, относятся курьерская служба, почтовые службы, службы грузоперевозок и иные.</p>
					<p><strong><em>Сервисам сторонних организаций, установленным на сайте</em></strong></p>
					<p>На сайте могут быть установлены формы, собирающие персональную информацию других организаций, в этом случае сбор, хранение и защита персональной информации пользователя осуществляется сторонними организациями в соответствии с их политикой конфиденциальности.</p>
					<p>Сбор, хранение и защита полученной от сторонней организации информации осуществляется в соответствии с настоящей политикой конфиденциальности.</p>
					<p><strong>Как мы защищаем вашу информацию</strong></p>
					<p>Мы принимаем соответствующие меры безопасности по сбору, хранению и обработке собранных данных для защиты их от несанкционированного доступа, изменения, раскрытия или уничтожения, ограничиваем нашим сотрудникам, подрядчикам и агентам доступ к персональным данным, постоянно совершенствуем способы сбора, хранения и обработки данных, включая физические меры безопасности, для противодействия несанкционированному доступу к нашим системам.</p>
					<p><strong>Ваше согласие с этими условиями</strong></p>
					<p>Используя сайт, вы выражаете свое согласие с этой политикой конфиденциальности. Если вы не согласны с этой политикой, пожалуйста, не используйте его. Ваше дальнейшее использование сайта после внесения изменений в настоящую политику будет рассматриваться как ваше согласие с этими изменениями.</p>
					<p><strong>Отказ от ответственности</strong></p>
					<p>Политика конфиденциальности не распространяется ни на какие другие сайты и не применима к веб-сайтам третьих лиц, которые могут содержать упоминание о нашем сайте и с которых могут делаться ссылки на сайт, а также ссылки с этого сайта на другие сайты сети интернет. Мы не несем ответственности за действия других веб-сайтов.</p>
					<p><strong>Изменения в политике конфиденциальности</strong></p>
					<p>Мы имеем право по своему усмотрению обновлять данную политику конфиденциальности в любое время. Мы рекомендуем пользователям регулярно проверять эту страницу ( <strong>http://site.name/privacy</strong>) для того, чтобы быть в курсе любых изменений о том, как мы защищаем информацию о пользователях, которую мы собираем. Используя сайт, вы соглашаетесь с принятием на себя ответственности за периодическое ознакомление с политикой конфиденциальности и изменениями в ней.</p>
				</div>
			</div>

			<?php get_footer(); ?>