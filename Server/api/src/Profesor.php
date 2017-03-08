<?php
    /**
     * @Entity @Table(name="profesor")
     **/
    class Profesor {
        
        /**
         * @var int
         * @Id
         * @Column(type="integer") @GeneratedValue
         */
        protected $id;
        
        /**
         * @var string
         * @Column(type="string", length=255, nullable=false)
         */
        protected $nombre;
        
        /**
         * @var string
         * @Column(type="string", length=255, nullable=false)
         */
        protected $departamento;
        
        /**
         * @OneToMany(targetEntity="Actividad", mappedBy="profesor")
         */
        protected $idActividad = null;
        
        public function __construct() {
            //$this->idActividad = new ArrayCollection();
            if(func_num_args() == 1){
                call_user_func_array(array($this, '__construct1'), func_get_args());
            }
        }
        
        public function __construct1($json){
            $this->setJson($json);
        }
        
        public function getId() {
            return $this->id;
        }
        
        public function setId($id) {
            $this->id = $id;
            return $this;
        }
    
        public function getNombre() {
            return $this->nombre;
        }
        
        public function setNombre($nombre) {
            $this->nombre = $nombre;
            return $this;
        }
        
        public function getDepartamento(){
            return $this->departamento;
        }
        
        public function setDepartamento($departamento) {
            $this->departamento = $departamento;
            return $this;
        }
        
        public function addIdActividad($idActividad){
            $this->idActividad[] = $idActividad;
        }
        
        public function getFields(){
            $fields = array (
                'id' => $this->getId(),
                'nombre' => $this->getNombre(),
                'departamento' => $this->getDepartamento(),
            );
            return $fields;
        }
        
        public function getJson(){
            return json_encode($this->getFields());
        }
        
        public function setJson($json){
            $this->setId($json->id);
            $this->setNombre($json->nombre);
            $this->setDepartamento($json->departamento);
        }
        
        public function __toString(){
            return  "Id: " . $this->id .
                    ", Nombre: " . $this->nombre .
                    ", Departamento: " . $this->departamento . "<br>";
        }
    }
?>