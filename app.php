
<?php

function call($url)
{
    
    $ch = curl_init();
    
    $config['useragent'] = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';

    curl_setopt($ch, CURLOPT_USERAGENT, $config['useragent']);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,3);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function get_username($data)
{
    $word = '<meta property="og:url" content="https://www.facebook.com/';
    $pos1 = strpos($data, $word);
    
    $rest = substr($data, $pos1+strlen($word), -1);
    
    $word2 = '"';
    $pos2 = strpos($rest, $word2);
    
    $rest2 = substr($rest,0, $pos2);
    return $rest2;
}




if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    $url = 'https://www.facebook.com/profile.php?id='.$id;
    $data = call($url);
    $username = get_username($data);
    if($username!="profile.php")
    {
        echo $username;
    }
     else
     {
        echo "Not Found";
     }
}
       
         




?>

