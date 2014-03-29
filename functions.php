<?php
function pluralise($amount, $str, $alt = '') {
    return intval($amount) === 1 || substr($str, -1) === 's'
        ? $str
        : $str . ($alt !== '' ? $alt : 's');
}

function relative_time($date) {
    if(is_numeric($date)) $date = '@' . $date;

    $user_timezone = new DateTimeZone(Config::app('timezone'));
    $date = new DateTime($date, $user_timezone);

    // get current date in user timezone
    $now = new DateTime('now', $user_timezone);

    $elapsed = $now->format('U') - $date->format('U');

    if($elapsed <= 1) {
        return 'A l\'instant';
    }

    $times = array(
        31104000 => 'année',
        2592000 => 'mois',
        604800 => 'semaine',
        86400 => 'jour',
        3600 => 'heure',
        60 => 'minute',
        1 => 'seconde'
    );

    foreach($times as $seconds => $title) {
        $rounded = $elapsed / $seconds;

        if($rounded > 1) {
            $rounded = round($rounded);
            return 'Il y a ' . $rounded . ' ' . pluralise($rounded, $title);
        }
    }
}

function twitter_account() {
	return site_meta('twitter');
}

/*
 * Returns the necessary query string to append to the share URL of the requested social network
 *
 * @param string $network Network name (either 'twitter', 'facebook', or 'google')
 *
 * @return string
 */
function shareParameters($network) {
    // List of parameters for each network
    $parameters = array(
        'twitter' => array(
            'lang'    => 'fr',
            'text'    => '"' . article_title() . '"' . (twitter_account() ? ' via @' . twitter_account() : '') . ' — ',
            'url'     => full_url() . current_url(),
            'related' => twitter_account() ? twitter_account() : null
        ),
        'facebook' => array(
            's'            => 100,
            'p[title]'     => article_title(),
            'p[summary]'   => article_description(),
            'p[url]'       => full_url() . current_url(),
            'p[images][0]' => str_replace('/index.php/', '', full_url()) . article_custom_field('thumbnail'),
        ),
        'google' => array(
            'url' => full_url() . current_url(),
        )
    );

    // Build up the query string
    $queryBlocks = array();
    foreach ($parameters[$network] as $key => $value) {
        if ($value !== null ) {
            array_push($queryBlocks, $key . '=' . urlencode($value));
        }
    }

    return implode('&', $queryBlocks);
}

function twitter_url() {
	return 'https://twitter.com/' . twitter_account();
}

function github_account() {
	return site_meta('github');
}

function github_url() {
	return 'https://github.com/' . github_account();
}

function comment_gravatar() {
    return 'http://www.gravatar.com/avatar/' . md5( strtolower( trim( comment_email() ) ) ) . '?s=80';
}

function my_total_comments() {
    return Comment::where('post', '=', article_id())
        ->where('status', '=', 'approved')
        ->count();
}
