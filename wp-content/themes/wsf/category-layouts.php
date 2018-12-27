<?php get_header(); ?>



<div class="page page_plans">

    <div class="page_all">

        <h1><? single_cat_title() ?></h1>

        <ul class="path">
            <li><a href="/"><?php echo __('[:ru]Главная[:ua]Головна[:]'); ?></a></li>
            <li><a href="/layouts/"><? single_cat_title() ?></a></li>
        </ul>

        <section class="s_flats cus_pad">

            <div class="head_style">
                <h2><?php echo __('[:ru]Подбор квартиры[:ua]Вибір квартири[:]'); ?></h2>
            </div>

            <div class="flats">


                <ul class="flat_nav">
                    <li data-filter="all"><a href="#" class="act_fl"><?php echo __('[:ru]Все[:ua]Всі[:]'); ?></a></a></li>
                    <li data-filter=".category-a"><a href="#"><?php echo __('[:ru]1-комнатная[:ua]1-кімнатна[:]'); ?></a></li>
                    <li data-filter=".category-b"><a href="#"><?php echo __('[:ru]2-комнатная[:ua]2-кімнатна[:]'); ?></a></li>
                    <li data-filter=".category-c"><a href="#"><?php echo __('[:ru]3-комнатная[:ua]3-кімнатна[:]'); ?></a></li>
                    <li data-filter=".category-d"><a href="#">Smart</a></li>
                </ul>

                <div class="container">

                    <div class="row flat_mixer">

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

                        <div class="col-lg-4 col-md-6 mix <?php echo get_field('fl_сat'); ?>">
                            <div class="item">
                                <a class="permal" href="<?php echo get_permalink(); ?>"><img src="<?php $img = get_field('flat_3d'); echo $img['url']; ?>" alt=""></a>
                                <h4><?php echo esc_html( get_the_title()); ?></h4>
                                <p>Жилая пл. : <?php echo get_field('total_area'); ?> м<sup>2</sup></p>
                                <p>Общая пл. : <?php echo get_field('dwelling_place'); ?> м<sup>2</sup></p>
                                <a href="<?php echo get_permalink(); ?>" class="butt_blue"><?php echo __('[:ru]Подробнее[:ua]Детальніше[:]'); ?></a>
                            </div>
                        </div>

                        <?php endwhile; ?>

                    </div>

                </div>



        </section>

        <!-- <section class="mob_paln_filter">

            <h2>Много планировок?</h2>
            <p>Выберите квартиру, которая больше всего вам подходит, отфильтровав ненужную массу</p>

        </section> -->

        <section class="s_help">

            <h2><?php echo __('[:ru]Осталтсь вопросы или не можете выбрать?[:ua]Залишилися питання або просто не можете вибрати?[:]'); ?></h2>

            <div class="p_bl">
                <p class="help_descr type2"><?php echo __('[:ua]Ми з радістю вам допоможемо у визначенні з вибором вашої майбутньої квартири![:ru]Мы будем рады вам помочь в определении с выбором вашей будущей квартиры![:]'); ?></p>
                <p class="help_descr"><?php echo __('[:ua]Залиште заявку і ми зв\'яжемося з вами в будь-який зручний для вас час або в самий найближчий[:ru]Оставьте заявку и мы свяжемся с вами в любое удобное для вас время или в самое ближайшее.[:]'); ?></p>
            </div>

            <form class="form_help form_style">

<!--                <div class="calculate d-block d-lg-none">-->
<!---->
<!--                    <div class="row">-->
<!---->
<!--                        <div class="col-12 col-lg-6 col-xl-4 fl_cent">-->
<!--                            <div class="cal_item">-->
<!--                                <div class="frst_inst cal_h">-->
<!--                                    <span class="do">До</span>-->
<!--                                    <input type="text" placeholder="250 000">-->
<!--                                    <select class="inst_sel">-->
<!--                                        <option>UAH</option>-->
<!--                                        <option>USD</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-12 col-lg-6 col-xl-4 fl_cent">-->
<!--                            <div class="cal_item">-->
<!--                                <div class="square cal_h">-->
<!--                                    <span class="ot">От</span>-->
<!--                                    <input type="text" placeholder="0">-->
<!--                                    <span class="separ">-</span>-->
<!--                                    <span class="do">До</span>-->
<!--                                    <input type="text" placeholder="0">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-12 col-lg-12 col-xl-4 last_calc fl_cent">-->
<!--                            <div class="cal_item">-->
<!--                                <div class="room_bl cal_h">-->
<!--                                    <select class="room_sel">-->
<!--                                        <option>1-комнатная</option>-->
<!--                                        <option>2-комнатная</option>-->
<!--                                        <option>3-комнатная</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->


                <input type="text" name="name" placeholder="<?php echo __('[:ua]Ваше ім\'я[:ru]Ваше имя[:]'); ?>" required>
                <input type="tel" name="phone" placeholder="Телефон" required>
                <input type="email" name="email" placeholder="Email">

                <p><?php echo __('[:ua]Виберіть зручний для вас період, протягом якого ви б хотіли, щоб ми з вами зв\'язалися[:ru]Выберите удобный для вас период, за который вы бы хотели, чтобы мы с вами связались[:]'); ?></p>


                <div class="but_form">

                    <div class="radio_wrap">
                        <div class="radio">
                            <label>
                                <input type="radio" name="rooms" id="now" value="Сейчас"/>
                                <span></span>
                                <?php echo __('[:ua]Зараз[:ru]Сейчас[:]'); ?>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="rooms" id="late" value="1-2 часа"/>
                                <span></span>
                                <?php echo __('[:ua]1-2 години[:ru]1-2 часа[:]'); ?>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="rooms" id="evening" value="Вечером"/>
                                <span></span>
                                <?php echo __('[:ua]Увечері[:ru]Вечером[:]'); ?>
                            </label>
                        </div>
                    </div>

                    <button class="butt_sky" type="submit"><?php echo __('[:ua]Замовити консультацію[:ru]Заказать консультацию[:]'); ?></button>

                </div>

                <div class="succes_help">
                    <div class="cont">
                        <h4><?php echo __('[:ua]Дякую за заявку![:ru]Спасибо за заявку![:]'); ?></h4>
                        <p><?php echo __('[:ua]Наш менеджер зв`яжеться з Вами найближчим часом![:ru]Наш менеджер свяжеться с Вами в ближайшее время[:]'); ?></p>
                    </div>
                </div>

            </form>

        </section>


     <?php get_footer();?>