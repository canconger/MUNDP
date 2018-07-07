<?
include("config.php");
include("mysql.php");

/* ===================== Functions ===================== */
function recaptcha_check($response)
{
    include ("config.php");
    
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array('secret' => RECAPTCHA_SECRET, 'response' => $response);

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    return $result;
}