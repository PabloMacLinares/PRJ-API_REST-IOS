<?php
    class ManagerActividad extends DBManager{
        
        public function insertObj(){
            $actividad = new $this->mClass(json_decode($this->json));
            $profesor = $this->manager->getReference('Profesor', $actividad->getProfesor());
            $actividad->setProfesor($profesor);
            $grupo = $this->manager->getReference('Grupo', $actividad->getGrupo());
            $actividad->setGrupo($grupo);
            
            try{
                $this->manager->persist($actividad);
                $this->manager->flush();
                return $this->msgOk;
            }catch(Exception $e){
                $this->dbmsg .= "Can´t insert this object<br>";
                $this->dbmsg .= $e->getMessage() . "<br>";
                $error = true;
            }
            if($error){
                return $this->msgError;
            }
        }
        
        public function updateObj($object){
            try{
                $profesor = $this->manager->getReference('Profesor', $object->getProfesor());
                $object->setProfesor($profesor);
                $grupo = $this->manager->getReference('Grupo', $object->getGrupo());
                $object->setGrupo($grupo);
                $this->manager->flush();
                return $this->msgOk;
            }catch(Exception $e){
                $this->dbmsg .= "Can´t insert this object<br>";
                $this->dbmsg .= $e->getMessage() . "<br>";
                $error = true;
            }
            if($error){
                return $this->msgError;
            }
        }
    }
?>