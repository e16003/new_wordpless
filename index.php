<?php get_header(); ?>

    <div class="contentsWrap">
        <div class="mainContents">

          <?php if ( is_month() ): ?>
            <h1 class="type-A"><?php the_time('Y年m月'); ?></h1>
          <?php else: ?>
            <h1 class="type-A"><?php wp_title(''); ?></h1>
          <?php endif; ?>


            <section class="newsBlock block">

                <article class="news">
                    <div class="text">
                        <div class="entryInfo">
                            <div class="categories">
                                <ul>
                                    <li><a href="#">コラム</a></li>
                                </ul>
                            </div>
                            <time datetime="2015-02-14">2015.02.14(sat)</time>
                        </div>
                        <h1><a href="single.html">バレンタイン企画を行います</a></h1>
                        <p>
                            本日はバレンタインデーですね。当ホテルでもバレンタイン企画を行います。
                            ディナーをご予約されたお客さま限定で特別コースをご提供させて頂きます。
                        </p>
                        <p>[<a href="single.html">続きを読む</a>]</p>
                    </div>
                    <figure><a href="single.html"><img src="images/dummy/180x180-2.png" height="180" width="180" alt=""></a></figure>
                </article><!-- /.news -->

            </section><!-- /.newsBlock -->
        </div><!-- /.mainContents -->

        <aside class="subContents">
            <div class="wrapper">

          <?php get_sidebar('categories'); ?>
          <?php get_sidebar('archives'); ?>

            </div><!-- /.wrapper -->
        </aside><!-- /.subContents -->
    </div><!-- /.contentsWrap -->

  <?php get_footer(); ?>