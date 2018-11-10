<?php
	class Request {
		protected $server;
		
		public function __construct($server) {
			$this->server = $server;
		}
		
		public function getMethod() {
			return $this->server['REQUEST_METHOD'];
		}
		
		public function getPath() {
			return explode('?', $this->server['REQUEST_URI'])[0];
		}
		
		public function getURL() {
			return $this->server['SERVER_NAME'] . $this->server['REQUEST_URI'];
		}
		
		public function getUserAgent() {
			return $this->server['HTTP_USER_AGENT'];
		}
	};
	
	class GetRequest extends Request {
		public function __construct($server) {
			parent::__construct($server);
		}
		
		public function getData(){
			$data = array();
			$query_string = $this->server['QUERY_STRING'];
			if ($query_string === '') {
				return $data;
			}
			$query_params = explode('&', $query_string);
			foreach($query_params as $query_param) {
				$param = explode('=', $query_param);
				$data[$param[0]] = $param[1];
			}
			return $data;
		}
	};
	
	$r = new GetRequest($_SERVER);
	echo "<h1>" . $r->getMethod() . "</h1>";
	echo "<h1>" . $r->getPath() . "</h1>";
	echo "<h1>" . $r->getURL() . "</h1>";
	echo "<h1>" . $r->getUserAgent() . "</h1>";
	foreach($r->getData() as $key => $value) {
		echo "<h1>" . $key . " =&gt " . $value . "</h1>";
	}
?>





<!DOCTYPE html>
<html>
	<head>
		<title>Electives</title>
	</head>
	<body>
		<?php
				$data = [
				'webgl' => [
					'title' => 'Компютърна графика с WebGL',
					'description' => '...',
					'lecturer' => 'доц. П. Бойчев',
				],
				'go' => [
					'title' => 'Програмиране с Go',
					'description' => '...',
					'lecturer' => 'Николай Бачийски',
				]
				];
			
				function showPage($data, $pageId)
				{
					if(!$pageId)
					{
						return "Изберете дисциплина от менюто!";
					}
					$cource = $data[$pageId];
					$output = "<h1>{$cource['title']}</h1>";
					return $output;
				}
				function showNav($data, $pageId)
				{
					$output = "<nav>";
					foreach($data as $electiveId => $elective)
					{
						$url = "?page_id = $electiveId";
						$description = $elective['title'];
						$output .= "<a href = \"$url\">$description</a>";
					}
					$output .= "<nav>";
					return $output;
				}
				if(array_key_exists('page_id', $_GET))
				{
					$pageId = $_GET['page_id'];
				}
				echo showPage($data, $pageId);
				echo showNav($data, $pageId);
		?>
	</body>
</html>


Get,Post,Delete

get->izprati zaqvka kym syrvyra bez da promen systoqnieto
post->

UserAgent --> browser with which we are opened the link

https://bit.ly/20Bpg1X ?foo=bar&baz=42

ako e http ne e kriptirana i s get zaqvka mogat da ni go slushat

ako ne e https ne e sigurno, ne e kriptirano

isset

return isset($this->server['REQUEST_METHOD']) ? $this->server['REQUEST_METHOD'] : "";

ako e definirana q vyrni ako ne prazen string!! 

nov red     echo "<br/>";

parse_str !!! 
