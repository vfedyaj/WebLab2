<?php
    session_start();
    $mysqli = new mysqli("localhost", "root", "", "testdb") or die("Connection failed: " .$mysqli->error);