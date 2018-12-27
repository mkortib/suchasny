<?php get_header(); ?>

<? $post_title = get_the_title($post); $post_ID = get_the_ID(); ?>


    <div class="page page_gal">

        <div class="page_all">

            <h1>Галерея</h1>

            <ul class="path">
                <li><a href="#">Главная</a></li>
                <li><a href="#">Галерея</a></li>
            </ul>

            <section class="s_gallery_all cus_pad">

                <div class="head_style">
                    <h2>Визуализации комплекса</h2>
                </div>
                <div class="gallery_items">

                    <div class="container">

                        <div class="row">

                            <div class="col-xl-4 col-md-6">

                                <?php if( have_rows('repeater_field_name') ): ?>

                                    <div class="it_block">


                                        <?php while( have_rows('repeater_field_name') ): the_row();

                                            // vars
                                            $image = get_sub_field('image');
                                            $content = get_sub_field('content');
                                            $link = get_sub_field('link');

                                            ?>

                                        <div class="gallery_item">


                                                <?php if( $link ): ?>
                                                    <a href="<?php echo $link; ?>" style="background-image: url(<?php echo $link; ?>);"></a>
                                                    <a class="over_gal" data-fancybox="images" href="img/gallery/gal1.png"><i class="far fa-eye"></i></a>
                                                    <?php endif; ?>


                                                    <?php if( $link ): ?>
                                            <?php endif; ?>

                                        </div>

                                            <h4><?php echo $content; ?></h4>



                                        <?php endwhile; ?>

                                    </div>

                                <?php endif; ?>


                            </div>

                            <div class="col-xl-4 col-md-6">
                                <div class="it_block">
                                    <div class="gallery_item">
                                        <a href="img/gallery/gal2.png" style="background-image: url(img/gallery/gal2.png);"></a>
                                        <a class="over_gal" data-fancybox="images" href="img/gallery/gal2.png"><i class="far fa-eye"></i></a>
                                    </div>
                                    <h4>Описание картинки</h4>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6">
                                <div class="it_block">
                                    <div class="gallery_item">
                                        <a href="img/gallery/gal3.png" style="background-image: url(img/gallery/gal3.png);"></a>
                                        <a class="over_gal" data-fancybox="images" href="img/gallery/gal3.png"><i class="far fa-eye"></i></a>
                                    </div>
                                    <h4>Описание картинки</h4>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6">
                                <div class="it_block">
                                    <div class="gallery_item">
                                        <a href="img/gallery/gal4.png" style="background-image: url(img/gallery/gal4.png);"></a>
                                        <a class="over_gal" data-fancybox="images" href="img/gallery/gal4.png"><i class="far fa-eye"></i></a>
                                    </div>
                                    <h4>Описание картинки</h4>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6">
                                <div class="it_block">
                                    <div class="gallery_item">
                                        <a href="img/gallery/gal5.png" style="background-image: url(img/gallery/gal5.png);"></a>
                                        <a class="over_gal" data-fancybox="images" href="img/gallery/gal5.png"><i class="far fa-eye"></i></a>
                                    </div>
                                    <h4>Описание картинки</h4>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6">
                                <div class="it_block">
                                    <div class="gallery_item">
                                        <a href="img/gallery/gal6.png" style="background-image: url(img/gallery/gal6.png);"></a>
                                        <a class="over_gal" data-fancybox="images" href="img/gallery/gal6.png"><i class="far fa-eye"></i></a>
                                    </div>
                                    <h4>Описание картинки</h4>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>

            </section>

            <section class="s_help d-block d-md-none">

                <h2>Осталтсь вопррсы или не можете выбрать?</h2>

                <div class="p_bl">
                    <p class="help_descr type2">Оставьте заявку и мы свяжемся с вами в любое удобное для вас время или в самое ближайшее.</p>
                    <p class="help_descr">Мы будем рады вам помочь в определении с выбором вашей будущей квартиры!</p>
                </div>

                <form class="form_help form_style">

                    <div class="calculate d-block d-lg-none">

                        <div class="row">

                            <div class="col-12 col-lg-6 col-xl-4 fl_cent">
                                <div class="cal_item">
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
                                    <div class="square cal_h">
                                        <span class="ot">От</span>
                                        <input type="text" placeholder="0">
                                        <span class="separ">-</span>
                                        <span class="do">До</span>
                                        <input type="text" placeholder="0">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-12 col-xl-4 last_calc fl_cent">
                                <div class="cal_item">
                                    <div class="room_bl cal_h">
                                        <select class="room_sel">
                                            <option>1-комнатная</option>
                                            <option>2-комнатная</option>
                                            <option>3-комнатная</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                    <input type="text" name="name" placeholder="Ваше имя">
                    <input type="tel" name="phone" placeholder="Телефон">
                    <input type="email" name="email" placeholder="Email">

                    <p>Выберите удобный для вас период, за который вы бы хотели, чтобы мы с вами связались</p>

                    <div class="but_form">

                        <div class="radio_wrap">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="rooms" id="threerooms" value="threerooms" data-room="3"/>
                                    <span></span>
                                    Сейчас
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="rooms" id="threerooms" value="threerooms" data-room="3"/>
                                    <span></span>
                                    1-2 часа
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="rooms" id="threerooms" value="threerooms" data-room="3"/>
                                    <span></span>
                                    Вечером
                                </label>
                            </div>
                        </div>

                        <button class="butt_sky" type="submit">Заказать консультацию</button>

                    </div>

                </form>

            </section>

            <section class="s_choose cus_pad">

                <div class="head_style">
                    <h2>Выберите квартиру</h2>
                </div>

                <div class="plans_buy">

                    <div class="slide_nav buy_plan_nav">
                        <i class="fas fa-caret-left"></i>
                        <i class="fas fa-caret-right"></i>
                    </div>

                    <div class="container">

                        <div class="row buy_slide_plan">

                            <div class="col-lg-4">
                                <div class="item">
                                    <img src="img/buy/1А.png" alt="">
                                    <h4>1A</h4>
                                    <p>Жилая пл. : 20,0 м<sup>2</sup></p>
                                    <p>Общая пл. : 48,6 м<sup>2</sup></p>
                                    <a href="plan.html" class="butt_blue">Подробнее</a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="item">
                                    <img src="img/buy/1B.png" alt="">
                                    <h4>1Б</h4>
                                    <p>Жилая пл. : 36,0 м<sup>2</sup></p>
                                    <p>Общая пл. : 12,5 м<sup>2</sup></p>
                                    <a href="#" class="butt_blue">Подробнее</a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="item">
                                    <img src="img/buy/1V.png" alt="">
                                    <h4>1В</h4>
                                    <p>Жилая пл. : 20,0 м<sup>2</sup></p>
                                    <p>Общая пл. : 48,6 м<sup>2</sup></p>
                                    <a href="#" class="butt_blue">Подробнее</a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="item">
                                    <img src="img/buy/1d.png" alt="">
                                    <h4>1A</h4>
                                    <p>Жилая пл. : 20,0 м<sup>2</sup></p>
                                    <p>Общая пл. : 48,6 м<sup>2</sup></p>
                                    <a href="#" class="butt_blue">Подробнее</a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="item">
                                    <img src="img/buy/1e.png" alt="">
                                    <h4>1Б</h4>
                                    <p>Жилая пл. : 36,0 м<sup>2</sup></p>
                                    <p>Общая пл. : 12,5 м<sup>2</sup></p>
                                    <a href="#" class="butt_blue">Подробнее</a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="item">
                                    <img src="img/buy/1g.png" alt="">
                                    <h4>1В</h4>
                                    <p>Жилая пл. : 20,0 м<sup>2</sup></p>
                                    <p>Общая пл. : 48,6 м<sup>2</sup></p>
                                    <a href="#" class="butt_blue">Подробнее</a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="item">
                                    <img src="img/buy/1j.png" alt="">
                                    <h4>1A</h4>
                                    <p>Жилая пл. : 20,0 м<sup>2</sup></p>
                                    <p>Общая пл. : 48,6 м<sup>2</sup></p>
                                    <a href="#" class="butt_blue">Подробнее</a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="item">
                                    <img src="img/buy/2a.png" alt="">
                                    <h4>1Б</h4>
                                    <p>Жилая пл. : 36,0 м<sup>2</sup></p>
                                    <p>Общая пл. : 12,5 м<sup>2</sup></p>
                                    <a href="#" class="butt_blue">Подробнее</a>
                                </div>
                            </div>

                        </div>

                        <a href="#" class="more_pl">Посмотреть все</a>

                    </div>

                </div>

            </section>


<?php get_footer(); ?>