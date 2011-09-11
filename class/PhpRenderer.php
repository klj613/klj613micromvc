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
	 * Used to render templates.
	 * 
	 * @author Kristian Lewis Jones <klj613@kristianlewisjones.com>
	 */
	class PhpRenderer extends Renderer
	{		
		/**
		 * Render's a specific template.
		 * 
		 * @param string $template The template name.
		 * @param array $vars Variables used for the template.
		 * 
		 * @return string Rendered Template
		 */
		public function render($template, $vars = array())
		{
			ob_start();
			
			extract($vars);
			require($this->config['path'] . '/' . $template . '.php');
			
			$content = ob_get_clean();
						
			return $content;
		}
		
		/**
		 * Used to render a controller
		 * 
		 * @param string $controller
		 * 
		 * @return array The parameters
		 * 
		 * @throws Exception
		 */
		public function fetch($controller, $params = array())
		{
			$structure = $this->getParamsStructure($controller);
			
			if (count($params) != count($structure))
			{
				throw new Exception("Parameter count on the Routing Pattern doesn't match the controller");
			}
			
			foreach ($params as $key => $value)
			{
				if (in_array($key, $structure) == false)
				{
					throw new Exception("Parameter `$key` doesn't exist on the controller");
				}
			}
			
			list($class, $method) = explode('::', $controller);
			$realClass = $class . 'Controller';
			
			$instance = DIFactory::getController($realClass);
			
			return call_user_func_array(array($instance, $method), $params);
		}
		
		/**
		 * Get the parameter structure off a controller method.
		 * 
		 * @param string $routeId
		 * 
		 * @return array The parameter structure
		 */
		public function getParamsStructure($controller)
		{
			list($controllerClass, $controllerMethod) = explode('::', $controller);
			$controllerRealClass = $controllerClass . 'Controller';

			$reflectionClass = new ReflectionClass($controllerRealClass);
			$reflectionMethod = $reflectionClass->getMethod($controllerMethod);
			$refParams = $reflectionMethod->getParameters();
			
			$realParams = array();
			foreach ($refParams as $refParam)
			{
				$realParams[] = $refParam->name;
			}
			
			return $realParams;
		}
	}
?>
