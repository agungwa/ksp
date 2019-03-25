public function backup_database(){

// Try this, You can change format zip to gz if you like :)

$this->load->dbutil();

$prefs = array(     
    'format'      => 'zip',             
    'filename'    => data_app().date("Y-m-d-H-i-s").'.sql'
    );


$backup =& $this->dbutil->backup($prefs); 

$db_name = data_app(). date("Y-m-d-H-i-s") .'.zip';
$save = base_url().'assets/db/'.$db_name;

$this->load->helper('file');
write_file($save, $backup); 


$this->load->helper('download');
force_download($db_name, $backup);
	}
}