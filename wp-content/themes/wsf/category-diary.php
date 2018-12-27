<?php get_header(); ?>


<div class="page page_hod all_page">

    <div class="page_all">

        <h1><?single_cat_title()?></h1>

        <ul class="path">
            <li><a href="/"><?php echo __('[:ru]Главная[:ua]Головна[:]'); ?></a></li>
            <li><a href="/dairy/"><?single_cat_title()?></a></li>
        </ul>

        <section class="s_hod s_all cus_pad">

            <ul class="three_links">
                <li><a href="/news/"><?php echo __('[:ru]Новости[:ua]Новини[:]'); ?> <i class="fas fa-long-arrow-alt-right"></i></a></li>
                <li><a href="/action/"><?php echo __('[:ru]Акции[:ua]Акції[:]'); ?> <i class="fas fa-long-arrow-alt-right"></i></a></li>
            </ul>
            <div class="hod_items all_same">

                <div class="container">

                    <div class="row">



                        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>


                            <div class="col-md-6">
                                <div class="all_itm">
                                    <div class="img_bl" style="background-image: url(<?php $img = get_field('img'); echo $img['url']; ?>);"><a href="<?php the_permalink(); ?>"></div>
                                    <div class="inf_bl">
                                        <div class="l_side">
                                            <div class="date"><?echo get_the_date('j.n.Y'); ?></div>

                                            <?php

                                            // vars
                                            $hero = get_field('socials');

                                            if( $hero ): ?>

                                                <div class="soc">
                                                    <a href="<?php echo $hero['facebook']; ?>"><i class="fab fa-facebook-square"></i></a>
                                                    <a href="<?php echo $hero['instagram']; ?>"><i class="fab fa-instagram"></i></a>
                                                </div>

                                            <?php endif;?>
                                        </div>
                                        <div class="head_txt">
                                            <h5><?php the_title(); ?></h5>
                                            <div class="text_new"><?php echo wp_trim_words( get_the_content(), 40, '...' ); ?></div>
                                        </div>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="butt_blue"><?php echo __('[:ru]Подробнее[:ua]Детальніше[:]'); ?></a>
                                </div>
                            </div>
                        <? endwhile; endif?>





                    </div>

                </div>

            </div>

            <!--<?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $category = get_category( get_query_var( 'cat' ) );
            $cat_id = $category->cat_ID;
            $news = new WP_Query( array (
                'cat'            => 8,
                'posts_per_page' => 2,
                'paged'          => $paged,
                'order'          => 'DESC',
                'orderby'        => 'date'
            ) ); ?>-->


            <div class="nav_link">

                <!--<?php
                if ( have_posts() ) :
                    while ( $news->have_posts() ) :
                        $news->the_post();
                        get_template_part('content', get_post_format());
                    endwhile;
                else :
                    get_template_part( 'content', 'none' );
                endif;
                if ( function_exists( 'wp_pagenavi' ) ) : wp_pagenavi(array('query' => $news));
                endif;
                wp_reset_postdata();
                ?>-->

                <a href="#" class="prev"><i class="fas fa-angle-left"></i></a>
                <div class="counter"><span class="curr_c">1</span> из <span class="all_count">1</span></div>
                <a href="#" class="next"><i class="fas fa-angle-right"></i></a>
            </div>

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
<?php get_footer(); ?>