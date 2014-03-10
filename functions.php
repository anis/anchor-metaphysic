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
