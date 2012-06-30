<?php
/**
 * Ticket
 * 
 * A bug/issue ticket
 *
 * PHP version 5
 *	
 * @package    Package
 * @author     Cam Findlay <cam@camfindlay.com>
 * @copyright  2012 Cam Findlay Consulting
 * @version    SVN: $Id$      
 * @uses	   Class
 */

	 
class Ticket extends DataObject {
	
	//database
	public static $db = array(
					'Title'=>'Varchar(255)',
					'Content'=>'HTMLText',
					'Priority'=>"Enum('Blocker,Critical,Medium,Minor,Meh')",
					'Severity'=>"Enum('High Effort/Impact,Medium Effort/Impact,LowEffort Impact')",
					'Status'=>"Enum('Open, Fixed, Duplicate, Works For Me, On Hold, Cannot Fix, Cannot Replicate')"
					);
	public static $has_one = array(
					'ReportedBy'=>'Member',
					'OwnedBy'=>'Member',
					'Component'=>'Component',
					'Version'=>'Version'	
					);
	public static $has_many = array(
					'Attachments'=>'File'
					);
	public static $many_many = array(
					'Keywords' => 'Tag'
					); 
		
	public static $searchable_fields = array('TicketNum','Title');
	public static $casting = array('TicketNum'=>'Int');
	public static $field_labels = array('TicketNum'=>'Ticket#','Title'=>'Summary','Content'=>'Description');
	public static $summary_fields = array('TicketNum','Title'); //note no => for relational fields
	public static $singular_name = "Ticket";
	public static $plural_name = "Tickets";


	//CRUD settings
	public function canCreate($member = null) {return true;}
	public function canView($member = null) {return true;}
	public function canEdit($member = null) {return true;}
	public function canDelete($member = null) {return true;}


/**
 * Object Methods - lowerCamelCase
 */

	//CMS Fields
	function getCMSFields(){	
		$fields = parent::GetCMSFields();
		return $fields;
		}
		
	//Get scaffolded fields from frontend forms	
	public function getFrontendFields() {
		$fields = $this->scaffoldFormFields();
		return $fields;
	}
	
	
	//Hooks
	function onBeforeWrite(){
		parent:: onBeforeWrite();
		}

	function onAfterWrite(){
		parent::onAfterWrite();
		}
		
	function onBeforeDelete(){
		parent:: onBeforeDelete();
		}

	function onAfterDelete(){
		parent::onAfterDelete();
		}

/**
 * Template Methods - UpperCamelCase
 */
	
 		public function getTicketNum(){
	 		return $this->ID;
	 		
 		}
	
}