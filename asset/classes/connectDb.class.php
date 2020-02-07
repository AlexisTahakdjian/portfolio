<?php

	class connectDb {
		
		private $host = 'localhost';
		private $db = 'portfolio';
		private $user = 'root';
		private $password = 'root';
		
		public function connect(){
			return new PDO('mysql:host='.$this->host.'; dbname='.$this->db.'; charset=utf8', $this->user, $this->password);
		}
		
	}

?>