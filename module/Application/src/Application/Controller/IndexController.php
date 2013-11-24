<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
//use Application\Service\UsuarioService;
use Curso\Service\UsuarioService;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function holaAction()
    {
    	
    	
    	$usuario = $this->getServiceLocator()->get('Curso\Service\UsuarioService');
    	$usuario ->testDB();
    	
    	
    	$usuario->setNombre('Sidney Adrián');
    	$usuario->setApellidoPaterno('Vivanco');
    	$usuario->setApellidoMaterno('Palma');
    	
    	$usuario ->loadById(1);
    	
    	echo get_class($usuario);
    	
    	//if ($usuario instanceof Application\Service\UsuarioService):
    	
    	$parametros ['nombre'] = 'Sidney Adrián Vivanco Palma';
    	$parametros['objeto_usuario'] = $usuario;
    	return new ViewModel($parametros);
    }
}
