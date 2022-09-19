<?php

/**
 * This method redirected to a specific post.
 *
 * @param $page page's location (e.g, 'users/login')
 * @return void
 */
function redirect($page) {
    header('location: ' . URLROOT . '/' . $page);
}
