<?php

if ($GAcode != 0) {
echo <<<GA
        <script>
            var _gaq=[['_setAccount','$GAcode'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
GA;
}

?>