<?php
$doc = new DOMDocument();
$doc->load('http://www.baomoi.com/Rss/RssFeed.ashx');
$Feeds = array();
foreach ($doc->getElementsByTagName('item') as $node) {
        $itemRSS = array (
            'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
            'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
            'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue
            );
        array_push($Feeds, $itemRSS);
    }
?>