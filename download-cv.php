<?php
$path=__DIR__.'/CV_Joe_Thomas.pdf';
if(!is_file($path)){http_response_code(404);header('Content-Type: text/plain; charset=utf-8');exit('CV not yet available.');}
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="Joe-Thomas-CV.pdf"');
header('Content-Length: '.filesize($path));
header('X-Content-Type-Options: nosniff');
readfile($path);