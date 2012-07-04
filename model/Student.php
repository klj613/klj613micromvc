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
     * Student Model.
     * 
     * @author Kristian Lewis Jones <klj613@kristianlewisjones.com>
     */
    class StudentModel
    {
        private $studentId;
        private $forename;
        private $surname;
        
        /**
         * Used to set the student ID.
         * 
         * @param integer $studentId
         * 
         * @return $this
         */
        public function setStudentId($studentId)
        {
            $this->studentId = $studentId;
            return $this;
        }
        
        /**
         * Used to set the forename.
         * 
         * @param integer $forename
         * 
         * @return $this
         */
        public function setForename($forename)
        {
            $this->forename = $forename;
            return $this;
        }
        
        /**
         * Used to set the surname.
         * 
         * @param integer $surname
         * 
         * @return $this
         */
        public function setSurname($surname)
        {
            $this->surname = $surname;
            return $this;
        }
        
        /**
         * Used to get the student ID.
         * 
         * @return integer
         */
        public function getStudentId()
        {
            return $this->studentId;
        }
        
        /**
         * Used to get the forename.
         * 
         * @return string
         */
        public function getForename()
        {
            return $this->forename;
        }
        
        /**
         * Used to get the surname ID.
         * 
         * @return surname
         */
        public function getSurname()
        {
            return $this->surname();
        }
    }
?>