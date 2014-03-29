<?php theme_include('header'); ?>

<section class="posts" id="article-<?php echo article_id(); ?>">
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
                    <p class="comments"><a href="#comments"><span><?php echo total_comments(); ?></span> <?php echo pluralise(total_comments(), 'commentaire'); ?></a></p>
                    <?php endif; ?>
                </figcaption>
            </figure>
        </header>

        <aside class="social">
            <p>
                <a class="twitter"
                   href="https://twitter.com/share?<?php echo shareParameters('twitter'); ?>"
                   onclick="window.open(this.getAttribute('href'), 'Twitter', 'menubar=no,status=no,width=600,height=600'); return false;"></a>
                <a class="facebook"
                   href="http://www.facebook.com/sharer.php?<?php echo shareParameters('facebook'); ?>"
                   onclick="window.open(this.getAttribute('href'), 'Facebook', 'menubar=no,status=no,width=600,height=600'); return false;"></a>
                <a class="google-plus"
                   href="https://plus.google.com/share?<?php echo shareParameters('google'); ?>"
                   onclick="window.open(this.getAttribute('href'), 'Google+', 'menubar=no,status=no,width=600,height=600'); return false;"></a>
            </p>
        </aside>

        <div class="content">
            <?php echo preg_replace('`<(/)?code>`', '<$1pre><$1code>', article_markdown()); ?>
        </div>
    </article>
</section>

<section class="comments" id="comments">
    <?php if(has_comments()): ?>
        <?php $i = 0; while(comments()): $i++; ?>
        <article id="comment-<?php echo comment_id(); ?>">
            <figure>
                <img src="<?php echo comment_gravatar(); ?>" />
            </figure>

            <header>
                <time><?php echo relative_time(comment_time()); ?></time>
                <h1>Rédigé par <em><?php echo comment_name(); ?></em></h1>
            </header>

            <div class="content"><?php echo nl2br(comment_text()); ?></div>
            <div class="clearer"></div>
        </article>
        <?php endwhile; ?>
    <?php elseif(comments_open()): ?>
    <p>Sois le premier &agrave; commenter cet article, yo !</p>
    <?php else: ?>
    <p class="no-comments">Les commentaires ont &eacute;t&eacute; d&eacute;sactiv&eacute;s sur cet article.</p>
    <?php endif; ?>

    <?php if(comments_open()): ?>
    <form id="comment" class="commentform wrap" method="post" action="<?php echo comment_form_url(); ?>#comment">
        <?php echo comment_form_notifications(); ?>

        <p class="name">
            <label for="name">Ton petit nom :</label>
            <?php echo comment_form_input_name('placeholder="Ton petit nom"'); ?>
        </p>

        <p class="email">
            <label for="email">Ton courriel :</label>
            <?php echo comment_form_input_email('placeholder="Ton courriel (ne sera ni publié ni utilisé à des fins commerciales)"'); ?>
        </p>

        <p class="textarea">
            <label for="text">Ton mot doux :</label>
            <?php echo comment_form_input_text('placeholder="Ton mot doux"'); ?>
        </p>

        <p class="submit">
            <?php echo comment_form_button('Soumettre ton commentaire'); ?>
        </p>
    </form>
    <?php endif; ?>
</section>

<?php theme_include('footer'); ?>