
<?php include('header.php'); ?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/pp_risk/static/css/scorecard_view.css" />

<div class="scorecard-wrapper">
	<section id="mainSection">
		<div id="generalBox">
			<input type="hidden" name="mainLink" class="archerLink" value="<?php echo $riskData['Main_link']; ?>">
			<header id="title">
				<h1> PP <?php echo ucwords($heatmapType) . ' > <span id="riskName">' . ucwords($riskData['Enterprise_Risk_Name']) . '</span>'; ?></h1>
			</header>
			<div id="intro">
				<?php echo trim($riskData['description']); ?>
			</div>
			<div id="owner">
				<p><span> Exec Owner ></span> <?php echo $riskData['exec_owner']; ?><span>Scorecard Owner ></span> <?php echo $riskData['scorecard_owner']; ?><span>Updated ></span> <?php echo $riskData['Date_of_Current_Assessment__HM_Format']; ?></p>
			</div>
		</div>
		<div id="desc">
			<div class="inDesc">
				<h3> Summary </h3>
				<?php echo $riskData['summary_to_date']; ?>
			</div>
			<div class="inDesc">
				<h3>Key Accomplishments</h3>
				<?php echo $riskData['Key_Accomplishments']; ?>
			</div>
			<div class="inDesc">
				<h3>Mitigation Challenges</h3>
				<?php echo $riskData['mitigation_challenges']; ?>
			</div>
		</div>
	</section>
	<aside id="rightSection">
		<div id="riskRatingBox">			
			<table class="dataTable">
				<caption>Risk Ratings</caption>
				<tbody>
					<tr>
						<td>Inherent Risk</td>
						<?php 
						$statusCode = explode(" - ", $riskData['inherent_risk_display']); 
						echo '<td class="riskRatingCode-' . $statusCode[0] . '">' . strtoupper($statusCode[1]) . '</td>';
						?>
					</tr>
					<tr id="controlLinkBox">
						<input type="hidden" name="controlLink" class="archerLink" value="<?php echo $riskData['Control_Link']; ?>">
						<td>Control Environment</td>
						<?php						
						$statusCode = explode(" - ", $riskData['control_environment_display']); 
						echo '<td class="riskRatingCode-' . $statusCode[0] . '">' . strtoupper($statusCode[1]) . '</td>';
						?>
					</tr>
					<tr>
						<td id="currentResidualRiskRating">Current Residual Risk</td>
						<?php
						$statusCode = explode(" - ", $riskData['current_residual_risk_display']); 
						echo '<td class="resRatingCode-' . $statusCode[0] . '">' . strtoupper($statusCode[1]) . '</td>';
						?>
					</tr>
					<tr>
						<td>Last Yr Residual Risk</td>
						<?php
						$statusCode = explode(" - ", $riskData['last_yr_residual_risk_display']); 
						echo '<td class="riskRatingCode-' . $statusCode[0] . '">' . strtoupper($statusCode[1]) . '</td>';
						?>
					</tr>
					<tr>
						<td>Target Residual Risk & Date</td>						
						<td class="<?php echo 'resRatingCode-' . $riskData['desired_enterprise_risk_rating']; ?>" ><?php echo $riskData['Target_Residual_Risk_Due_Date_HM_Format']; ?></td>
					</tr> 
					<tr>
						<td>Mitigation Status</td>
						<td class="<?php echo strtolower(str_replace(" ", "", $riskData['overall_mitigation_status_display'])); ?>" ><?php echo strtoupper($riskData['overall_mitigation_status_display']); ?></td>
					</tr>
					<tr>
						<td>Influencing Pressure</td>
						<td class="<?php echo 'ipcode-' . strtolower($riskData['overall_pressure_internally_externally_display']); ?>" ><?php echo strtoupper($riskData['overall_pressure_internally_externally_display']); ?></td>
					</tr>
					<tr>
						<td colspan="2" id="confidenceLevel">
							Scorecard Content Confidence Level = <?php echo intval($riskData['Confidence_Level']); ?>%
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div id="influencingFactors">
			<h3> Influencing Factors </h3>
			<?php echo $riskData['influencing_factors']; ?>			
		</div>
	</aside>
	<section id="bottomSection">
		<div id="keyInitiatives">
			<input type="hidden" name="initiativeLink" class="archerLink" value="<?php echo $riskData['Initiative_link']; ?>">				
			<h3> Key Initiatives - Mitigation/Remediation Status and Plans </h3>	
			<table>
				<tbody> 
					<?php foreach ($keyInitiatives as $rowkey => $rowvalue) {
						$initiativeStatus = strtoupper($rowvalue->Overall_Status);
						echo "<tr><td class='" . strtolower(str_replace(" ", "", $initiativeStatus)) . "'> $initiativeStatus </td> <td>$rowvalue->Initiative_Name </td></tr>";
					}
					?>
				</tbody>
			</table>
		</div>
		<div id="bottomContent">
			<div id="riskStatementBox">
				<h3>Risk Statement </h3>
				<?php $riskTolData = str_ireplace("Risk Tolerance", "<span class='riskSubTitle'> Risk Tolerance </span>", $riskData['risk_tolerance_statement_1']); echo $riskTolData; ?>
				<br />
				<?php $riskAppData = str_ireplace("Risk Appetite", "<span class='riskSubTitle'> Risk Appetite </span>", $riskData['risk_tolerance_statement_2']); echo $riskAppData; ?>
			</div>
			<div id="riskGraph"><img src="/pp_risk/static/images/graphs/<?php echo strtolower($riskCategoryMap[$riskData['Enterprise_Risk_Name']]); ?>_graph.jpg" alt="Sample Graph"> 
			</div>
			<div id="metricsBox">
				<input type="hidden" name="metricLink" class="archerLink" value="<?php echo $riskData['Metric_Link']; ?>">
				<table class="dataTable metricsTbl">
					<caption>Metrics</caption>
					<tbody>
						<tr>
							<td>KRPI Name</td>
							<td><?php echo $riskData['krpi_name']; ?></td>
						</tr>
						<tr>
							<td>Key Metric Current</td>
							<td><?php echo $riskData['key_metric_current']; ?></td>
						</tr>
						<tr>
							<td>Key Metric Goal</td>
							<td><?php echo $riskData['key_metric_goal']; ?></td>
						</tr>
						<tr>
							<td>Progress to Goal</td>
							<td><?php echo $riskData['progress_to_goal_display']; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div style="clear:both;"></div>
	</section>
	<?php include('footer.php'); ?>
	<script src="<?php echo BASE_URL; ?>/pp_risk/static/js/archer_record_link.js"></script>

</div>
