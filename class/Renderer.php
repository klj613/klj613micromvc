<?php
    /**
     * This file is part of klj613's micro MVC framework made out of boredom.
     * 
     * (c) Kristian Lewis Jones <klj613@kristianlewisjones.com>
     * 
     * For the full copyight and license information, please view the LICENSE
     * file that was distributed with this source code.
     */
    
    /**
     * Base class of the Renderer Tools.
     * 
     * @author Kristian Lewis Jones <klj613@kristianlewisjones.com>
     */
    abstract class Renderer
    {
        private $serviceContainer;
        protected $config;
        
        /**
         * Constructor.
         * 
         * @param ServiceContainer $serviceContainer This is used for controller's 
         * to get services such as Routing, Renderer etc.
         * @param array $config
         */
        public function __construct($config, $serviceContainer)
        {
            $this->config = $config;
            $this->serviceContainer = $serviceContainer;        
        }
        
        /**
         * Used as a proxy between Controller's and the ServiceContainer.
         * 
         * @param $service The requested service.
         * 
         * @return Mixed The object of a service. 
         */
        protected function get($service)
        {
            return $this->serviceContainer->get($service);
        }
    }
?>
        