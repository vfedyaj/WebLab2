<?php
    session_start();
    $mysqli = new mysqli("localhost", "root", "", "lr2") or die("Connection failed: " .$mysqli->error);