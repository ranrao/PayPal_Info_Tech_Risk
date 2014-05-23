<!-- HeatMap Table Views -->

<?php include('header.php');
if ($heatmapType == 'adjacencies') {
	echo '<script src="' . BASE_URL . '/pp_risk/static/js/archer_link_timeout.js"></script>';
}
?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/pp_risk/static/css/heatmap_view.css" />
<div class="wrapper <?php echo 'heatmap' . ucwords($heatmapType) . 'Risk'; ?>">
	<table class="heatmapTable">
		<tbody>
			<?php
			$heatmapTablePosAry = array(array(8, 12, 15, 16), array(4, 9, 13, 14), array(2, 5, 10, 11), array(1, 3, 6, 7));

			foreach($heatmapTablePosAry as $heatmapRowPosAry) {
				echo '<tr>'; 
				//$heatmapPosAry = array(9, 10, 9, 16);
				foreach ($heatmapRowPosAry as $pos) {
					echo '<td class="heatmapCell">';
					if (array_key_exists($pos, $heatmapRiskAry)) {
						$riskAry = $heatmapRiskAry[$pos];
						$riskAryLength = count($riskAry); 
						$bubbleTablePosAry = array (7, 4, 6, 5, 1, 3, 2, 8);
						echo '<table class="bubbleTable"><tbody><tr>';
						for($i = 0; $i < count($bubbleTablePosAry); $i++) {
							$bubblePos = $bubbleTablePosAry[$i];
							$bubbleLink = '';
							$riskBubbleType = "";
							if ($riskAryLength >= $bubblePos) {
								$riskBubbleType = "riskBubble-" . $riskAry[$bubblePos - 1];
								
								if ($heatmapType != 'adjacencies') {
									$riskName = array_Search(array_search($riskAry[$bubblePos - 1], $riskCategoryMap), $urlDbViewMap);
									$bubbleLink = '<a href="../scorecard/' . $heatmapType . '/' . $riskName . '" target="blank">a</a>';
								} else {
									$bubbleLink = '<a href="' . $adjacenciesBubbleLink . '" target="blank">a</a>';
								}							
							}
							if ($i == 0) {
								echo '<td rowspan="2" class="'. $riskBubbleType . ' bubble-7">' . $bubbleLink . '</td>';
							} elseif($i == 7) {
								echo '<td rowspan="2" class="'. $riskBubbleType . ' bubble-8">' . $bubbleLink . '</td>';	
							} else {
								echo '<td class="' . $riskBubbleType . '">'. $bubbleLink.'</td>';	
							}

							if ($i == 3) {
								echo '<td rowspan="2" class=""></td>';
								echo '</tr><tr>';
							}						
						}
						echo '</tr></tbody></table>';
					}
					echo '</td>';
				}			
				echo '</tr>';
			}
			?>			
		</tbody>
	</table>
	<div class="riskInfo">
	</div>
</div>
<script src="<?php echo BASE_URL; ?>/pp_risk/static/js/heatmap_view.js"></script>
<?php include('footer.php'); ?>