<?php
class ScoreCard extends Controller {
	
	function index() {
		// Default View
		$template = $this->loadView('default_view');
		$template->render();
	}

	public function infosec($riskType) {
		$this->displayScoreCard('infosec', $riskType);
	}

	public function technology($riskType) {
		$this->displayScoreCard('technology', $riskType);
	}

	function displayScoreCard($heatmapType, $riskType){
		global $riskCategoryMap, $urlDbViewMap;

		if (!isset($riskType)) {
			// Default View
			$template = $this->loadView('default_view');
			$template->render();
			return;
		}

		// Load a model
		$db= $this->loadModel('pp_risk_model');
		$template = $this->loadView('scorecard_view');

		$riskData = $db->getRiskDataForScoreCard($urlDbViewMap[strtolower($heatmapType)], $urlDbViewMap[strtolower($riskType)]);
		foreach ($riskData as $key => $val) {
			// Remove style attributes
			$val = preg_replace('/[\s]*style=\"[^\"]*\"/', '', $val);
			// Remove font attributes
			//$val = preg_replace('/<font[^>]*>/', ' ', $val);
			// Remove Empty paragraphs
			$val = trim(preg_replace('/<p[^>]*>[\s|&nbsp;]+<\/p>/', '', $val));
			// Remove special characters
			$val = str_replace(chr(194), "", $val);
			$val = preg_replace('/[\x80-\xBF]+/S', '', $val );

			$riskData[$key] = $val; 
		}

		$keyInitiatives = $db->getRiskInitiatives($urlDbViewMap[strtolower($riskType)]);
		$template->set('keyInitiatives', $keyInitiatives);
		$template->set('heatmapType', $heatmapType);
		$template->set('riskCategoryMap', $riskCategoryMap);
		$template->set('riskData', $riskData);
		$template->render();
	}
}
?>