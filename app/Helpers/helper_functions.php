<?php

function ddBug( $data  ) {
    highlight_string("<?php\n " . var_export($data, true) . "?>");
    echo '<script>document.getElementsByTagName("code")[0].getElementsByTagName("span")[1].remove() ;document.getElementsByTagName("code")[0].getElementsByTagName("span")[document.getElementsByTagName("code")[0].getElementsByTagName("span").length - 1].remove() ; </script>';
    die();

}

function getTimeStampAsId($isMicroTimeNeed = false)
{
    return date('ymdHis') . rand(10, 99);
}
