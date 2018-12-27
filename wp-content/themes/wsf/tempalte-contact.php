<?php

/**
 * Template Name: Contact page
 */

get_header(); ?>
<div class="page page_contacts">

    <div class="page_all">

        <h1><?php the_title(); ?></h1>

        <ul class="path">
            <li><a href="/"><?php echo __('[:ua]Головна[:ru]Главная[:]'); ?></a></li>
            <li><a href="/kontakty/"><?php echo __('[:ua]Контакти[:ru]Контакты[:]'); ?></a></li>
        </ul>

        <section class="s_cont_info cus_pad">

            <div class="container">

                <div class="row">

                    <div class="col-lg-6 col-12">

                        <div class="frst_inf">

                            <h4><?php echo __('[:ua]Відділ продажу[:ru]Отдел продаж[:]'); ?></h4>

                            <span class="tele">(044) 444 43 34</span>

                            <div class="adr">
                                <h5><?php echo __('[:ua]м. Київ[:ru]г. Киев[:]'); ?>, ул. Проспект Комарова, 86</h5>
                                <p><span>Пн-Пт:</span> 9:00 - 19:00</p>
                                <p><span><?php echo __('[:ua]Сб-Нд[:ru]Cб-Вс[:]'); ?>:</span> 9:00 - 19:00</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-6 col-12">

                        <div class="scnd_inf">

                            <h4><?php echo __('[:ua]Попередній перегляд[:ru]Предварительный просмотр[:]'); ?></h4>

                            <span class="tele">(044) 444 43 34</span>
                            <a class="mail" href="mailto:">suchasny-kvartal@gmail.com</a>

                            <a href="#popup_form1" class="butt_blue popup-with-zoom-anim"><?php echo __('[:ua]Записатись[:ru]Записаться[:]'); ?></a>

                        </div>

                    </div>


                </div>

            </div>

            <div class="map_wrap">
                <div id="map"></div>
            </div>

        </section>


        <section class="s_help">

            <h2><?php echo __('[:ua]Обговорити наживо завжди краще?[:ru]Обсудить вживую всегда лучше?[:]'); ?></h2>

            <div class="p_bl">
                <p class="help_descr type2"><?php echo __('[:ua]Ми з радістю вам допоможемо у визначенні з вибором вашої майбутньої квартири![:ru]Мы будем рады вам помочь в определении с выбором вашей будущей квартиры![:]'); ?></p>
                <p class="help_descr"><?php echo __('[:ua]Залиште заявку і ми зв\'яжемося з вами в будь-який зручний для вас час або в самий найближчий[:ru]Оставьте заявку и мы свяжемся с вами в любое удобное для вас время или в самое ближайшее.[:]'); ?></p>
            </div>

            <form class="form_call_b form_style">

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

        <script>
            function initMap() {

                var myLatLng = {lat: 50.4343807949583, lng: 30.405900494689924};
                // Create a map object and specify the DOM element
                // for display.
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: myLatLng,
                    zoom: 17,
                    styles: [
                        {
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#1d2c4d"
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#8ec3b9"
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "color": "#1a3646"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.country",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#4b6878"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.land_parcel",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#64779e"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.province",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#4b6878"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape.man_made",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#334e87"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape.natural",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#023e58"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#283d6a"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#6f9ba5"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "color": "#1d2c4d"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#023e58"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#3C7680"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#304a7d"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#98a5be"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "color": "#1d2c4d"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#2c6675"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#255763"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#b0d5ce"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "color": "#023e58"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#98a5be"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "color": "#1d2c4d"
                                }
                            ]
                        },
                        {
                            "featureType": "transit.line",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#283d6a"
                                }
                            ]
                        },
                        {
                            "featureType": "transit.station",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#3a4762"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#0e1626"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#4e6d70"
                                }
                            ]
                        }
                    ]
                });

                //Create a marker and set its position.
                var marker = new google.maps.Marker({
                    map: map,
                    position: myLatLng,
                    title: 'ЖК Сучасний квартал'
                });
            }

        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoQeEZv3tflPFly8YMyUYXXZwWFV82Vss&callback=initMap" async defer></script>

<?php get_footer(); ?>