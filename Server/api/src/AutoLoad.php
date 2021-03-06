<?php

class AutoLoad {
    static function load($clase) {
        $archivo = './src/' . $clase . '.php';
        if(file_exists($archivo)){
            require_once $archivo;
        } else {
            $archivo = '../src/' . $clase . '.php';
            if(file_exists($archivo)){
                require_once $archivo;
            }else {
                $archivo = './clases/' . $clase . '.php';
                if(file_exists($archivo)){
                    require_once $archivo;
                }
            }
        }
    }
}

spl_autoload_register('AutoLoad::load');