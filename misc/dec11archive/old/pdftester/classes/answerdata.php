<?php

class AnswerData {
	
	public $dataID = null;
	public $rawValue = null;
	public $rvTimestamp = null;
	public $required = null;
	public $validationKind = null;
	public $validated = null;
	public $cleanValueA = null;
	public $cvaTimestamp = null;
	public $cleanValueB = null;
	public $cvbTimestamp = null;
	public $finalValue = null;
	public $formattingKind = null;
	public $formattedFinal = null;

	public function __construct ( $data = array() ) {
		if ( !empty ( $data['dataID'] ) ) {
			$this->dataID = $data['dataID'];
		}
		if ( !empty ( $data['rawValue'] ) ) {
			$this->rawValue = $data['rawValue'];
		}
		if ( !empty ( $data['rvTimestamp'] ) ) {
			$this->rvTimestamp = $data['rvTimestamp'];
		}
		if ( !empty ( $data['required'] ) ) {
			$this->required = $data['required'];
		}	
		if ( !empty ( $data['validationKind'] ) ) {
			$this->validationKind = $data['validationKind'];
		}
		if ( !empty ( $data['validated'] ) ) {
			$this->validated = $data['validated'];
		}
		if ( !empty ( $data['cleanValueA'] ) ) {
			$this->cleanValueA = $data['cleanValueA'];
		}	
		if ( !empty ( $data['cvaTimestamp'] ) ) {
			$this->cvaTimestamp = $data['cvaTimestamp'];
		}
		if ( !empty ( $data['cleanValueB'] ) ) {
			$this->cleanValueB = $data['cleanValueB'];
		}
		if ( !empty ( $data['cvbTimestamp'] ) ) {
			$this->cvbTimestamp = $data['cvbTimestamp'];
		}
		if ( !empty ( $data['finalValue'] ) ) {
			$this->finalValue = $data['finalValue'];
		}
		if ( !empty ( $data['formattingKind'] ) ) {
			$this->formattingKind = $data['formattingKind'];
		}
		if ( !empty ( $data['formattedFinal'] ) ) {
			$this->formattedFinal = $data['formattedFinal'];
		}
	}
	
	public function __set ( $property, $value ) {
		if ( array_key_exists ( $property, get_object_vars ( $this ) ) ) {
			$this->{$property} = $value;
		} 
	}
	
	public function __get ( $property ) {
		if ( array_key_exists ( $property, get_object_vars ( $this ) ) ) {
			return $this->{$property};
		} 
	}
	
}
























/*class QuestionPage extends BasicElement {

	public $pageTitleText = null;
	public $helpText = null;
	
	public function __construct ( $data = array () ) {
		parent::__construct ( $data );
		if ( !empty ( $data['pageTitleText'] ) ) {
			$this->pageTitleText = $data['pageTitleText'];
		}
		if ( !empty ( $data['helpText'] ) ) {
			$this->helpText = $data['helpText'];
		}
	}
	
	public function __set ( $property, $value ) {
		parent::__set ( $property, $value );
	}
	
	public function __get ( $property ) {
		parent::__get ( $property );
	}

}*/

?>