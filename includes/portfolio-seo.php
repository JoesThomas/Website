<?php
function portfolioSeo(string $title,string $description,string $path): void {
 $base='https://joe-thomas.co.uk'; $url=$base.$path;
 $e = function ($s) { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); };
 echo '<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>'.$e($title).'</title><meta name="description" content="'.$e($description).'"><link rel="canonical" href="'.$e($url).'">';
 foreach(['og:title'=>$title,'og:description'=>$description,'og:url'=>$url,'og:type'=>'website'] as $k=>$v) echo '<meta property="'.$k.'" content="'.$e($v).'">';
 echo '<meta name="twitter:card" content="summary"><script type="application/ld+json">'.json_encode(['@context'=>'https://schema.org','@type'=>'Person','name'=>'Joe Thomas','jobTitle'=>'Software Engineer','url'=>$base,'sameAs'=>['https://github.com/JoesThomas']],JSON_HEX_TAG|JSON_UNESCAPED_SLASHES).'</script>';
}