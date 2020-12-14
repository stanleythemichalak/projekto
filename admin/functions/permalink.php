<?php
function toPermalink($string)
    {
$unPretty = array('/�/', '/�/', '/�/', '/�/', '/�/', '/�/', '/�/',
                            '/�/', '/�/', '/�/', '/�/', '/�/', '/�/', '/�/', '/�/' ,'/�/', '/�/', '/�/', '/�/', '/�/', '/�/', '/�/', '/�/', '/�/', '/�/',
                            '/�/','/�/','/�/','/�/','/Y/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/',
                            '/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/',
                            '/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/','/�/',
                            '/�/','/�/','/�/','/�/','/�/','/O/','/o/','/�/','/�/','/�/','/�/');

        $pretty   = array('a', 'o', 'u', 'A', 'O', 'U', 'ss',
                            'a', 'A', 'c', 'C', 'e', 'E', 'l', 'L', 'n', 'N', 'o', 'O', 's', 'S', 'z', 'Z', 'z', 'Z',
                            'S','Z','a','z','Y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N',
                            'O','O','O','O','O','O','U','U','U','U','Y','a','a','a','a','a','a','c','e','e','e',
                            'e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y',
                            'T','t','D','d','ss','O','o','A','ae','u','z');

        $permalink = strtolower(preg_replace($unPretty, $pretty, $string));
        return  str_replace(" ", "_", preg_replace("/[^a-zA-Z0-9 ]/", "", $permalink) );
        }
?>