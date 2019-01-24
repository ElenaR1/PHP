
<html>
	<head>
	<meta charset="utf-8">
	<title>Request</title>
	</head>
	
	<body>
	
	<?php
	class request{
		public $arr;
		public function __construct($arrServer)
		{
			$this->arr=$arrServer;
		}
		public function getMethod()
		{
			return strtolower($this->arr['REQUEST_METHOD']);
		}
		public function getPath()
		{
			return $this->arr['SCRIPT_NAME'];
		}
		public function getURL()
		{
			return $this->arr['HTTP_REFERER'];
		}
		public function getUserAgent()
		{
			return $this->arr['HTTP_USER_AGENT'];
		}
	}
	
	
	class GetRequest extends request{
		
		public function getData($url)
		{			
			$url=$this->arr['HTTP_REFERER'];
			$parts=parse_url($url);
			parse_str($parts['query'], $query);
			return $query;			
		}
	}
	
	?>
	
	</body>


</html>
