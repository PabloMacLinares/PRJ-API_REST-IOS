<?php
    class Update{
        public function updateObj($manager, $class, $arguments, $json){
            if($arguments === null || $arguments[0] === null || $arguments[1] === null){
                $error = true;
            } else {
                $object = $manager->getRepository($class)->findOneBy(array($arguments[0] => $arguments[1]));
                if($object === null){
                    $error = true;
                }else{
                    try{
                        $object->setJson(json_decode($json));
                        $manager->flush();
                        return '{"message" : "ok"}';
                    }catch(Exception $e){
                        $error = true;
                    }
                }
            }
            if($error){
                return '{"message" : "error"}';
            }
        }
    }
?>