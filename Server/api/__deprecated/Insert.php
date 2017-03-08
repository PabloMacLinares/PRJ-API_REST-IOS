<?php
    class Insert{
        public static function insertObj($manager, $class, $json){
            if($class === null || $json === null){
                $error = true;
            } else {
                $obj = new $class(json_decode($json));
                try{
                    $manager->persist($obj);
                    $manager->flush();
                    return '{"message" : "ok"}';
                }catch(Exception $e){
                    $error = true;
                }
            }
            if($error){
                return '{"message" : "error"}';
            }
        }
    }
?>