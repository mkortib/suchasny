<?php get_header(); ?>


<!-- Main content container start -->

    <div class="page page_plan">

    <div class="page_all">

        <h1><?php the_title() ?></h1>

        <ul class="path">
            <li><a href="/"><?php echo __('[:ru]Главная[:ua]Головна[:]'); ?></a></li>
            <li><a href="/layouts/">Планировки</a></li>
        </ul>

        <section class="s_flat_op cus_pad">

            <div class="back">
                <a href="/layouts/"><i class="fas fa-long-arrow-alt-left"></i><?php echo __('[:ru]Вернуться[:ua]Повернутись[:]'); ?></a>
            </div>

            <div class="mob_descr_fl d-lg-none">
                <h4><?php echo __('[:ru]Общая площадь[:ua]Загальна площа[:]'); ?>: <?php echo get_field('total_area'); ?> м<sup>2</sup></h4>
                <h4><?php echo __('[:ru]Жилая площадь[:ua]Житлова площа[:]'); ?>: <?php echo get_field('dwelling_place'); ?> м<sup>2</sup></h4>
            </div>

            <div class="flat_op">

                <div class="container">

                    <div class="row">

                        <div class="col-xl-6 col-lg-12 order-xl-1 order-2">

                            <div class="flat_info">

                                <div class="all_square">
                                    <h4><?php echo __('[:ru]Общая площадь[:ua]Загальна площа[:]'); ?>: <?php echo get_field('total_area'); ?> м<sup>2</sup></h4>
                                    <h4><?php echo __('[:ru]Жилая площадь[:ua]Житлова площа[:]'); ?>: <?php echo get_field('dwelling_place'); ?> м<sup>2</sup></h4>
                                </div>

                                <div class="table_inf">

                                    <ul class="i_names">
                                        <li><?php echo __('[:ru]Этаж[:ua]Поверх[:]'); ?>:</li>
                                        <li><?php echo __('[:ru]Секция[:ua]Секція[:]'); ?>:</li>
                                        <li><?php echo __('[:ru]Прихожая[:ua]Прихожа[:]'); ?>(1):</li>
                                        <li><?php echo __('[:ru]Гардеробная[:ua]Гардеробна[:]'); ?>(2):</li>
                                        <li><?php echo __('[:ru]Ванная комната[:ua]Ванна кімната[:]'); ?>(3):</li>
                                        <li>Кухня(4):</li>
                                        <li><?php echo __('[:ru]Жилая комната[:ua]Житлова кімната[:]'); ?>(5):</li>
                                        <li>Балкон(6):</li>
                                    </ul>

                                    <ul class="i_values">
                                        <li><?php echo get_field('floors'); ?></li>
                                        <li><?php echo get_field('section'); ?></li>
                                        <li><?php echo get_field('l_room-3'); ?></li>
                                        <li><?php echo get_field('dressing_room'); ?></li>
                                        <li><?php echo get_field('bathroom_1'); ?></li>
                                        <li><?php echo get_field('kitchen'); ?></li>
                                        <li><?php echo get_field('l_room-1'); ?></li>
                                        <li><?php echo get_field('balcony'); ?></li>
                                    </ul>

                                </div>

                                <div class="action_bl">
                                    <a class="butt_sky popup-with-zoom-anim" href="#popup_form1"><?php echo __('[:ru]Заказать консультацию[:ua]Замовити консультацію[:]'); ?></a>
                                    <a href="#" class="down_pl"><i class="fas fa-download"></i><?php echo __('[:ru]скачать PDF планировки[:ua]завантажити PDF планування[:]'); ?></a>
                                </div>

                            </div>

                        </div>

                        <div class="col-xl-6 col-lg-12 order-xl-2 order-1">

                            <div class="flat_item">

                                <ul class="view">
                                    <li class="d3 cur_view">3D</li>
                                    <li class="d2">2D</li>
                                </ul>

                                <div class="img_bl">
                                    <a data-fancybox="images" href="<?php $img = get_field('flat_3d'); echo $img['url']; ?>"><img src="<?php $img = get_field('flat_3d'); echo $img['url']; ?>" style="display: block" id="d3" data-square="<?php $img = get_field('flat_3d'); echo $img['url']; ?>" alt=""></a>
                                    <a data-fancybox="images" href="<?php $img = get_field('img'); echo $img['url']; ?>"><img src="<?php $img = get_field('img'); echo $img['url']; ?>" id="d2" data-square="<?php $img = get_field('flat_3d'); echo $img['url']; ?>" alt=""></a>
                                </div>

                                <div class="compas"><img src="/wp-content/themes/wsf/assets/img/compas.svg" alt=""></div>

                            </div>

                        </div>




                    </div>

                </div>

            </div>

        </section>

        <section class="s_view cus_pad">

            <h2><?php echo __('[:ru]Приблизительная визуализация[:ua]Приблизна візуалізація[:]'); ?></h2>

            <div class="slides_view">

                <div class="container">

                    <div class="row slider_view justify-content-between">

                        <?php

                        // vars
                        $hero = get_field('visual');

                        if( $hero ): ?>

                            <div class="col-lg-5 slide">
                                <img src="<?php echo $hero['image1']['url']; ?>" alt="">
                            </div>
                            <div class="col-lg-5 slide">
                                <img src="<?php echo $hero['image2']['url']; ?>" alt="">
                            </div>
                            <div class="col-lg-5 slide">
                                <img src="<?php echo $hero['image3']['url']; ?>" alt="">
                            </div>
                            <div class="col-lg-5 slide">
                                <img src="<?php echo $hero['image1']['url']; ?>" alt="">
                            </div>
                            <div class="col-lg-5 slide">
                                <img src="<?php echo $hero['image2']['url']; ?>" alt="">
                            </div>


                        <?php endif; ?>

                    </div>

                </div>

                <div class="slide_nav view_nav">
                    <i class="fas fa-caret-left"></i>
                    <i class="fas fa-caret-right"></i>
                </div>


            </div>



    </section>


    <section class="s_help">

        <h2><?php echo __('[:ru]Осталтсь вопросы или не можете выбрать?[:ua]Залишилися питання або просто не можете вибрати?[:]'); ?></h2>

        <div class="p_bl">
            <p class="help_descr type2"><?php echo __('[:ua]Ми з радістю вам допоможемо у визначенні з вибором вашої майбутньої квартири![:ru]Мы будем рады вам помочь в определении с выбором вашей будущей квартиры![:]'); ?></p>
            <p class="help_descr"><?php echo __('[:ua]Залиште заявку і ми зв\'яжемося з вами в будь-який зручний для вас час або в самий найближчий[:ru]Оставьте заявку и мы свяжемся с вами в любое удобное для вас время или в самое ближайшее.[:]'); ?></p>
        </div>

        <form class="calculate">

            <div class="row">

                <div class="col-12 col-lg-6 col-xl-4 fl_cent">
                    <div class="cal_item">
                        <h4><?php echo __('[:ru]Первый взнос[:ua]Перший внесок[:]'); ?></h4>
                        <div class="frst_inst cal_h">
                            <span class="do">До</span>
                            <input type="text" placeholder="250 000">
                            <select class="inst_sel">
                                <option>UAH</option>
                                <option>USD</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-xl-4 fl_cent">
                    <div class="cal_item">
                        <h4>Метраж </h4>
                        <div class="square cal_h">
                            <span class="ot"><?php echo __('[:ru]От[:ua]Від[:]'); ?></span>
                            <input type="text" placeholder="0" name="from">
                            <span class="separ">-</span>
                            <span class="do">До</span>
                            <input type="text" placeholder="0" name="to">
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-12 col-xl-4 last_calc fl_cent">
                    <div class="cal_item">
                        <h4><?php echo __('[:ru]Тип квартиры[:ua]Тип квартири[:]'); ?></h4>
                        <div class="room_bl cal_h">
                            <select class="room_sel">
                                <option><?php echo __('[:ru]1-комнатная[:ua]1-кімнатна[:]'); ?></option>
                                <option><?php echo __('[:ru]2-комнатная[:ua]2-кімнатна[:]'); ?></option>
                                <option><?php echo __('[:ru]3-комнатная[:ua]3-кімнатна[:]'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>

                <a class="butt_blue but_calc popup-with-zoom-anim" href="#popup_form2"><?php echo __('[:ru]Получить расчет:[:ua]Отримати розрахунок:[:]'); ?> <i class="fab fa-viber"></i><i class="fab fa-telegram-plane"></i></a>
        </form>

    </section>

    <section class="s_choose cus_pad">

        <div class="head_style">
            <h2>Другие планировки</h2>
        </div>

        <div class="plans_buy">

            <div class="slide_nav buy_plan_nav">
                <i class="fas fa-caret-left"></i>
                <i class="fas fa-caret-right"></i>
            </div>

            <div class="container">

                <div class="row buy_slide_plan">

                    <?php
                        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                        $flats = new WP_Query( array (
                            'cat'            => 7,
                            'posts_per_page' => -1,
                            'paged'          => $paged,
                            'order'          => 'ASC',
                            'orderby'        => 'date'
                        ) );
                        function status()  {
                            echo (get_field('status') == 'true') ? ('sold') : null;
                        }
                        ?>
                        <?php
                        if ($_GET && !empty($_GET)) : go_filter(); endif;
                        if ( have_posts() )
                        while ( $flats->have_posts() ) :
                        $flats->the_post();  ?>

                    <div class="col-lg-4">
                        <div class="item">
                            <a class="permal" href="<?php echo get_permalink(); ?>"><img src="<?php $img = get_field('flat_3d'); echo $img['url']; ?>" alt=""></a>
                            <h4><?php echo esc_html( get_the_title()); ?></h4>
                            <p><?php echo __('[:ru]Жилая пл[:ua]Житлова пл[:]'); ?>. : <?php echo get_field('total_area'); ?> м<sup>2</sup></p>
                            <p><?php echo __('[:ru]Общая пл[:ua]Загальна пл[:]'); ?>. : <?php echo get_field('dwelling_place'); ?> м<sup>2</sup></p>
                            <a href="<?php echo get_permalink(); ?>" class="butt_blue"><?php echo __('[:ru]Подробнее[:ua]Детальніше[:]'); ?></a>
                        </div>
                    </div>
                   <?php endwhile; ?>

                </div>

                <a href="/layouts/" class="more_pl"><?php echo __('[:ru]Посмотреть все[:ua]Подивитись все[:]'); ?></a>

            </div>

        </div>

    </section>

    </div>




<!-- Main content container end -->


<?php get_footer(); ?>