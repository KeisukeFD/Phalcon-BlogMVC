<?php namespace Utils;

function truncate($str, $width) {
    return current(explode("\n", wordwrap($str, $width, "...\n")));
}

function generateList($debut=0, $fin) {
    return range($debut, $fin);
}

function formatDate($from, $string = "F jS, H:i") {
    $d = new \DateTime($from);
    return $d->format($string);
}

function MarkdownParse($str) {
    include 'Markdown.php';
    $parser = new \Michelf\MarkdownExtra();

    $str = $parser->transform($str);
    $replace_array = array(
        '<h1>'       => '<h3>',
        '</h1>'      => '</h3>',
        '<code>'     => '',
        '</code>'    => '',
        '<pre>'      => '<pre class="php" name="code">',
        '<p>!!</p>'  => '<p><a class="btn" onclick="$(this).parent().slideUp().next(\'.hidden\').slideDown();">Voir la réponse</a></p><div class="hidden">',
        '<p>/!!</p>' => '</div>'
    );
    $search = $replace = array();
    foreach($replace_array as $k=>$v){
        $search[] = $k;
        $replace[] = $v;
    }
    $str = str_replace($search, $replace, $str);
    return $str;
}


function timeAgoWord($from_time, $include_seconds = true) {
    $fromDate = new \Datetime($from_time);
    $from_time = $fromDate->getTimestamp();

    $to_time = new \DateTime('now');
    $to_time = $to_time->getTimestamp();

    $distance_in_minutes = round((abs($to_time - $from_time))/60);
    $distance_in_seconds = round(abs($to_time - $from_time));

    if ($distance_in_minutes <= 1){
        if ($include_seconds){
            if ($distance_in_seconds < 5){
                return sprintf('less than %d seconds ago', 5);
            }
            elseif($distance_in_seconds < 10){
                return sprintf('less than %d seconds ago', 10);
            }
            elseif($distance_in_seconds < 20){
                return sprintf('less than %d seconds ago', 20);
            }
            elseif($distance_in_seconds < 40){
                return sprintf('half a minute ago');
            }
            elseif($distance_in_seconds < 60){
                return sprintf('less than a minute ago');
            }
            else {
                return sprintf('1 minute ago');
            }
        }
        return ($distance_in_minutes===0) ? sprintf('less than a minute ago') : sprintf('1 minute ago');
    }
    elseif ($distance_in_minutes <= 45){
        return sprintf('%d minutes ago', $distance_in_minutes);
    }
    elseif ($distance_in_minutes <= 90){
        return sprintf('about 1 hour ago');
    }
    elseif ($distance_in_minutes <= 1440){
        return sprintf('about %d hours ago', round($distance_in_minutes/60));
    }
    elseif ($distance_in_minutes <= 2880){
        return sprintf('1 day ago');
    }
    else{
        return sprintf('%d days ago', round($distance_in_minutes/1440));
    }
}

function print_pre($expression)
{
    $css = 'border:1px dashed #06f;background:#69f;padding:1em;text-align:left;';
    
    $str = '<pre style="' . $css . '">' . htmlspecialchars(print_r($expression, true)) . '</pre>';

    echo $str;
}

?>
