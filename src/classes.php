<?php

	// file definition
	class File{
		public function __construct($name, $content){
			$this->name = $name;
			$this->content = $content;
		}
	} // end file class definition

	//project definition
	class Project{
		public function __construct($projName){
			$this->name = $projName;
		}

		public $files = array();
		
		public function addFile($fileName, $fileContent){
			$this->files[] = new File($fileName, $fileContent);
		}
	} // end project class definition
?>