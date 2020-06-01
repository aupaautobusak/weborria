<?php
/**
 * Master generated style function
 *
 * @package Liquido
 */

/**
 * Add body classes to identify the child theme
 */
function liquido_body_classes($classes)
{
    $classes[] = strtolower(wp_get_theme()) . '-child';
    return $classes;
}
add_filter('body_class', 'liquido_body_classes', 15);

/**
 * Dynamic styles for the frontend
 */
function liquido_custom_styling()
{
    $options = cryout_get_option();
    extract($options);

    ob_start(); ?>

    /* Liquido custom style */

    .entry-title a:hover {
        background-color:  <?php echo esc_attr($fluida_accent1) ?>;
    }

    .entry-title a:link,
    .entry-title a:visited,
    .entry-title,
    #reply-title,
    .woocommerce .main .page-title,
    .woocommerce .main .entry-title,
    .page-title {
        color:  <?php echo esc_attr($fluida_accent2) ?>;
    }

    .continue-reading-link span,
    .main .page-title,
    #comments-title span,
    .commentlist .author-name,
    .commentlist .author-name a,
    .comment .reply a,
    button,
    input[type="button"],
    input[type="submit"],
    input[type="reset"],
    .footermenu ul li a,
    .lp-box-readmore,
    #cryout_ajax_more_trigger {
        font-family: <?php echo cryout_font_select($fluida_ftitles, $fluida_ftitlesgoogle) ?>;
    }

    #access ul.sub-menu li:hover > a,
    #access ul.children li:hover > a {
        background-color: rgba(<?php echo cryout_hex2rgb(esc_html($fluida_accent1)) ?>, 0.5);
    }

    .main .lp-block-title,
    .main .lp-boxes-static .lp-box-title a,
    .main .lp-text-title,
    .lp-section-header .lp-section-title {
        color:  <?php echo esc_attr($fluida_accent2) ?>;
    }

    /* end Liquido custom style */
    <?php
    return preg_replace('/((background-)?color:\s*?)[;}]/i', '', ob_get_clean());

} // liquido_custom_styling()



/**
 * Load custom styles
 */
function liquido_custom_styles($style = '')
{

    return $style . liquido_custom_styling();

} // liquido_custom_styles()
// this filer is applied in liquido_setup()


/* FIN */

