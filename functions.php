<?php
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
