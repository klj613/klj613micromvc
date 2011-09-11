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
	 * Used to make object instances accessible from several places in the framework.
	 * 
	 * @author Kristian Lewis Jones <klj613@kristianlewisjones.com>
	 */
	class ServiceContainer
	{
		private $services;
		
		/**
		 * Used to set the services
		 * 
		 * @param array $services
		 */
		public function set($services) 
		{
			$this->services = $services;
		}
		
		/**
		 * Used to get a single service
		 * 
		 * @param string $service
		 * 
		 * @throws Exception
		 */
		public function get($service)
		{
			if (isset($this->services[$service]) == false)
			{
				throw new Exception("Service `$service` doesn't exist.");
			}
			return $this->services[$service];
		}
	}
?>