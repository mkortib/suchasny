<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wsf
 */

get_header();
?>

<div class="page page_contacts">

    <div class="page_all">

        <section class="sect_notfound cus_pad">

            <div class="text_wr">

                <h1><?php echo __('[:ua]На жаль, сторінка відсутня[:ru]К сожалению, страница не найдена[:]'); ?> :(</h1>
                <p><?php echo __('[:ua]Неправильна адреса або сторінка відсутня![:ru]Неверный адрес либо страница отсутсвует![:]'); ?></p>
                <p class="link"><?php echo __('[:ua]Повернутися на[:ru]Вернуться на[:]'); ?> <a href="/"><?php echo __('[:ua]головну[:ru]главную[:]'); ?></a></p>

                <i class="fas fa-search"></i>

            </div>

        </section>


<?php
get_footer();
?>
