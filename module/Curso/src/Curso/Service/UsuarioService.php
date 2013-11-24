<?php
namespace  Curso\Service;
use Application\Service\UsuarioInterface;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

 class UsuarioService implements UsuarioInterface, ServiceManagerAwareInterface{
 	protected $nombre;
 	protected $apellidoPaterno;
 	protected $apellidoMaterno;
 	
 	public function setServiceManager (ServiceManager $serviceManager){
 		$this->sm = $serviceManager;
 	}
 	
 	public function getServiceManager(){
 		return $this->sm;
 	}
 	
 	public function testDB(){
 		$adapter = $this->getServiceManager()->get('Zend\Db\Adapter\Adapter');
 		
 		$result = $adapter->query('SELECT * FROM catproducto WHERE IdProducto = ?', array(5));
 		echo get_class($result).' //Esto devuelve un objeto $result <br><br>';
 		 
 		$data = $result->current();
 		print_r ($data);
 	}
 	
 	
 	function loadById($user_id){
 		$adapter = $this->getServiceManager()->get('Zend\Db\Adapter\Adapter');
 		$result = $adapter->query('SELECT * FROM catusuario WHERE IdRol = ?', array($user_id));
 		$data = $result->current();
 		
 		if($data !== null){
 			$this->hydrator($data);
 			return true;
 		}
 		
 		return false;
 	}
 	
 	function hydrator ($data){
 		$this->setNombre($data->NombreCompleto);
 		
 	}
 	
	/**
	 * @return the $nombre
	 */
	public function getNombre() {
		
		return $this->nombre.' '.$this->apellidoPaterno.' '.$this->apellidoMaterno;
	}

	/**
	 * @return the $apellidoPaterno
	 */
	public function getApellidoPaterno() {
		return $this->apellidoPaterno;
	}

	/**
	 * @return the $apellidoMaterno
	 */
	public function getApellidoMaterno() {
		return $this->apellidoMaterno;
	}

	/**
	 * @param field_type $nombre
	 */
	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	/**
	 * @param field_type $apellidoPaterno
	 */
	public function setApellidoPaterno($apellidoPaterno) {
		$this->apellidoPaterno = $apellidoPaterno;
	}

	/**
	 * @param field_type $apellidoMaterno
	 */
	public function setApellidoMaterno($apellidoMaterno) {
		$this->apellidoMaterno = $apellidoMaterno;
	}

 }
?>