<?php get_header();

$post_title = get_the_title( $post );
$post_ID = get_the_ID();

?>

    <div class="page page_hod all_page_open">

    <div class="page_all_open">

    <h1><? single_cat_title() ?></h1>

    <ul class="path">
        <li><a href="/"><?php echo __('[:ru]Главная[:ua]Головна[:]'); ?></a></li>
        <li><a href="/news/"><?php the_title() ?></a></li>
    </ul>

    <section class="all_str cus_pad">

        <div class="back">
            <a href="#"><i class="fas fa-long-arrow-alt-left"></i>Вернуться</a>
        </div>

        <div class="new_wr">

            <div class="container">

                <div class="row cus_wid">

                    <div class="col-md-10 col-xl-6 order-2 order-xl-1">
                        <div class="new_mhead">
                            <div class="l_s">
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
                            <div class="r_side">
                                <h5><?php the_title(); ?></h5>
                                <div class="text_new"><?php if( have_posts() ): while( have_posts() ): the_post();?><?php the_content();?><?php endwhile; endif;?></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10 col-xl-6 order-1 order-xl-2">
                        <div class="img_bl">
                            <img src="<?php $img = get_field('img'); echo $img['url']; ?>" alt="">
                        </div>
                    </div>


                </div>

            </div>

        </div>

        <div class="hod_items all_same_wr">

            <h3>Другие акции</h3>

            <div class="container">

                <div class="row all_same">

                    <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

                        <div class="col-md-6">
                            <div class="all_itm">
                                <div class="img_bl" style="background-image: url(<?php $img = get_field('img'); echo $img['url']; ?>);"></div>
                                <div class="inf_bl">
                                    <div class="l_side">
                                        <div class="date"><?php echo get_the_date('j.n.Y');?></div>
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
                                <a href="<?php get_the_permalink(); ?>" class="butt_blue">Подробнее</a>
                            </div>
                        </div>

                    <?php endwhile;
                    endif; ?>

                </div>

            </div>

            <div class="slide_nav news_nav">
                <i class="fas fa-caret-left"></i>
                <i class="fas fa-caret-right"></i>
            </div>

        </div>

    </section>



<?php get_footer(); ?>