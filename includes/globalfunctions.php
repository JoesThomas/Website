<?php

function encryptIt($q) {
    $cryptKey = 'qJB0rGtIn5UB1xG03efyCpGbvFT391';
    $qEncoded = base64_encode(openssl_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
    return ($qEncoded);
}

function decryptIt($q) {
    $cryptKey = 'qJB0rGtIn5UB1xG03efyCpGbvFT391';
    $qDecoded = rtrim(openssl_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
    return ($qDecoded);
}

function makelicense($q) {
    $cryptKey = 'qJB0rGtIn5UB1xG0';
    $qEncoded = base64_encode(openssl_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
    return ($qEncoded);
}

function readlicense($q) {
    $cryptKey = 'qJB0rGtIn5UB1xG0';
    $qDecoded = rtrim(openssl_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
    return ($qDecoded);
}

function curPageURL() {
    $isHTTPS = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] ==="on");
    $port = (isset($_SERVER["SERVER_PORT"]) && ((!$isHTTPS && $_SERVER["SERVER_PORT"] !=="80") || ($isHTTPS && $_SERVER["SERVER_PORT"] !=="443")));
    $port = ($port) ? ':' . $_SERVER["SERVER_PORT"] : '';
    $url = ($isHTTPS ? 'https://' : 'http://') . $_SERVER["SERVER_NAME"] . $port . $_SERVER["REQUEST_URI"];
    return $url;
}

// Time format is UNIX timestamp or
// PHP strtotime compatible strings
function dateDiff($time1, $time2, $precision = 4) {
    // If not numeric then convert texts to unix timestamps
    if (!is_int($time1)) {
        $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
        $time2 = strtotime($time2);
    }

    // If time1 is bigger than time2
    // Then swap time1 and time2
    if ($time1 > $time2) {
        $ttime = $time1;
        $time1 = $time2;
        $time2 = $ttime;
    }

    // Set up intervals and diffs arrays
    $intervals = array('day', 'hour', 'minute', 'second');
    $diffs = array();

    // Loop thru all intervals
    foreach ($intervals as $interval) {
        // Create temp time from time1 and interval
        $ttime = strtotime('+1 ' . $interval, $time1);
        // Set initial values
        $add = 1;
        $looped = 0;
        // Loop until temp time is smaller than time2
        while ($time2 >= $ttime) {
            // Create new temp time from time1 and interval
            $add++;
            $ttime = strtotime("+" . $add . " " . $interval, $time1);
            $looped++;
        }

        $time1 = strtotime("+" . $looped . " " . $interval, $time1);
        $diffs[$interval] = $looped;
    }

    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) {
        // Break if we have needed precission
        if ($count >= $precision) {
            break;
        }
        // Add value and interval
        // if value is bigger than 0
        if ($value > 0) {
            // Add s if value is not 1
            if ($value !==1) {
                $interval .= "s";
            }
            // Add value and interval to times array
            $times[] = $value . " " . $interval;
            $count++;
        }
    }

    // Return string with times
    return implode(", ", $times);
}

function getContrastYIQ($hexcolor) {
    $r = hexdec(substr($hexcolor, 0, 2));
    $g = hexdec(substr($hexcolor, 2, 2));
    $b = hexdec(substr($hexcolor, 4, 2));
    $yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
    return ($yiq >= 128) ? 'black' : 'white';
}

function htmlEncode($s) {
    $s = htmlspecialchars($s, ENT_COMPAT, 'ISO-8859-1', true);
    //$s = htmlentities($s, ENT_COMPAT,'ISO-8859-1', true);
    return $s;
}

//To remove all the hidden text not displayed on a webpage
function strip_html_tags($str) {
    $str = preg_replace('/(<|>)\1{2}/is', '', $str);
    $str = str_replace("<script", "", $str);
    $str = str_replace("&#gt;", "", $str);
    $str = str_replace("gt;", "", $str);
    $str = str_replace("lt;", "", $str);
    $str = str_replace("script", "", $str);
    $str = str_replace("SCRIPT", "", $str);
    $str = str_replace("SCR", "", $str);
    $str = str_replace("IPT", "", $str);
    //$str = str_replace("?", "", $str);
    //$str = str_replace("+", "", $str);
    //$str = str_replace("=", "", $str);
    //$str = str_replace(";", "", $str);
    $str = str_replace("cookie", "", $str);
    $str = str_replace("document", "", $str);
    $str = str_replace("location", "", $str);
    //$str = str_replace("“", "", $str);
    //$str = str_replace("”", "", $str);
    $str = str_replace("HTTP-EQUIV", "", $str);
    $str = str_replace("meta", "", $str);
    $str = str_replace("META", "", $str);
    $str = str_replace("<script>", "", $str);
    $str = str_replace("<body", "", $str);
    $str = str_replace("background", "", $str);
    $str = str_replace("<\\/>", "", $str);
    $str = str_replace("www.", "", $str);
    $str = str_replace("(.)", "", $str);
    $str = str_replace("<\\/&", "", $str);
    $str = str_replace("=\"refresh\"", "", $str);
    $str = str_replace("java:('XSS')", "", $str);
    $str = str_replace("</SCR’ + ‘IPT>", "", $str);
    $str = str_replace("<>", "", $str);
    $str = str_replace("index&", "", $str);
    $str = str_replace(".mp3", "", $str);

    $str = str_replace("<script>", "", $str);
    $str = str_replace("script>", "", $str);
    $str = str_replace("http://", "", $str);
    $str = str_replace("HTTP", "", $str);
    $str = str_replace("http", "", $str);
    $str = str_replace("string.", "", $str);
    $str = str_replace("String", "", $str);
    $str = str_replace("CharCode", "", $str);
    $str = str_replace("from", "", $str);
    $str = str_replace("</script", "", $str);
    $str = str_replace("/>", "", $str);
    //$str = str_replace("/", "", $str);
    $str = str_replace(">", "", $str);
    $str = str_replace("<", "", $str);
    $str = str_replace("\">", "", $str);
    $str = str_replace("\"", "", $str);
    $str = str_replace("''", "", $str);
    $str = str_replace("'", "", $str);
    $str = str_replace("JavaScript", "", $str);
    $str = str_replace("language", "", $str);
    $str = str_replace("document.location", "", $str);
    $str = str_replace("document.cookie;", "", $str);
    $str = str_replace("&&", "", $str);
    $str = str_replace("iframe", "", $str);
    $str = str_replace("src=", "", $str);
    $str = str_replace("[url]", "", $str);
    $str = str_replace("alert", "", $str);
    $str = str_replace("href", "", $str);
    $str = str_replace("CONTENT=", "", $str);
    $str = str_replace(".write", "", $str);

    $str = str_replace("<img", "", $str);
    $str = str_replace("<style", "", $str);
    //$str = str_replace(",", "", $str);
    $str = str_replace("<?", "", $str);
    $str = str_replace("<?php", "", $str);
    $str = str_replace(".js", "", $str);
    $str = str_replace(".vbscript", "", $str);
    $str = str_replace(".vbs", "", $str);
    $str = str_replace(".vbe", "", $str);
    $str = str_replace(".hta", "", $str);
    $str = str_replace(".htm", "", $str);
    $str = str_replace(".html", "", $str);
    $str = str_replace(".asp", "", $str);
    $str = str_replace(".py", "", $str);
    $str = str_replace(".pyw", "", $str);
    $str = str_replace(".pyc", "", $str);
    $str = str_replace(".pyo", "", $str);
    $str = str_replace(".pyd", "", $str);
    $str = str_replace(".rb", "", $str);
    $str = str_replace(".rbw", "", $str);
    $str = str_replace(".txt", "", $str);
    $str = str_replace(".pl", "", $str);
    $str = str_replace(".pm", "", $str);
    $str = str_replace(".erl", "", $str);
    $str = str_replace(".hrl", "", $str);
    $str = str_replace(".css", "", $str);
    $str = str_replace(".php", "", $str);
    $str = str_replace("xss", "", $str);
    $str = str_replace("?>", "", $str);
    $str = str_replace("src", "", $str);
    $str = str_replace("&", "&amp;", $str);
    $str = str_replace("document.write", "", $str);
    $str = str_replace(");", "", $str);
    $str = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $str);
    $str = strip_tags($str);
    $str = preg_replace("/^[^A-Za-z0-9]+/", '', $str);

    $str = str_replace("&#64;", "@", $str);
    return $str;
}

//function strip_html_tags ENDS


function saveImage($base64img) {
    define('UPLOAD_DIR', '../weapon_images/');
    $base64img = str_replace('data:image/jpeg;base64,', '', $base64img);
    $data = base64_decode($base64img);
    $file = UPLOAD_DIR . '123123123.jpg';
    file_put_contents($file, $data);
}

function x_week_range($date, $seperator) {
    $returnarray[] = array();
    $ts = strtotime($date);
    $start = (date('w', $ts) ===0) ? $ts : strtotime('last sunday', $ts);
    array_push($returnarray, date("Y" . $seperator . "m" . $seperator . "d", $start));
    array_push($returnarray, date("Y" . $seperator . "m" . $seperator . "d", strtotime('next saturday', $start)));

    return $returnarray;
}

function firstOfMonth() {
    return date("Y-m-d", strtotime(date('m') . '/01/' . date('Y') . ' 00:00:00'));
}

function lastOfMonth() {
    return date("Y-m-d", strtotime('-1 second', strtotime('+1 month', strtotime(date('m') . '-01-' . date('Y') . ' 00:00:00'))));
}

/* backup the db OR just a table */

function backup_tables($host, $user, $pass, $name, $tables = '*') {

    $dbCon = mysql_connect($host, $user, $pass);
    mysql_select_db($name, $dbCon);

    //get all of the tables
    if ($tables ==='*') {
        $tables = array();
        $result = mysql_query('SHOW TABLES');
        while ($row = mysql_fetch_row($result)) {
            $tables[] = $row[0];
        }
    } else {
        $tables = is_array($tables) ? $tables : explode(',', $tables);
    }

    $return = "";

    //cycle through
    foreach ($tables as $table) {
        $result = mysql_query('SELECT * FROM ' . $table);
        $num_fields = mysql_num_fields($result);

        $return.= 'DROP TABLE ' . $table . ';';
        $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE ' . $table));
        $return.= "\n\n" . $row2[1] . ";\n\n";

        for ($i = 0; $i < $num_fields; $i++) {
            while ($row = mysql_fetch_row($result)) {
                $return.= 'INSERT INTO ' . $table . ' VALUES(';
                for ($j = 0; $j < $num_fields; $j++) {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = ereg_replace("\n", "\\n", $row[$j]);
                    if (isset($row[$j])) {
                        $return.= '"' . $row[$j] . '"';
                    } else {
                        $return.= '""';
                    }
                    if ($j < ($num_fields - 1)) {
                        $return.= ',';
                    }
                }
                $return.= ");\n";
            }
        }
        $return.="\n\n\n";
    }

    //save file
    $handle = fopen('db-backup-' . time() . '-' . (md5(implode(',', $tables))) . '.sql', 'w+');
    fwrite($handle, $return);
    fclose($handle);
}

function get_closest_time($arr) {
    $search = time();
    $closest = null;
    foreach ($arr as $item) {
        $item = strtotime($item);
        if ($item > $closest) {
            if ($closest === null || abs($search - $closest) > abs($item - $search)) {
                $closest = $item;
            }
        }
    }

    try {
        $dt = new DateTime('@' . $closest);
    } catch (Exception $e) {
    }
    return $dt;
}

function get_closest_time_express($arr) {
    $search = time();
    $closest = null;
    foreach ($arr as $item) {
        $item = strtotime($item);
        if ($item > $closest) {
            if ($closest === null || abs($search - $closest) > abs($item - $search)) {
                $closest = $item;
            }
        }
    }

    $nd = date("H:i:s", $closest);
    try {
        $dt = new DateTime($nd);
    } catch (Exception $e) {
    }
    return $dt;
}

function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

function weeks_between($datefrom2, $dateto2) {
    $interval = $datefrom2->diff($dateto2);
    $week_total = $interval->format('%a') / 7;

    return round($week_total, 2);
}
