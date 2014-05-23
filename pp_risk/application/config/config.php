<?php 

$config['base_url'] = ''; // Base URL including trailing slash (e.g. http://localhost/)

$config['default_controller'] = 'main'; // Default controller to load
$config['error_controller'] = 'error'; // Controller used for errors (e.g. 404, 500 etc)

$config['db_host'] = 'phx-arcdb-001'; // Database host (e.g. localhost)
$config['db_name'] = 'Heatmap_Metrics'; // Database name
$config['db_username'] = 'Heatmap_User'; // Database username
$config['db_password'] = 'H3atmap_U$er'; // Database password


/*
$config['db_host'] = 'localhost'; // Database host (e.g. localhost)
$config['db_name'] = 'heatmap_metrics'; // Database name
$config['db_username'] = 'root'; // Database username
$config['db_password'] = ''; // Database password
*/


$riskCategoryMap = array(
	'Availability' => 'A',
	'Confidentiality (Breach)' => 'B',
	'Technical Resiliency Risk' => 'T',
	'Regulatory & Technical Compliance' => 'C',
	'Third Party' => '3',
	'CyberSecurity' => 'Y',
	'Integrity' => 'I',
	'Scalability' => 'S',
	'Performance' => 'P'
	);

$urlDbViewMap = array ( 
	'technology' => 'TechDash',
	'adjacencies' => 'Adjacencies',
	'infosec' => 'InfoSecDash',
	'availability' => 'Availability',
	'confidentiality_(breach)' => 'Confidentiality (Breach)',
	'technical_resiliency' => 'Technical Resiliency Risk',
	'technical_compliance' => 'Regulatory & Technical Compliance',
	'3rd_party' => 'Third Party',
	'cyber_security' => 'CyberSecurity',
	'integrity' => 'Integrity',
	'scalability' => 'Scalability',
	'performance' => 'Performance'	
	);

$adjacenciesBubbleLink = "https://pp-archer.corp.ebay.com/SearchContent/search.aspx?View=Report&reportID=10047&ModuleId=578";

include '/../plugins/heatmap_plugin.php';

?>