<?php

	class Request {
		
		private $data;
		
		public function __construct($data) {
			$this->data = $data;
		}

		public function getMethod() {
			return strtolower($this->data['REQUEST_METHOD']);
		}
		
		public function getPath() {
			return $this->data['REQUEST_URI'];
		}
		
		public function getURL() {
			return 'http://'.$this->data['HTTP_HOST'].$this->data['REQUEST_URI'];
		}
		
		public function getUserAgent() {
			return $this->data['HTTP_USER_AGENT'];
		}
	}
	
	class GetRequest extends Request {
		
		public function __construct() {
		}
		
		public function getData($query) {
			$elements = explode("&", $query);
			$array = array();
			for($i = 0; $i < count($elements); $i++) {
				$el = explode("=", $elements[$i]);
				$array[$el[0]] = $el[1];
			}
			return $array;
		}
	}
	
#----------------demo-----------------

$request = new Request($_SERVER);
echo $request->getMethod().'<br>';
echo $request->getPath().'<br>';
echo $request->getURL().'<br>';
echo $request->getUserAgent().'<br>';


$get_request = new GetRequest();
$arr = $get_request->getData("а=1&b=2");
echo '<br>';
print_r($arr);

?>