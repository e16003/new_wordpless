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
/*
remove_action('do_feel_rss2','do_feel_rss2', 10, 1);
*/
//トップページのみ投稿数を３件に設定
add_action('pre_get_posts','my_pre_get_posts');
function my_pre_get_posts($query){
//管理画面、メインクエリ以外には設定しない
  if(is_admin() || !$query->is_main_query()){
    return;
  }
//メインクエリで、
//トップページの場合
if($query->is_home()){
  $query->set('posts_per_page', 3);
}
}

/**
* 管理画面用のCSSを設定する
*/
add_action('admin_print_styles','print_admin_stylesheet');


/**
* ログイン画面に独自のCSSを設定する。
*/
add_action('login_head', 'print_admin_stylesheet');
function print_admin_stylesheet() {
  echo '<link href="' . get_template_directory_uri() . '/css/
  admin.css" type="text/css" rel="stylesheet" media="all" />' . PHP_EOL;
  }

/**
* 必ずビジュアルモードは表示されるように設定
*/



add_filter('wp_default_editor', 'my_wp_default_editor');
function my_wp_default_editor(){
  return 'tinymce';
}

/**
* メッセージを表示する簡単なショートコード
*/

function shortcode_test(){
  return "「ショートコードのテストです。」";
}

add_shortcode('test','shortcode_test');


/**
* ツイッターへのリンクを表示するショートコード
*/

function shortcode_twitter(){

  return 'こんにちは！ナカシマ(<a href="https://twitter.com/
  kanakogi" target="_blac">@kanakogi</a>)です。';
}
add_shortcode('twitter','shortcode_twitter');

/**
* パラメータでりんごの個数を受け取るショートコード
*/

function shortcode_apple(){
  $atts = shortcode_atts(array(
      'num' => 5, // $numの初期値を設定
      ),$atts);
  extract($atts);   //連想配列から変数を作成
  return "リンゴが" . $num . "個ありました。";
  }
  add_shortcode('apple', 'shortcode_apple');

/**
* クラス名がwrapの<div>タグで囲むショートコード
*/
function shortcode_price($atts, $content = null){
  return '<div class="wrap"><em>価格</em>:' . $content . '</div>';
}
add_shortcode('price', 'shortcode_price');

/**
*  画像データへのパスを返すショートコード
*/
function shortcode_url(){
  echo get_template_directory_uri();
}
add_shortcode('dir_url','shortcode_url');

/**
* アイキャッチ画像を表示する処理を関数化
*/
function display_thumbnail(){

  if(has_post_thumbnail() ){

     echo   '<a href="<?php the_permalink(); ?>">' .
     the_post_thumbnail('thumbnail') . '</a>';
      }else{
      echo  '<a href="' .get_permalink() . '"><img src="' . get_template_directory_uri() . '/images/common/noimage_180x180.png" height="180" width="180"alt=""></a>'
      ;
    }
  }

/**
* 宿泊プランの個別記事の画像を表示する処理を関数化
*/

function display_image($field_name, $size = 'medium'){
   $image = get_field($field_name);
   if(!empty($image)){
           $url = $image['sizes']['$size'];//中サイズ画像のURL
           $width = $image['sizes'][$size. '-width'];//中サイズ画像の横幅
           $height = $image['sizes'][$size.'-height'];//中サイズ画像の縦幅

  echo '<img src="'. $url .'"height="'. $height .'" width="'. $width .'" />';
     }

}