<?php

/* Definir la ruta al directorio de la aplicación */
defined('APPLICATION_PATH')/* La función defined valida si la constante ha sido definida. */
        || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

/* Define el entorno de la aplicación que será utilizado para el despliegue por defecto */
/* getenv: Obtiene el valor de la variable de entorno, en caso de no existir se configura como entorno de producción */
defined('APPLICATION_ENV')
        || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

/* Incluír la biblioteca de Zend Framework en el Include Path definido para PHP 5, por si se encuentra
 * en la carpeta library asociada al proyecto
 */
defined('SESION_SISTEMA') || define('SESION_SISTEMA','true');
set_include_path(implode(PATH_SEPARATOR, array(
            realpath(APPLICATION_PATH . '/../library'),
            get_include_path(),
        )));

/* Una vez se haya cargado la biblioteca de Zend, se procede a cargar la clase Application.php */
require_once 'Zend/Application.php';

/* Create application, bootstrap, and run */
$application = new Zend_Application(
                APPLICATION_ENV,
                APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()->run();