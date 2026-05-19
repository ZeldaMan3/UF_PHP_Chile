<?php
$rssUrl = 'https://zeus.sii.cl/admin/rss/sii_ind_rss.xml';

function renderMessage(string $message): void
{
    echo '<p>' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</p>';
}

$rssContent = @file_get_contents($rssUrl);

if ($rssContent === false) {
    renderMessage('No se pudo obtener el feed RSS del SII.');
    exit;
}

$xml = @simplexml_load_string($rssContent);

if ($xml === false || !isset($xml->channel->item[0])) {
    renderMessage('No se pudo procesar el feed RSS.');
    exit;
}

$items = $xml->channel->item;
$maxItems = min(2, count($items));

for ($i = 0; $i < $maxItems; $i++) {
    $title = (string) $items[$i]->title;
    $description = (string) $items[$i]->description;

    echo '<h2>' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</h2>';
    echo '<p>' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '</p>';
}
?>
