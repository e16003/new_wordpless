<?php
if(have_posts()) :
  while ( have_posts() ) : the_post();
 ?>

<section id="post-<?php the_ID(); ?>"<?php post_class('plan'); ?>>
<a href="<?php the_permalink(); ?>">
<div class="text">

                            <h2 class="name"><?php the_title(); ?></h2>
                             <p class="price">6,000円/泊</p>
                              <p class="summary"><?php the_excerpt(); ?></p>
                            </div>
                   <figure>
                            <?php if(has_post_thumbnail()) : ?>
   <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(100,100)); ?></a>

    <?php else: ?>
      <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>images/common/noimage_100x100.png" height="100" width="100" alt=""></figure>
    <?php endif; ?>
    </figure>


                        </a>
                    </section><!-- /.plan -->

        <?php
        endwhile;
        endif;

         ?>

         <?php if ( function_exists( 'wp_pagenavi' ) ) { wp_pagenavi(); } ?>