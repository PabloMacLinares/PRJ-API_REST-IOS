<?php
    /**
     * @Entity @Table(name="grupo")
     **/
    class Grupo {
        
        /**
         * @var int
         * @Id
         * @Column(type="integer") @GeneratedValue
         */
        protected $id;
        
        /**
         * @var string
         * @Column(type="string", length=255, unique=true, nullable=false)
         */
        protected $nombre;
        
        /**
         * @OneToMany(targetEntity="Actividad", mappedBy="grupo")
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
        
        public function addIdActividad($idActividad){
            $this->idActividad[] = $idActividad;
        }
        
        public function getFields(){
            $fields = array (
                'id' => $this->getId(),
                'nombre' => $this->getNombre(),
            );
            return $fields;
        }
        
        public function getJson(){
            return json_encode($this->getFields());
        }
        
        public function setJson($json){
            $this->setId($json->id);
            $this->setNombre($json->nombre);
        }
    }
?>