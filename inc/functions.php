<?php

function set_message($message) {
    $_SESSION['message'] = $message;
}

function get_message() {
    if(isset($_SESSION['message'])) {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['message']  . '</div>';
        unset($_SESSION['message']);
    }
}
    







