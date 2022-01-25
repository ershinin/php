<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form.html');
}
$post = $_POST;
$input = trim($post['link']);
if (!filter_var($input, FILTER_VALIDATE_URL)) {
    echo 'INVALID';
} else {
    $links = file_get_contents('links.json');
    $urls = json_decode($links, true);
    if (array_key_exists($input, $urls) && $urls[$input]['time'] > time()) {
        echo $urls[$input]['link'];
    } else {
        $short_url = generate_hash($input);
        while (in_array($short_url, array_column($urls, 'link'))) {
            $short_url = generate_hash($input);
        }
        $urls[$input]['link'] = $short_url;
        $urls[$input]['time'] = time() + 60;
        file_put_contents('links.json', json_encode($urls));
        echo $short_url;
    }
}

function generate_hash(string $string): string
{
    $len = strlen($string);
    return chr($len % 25 + 97) .
    chr(ord(substr($string, intdiv($len, 2),1)) % 25 + 65) .
    chr(ord(substr($string, intdiv($len, 3),1)) % 25 + 97) .
    chr(ord(substr($string, intdiv($len, 5),1)) % 25 + 65) .
    time() % 10;
}


