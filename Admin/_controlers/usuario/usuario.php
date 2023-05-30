<?php 
function quando($quando){
    date_default_timezone_set("Africa/Luanda");
    return date("d-m-Y H:i:s A",$quando);
}

function postRequest($url, $body){
    
        $ch = curl_init();
        $url = 'http://'.$_SERVER['SERVER_NAME'].$url;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));

        // In real life you should use something like:
        // curl_setopt($ch, CURLOPT_POSTFIELDS, 
        //          http_build_query(array('postvar1' => 'value1')));

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);

        return $server_output;

}

function log_passe($email){
    $res = postRequest('/biblioteca/Admin/Classes/Administrador/log_passe.php', ["administrador"=>$email] );
    return ((array) json_decode($res));
}

function log_sessao($id){
    $res = postRequest('/biblioteca/Admin/Classes/Administrador/log_sessao.php', ["administrador"=>$id] );
    return ((array) json_decode($res));
}

var_dump(log_sessao($metadata['id']));