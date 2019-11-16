<?php 
    function baseUrl($uri){
        $uri = str_replace('?', '&', $uri);
        $uri_array = explode('/', $uri);
        $module = $uri_array[0];
        $action = $uri_array[1];
        
        return BASE_URL."?module={$module}&action={$action}";
    }

    function getParameter($key, $default = null){
        if(!empty($_GET[$key])){
            return $_GET[$key];
        }

        return $default;
    }
    
    function getPostParameter($key, $default = null){
        if(!empty($_POST[$key])){
            return $_POST[$key];
        }

        return $default;
    }

    function redirect($uri){
        $location = baseUrl($uri);
        header("location: $location");
        exit;
    }
