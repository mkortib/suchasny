<?php get_header(); ?>



<div class="page page_hod all_page">

    <div class="page_all">

        <h1><?single_cat_title()?></h1>

        <ul class="path">
            <li><a href="/"><?php echo __('[:ru]Главная[:ua]Головна[:]'); ?></a></li>
            <li><a href="/news/"><?single_cat_title()?></a></li>
        </ul>

        <section class="s_hod s_all cus_pad">

            <ul class="three_links">
                <li><a href="/diary/"><?php echo __('[:ru]Ход строительства[:ua]Хід будівництва[:]'); ?> <i class="fas fa-long-arrow-alt-right"></i></a></li>
                <li><a href="/action/"><?php echo __('[:ru]Акции[:ua]Акції[:]'); ?> <i class="fas fa-long-arrow-alt-right"></i></a></li>
            </ul>
            <div class="hod_items all_same">

                <div class="container">

                    <div class="row">

                        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>


                            <div class="col-md-6">
                                <div class="all_itm">
                                    <div class="img_bl" style="background-image: url(<?php $img = get_field('img'); echo $img['url']; ?>);"><a href="<?php the_permalink(); ?>"></a></div>
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
                                            <p><?php echo get_short_content(180); ?></p>
                                        </div>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="butt_blue"><?php echo __('[:ru]Подробнее[:ua]Детальніше[:]'); ?></a>
                                </div>
                            </div>
                        <? endwhile; endif; wp_reset_query(); ?>



                    </div>

                </div>

            </div>

            <div class="nav_link">
                <a href="#" class="prev"><i class="fas fa-angle-left"></i></a>
                <div class="counter"><span class="curr_c">1</span> из <span class="all_count">1</span></div>
                <a href="#" class="next"><i class="fas fa-angle-right"></i></a>
            </div>

        </section>





        <?php get_footer(); ?>

