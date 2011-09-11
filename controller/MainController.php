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
	 * Controller class used by the Router
	 * 
	 * @author Kristian Lewis Jones <klj613@kristianlewisjones.com>
	 */
	class MainController extends Controller
	{
		/**
		 * The method used by the 'home' routing
		 */
		public function home()
		{
			echo $this->get('phpRenderer')->render('home.html');
		}
		
		/**
		 * The method used by the 'profile' routing
		 * 
		 * @param string $userId
		 * @param string $user
		 */
		public function profile($userId, $user)
		{
			echo $this->get('phpRenderer')->render('profile.html', array('userId' => $userId, 'user' => $user));
		}
		
		/**
		 * The method used by the 'hello-world' routing
		 * 
		 * @param string $name
		 */
		public function helloworld($name)
		{
			echo $this->get('phpRenderer')->render('helloworld.html', array('name' => $name));
		}
		
		/**
		 * The method used by the 'hello-world' routing
		 * 
		 * @return string Rendered Template
		 */
		public function otherPages()
		{			
			$list = array();
			$list['home'] = $this->get('router')->generate('home');
			$list['hello-world'] = $this->get('router')->generate('hello-world', array('name' => 'foobar'));
			$list['profile'] = $this->get('router')->generate('profile', array('userId' => 232, 'user' => 'klj613'));
			
			$routeId = $this->get('router')->routeId;
			
			unset($list[$routeId]);

			return $this->get('phpRenderer')->render('otherpages.html', array('list' => $list));
		}
	}
?>
