<?php

/**
 * Template Name: How Buy page
 */

get_header(); ?>

<div class="page page_buy">

    <div class="page_all">

        <h1><?php the_title(); ?></h1>

        <ul class="path">
            <li><a href="/">Главная</a></li>
            <li><a href="/kak-kupyt/">Как купить</a></li>
        </ul>

        <section class="s_buy_procces cus_pad">

            <div class="head_style">
                <h2><?php echo __('[:ru]Процесс покупки[:ua]Процес покупки[:]') ?></h2>
            </div>
            <div class="buy_proc">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-4 col-12">
                            <div class="item">
                                <div class="it_n">1</div>
                                <img src="/wp-content/themes/wsf/assets/img/buy/plans.png" alt="">
                                <p><?php echo __('[:ru]Подберите планировку[:ua]Підберіть планування[:]'); ?></p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12">
                            <div class="item">
                                <div class="it_n">2</div>
                                <img src="/wp-content/themes/wsf/assets/img/buy/rassroch.png" alt="">
                                <p><?php echo __('[:ru]Узнайте рассрочку[:ua]Дізнайтесь про розстрочку[:]'); ?></p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12">
                            <div class="item">
                                <div class="it_n">3</div>
                                <img src="/wp-content/themes/wsf/assets/img/buy/view.png" alt="">
                                <p><?php echo __('[:ru]Запишитесь на просмотр[:ua]Запишіться на перегляд[:]'); ?></p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </section>

        <section class="s_doc cus_pad">

            <div class="head_style">
                <h2><?php echo __('[:ru]Неоходимые документы[:ua]Необхідні документи[:]'); ?></h2>
            </div>

            <div class="doc_cond">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="doc_img">
                                <img src="/wp-content/themes/wsf/assets/img/buy/documents.png" alt="">
                            </div>
                        </div>

                        <div class="col-lg-8 col-sm-6 col-12">
                            <ul class="doc_descr">
                                <li><?php echo __('[:ru]Паспорт, идентификационный номер[:ua]Паспорт, індентифікаційний номер[:]'); ?></li>
                                <li><?php echo __('[:ru]Свидетелство о браке[:ua]Свідоцтво про шлюб[:]'); ?></li>
                                <li><?php echo __('[:ru]Нотариально заверенное согласие супруги/супруга[:ua]Нотаріально завірена згода дружини/чоловіка[:]'); ?></li>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>

        </section>

        <section class="s_calculate cus_pad">

            <div class="head_style">
                <h2><?php echo __('[:ru]Калькулятор рассрочки[:ua]Калькулятор розстрочки[:]'); ?></h2>
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
                <h2><?php echo __('[:ru]Выберите квартиру[:ua]Виберіть квартиру[:]'); ?></h2>
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


        <!-- MAGNIFIC POPUP -->



<?php get_footer(); ?>
