<?php

class ObjectDB extends DBConfig {

    function resultSQL($sql) {
        try {
			if ($sql) {
				$qRes = $this->conn->query($sql);

				if ($qRes == false) {
					return false;
				}

				$rows = array();

				while ($row = $qRes->fetch_assoc()) {
					$rows[] = $row;
				}
				
				return $rows;
			} else {
				return false;
			}
		} catch (mysqli_sql_exception $e) {
			echo $e->getCode() . "." . $e->getMessage();
		}
    }

	function insertArray($tableName='', $dataField='') {
		if (empty($tableName) || empty($dataField)) {
			return false;
		} else {
			$cols = '(';
			$values = '(';

			foreach ($dataField as $key=>$value){
				$cols .= $key . ",";
				$values .= "'$value'" . ",";
			}
			$cols = rtrim($cols, ',').')';
			$values = rtrim($values, ',').')';
			$sql = "INSERT INTO $tableName $cols VALUES $values";
			
			$q = $this->conn->query($sql);
			
			return $q;
		}
	}

	function updateArray($tableName='', $dataField='', $condition='') {
		$sql = "UPDATE $tableName SET ";
		foreach ($dataField as $key=>$value) {
			$sql .= $key . "=". "'$value'" . ",";	
		}
		// echo $sql;
		$sql = rtrim($sql,",");
		$q = $this->conn->query($sql . " WHERE $condition");

		return $q;
		
	}

	function insertId() {
		$id = $this->conn->insert_id;
		echo $id;
		return $id;
	}

	function selectOneRow($sql) {
		if ($sql) {
			$q = $sql . " limit 1";
		
			$qRes = $this->conn->query($q);
			
			if ($qRes) {
			
				// $this -> row_count = mysql_num_rows($res);
				if (mysqli_num_rows($qRes)==0) {
					echo "error";
					return;
				} else {
					// while ($row = mysqli_fetch_array($qRes)) {
					// 	print_r($row);
					// }
					// $r = mysqli_fetch_array($sql);
					// return $r;
					$retVal = $qRes->fetch_assoc();
					return $retVal;
				}
				
			}
			else {
				
				echo "error 1";
			}
		}
		else {
			echo "error 2";
			return false;
		}
	}	
			
}

if ( !isset($DB) ) {
	$DB = new ObjectDB();
	
}

?>