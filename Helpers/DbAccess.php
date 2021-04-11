<?php
// <!--
// 	Class Transformed TO PDO By Brahim AFASSy
// 	Simple PDO CRUD MANIPULATION to test my knowledge in PHP OOP and PDO and also revise.

//  -->
class MyPDO{

		static private ?PDO $pdo = null;
		static private $info = array(
			'last_query' => null,
			'num_rows' => null,
			'insert_id' => null
		);
		static private $connectionInfo = array();

		static private $where;
		static private $limit;
		static private $order;

		function __construct($host, $user, $pass, $db){
            $dsn = "mysql:host=".$host.";dbname=".$db;
			self::$connectionInfo = array('dsn' => $dsn, 'user' => $user, 'pass' => $pass);
		}

		function __destruct() {
			self::$pdo = null; // close connection if object destructed.
		}

		static private function set($field, $value){
			self::$info[$field] = $value;
		}


		public function lastQuery(){
			return self::$info['last_query'];
		}

		public function numRows(){
			return self::$info['num_rows'];
		}

		public function insertId(){
			return self::$info['insert_id'];
		}


		static public function connection(){
			if(empty(self::$pdo)){
                try{
                    self::$pdo= new PDO(self::$connectionInfo['dsn'], self::$connectionInfo['user'], self::$connectionInfo['pass'],array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
                    self::$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    // self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); default since 5.2
                }catch(Exception $e){
					throw $e;
                }
			}
			return self::$pdo;
		}


		static private function __where($info, $type = 'AND'){
			// $pdo =& self::connection();
			$where = self::$where;
			foreach($info as $row => $value){
				if(empty($where)){
					$where = sprintf("WHERE `%s`='%s'", $row, $value);
				}else{
					$where .= sprintf(" %s `%s`='%s'", $type, $row, $value);
				}
			}
			self::$where = $where;
		}

		public function where($field, $equal = null){
			if(is_array($field)){
				self::__where($field);
			} else {
				self::__where(array($field => $equal));
			}
			return $this;
		}

		public function and_where($field, $equal = null){
			return $this->where($field, $equal);
		}

		public function or_where($field, $equal = null){
			if(is_array($field)){
				self::__where($field, 'OR');
			}else{
				self::__where(array($field => $equal), 'OR');
			}
			return $this;
		}

		/**
		 * MySQL limit method
		 */

		public function limit($limit){
			self::$limit = 'LIMIT '.$limit;
			return $this;
		}


		public function orderBy($by, $orderType = 'DESC'){
			$order = self::$order;
			if(is_array($by)){
				foreach($by as $field => $type){
					if(is_int($field) && !preg_match('/(DESC|desc|ASC|asc)/', $type)){
						$field = $type;
						$type = $orderType;
					}
					if(empty($order)){
						$order = sprintf("ORDER BY `%s` %s", $field, $type);
					}else{
						$order .= sprintf(", `%s` %s", $field, $type);
					}
				}
			}else{
				if(empty($order)){
					$order = sprintf("ORDER BY `%s` %s", $by, $orderType);
				}else{
					$order .= sprintf(", `%s` %s", $by, $orderType);
				}
			}
			self::$order = $order;
			return $this;
		}

		static private function extra(){
			$extra = '';
			if(!empty(self::$where)) $extra .= ' '.self::$where;
			if(!empty(self::$order)) $extra .= ' '.self::$order;
			if(!empty(self::$limit)) $extra .= ' '.self::$limit;
			// cleanup
			self::$where = null;
			self::$order = null;
			self::$limit = null;
			return $extra;
		}


		public function get($table, $select = '*'){
			$pdo =& self::connection();
			if(is_array($select)){
				$cols = '';
				foreach($select as $col){
					$cols .= "`{$col}`,";
				}
				$select = substr($cols, 0, -1);
			}
			$sql = sprintf("SELECT %s FROM %s%s", $select, $table, self::extra());
			self::set('last_query', $sql);
            $stmt = $pdo->query($sql);
            // $stmt->setFetchMode(PDO::FETCH_ASSOC); default
            $data = $stmt->fetchAll();
            $numRows = count($data);
            self::set('num_rows', $numRows);
            if($numRows === 0) $data = false;
			return $data;
		}

		public function insert($table, $data){
			$pdo =& self::connection();
			$fields = '';
			$values = '';
			foreach($data as $col => $value){
				$fields .= sprintf("`%s`,", $col);
				$values .= sprintf(":%s,", $col);
			}

			$fields = substr($fields, 0, -1); // remove last ,
			$values = substr($values, 0, -1);
			$sql = sprintf("INSERT INTO %s (%s) VALUE (%s)", $table, $fields, $values);
            $stmt= self::$pdo->prepare($sql);
			self::set('last_query', $sql);
			if(!$stmt->execute($data)){
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error ');

			}else{
				self::set('insert_id', $pdo->lastInsertId());
				return true;
			}
		}

		public function update($table, $data){
			if(empty(self::$where)){
				throw new Exception("Where is not set. Can't update whole table.");
			}else{
				$pdo =& self::connection();

				$update = '';
				foreach($data as $col => $value){
					$update .= sprintf("`%s`=:%s, ", $col, $col);
				}
				$update = substr($update, 0, -2);
				$sql = sprintf("UPDATE %s SET %s%s", $table, $update, self::extra());
			 	self::set('last_query', $sql);
                $stmt= $pdo->prepare($sql);
				if(!$stmt->execute($data)){
					throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error ');
				}else{
					return true;
				}
			}
		}

		public function delete($table){
			if(empty(self::$where)){
				throw new Exception("Where is not set. Can't delete whole table.");
			}else{
				$pdo =& self::connection();
				$sql = sprintf("DELETE FROM %s%s", $table, self::extra());
				self::set('last_query', $sql);
                $stmt= $pdo->prepare($sql);
				if(!$stmt->execute()){
					throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysql_errno().': '.mysql_error());
				}else{
					return true;
				}
			}
		}
		public function query($qry){
			$pdo =& self::connection();
			self::set('last_query', $qry);
 			$stmt = $pdo->query($qry);
 		    $data = $stmt->fetchAll();
            $numRows = count($data);
            self::set('num_rows', $numRows);
            if($numRows === 0) $data = false;
			return $data;
		}

	}
