<?php
// URL del feed RSS que deseas mostrar
$rss_url = "https://zeus.sii.cl/admin/rss/sii_ind_rss.xml";

// Obtener el contenido del feed RSS
$rss_content = file_get_contents($rss_url);

// Procesar el contenido XML
$xml = simplexml_load_string($rss_content);

// Verificar si el feed se procesó correctamente
if ($xml) {
    // Verificar si existen elementos "item" en el feed
    if (isset($xml->channel->item[0])) {
        // Obtener el título y el enlace de la primera noticia
        $titulo = $xml->channel->item[0]->title;
        $valordolar = $xml->channel->item[0]->description;

        $titulouf = $xml->channel->item[1]->title;
        $valoruf = $xml->channel->item[1]->description;

        // Mostrar el título y el enlace
        echo "<h2>$titulo</h2>";

        echo "<h2>$valordolar</h2>";
        echo "<h2>$titulouf</h2>";
        echo "<h2>$valoruf</h2>";

    } else {
        echo "No se encontraron noticias en el feed RSS.";
    }
} else {
    echo "No se pudo procesar el feed RSS.";
}
?>