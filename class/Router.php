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
	class Router
	{
		private $routing;
		
		public $uri;
		public $routeId;
		
		/**
		 * Constructor.
		 * 
		 * @param array $routing The routing config.
		 */
		public function __construct($routing)
		{
			$this->routing = $routing;
		}
		
		/**
		 * Initiates the handling of a specific URI
		 * 
		 * @param string $uri The URI to handle.
		 */
		public function handleRequest($uri)
		{
			$this->uri = $uri;
			
			$routeId = $this->matchRouting($uri);
			
			$this->routeId = $routeId;
			
			$params = $this->getParams($uri, $routeId);
			
			list($class, $method) = $this->routing[$routeId][1];
			$realClass = $class . 'Controller';

			$instance = DIFactory::getController($realClass);
			
			call_user_func_array(array($instance, $method), $params);
		}
		
		/**
		 * Get the routing ID that belongs to a specific URI.
		 * 
		 * @param string $uri The URI to match.
		 *
		 * @throws Exception
		 */
		public function matchRouting($uri)
		{
			foreach ($this->routing as $rule)
			{
				$pattern = $rule[0];
				$regex = '#' . preg_replace('#{([^/]+)}#', '([a-zA-Z0-9-]+)', $pattern) . '#';
				if (preg_match($regex, $uri))
				{
					return key($this->routing);
				}
				next($this->routing);
			}
			throw new Exception("No Routing Found for `$uri`");
		}
		
		/**
		 * Get the parameters off a URI.
		 * 
		 * @param string $uri
		 * @param string $routeId
		 *
		 * @throws Exception
		 * 
		 * @return array The parameters of the URI.
		 */
		public function getParams($uri, $routeId)
		{
			$pattern = $this->routing[$routeId][0];
			$regex = '#{([^/]+)}#';
			
			preg_match_all($regex, $pattern, $matchedKeys);
			
			$derivedRegex = preg_replace($regex, '([^/]+)', $pattern);
			preg_match_all('#' . $derivedRegex . '#', $uri, $matchedValues);
			
			$structure = $this->getParamsStructure($routeId);
			
			if (count($matchedKeys[0]) == 0)
			{
				$count = 0;	
			}
			else
			{
				$count = count($matchedKeys[1]);	
			}
			$realCouunt = count($structure);
			if ($count != $realCouunt)
			{
				throw new Exception("Parameter count on the Routing Pattern doesn't match the controller");
			}
			
			$params = array();
			for ($i = 0; $i < $count; $i++)
			{
				$key = $matchedKeys[1][$i];
				if (in_array($key, $structure) == false)
				{
					throw new Exception("Parameter `$key` doesn't exist on the controller");
				}
				$value = $matchedValues[$i + 1][0];
				$params[$key] = $value;
			}
			
			return $params;		
		}
				
		/**
		 * Get the parameter structure off a controller method.
		 * 
		 * @param string $routeId
		 * 
		 * @return array The parameter structure
		 */
		public function getParamsStructure($routeId)
		{
			list($controllerClass, $controllerMethod) = $this->routing[$routeId][1];
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
		
		/**
		 * Generates URI's that are absolute to the domain.
		 * 
		 * @param string $routeId
		 * @param array $params The parameters to insert into the URI
		 *
		 * @throws Exception
		 * 
		 * @return string The URI
		 */
		public function generate($routeId, $params = array())
		{
			if (isset($this->routing[$routeId]) == false)
			{
				throw new Exception("Route `$routeId` doesn't exist.");
			}
			
			$structure = $this->getParamsStructure($routeId);
			
			$count = count($params);
			$realCouunt = count($structure);
			if ($count != $realCouunt)
			{
				throw new Exception("Parameter count on the Routing Pattern doesn't match the controller");
			}
			
			$uri = $this->routing[$routeId][0];			
			foreach ($params as $key => $value)
			{
				if (in_array($key, $structure) == false)
				{
					throw new Exception("Parameter `$key` doesn't exist on the controller");
				}
				$uri = str_replace('{' . $key . '}', $value, $uri);
			}
				
			$baseUri = dirname($_SERVER['SCRIPT_NAME']) . '/';
			
			return $baseUri . $uri;
		}
		
		/**
		 * Gets the URI off the Global variables.
		 * 
		 * @static
		 * 
		 * @return string
		 */
		public static function getUriFromGlobals()
		{
			return substr($_SERVER['REQUEST_URI'], strlen(dirname($_SERVER['SCRIPT_NAME'])) + 1);
		}
	}
?>