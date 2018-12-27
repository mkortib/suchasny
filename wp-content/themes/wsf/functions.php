<?php
/**
 * wsf functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wsf
 */

/* Remove information about version of wordpress */
remove_action('wp_head', 'wp_generator');

/* Hide admin bar */
add_filter('show_admin_bar', '__return_false');

function wph_css_class_to_menu($classes, $item){
    if( $item->title != "" and $item->object != "category"){
        $classes[] = "menu__item";
    }

    return $classes;
}
add_filter('nav_menu_css_class' , 'wph_css_class_to_menu' , 10 , 2);

function mythem_scripts_styles(){
    wp_enqueue_style( 'mythem-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'mythem_scripts_styles', 1 );


/*start*/
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2.2.1/svg/' );

        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }

    return $urls;
}

add_filter('style_loader_tag', 'clean_style_tag');
function clean_style_tag($src) {
    return str_replace("type='text/css'", '', $src);
}

add_filter('script_loader_tag', 'clean_script_tag');
function clean_script_tag($src) {
    return str_replace("type='text/javascript'", '', $src);
}


function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

/*end*/


/* Menus */
add_action('after_setup_theme', function(){
    register_nav_menus( array(
        'header_menu' => 'Меню в шапке',
        'menu_footer' => 'Футер',
        'menu_keys' => 'Меню кейсы'
    ) );
});


function get_short_title($maxchar = 115){
    $title = get_the_title();
    if( iconv_strlen($title, 'utf-8') < $maxchar )
        return $title;
    $title = iconv_substr( $title, 0, $maxchar, 'utf-8' );
    $title = preg_replace('@(.*)\s[^\s]*$@s', '\\1 ...', $title); //убираем последнее слово, ибо оно в 99% случаев неполное

    return $title;
}
function get_short_content($symbol_amount) {
    $filtered = strip_tags( preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))) );
    echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}

/**/
function kama_breadcrumbs( $sep = ' » ', $l10n = array(), $args = array() ){
    $kb = new Kama_Breadcrumbs;
    echo $kb->get_crumbs( $sep, $l10n, $args );
}




class Kama_Breadcrumbs {


    public $arg;

    // Локализация
    static $l10n = array(
        'home'       => 'Главная',
        'paged'      => 'Страница %d',
        '_404'       => 'Ошибка 404',
        'search'     => 'Результаты поиска по запросу - <b>%s</b>',
        'author'     => 'Архив автора: <b>%s</b>',
        'year'       => 'Архив за <b>%d</b> год',
        'month'      => 'Архив за: <b>%s</b>',
        'day'        => '',
        'attachment' => 'Медиа: %s',
        'tag'        => 'Записи по метке: <b>%s</b>',
        'tax_tag'    => '%1$s из "%2$s" по тегу: <b>%3$s</b>',
        // tax_tag выведет: 'тип_записи из "название_таксы" по тегу: имя_термина'.
        // Если нужны отдельные холдеры, например только имя термина, пишем так: 'записи по тегу: %3$s'
    );

    // Параметры по умолчанию
    static $args = array(
        'on_front_page'   => true,  // выводить крошки на главной странице
        'show_post_title' => true,  // показывать ли название записи в конце (последний элемент). Для записей, страниц, вложений
        'show_term_title' => true,  // показывать ли название элемента таксономии в конце (последний элемент). Для меток, рубрик и других такс
        'title_patt'      => '<span class="kb_title">%s</span>', // шаблон для последнего заголовка. Если включено: show_post_title или show_term_title
        'last_sep'        => true,  // показывать последний разделитель, когда заголовок в конце не отображается
        'markup'          => 'schema.org', // 'markup' - микроразметка. Может быть: 'rdf.data-vocabulary.org', 'schema.org', '' - без микроразметки
        // или можно указать свой массив разметки:
        // array( 'wrappatt'=>'<div class="kama_breadcrumbs">%s</div>', 'linkpatt'=>'<a href="%s">%s</a>', 'sep_after'=>'', )
        'priority_tax'    => array('category'), // приоритетные таксономии, нужно когда запись в нескольких таксах
        'priority_terms'  => array(), // 'priority_terms' - приоритетные элементы таксономий, когда запись находится в нескольких элементах одной таксы одновременно.
        // Например: array( 'category'=>array(45,'term_name'), 'tax_name'=>array(1,2,'name') )
        // 'category' - такса для которой указываются приор. элементы: 45 - ID термина и 'term_name' - ярлык.
        // порядок 45 и 'term_name' имеет значение: чем раньше тем важнее. Все указанные термины важнее неуказанных...
        'nofollow' => false, // добавлять rel=nofollow к ссылкам?

        // служебные
        'sep'             => '',
        'linkpatt'        => '',
        'pg_end'          => '',
    );

    function get_crumbs( $sep, $l10n, $args ){
        global $post, $wp_query, $wp_post_types;

        self::$args['sep'] = $sep;

        // Фильтрует дефолты и сливает
        $loc = (object) array_merge( apply_filters('kama_breadcrumbs_default_loc', self::$l10n ), $l10n );
        $arg = (object) array_merge( apply_filters('kama_breadcrumbs_default_args', self::$args ), $args );

        $arg->sep = '<span class="split"></span>'; // дополним

        // упростим
        $sep = & $arg->sep;
        $this->arg = & $arg;

        // микроразметка ---
        if(1){
            $mark = & $arg->markup;

            // Разметка по умолчанию
            if( ! $mark ) $mark = array(
                'wrappatt'  => '<div class="kama_breadcrumbs">%s</div>',
                'linkpatt'  => '<a href="%s">%s</a>',
                'sep_after' => '',
            );
            // rdf
            elseif( $mark === 'rdf.data-vocabulary.org' ) $mark = array(
                'wrappatt'   => '<div class="kama_breadcrumbs" prefix="v: http://rdf.data-vocabulary.org/#">%s</div>',
                'linkpatt'   => '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">%s</a>',
                'sep_after'  => '</span>', // закрываем span после разделителя!
            );
            // schema.org
            elseif( $mark === 'schema.org' ) $mark = array(
                'wrappatt'   => '<div class="kama_breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">%s</div>',
                'linkpatt'   => '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%s" itemprop="item"><span itemprop="name">%s</span></a></span>',
                'sep_after'  => '',
            );

            elseif( ! is_array($mark) )
                die( __CLASS__ .': "markup" parameter must be array...');

            $wrappatt  = $mark['wrappatt'];
            $arg->linkpatt  = $arg->nofollow ? str_replace('<a ','<a rel="nofollow"', $mark['linkpatt']) : $mark['linkpatt'];
            $arg->sep      .= $mark['sep_after']."\n";
        }

        $linkpatt = $arg->linkpatt; // упростим

        $q_obj = get_queried_object();

        // может это архив пустой таксы?
        $ptype = null;
        if( empty($post) ){
            if( isset($q_obj->taxonomy) )
                $ptype = & $wp_post_types[ get_taxonomy($q_obj->taxonomy)->object_type[0] ];
        }
        else $ptype = & $wp_post_types[ $post->post_type ];

        // paged
        $arg->pg_end = '';
        if( ($paged_num = get_query_var('paged')) || ($paged_num = get_query_var('page')) )
            $arg->pg_end = $sep . sprintf( $loc->paged, (int) $paged_num );

        $pg_end = $arg->pg_end; // упростим

        // ну, с богом...
        $out = '';

        if( is_front_page() ){
            return $arg->on_front_page ? sprintf( $wrappatt, ( $paged_num ? sprintf($linkpatt, get_home_url(), $loc->home) . $pg_end : $loc->home ) ) : '';
        }
        // страница записей, когда для главной установлена отдельная страница.
        elseif( is_home() ) {
            $out = $paged_num ? ( sprintf( $linkpatt, get_permalink($q_obj), esc_html($q_obj->post_title) ) . $pg_end ) : esc_html($q_obj->post_title);
        }
        elseif( is_404() ){
            $out = $loc->_404;
        }
        elseif( is_search() ){
            $out = sprintf( $loc->search, esc_html( $GLOBALS['s'] ) );
        }
        elseif( is_author() ){
            $tit = sprintf( $loc->author, esc_html($q_obj->display_name) );
            $out = ( $paged_num ? sprintf( $linkpatt, get_author_posts_url( $q_obj->ID, $q_obj->user_nicename ) . $pg_end, $tit ) : $tit );
        }
        elseif( is_year() || is_month() || is_day() ){
            $y_url  = get_year_link( $year = get_the_time('Y') );

            if( is_year() ){
                $tit = sprintf( $loc->year, $year );
                $out = ( $paged_num ? sprintf($linkpatt, $y_url, $tit) . $pg_end : $tit );
            }
            // month day
            else {
                $y_link = sprintf( $linkpatt, $y_url, $year);
                $m_url  = get_month_link( $year, get_the_time('m') );

                if( is_month() ){
                    $tit = sprintf( $loc->month, get_the_time('F') );
                    $out = $y_link . $sep . ( $paged_num ? sprintf( $linkpatt, $m_url, $tit ) . $pg_end : $tit );
                }
                elseif( is_day() ){
                    $m_link = sprintf( $linkpatt, $m_url, get_the_time('F'));
                    $out = $y_link . $sep . $m_link . $sep . get_the_time('l');
                }
            }
        }
        // Древовидные записи
        elseif( is_singular() && $ptype->hierarchical ){
            $out = $this->_add_title( $this->_page_crumbs($post), $post );
        }
        // Таксы, плоские записи и вложения
        else {
            $term = $q_obj; // таксономии

            // определяем термин для записей (включая вложения attachments)
            if( is_singular() ){
                // изменим $post, чтобы определить термин родителя вложения
                if( is_attachment() && $post->post_parent ){
                    $save_post = $post; // сохраним
                    $post = get_post($post->post_parent);
                }

                // учитывает если вложения прикрепляются к таксам древовидным - все бывает :)
                $taxonomies = get_object_taxonomies( $post->post_type );
                // оставим только древовидные и публичные, мало ли...
                $taxonomies = array_intersect( $taxonomies, get_taxonomies( array('hierarchical' => true, 'public' => true) ) );

                if( $taxonomies ){
                    // сортируем по приоритету
                    if( ! empty($arg->priority_tax) ){
                        usort( $taxonomies, function($a,$b)use($arg){
                            $a_index = array_search($a, $arg->priority_tax);
                            if( $a_index === false ) $a_index = 9999999;

                            $b_index = array_search($b, $arg->priority_tax);
                            if( $b_index === false ) $b_index = 9999999;

                            return ( $b_index === $a_index ) ? 0 : ( $b_index < $a_index ? 1 : -1 ); // меньше индекс - выше
                        } );
                    }

                    // пробуем получить термины, в порядке приоритета такс
                    foreach( $taxonomies as $taxname ){
                        if( $terms = get_the_terms( $post->ID, $taxname ) ){
                            // проверим приоритетные термины для таксы
                            $prior_terms = & $arg->priority_terms[ $taxname ];
                            if( $prior_terms && count($terms) > 2 ){
                                foreach( (array) $prior_terms as $term_id ){
                                    $filter_field = is_numeric($term_id) ? 'term_id' : 'slug';
                                    $_terms = wp_list_filter( $terms, array($filter_field=>$term_id) );

                                    if( $_terms ){
                                        $term = array_shift( $_terms );
                                        break;
                                    }
                                }
                            }
                            else
                                $term = array_shift( $terms );

                            break;
                        }
                    }
                }

                if( isset($save_post) ) $post = $save_post; // вернем обратно (для вложений)
            }

            // вывод

            // все виды записей с терминами или термины
            if( $term && isset($term->term_id) ){
                $term = apply_filters('kama_breadcrumbs_term', $term );

                // attachment
                if( is_attachment() ){
                    if( ! $post->post_parent )
                        $out = sprintf( $loc->attachment, esc_html($post->post_title) );
                    else {
                        if( ! $out = apply_filters('attachment_tax_crumbs', '', $term, $this ) ){
                            $_crumbs    = $this->_tax_crumbs( $term, 'self' );
                            $parent_tit = sprintf( $linkpatt, get_permalink($post->post_parent), get_the_title($post->post_parent) );
                            $_out = implode( $sep, array($_crumbs, $parent_tit) );
                            $out = $this->_add_title( $_out, $post );
                        }
                    }
                }
                // single
                elseif( is_single() ){
                    if( ! $out = apply_filters('post_tax_crumbs', '', $term, $this ) ){
                        $_crumbs = $this->_tax_crumbs( $term, 'self' );
                        $out = $this->_add_title( $_crumbs, $post );
                    }
                }
                // не древовидная такса (метки)
                elseif( ! is_taxonomy_hierarchical($term->taxonomy) ){
                    // метка
                    if( is_tag() )
                        $out = $this->_add_title('', $term, sprintf( $loc->tag, esc_html($term->name) ) );
                    // такса
                    elseif( is_tax() ){
                        $post_label = $ptype->labels->name;
                        $tax_label = $GLOBALS['wp_taxonomies'][ $term->taxonomy ]->labels->name;
                        $out = $this->_add_title('', $term, sprintf( $loc->tax_tag, $post_label, $tax_label, esc_html($term->name) ) );
                    }
                }
                // древовидная такса (рибрики)
                else {
                    if( ! $out = apply_filters('term_tax_crumbs', '', $term, $this ) ){
                        $_crumbs = $this->_tax_crumbs( $term, 'parent' );
                        $out = $this->_add_title( $_crumbs, $term, esc_html($term->name) );
                    }
                }
            }
            // влоежния от записи без терминов
            elseif( is_attachment() ){
                $parent = get_post($post->post_parent);
                $parent_link = sprintf( $linkpatt, get_permalink($parent), esc_html($parent->post_title) );
                $_out = $parent_link;

                // вложение от записи древовидного типа записи
                if( is_post_type_hierarchical($parent->post_type) ){
                    $parent_crumbs = $this->_page_crumbs($parent);
                    $_out = implode( $sep, array( $parent_crumbs, $parent_link ) );
                }

                $out = $this->_add_title( $_out, $post );
            }
            // записи без терминов
            elseif( is_singular() ){
                $out = $this->_add_title( '', $post );
            }
        }

        // замена ссылки на архивную страницу для типа записи
        $home_after = apply_filters('kama_breadcrumbs_home_after', '', $linkpatt, $sep, $ptype );

        if( '' === $home_after ){
            // Ссылка на архивную страницу типа записи для: отдельных страниц этого типа; архивов этого типа; таксономий связанных с этим типом.
            if( $ptype && $ptype->has_archive && ! in_array( $ptype->name, array('post','page','attachment') )
                && ( is_post_type_archive() || is_singular() || (is_tax() && in_array($term->taxonomy, $ptype->taxonomies)) )
            ){
                $pt_title = $ptype->labels->name;

                // первая страница архива типа записи
                if( is_post_type_archive() && ! $paged_num )
                    $home_after = $pt_title;
                // singular, paged post_type_archive, tax
                else{
                    $home_after = sprintf( $linkpatt, get_post_type_archive_link($ptype->name), $pt_title );

                    $home_after .= ( ($paged_num && ! is_tax()) ? $pg_end : $sep ); // пагинация
                }
            }
        }

        $before_out = sprintf( $linkpatt, home_url(), $loc->home ) . ( $home_after ? $sep.$home_after : ($out ? $sep : '') );

        $out = apply_filters('kama_breadcrumbs_pre_out', $out, $sep, $loc, $arg );

        $out = sprintf( $wrappatt, $before_out . $out );

        return apply_filters('kama_breadcrumbs', $out, $sep, $loc, $arg );
    }

    function _page_crumbs( $post ){
        $parent = $post->post_parent;

        $crumbs = array();
        while( $parent ){
            $page = get_post( $parent );
            $crumbs[] = sprintf( $this->arg->linkpatt, get_permalink($page), esc_html($page->post_title) );
            $parent = $page->post_parent;
        }

        return implode( $this->arg->sep, array_reverse($crumbs) );
    }

    function _tax_crumbs( $term, $start_from = 'self' ){
        $termlinks = array();
        $term_id = ($start_from === 'parent') ? $term->parent : $term->term_id;
        while( $term_id ){
            $term       = get_term( $term_id, $term->taxonomy );
            $termlinks[] = sprintf( $this->arg->linkpatt, get_term_link($term), esc_html($term->name) );
            $term_id    = $term->parent;
        }

        if( $termlinks )
            return implode( $this->arg->sep, array_reverse($termlinks) ) /*. $this->arg->sep*/;
        return '';
    }

    // добалвяет заголовок к переданному тексту, с учетом всех опций. Добавляет разделитель в начало, если надо.
    function _add_title( $add_to, $obj, $term_title = '' ){
        $arg = & $this->arg; // упростим...
        $title = $term_title ? $term_title : esc_html($obj->post_title); // $term_title чиститься отдельно, теги моугт быть...
        $show_title = $term_title ? $arg->show_term_title : $arg->show_post_title;

        // пагинация
        if( $arg->pg_end ){
            $link = $term_title ? get_term_link($obj) : get_permalink($obj);
            $add_to .= ($add_to ? $arg->sep : '') . sprintf( $arg->linkpatt, $link, $title ) . $arg->pg_end;
        }
        // дополняем - ставим sep
        elseif( $add_to ){
            if( $show_title )
                $add_to .= $arg->sep . sprintf( $arg->title_patt, $title );
            elseif( $arg->last_sep )
                $add_to .= $arg->sep;
        }
        // sep будет потом...
        elseif( $show_title )
            $add_to = sprintf( $arg->title_patt, $title );

        return $add_to;
    }

}
/**/

function mythem_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Widget Area', 'mythem' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'mythem' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Language', 'mythem' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'mythem' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'mythem_widgets_init' );




function atg_menu_classes($classes, $item, $args) {
    global $post;
    $current_post_type_slug = get_permalink( $post );


    if($args->theme_location == 'header_menu') {
        $classes[] = 'item';
    }

    return $classes;
}
add_filter('nav_menu_css_class','atg_menu_classes',1,3);





add_filter('single_template', 'check_for_category_single_template');
function check_for_category_single_template( $t ){
    foreach( (array) get_the_category() as $cat ){
        if ( file_exists(TEMPLATEPATH . "/single-category-{$cat->slug}.php") ) return TEMPLATEPATH . "/single-category-{$cat->slug}.php";
        if($cat->parent){
            $cat = get_the_category_by_ID( $cat->parent );
            if ( file_exists(TEMPLATEPATH . "/single-category-{$cat->slug}.php") ) return TEMPLATEPATH . "/single-category-{$cat->slug}.php";
        }
    }
    return $t;
}

function go_filter() {
    $args = array();
    $args['meta_query'] = array('relation' => 'AND'); // отношение между условиями, у нас это "И то И это", можно ИЛИ(OR)
    global $flats; // нужно заглобалить текущую выборку постов

    if ($_GET['min_square'] != '' || $_GET['max_square'] != '') {
        if ($_GET['min_square'] == '') $_GET['min_square'] = 0;
        if ($_GET['max_square'] == '') $_GET['max_square'] = 200;
        $args['meta_query'][] = array(
            'key' => 'total_area', // название произвольного поля
            'value' => array( (int)$_GET['min_square'], (int)$_GET['max_square'] ), // переданные значения ОТ и ДО для интервала передаются в массиве
            'type' => 'numeric',
            'compare' => 'BETWEEN' // тип сравнения, здесь это BETWEEN - т.е. между "Площадь от" и до "Площадь до"
        );
    }
    //query_posts($args);
    //$wp_query = new WP_Query($args);
    query_posts(array_merge($args,$flats->query)); // сшиваем текущие условия выборки стандартного цикла wp с новым массивом переданным из формы и фильтруем
}




add_action( 'wp_ajax_do_something',        'do_something_callback' ); // For logged in users
add_action( 'wp_ajax_nopriv_do_something', 'do_something_callback' ); // For anonymous users

add_action( 'wp_ajax_do_something_2',        'do_something_callback_2' ); // For logged in users
add_action( 'wp_ajax_nopriv_do_something_2', 'do_something_callback_2' ); // For anonymous users

add_action( 'wp_ajax_flat_request',        'flat_request_callback' ); // For logged in users
add_action( 'wp_ajax_nopriv_flat_request', 'flat_request_callback' ); // For anonymous users




function do_something_callback(){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['mail'] ?: null;
    $question = $_POST['question'] ?: null;
    $url = $_POST['url'] ?: null;
    $time = $_POST['time'] ?: null;
    $subject = $_POST['subject'] ?: 'Обратная связь';

    $to      = 'mkobria@gmail.com';
    //$to      = 'd.portnov@wsf.com.ua';

    $message = "<strong>Имя:</strong> $name<br> <strong>Телефон:</strong> $phone";
    $message = $email ? $message."<br><strong>Электронная почта:<strong> $email" : $message;
    $message = $question ? $message."<br><strong>Вопрос:</strong> $question" : $message;
    $message = $time ? $message."<br><strong>Когда надо позвонить:</strong> $time" : $message;
    $message = $url ? $message."<br><strong>Ссылка:</strong> <a href='$url'>перейти</a> " : $message;

    $header = "From: suchasny-kvartal@info.com\r\n";
    $header.= "MIME-Version: 1.0\r\n";
    $header.= "Content-Type: text/html; charset=utf-8\r\n";
    $header.= "X-Priority: 1\r\n";

    mail($to, $subject, $message, $header);

    global $wpdb;
    $table_name = $wpdb->prefix . 'callback_request';
    $wpdb->insert(
        $table_name,
        array(
            'time' => current_time('mysql'),
            'status' => false,
            'name' => $name,
            'phone' => $phone,
            'mail' => $email,
            'question' => $question,
            'subject' => $subject,
            'url' => $url,
        )
    );
    wp_die();
}

function do_something_callback_2(){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['mail'] ?: null;
    $question = $_POST['question'] ?: null;
    $frst_installment = $_POST['frst_installment'] ?: null;
    $currency = $_POST['currency'] ?: null;
    $square_from = $_POST['square_from'] ?: null;
    $square_to = $_POST['square_to'] ?: null;
    $soc = $_POST['soc'] ?: null;
    $subject = $_POST['subject'] ?: 'Калькулятор рассрочки';
    $url = $_POST['url'] ?: null;

    $to      = 'mkobria@gmail.com';

    $message = "<strong>Имя:</strong> $name<br> <strong>Телефон:</strong> $phone";
    $message = $frst_installment ? $message."<br><strong>Бюджет от: <strong> $frst_installment" : $message;
    $message = $currency ? $message."<br><strong>Валюта в: <strong> $currency" : $message;
    $message = $square_from ? $message."<br><strong>Площадь от: <strong> $square_from" : $message;
    $message = $square_to ? $message."<br><strong>Площадь до: <strong> $square_to" : $message;
    $message = $soc ? $message."<br><strong>отправить на: <strong> $soc" : $message;
    $message = $url ? $message."<br><strong>Ссылка:</strong> <a href='$url'>перейти</a> " : $message;


//    $message = $frst_installment ? $message . "<strong>Первый взнос:</strong>" . $frst_installment. "<strong> в:</strong>" . $currency;
//    $message = $square_from ? $message . "<strong>Площадь от:</strong>" . $square_from . "<strong> до:</strong>" . $square_to;
//    $message = $soc ? $message."<strong>Отправка на:</strong>" . $soc;
//    $message = $url ? $message."<br><strong>Ссылка:</strong> <a href='$url'>перейти</a> " : $message;
//
//    $message = "<strong>Имя:</strong> $name<br> <strong>Телефон:</strong> $phone";
//    $message = $email ? $message."<br><strong>Электронная почта:<strong> $email" : $message;
//    $message = $question ? $message."<br><strong>Вопрос:</strong> $question" : $message;
//    $message = $url ? $message."<br><strong>Ссылка:</strong> <a href='$url'>перейти</a> " : $message;


    $header = "From: suchasny-kvartal@info.com\r\n";
    $header.= "MIME-Version: 1.0\r\n";
    $header.= "Content-Type: text/html; charset=utf-8\r\n";
    $header.= "X-Priority: 1\r\n";

    mail($to, $subject, $message, $header);

    global $wpdb;
    $table_name = $wpdb->prefix . 'callback_request';
    $wpdb->insert(
        $table_name,
        array(
            'time' => current_time('mysql'),
            'status' => false,
            'name' => $name,
            'phone' => $phone,
            'mail' => $email,
            'subject' => $subject,
            'url' => $url,
        )
    );
    wp_die();
}

function flat_request_callback(){

    $subject = 'Подбор квартиры';
    $to      = 'murashenkorb@gmail.com';

    $type = $_POST['type'] ?: null;
    $min_square = $_POST['min_square'] ?: null;
    $max_square = $_POST['max_square'] ?: null;
    $money = $_POST['money'] ?: null;
    $phone = $_POST['phone'] ?: null;
    $url = $_POST['url'] ?: null;

    $message = '';
    $message = $type ? $message."<strong>Планировка: </strong>".$type."<br>" : $message;
    $message = $min_square ? $message."<strong>Метраж от: </strong>".$min_square."<br>" : $message;
    $message = $max_square ? $message."<strong>Метраж до: </strong>".$max_square."<br>" : $message;
    $message = $money ? $message."<strong>Бюджет до: </strong>".$money."<br>" : $message;
    $message = $phone ? $message."<strong>Телефон: ".$phone."</strong>" : $message;
    $message = $url ? $message."<br><strong>Ссылка:</strong> <a href='".$url."'>перейти</a> " : $message;

    $header = "From: henesi-house@info.com\r\n";
    $header.= "MIME-Version: 1.0\r\n";
    $header.= "Content-Type: text/html; charset=utf-8\r\n";
    $header.= "X-Priority: 1\r\n";

    mail($to, $subject, $message, $header);

    $subject = "Подбор квартиры: ";
    $subject = $type ? $subject.$type.", " : $subject;
    $subject = $min_square ? $subject."от ".$min_square."м2 " : $subject;
    $subject = $max_square ? $subject." до ".$max_square."м2" : $subject;
    $subject = $money ? $subject.", бюджет до ".$money : $subject;

    global $wpdb;
    $table_name = $wpdb->prefix . 'callback_request';
    $wpdb->insert(
        $table_name,
        array(
            'time' => current_time('mysql'),
            'status' => false,
            'phone' => $phone,
            'subject' => $subject,
            'url' => $url,
        )
    );
    wp_die();
}

function wsf_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Widget Area', 'wsf' ),
        'id'            => 'sidebar-1'
    ) );
}

add_action( 'widgets_init', 'wsf_widgets_init' );


add_filter( 'get_the_archive_title', 'artabr_remove_name_cat' );
function artabr_remove_name_cat( $title ){
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    }
    return $title;
}


add_action('get_header', 'wp_maintenance_mode');

add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );
