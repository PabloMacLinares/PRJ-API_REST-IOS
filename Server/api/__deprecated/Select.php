<?php
    class Select {
        public static function selectObj($manager, $class, $arguments){
            if($class === null){
                $error = true;
            } else {
                $strQuery = "select c from $class c";
                
                if(count($arguments) != 0){
                    $strQuery .= " where ";
                    for($i = 0; $i < count($arguments); $i++){
                        if($i % 2 == 0){
                            $strQuery .= "c." . $arguments[$i] . " = ";
                        }else{
                            $strQuery .= "'" . $arguments[$i] . "'";
                            if($i < count($arguments) - 1){
                                $strQuery .= " and ";
                            }
                        }
                    }
                }
    
                $query = $manager->createQuery($strQuery);
                $result = $query->getResult();
                $json = '{"array:"[';
                for($i = 0; $i < count($result); $i++){
                    $json .= '"' . $class . '": ' . $result[$i]->getJson();
                    if($i < count($result) - 1){
                        $json .= ',';
                    }
                }
                $json .= ']}';
                return $json;
            }
            if($error){
                return '{"message" : "error"}';
            }
        }
    }
?>