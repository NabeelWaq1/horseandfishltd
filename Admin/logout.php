<?php
session_start();
include('../config/connect.php');
session_unset();
session_destroy();
header('Location: ../index.php');