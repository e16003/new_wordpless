<?php
/**
* アイキャッチ画像を使用可能にする
*/
add_theme_support( 'post-thumbnails' );

/**
* カスタムメニュー機能を使用する
*/
add_theme_support('menus' );

add_filter('comment_form_default_fields','my_comment_form_default_fields');
function my_comment_form_default_fields( $args ){
$args['author'] = ''; //「名前」を削除
$args['email'] = ''; //「メールアドレス」を削除
$args['url'] ='';//「ウェブサイト」を削除
return $args;
}

/**
*head内にRSSのlink要素を出力する
*/
add_theme_support('sutomatic-feed-links');

/**
*head内にRSSのlink要素を出力する
*/
add_filter('excerpt_mblength','my_excerpt_mlength');
function my_excerpt_mlength($length){
  return 50;
}

/**
*残りの部分がある旨の表示を変更
*/

add_filter('excerpt_more','my_excerpt_more');
function my_excerpt_more($more){
  return $more. '...';
}

/**
*アイキャッチを表示
*/

function rss_post_thumbnail( $content) {
    global $post;
    if (has_post_thumbnail( $post->ID)) {
        $content = '<p>' . get_the_post_thumbnail($post->ID) .'</p>' . $content;
    }
    return $content;
}
add_filter( 'the_excerpt_rss',  'rss_post_thumbnail');
add_filter( 'the_content_feed', 'rss_post_thumbnail');

//RSS 2.0を停止
remove_action('do_feel_rss2','do_feel_rss2', 10, 1);
