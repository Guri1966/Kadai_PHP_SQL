<?php
$sql = "SELECT * FROM memo ORDER BY invalid DESC,  date;";
$memo_list = $dbh->query($sql);
