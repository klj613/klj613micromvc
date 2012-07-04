<?php
    /**
     * This file is part of klj613's micro MVC framework made out of boredom.
     * 
     * (c) Kristian Lewis Jones <klj613@kristianlewisjones.com>
     * 
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */
    
    /**
     * Dependency Injection wrapper.
     * 
     * @author Kristian Lewis Jones <klj613@kristianlewisjones.com>
     */
    class DIFactory
    {
        /**
         * Used to get a new Router object.
         * 
         * @return Router
         */
        public static function getRouter()
        {
            $appKernal = appKernal::getInstance();
            
            $router = new Router($appKernal->config['routing']);
            return $router;
        }
        
        /**
         * Used to get a new PhpRenderer object.
         * 
         * @return PhpRenderer
         */
        public static function getPhpRenderer()
        {
            $appKernal = appKernal::getInstance();
            
            $phpRenderer = new PhpRenderer($appKernal->config['renderer'], $appKernal->serviceContainer);
            return $phpRenderer;
        }
        
        /**
         * Used to get a new ServiceContainer object.
         * 
         * @return ServiceContainer
         */
        public static function getServiceContainer()
        {
            $serviceContainer = new ServiceContainer;
            return $serviceContainer;
        }
        
        /**
         * Used to get several controller objects.
         * 
         * @return mixed The children of the Controller abstract class
         */
        public static function getController($class)
        {
            $appKernal = appKernal::getInstance();
            
            $controller = new $class($appKernal->serviceContainer);
            return $controller;
        }
        
        /**
         * Used to get a new Student Model object.
         * 
         * @return StudentModel
         */
        public static function getStudent()
        {
            $student = new Student;
            return $student;
        }
        
        /**
         * Used to get a new Lecturer Model object.
         * 
         * @return LecturerModel
         */
        public static function getLecturer()
        {
            $lecturer = new Lecturer;
            return $lecturer;
        }
    }
?>