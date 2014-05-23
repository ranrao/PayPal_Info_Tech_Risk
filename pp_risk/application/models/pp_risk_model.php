<?php

class PP_RISK_MODEL extends MsSql_Model {
	
	public function getPositionsForHeatmap($heatmapType)
	{
		$sqlQuery = 'SELECT * FROM ' . $heatmapType;
		$result = $this->query($sqlQuery);
		return $result;
	}

	public function getRiskDataForScoreCard($heatmapType, $riskType) {
		$sqlQuery = "SELECT * FROM $heatmapType where Enterprise_Risk_Name =  '$riskType'";
		$result = $this->execute($sqlQuery);

		if (mssql_num_rows($result) == 0) {
			echo "No rows found, nothing to print so am exiting";
			exit;
		}

		$row = mssql_fetch_assoc($result);
		return $row;	
	}

	public function getRiskInitiatives($riskType) {
		$sqlQuery = "SELECT * FROM Enterprise_Risk_Initiatives_View where Enterprise_Risk_Name =  '$riskType'";
		$result = $this->query($sqlQuery);
		return $result;	
	}

	public function getRiskIssuesInitiatives($riskType) {
		$sqlQuery = "SELECT * FROM Enterprise_Risk_Top_Issues_and_Initiatives where Enterprise_Risk =  '$riskType'";
		$result = $this->query($sqlQuery);
		return $result;	
	}

}

?>
