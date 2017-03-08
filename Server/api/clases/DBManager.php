<?php
    class DBManager{
        protected $manager;
        protected $mClass;
        protected $arguments;
        protected $json;
        protected $dbmsg;
        
        public $msgOk = '{"message" : "ok"}';
        public $msgError = '{"message" : "error"}';
        
        public function __construct($manager, $class, $arguments, $json) {
            $this->manager = $manager;
            $this->mClass = $class;
            $this->arguments = $arguments;
            $this->json = $json;
            $this->dbmsg = "";
        }
        
        public function selectObj(){
            if($this->mClass === null){
                $this->dbmsg .= "Class is null<br>";
                $error = true;
            } else {
                $strQuery = "select c from " . $this->mClass . " c";
                if(count($this->arguments) != 0){
                    $strQuery .= " where ";
                    for($i = 0; $i < count($this->arguments); $i++){
                        if($i % 2 == 0){
                            $strQuery .= "c." . $this->arguments[$i] . " = ";
                        }else{
                            $strQuery .= "'" . $this->arguments[$i] . "'";
                            if($i < count($this->arguments) - 1){
                                $strQuery .= " and ";
                            }
                        }
                    }
                }
                $this->dbmsg .= "Query: $strQuery<br>";
                try{
                    $query = $this->manager->createQuery($strQuery);
                    $result = $query->getResult();
                    //---------------------------------
                    /*$json = '{';
                    for($i = 0; $i < count($result); $i++){
                        $json .= '"' . $this->mClass . '": ' . $result[$i]->getJson();
                        if($i < count($result) - 1){
                            $json .= ',';
                        }
                    }
                    $json .= '}';*/
                    
                    $json = '{"' . $this->mClass . '":[';
                    
                    for($i = 0; $i < count($result); $i++){
                        $json .= $result[$i]->getJson();
                        if($i < count($result) - 1){
                            $json .= ',';
                        }
                    }
                    
                    $json .= ']}';
                    
                    //---------------------------------
                    return $json;
                }catch(Exception $e){
                    $this->dbmsg .= "Error in query<br>";
                    $this->dbmsg .= $e->getMessage() . "<br>";
                    $error = true;
                }
            }
            if($error){
                return $this->msgError;
            }
        }
        
        public function insertObj(){
            if($this->mClass === null || $this->json === null){
                $this->dbmsg .= "Class or json are null<br>";
                $error = true;
            } else {
                if($this->mClass === "Actividad"){
                    $ma = new ManagerActividad($this->manager, $this->mClass, $this->arguments, $this->json);
                    return $ma->insertObj();
                }else{
                    $obj = new $this->mClass(json_decode($this->json));
                    try{
                        $this->manager->persist($obj);
                        $this->manager->flush();
                        return $this->msgOk;
                    }catch(Exception $e){
                        $this->dbmsg .= "Can´t insert this object<br>";
                        $this->dbmsg .= $e->getMessage() . "<br>";
                        $error = true;
                    }
                }
            }
            if($error){
                return $this->msgError;
            }
        }
        
        public function updateObj(){
            if($this->arguments === null || $this->json === null || $this->arguments[0] === null || $this->arguments[1] === null){
                $this->dbmsg .= "Class , json or arguments are null<br>";
                $error = true;
            } else {
                $object = $this->manager->getRepository($this->mClass)->findOneBy(array($this->arguments[0] => $this->arguments[1]));
                if($object === null){
                    $this->dbmsg .= "Object doesn´t exist, trying to insert it<br>";
                    if($this->mClass === "Actividad"){
                        $ma = new ManagerActividad($this->manager, $this->mClass, $this->arguments, $this->json);
                        return $ma->insertObj();
                    }else{
                        return $this->insertObj();
                    }
                }else{
                    try{
                        if($this->mClass === "Actividad"){
                            $object->setJson(json_decode($this->json));
                            $ma = new ManagerActividad($this->manager, $this->mClass, $this->arguments, $this->json);
                            return $ma->updateObj($object);
                        }else{
                            $object->setJson(json_decode($this->json));
                            $this->manager->flush();
                            return $this->msgOk;
                        }
                    }catch(Exception $e){
                        $this->dbmsg .= "Can´t update this object<br>";
                        $this->dbmsg .= $e->getMessage() . "<br>";
                        $error = true;
                    }
                }
            }
            if($error){
                return $this->msgError;
            }
        }
        
        public function deleteObj(){
            if($this->arguments === null || $this->arguments[0] === null || $this->arguments[1] === null){
                $this->dbmsg .= "Arguments are null<br>";
                $error = true;
            } else {
                $object = $this->manager->getRepository($this->mClass)->findOneBy(array($this->arguments[0] => $this->arguments[1]));
                if($object === null){
                    $this->dbmsg .= "Object doesn´t exist<br>";
                    $error = true;
                }else{
                    try{
                        $this->manager->remove($object);
                        $this->manager->flush();
                        return $this->msgOk;
                    }catch(Exception $e){
                        $this->dbmsg .= "Can´t remove this object<br>";
                        $this->dbmsg .= $e->getMessage() . "<br>";
                        $error = true;
                    }
                }
            }
            if($error){
                return $this->msgError;
            }
        }
        
        public function getDebugMessage(){
            return $this->dbmsg;
        }
    }
?>