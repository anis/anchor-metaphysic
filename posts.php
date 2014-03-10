<?php theme_include('header'); ?>

<section class="posts">
    <?php if(has_posts()): ?>
        <?php $i = 0; while(posts()): ?>
        <article>
            <header>
                <figure>
                    <a href="<?php echo article_url(); ?>">
                        <img src="<?php echo article_custom_field('thumbnail'); ?>" />
                    </a>
                    
                    <figcaption>
                        <h1><a href="<?php echo article_url(); ?>"><?php echo article_title(); ?></a></h1>
                        <p>
                            Publi&eacute; le
                            <time datetime="<?php echo date('c', article_time()); ?>" pubdate>
                                <?php
                                    $months = array(
                                        'January' => 'Janvier',
                                        'February' => 'Février',
                                        'March' => 'Mars',
                                        'April' => 'Avril',
                                        'May' => 'Mai',
                                        'June' => 'Juin',
                                        'July' => 'Juillet',
                                        'August' => 'Août',
                                        'September' => 'Septembre',
                                        'October' => 'Octobre',
                                        'November' => 'Novembre',
                                        'December' => 'Décembre'
                                    );
                                        
                                    echo strtr(date('d F Y à H:i', article_time()), $months);
                                ?>
                            </time>
                            par <a href="#" rel="author"><?php echo article_author(); ?></a>.
                        </p>
                        <?php if(comments_open()): ?>
                        <p class="comments"><span><?php echo total_comments(); ?></span> <?php echo pluralise(total_comments(), 'commentaire'); ?></p>
                        <?php endif; ?>
                    </figcaption>
                </figure>
            </header>

            <div class="content">
                <p><?php echo article_description(); ?></p>
                <p><a href="<?php echo article_url(); ?>">Lire la suite...</a></p>
            </div>
        </article>
        <?php endwhile; ?>

        <?php if(has_pagination()): ?>
        <nav class="pagination">
            <div class="wrap">
                <span class="left"><?php echo posts_prev('&lt; Précédents'); ?></span>
                <span class="right"><?php echo posts_next('Suivants &gt;'); ?></span>
            </div>
        </nav>
        <?php endif; ?>

    <?php else: ?>
    <p>Apparemment ce blog est vide...</p>
    <?php endif; ?>
</section>

<?php theme_include('footer'); ?>