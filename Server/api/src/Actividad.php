<?php
    /**
     * @Entity @Table(name="actividad")
     **/
    class Actividad {
        
        /**
         * @var int
         * @Id
         * @Column(type="integer") @GeneratedValue
         */
        protected $id;
        
        /**
         * @ManyToOne(targetEntity="Profesor", inversedBy="idActividad")
         * @JoinColumn(name="idProfesor", referencedColumnName="id")
         */
        protected $profesor;
        
        /**
         * @ManyToOne(targetEntity="Grupo", inversedBy="idActividad")
         * @JoinColumn(name="idGrupo", referencedColumnName="id")
         */
        protected $grupo;
        
        /** @Column(type="string", name="titulo", length=30) */
        protected $titulo;
        
        /** @Column(type="string", name="descripcion", length=255) */
        protected $descripcion;
        
        /** @Column(type="date", name="fecha") */
        protected $fecha;
        
        /** @Column(type="string", name="lugar", length=255) */
        protected $lugar;
        
        /** @Column(type="time", name="hora_inicio") */
        protected $horaInicio;
        
        /** @Column(type="time", name="hora_fin") */
        protected $horaFin;
        
        /** @Column(type="text", name="imagen") */
        protected $imagen;
        
        public function __construct() {
            if(func_num_args() == 1){
                call_user_func_array(array($this, '__construct1'), func_get_args());
            }
        }
        
        public function __construct1($json){
            $this->setJson($json);
        }
        
        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
            return $this;
        }
        
        public function getProfesor(){
            return $this->profesor;
        }
        
        public function setProfesor($profesor){
            //$profesor->addIdActividad($this);
            $this->profesor = $profesor;
            return $this;
        }
        
        public function getGrupo(){
            return $this->grupo;
        }
        
        public function setGrupo($grupo){
            //$grupo->addIdActividad($this);
            $this->grupo = $grupo;
            return $this;
        }
        
        public function getTitulo(){
            return $this->titulo;
        }
        
        public function setTitulo($titulo){
            $this->titulo = $titulo;
            return $this;
        }
        
        public function getDescripcion(){
            return $this->descripcion;
        }
        
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
            return $this;
        }
        
        public function getFecha(){
            return $this->fecha;
        }
        
        public function setFecha($fecha){
            $this->fecha = $fecha;
            return $this;
        }
        
        public function getLugar(){
            return $this->lugar;
        }
        
        public function setLugar($lugar){
            $this->lugar = $lugar;
            return $this;
        }
        
        public function getHoraInicio(){
            return $this->horaInicio;
        }
        
        public function setHoraInicio($horaInicio){
            $this->horaInicio = $horaInicio;
            return $this;
        }
        
        public function getHoraFin(){
            return $this->horaFin;
        }
        
        public function setHoraFin($horaFin){
            $this->horaFin = $horaFin;
            return $this;
        }
        
        public function getImagen(){
            return $this->imagen;
        }
        
        public function setImagen($imagen){
            $this->imagen = $imagen;
            return $this;
        }
        
        public function getJson(){
            $fields = array (
                'id' => $this->getId(),
                'profesor' => $this->getProfesor()->getFields(),
                'grupo' => $this->getGrupo()->getFields(),
                'titulo' => $this->getTitulo(),
                'descripcion' => $this->getDescripcion(),
                'fecha' => $this->getFecha()->format('Y-m-d'),
                'lugar' => $this->getLugar(),
                'horaInicio' => $this->getHoraInicio()->format('H:i:s'),
                'horaFin' => $this->getHoraFin()->format('H:i:s'),
				'imagen' => $this->getImagen(),
            );
            return json_encode($fields);
        }
        
        public function setJson($json){
            $this->setId($json->id);
            $this->setProfesor($json->profesor);
            $this->setGrupo($json->grupo);
            $this->setTitulo($json->titulo);
            $this->setDescripcion($json->descripcion);
            $this->setFecha(date_create($json->fecha));
            $this->setLugar($json->lugar);
            $this->setHoraInicio(date_create($json->horaInicio));
            $this->setHoraFin(date_create($json->horaFin));
			$this->setImagen($json->imagen);
        }
    }
?>