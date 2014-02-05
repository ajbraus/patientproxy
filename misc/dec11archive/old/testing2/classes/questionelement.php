<?php

class QuestionElement {

	private $idName = null;
	private $labelText = null;
	private $elementType = null;
	private $fieldType = null;
	private $subElements = array();
	private $helpText = null;
	private $isInputField = null;
	private $fieldLength = null;
	private $pageTitle = null;
	private $numElements = null;
	
	public function __construct ( $data = array() ) {
		if ( !empty ( $data['idName'] ) ) {
			$this->idName = $data['idName'];
		}
		if ( !empty ( $data['labelText'] ) ) {
			$this->labelText = $data['labelText'];
		}
		if ( !empty ( $data['elementType'] ) ) {
			$this->elementType = $data['elementType'];
		}
		if ( !empty ( $data['fieldType'] ) ) {
			$this->fieldType = $data['fieldType'];
		}
		if ( !empty ( $data['subElements'] ) ) {
			$this->subElements = $data['subElements'];
			$this->numElements = count ( $this->subElements );
		}
		if ( !empty ( $data['isInputField'] ) ) {
			$this->isInputField = $data['isInputField'];
		}
		if ( !empty ( $data['fieldLength'] ) ) {
			$this->fieldLength = $data['fieldLength'];
		}
		if ( !empty ( $data['pageTitle'] ) ) {
			$this->pageTitle = $data['pageTitle'];
		}
		if ( !empty ( $data['helpText'] ) ) {
			$this->helpText = $data['helpText'];
		}
	}
	
	public function __set ( $property, $value ) {
		if ( array_key_exists ( $property, get_object_vars ( $this ) ) ) {
			$this->{$property} = $value;
		} 
		/*else {
			if ( array_key_exists ( $property, $this->subElements ) ) {
				$this->subElements[$property] = $value;
				$this->numElements = count ( $this->subElements );
			} 
			else {
			}
		}*/
	}
	
	public function __get ( $property ) {
		if ( array_key_exists ( $property, get_object_vars ( $this ) ) ) {
			return $this->{$property};
		} 
		/*else {
			if ( array_key_exists ( $property, $this->subElements ) ) {
				return $this->subElements[$property];
			} 
			else if ( array_key_exists ( $property, $this->miscData ) ) {
				return $this->miscData[$property];
			}
			else {
				return null;
			}
		}*/
	}
	
	function getByIdName ( $idName ) {
		if ( $idName == $this->idName ) {
			return $this;
		}
	}
	
	
	function iterateSubElements() {
		echo '<pre>';
		if ( !empty ( $this->subElements ) ) {
			foreach($this->subElements as $elem) {
				print_r ( $elem );
			}
		}
		echo '</pre>';
    }
}