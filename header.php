<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo page_title('Page can’t be found'); ?> - <?php echo site_name(); ?></title>

        <link rel="stylesheet" href="<?php echo theme_url('/css/reset.css'); ?>">
        <link rel="stylesheet" href="<?php echo theme_url('/css/fonts.css'); ?>">
        <link rel="stylesheet" href="<?php echo theme_url('/css/main.css'); ?>">
        <link rel="stylesheet" href="<?php echo theme_url('/css/highlightjs.css'); ?>">

        <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo rss_url(); ?>">
        <link rel="shortcut icon" href="<?php echo theme_url('img/favicon.png'); ?>">

        <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <script>var base = '<?php echo theme_url(); ?>';</script>

        <meta name="viewport" content="width=device-width">
        <meta name="generator" content="Anchor CMS">
        <meta name="title" content="<?php echo article_id() ? article_title() : site_name(); ?>">
        <meta name="description" content="<?php echo article_id() ? article_description() : site_description(); ?>">

        <meta property="fb:app_id" content="<?php echo site_meta('facebook-app-id'); ?>">
        <meta property="og:type" content="blog">
        <meta property="og:url" content="<?php echo full_url() . current_url(); ?>">
        <meta property="og:title" content="<?php echo article_id() ? article_title() : site_name(); ?>">
        <!-- name='og:image' for Google+ -->
        <meta name="og:image" content="<?php echo str_replace('/index.php/', '', full_url()) . (article_id() ? article_custom_field('thumbnail') : theme_url('img/og_image.gif')); ?>">
        <!-- property='og:image' for Facebook -->
        <meta property="og:image" content="<?php echo str_replace('/index.php/', '', full_url()) . (article_id() ? article_custom_field('thumbnail') : theme_url('img/og_image.gif')); ?>">
        <meta property="og:description" content="<?php echo article_id() ? article_description() : site_description(); ?>">
        <meta property="og:site_name" content="<?php echo site_name(); ?>">

        <?php if(customised()): ?>
            <!-- Custom CSS -->
        <style><?php echo article_css(); ?></style>

        <!--  Custom Javascript -->
        <script><?php echo article_js(); ?></script>
        <?php endif; ?>
    </head>

    <body class="<?php echo body_class(); ?>">
        <header>
            <hgroup>
                <h1><a href="<?php echo base_url(); ?>"><?php echo preg_replace('`&lt;(.+)&gt;`', '&lt;<em>$1</em>&gt;', site_name()); ?></a></h1>
                <h2><?php echo site_description(); ?></h2>
            </hgroup>
        </header>