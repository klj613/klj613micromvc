<?php
	/**
	 * This file is part of klj613's micro MVC framework made out of boredom
	 * 
	 * (c) Kristian Lewis Jones <klj613@kristianlewisjones.com>
	 * 
	 * For the full copyight and license information, please view the LICENSE
	 * file that was distributed with this source code.
	 */
	
	/**
	 * Used to mount an application
	 * 
	 * @author Kristian Lewis Jones <klj613@kristianlewisjones.com>
	 */
	class AppKernal
	{
		public $config;
		
		public $serviceContainer;
		
		private static $instance;
		
		/**
		 * Constructor.
		 */
		public function __construct($mode = '')
		{
			AppKernal::$instance = $this;
						
			$config = array();
			require(__DIR__ . '/../config' . '/config.php');
			require(__DIR__ . '/../config' . '/' . $mode . '_config.php');
			$this->config = $config;
			
			spl_autoload_register(array($this, 'loader'));
			
			$this->serviceContainer = DIFactory::getServiceContainer();
			
			$this->serviceContainer->set(array(
				'router' => DIFactory::getRouter(),
				'phpRenderer' => DIFactory::getPhpRenderer()
			));
		}
		
		/**
		 * Autoload Function.
		 * 
		 * @param string $resource
		 */
		public function loader($resource)
		{
			foreach ($this->config['loader'] as $path)
			{
				if (file_exists($path . '/' . $resource . '.php'))
				{
					require($path . '/' . $resource . '.php');
				}
			}
		}
		
		/**
		 * Used to initialise handling of the http request.
		 */
		public function handleRequest()
		{
			$router = $this->serviceContainer->get('router');

			$router->handleRequest(Router::getUriFromGlobals());
		}
		
		/**
		 * Used to get the AppKernal instance from other places.
		 * 
		 * @return AppKernal
		 */
		public static function getInstance()
		{
			if ((AppKernal::$instance instanceof AppKernal) == false)
			{
				throw new Exception("AppKernal hasn't been initialised yet.");
			}
			return AppKernal::$instance;
		}
	}
?>