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
	 * Lecturer Model
	 * 
	 * @author Kristian Lewis Jones <klj613@kristianlewisjones.com>
	 */
	class LecturerModel
	{
		private $employeeId;
		private $forename;
		private $surname;
		
		/**
		 * Used to set the employee ID
		 * 
		 * @param integer $employeeId
		 * 
		 * @return $this
		 */
		public function setEmployeeId($employeeId)
		{
			$this->employeeId = $employeeId;
			return $this;
		}
		
		/**
		 * Used to set the forename
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
		 * Used to set the surname
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
		 * Used to get the employee ID
		 * 
		 * @return integer
		 */
		public function getEmployeeId()
		{
			return $this->employeeId;
		}
		
		/**
		 * Used to get the forename
		 * 
		 * @return string
		 */
		public function getForename()
		{
			return $this->forename;
		}
		
		/**
		 * Used to get the surname ID
		 * 
		 * @return surname
		 */
		public function getSurname()
		{
			return $this->surname();
		}
	}
?>