<?php
/**
 * Created by PhpStorm.
 * User: andriusbutkys
 * Date: 07/11/2018
 * Time: 19:54
 */

class DatabaseObject {
	
	static protected $database;
	static protected $table_name = '';
	static protected $columns = [];
	public $errors = [];
	
	
	// ----- set_database -----
	static public function set_database($database){
		self::$database = $database;
	}
	//----- find_by_sql -----
	static public function find_by_sql($sql){
		$result = self::$database->query($sql);
		if (!$result){
			exit("Database query failed");
		}
		//convert into objects
		$object_array = [];
		while($record = $result->fetch_assoc()){
			$object_array[] = static::instantiate($record);
		}
		$result->free();
		return $object_array;
	}
	//----- instantiate -----
	static public function instantiate($record){
		$object = new static;
		foreach ($record as $property => $value){
			if (property_exists($object, $property)){
				$object->$property = $value;
			}
		}
		return $object;
	}
	//----- instantiate -----
	protected function validate(){
		$this->errors = [];
		//add custom vlidation
		return $this->errors;
	}
	//----- find_all -----
	static public function find_all(){
		$sql = "SELECT * FROM " . static::$table_name;
		return static::find_by_sql($sql);
	}
	//----- find_by_id -----
	static public function find_by_id($id){
		$sql = "SELECT * FROM " . static::$table_name . " ";
		$sql .= "WHERE id='". self::$database->escape_string($id) . "'";
		$obj_array = static::find_by_sql($sql);
		if (!empty($obj_array)){
			return array_shift($obj_array);
		}else{
			return FALSE;
		}
	}
	
	
	//----- CRUD -----
	//----- create -----
	protected function create(){
		$this->validate();
		if (!empty($this->errors)){return false;};
		$attributes = $this->sanitized_attributes();
		$sql = "INSERT INTO " . static::$table_name . " (";
		$sql .= join(', ', array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		$result = self::$database->query($sql);
//		var_dump($result);
		if ($result){
			$this->id = self::$database->insert_id;
		}
		return $result;
	}
	//----- update -----
	protected function update(){
		$this->validate();
		if (!empty($this->errors)){return false;}
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = [];
		foreach ($attributes as $key =>$value){
			$attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE " . static::$table_name . " SET ";
		$sql .= join(', ', $attribute_pairs);
		$sql .= " WHERE id='".self::$database->escape_string($this->id)."' ";
		$sql .= "LIMIT 1";
		$result = self::$database->query($sql);
		return $result;
	}
	//----- save -----
	public function save(){
		//new record have not id
		if (isset($this->id)){
			return $this->update();
		}else{
			return $this->create();
		}
	}
	//----- merge_attributes -----
	public function merge_attributes($args=[]){
		foreach ($args as $key => $value){
			if (property_exists($this, $key) && !is_null($value)){
				$this->$key = $value;
			}
		}
	}
	//----- attributes -----
	public function attributes(){
		$attributes = [];
		foreach (static::$db_columns as $column){
			if ($column == 'id'){continue;}
			$attributes[$column] = $this->$column;
		}
		return $attributes;
	}
	//----- sanitized attributes -----
	protected function sanitized_attributes(){
		$sanitized = [];
		foreach ($this->attributes() as $key => $value){
			$sanitized[$key] = self::$database->escape_string($value);
		}
		return $sanitized;
	}
	//----- delete.php -----
	public function delete(){
		$sql = "DELETE FROM " . static::$table_name . " ";
		$sql.= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
		$sql.= "LIMIT 1";
		$result = self::$database->query($sql);
		return $result;
	}
	//----- count_all -----
	static public function count_all(){
		$sql = "SELECT COUNT(*) FROM " .static::$table_name;
		$result_set = self::$database->query($sql);
		$row = $result_set->fetch_assoc();
		return array_shift($row);
	}
	


	
	
}