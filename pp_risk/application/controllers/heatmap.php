<?php

class Heatmap extends Controller {

	function index() {
		// Default View
		$template = $this->loadView('default_view');
		$template->render();
	}

	public function technology() {
		$this->displayHeatmap('technology');
	}

	public function adjacencies() {
		$this->displayHeatmap('adjacencies');
	}

	public function infoSec() {
		$this->displayHeatmap('infosec');
	}

	// Display all heatmaps.
	function displayHeatmap($heatmapType) {
		global $riskCategoryMap, $urlDbViewMap, $adjacenciesBubbleLink;

		$db = $this->loadModel('pp_risk_model');
		$result = $db->getPositionsForHeatmap($urlDbViewMap[$heatmapType]);
		$heatmapRiskAry = array();

		foreach ($result as $rowkey => $rowvalue) {		
			if($heatmapType != 'adjacencies') {
				$position = intval($rowvalue->Position);
				$heatmapRiskAry[$position][] = $riskCategoryMap[$rowvalue->Enterprise_Risk_Name];
			} else {
				$position = intval($rowvalue->Heat_Map_Position);
				$heatmapRiskAry[$position][] = 	intval($rowvalue->Heatmap_Adjacency_Number);
			}

		}

		$template = $this->loadView('heatmap_view');
		$template->set('riskCategoryMap', $riskCategoryMap);
		$template->set('urlDbViewMap', $urlDbViewMap);
		$template->set('adjacenciesBubbleLink', $adjacenciesBubbleLink);
		$template->set('heatmapRiskAry', $heatmapRiskAry);
		$template->set('heatmapType', $heatmapType);
		$template->render();
	}	

	/* Ajax call to display risk issues and initiatives. */
	public function getRiskInfo($riskBubble) {
		global $riskCategoryMap;

		$riskType = array_search(strtoupper($riskBubble), $riskCategoryMap);
		$db = $this->loadModel('pp_risk_model');
		$riskData = $db->getRiskIssuesInitiatives($riskType);
		echo json_encode($riskData);
	}
}
?>