<?php include('header.php'); ?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/pp_risk/static/css/default_view.css" />
<div class="default-wrapper">
	<h1>Welcome to Information Security Risk Heatmap!</h1>
	<div class="content">
		<p>To view the heatmaps, please click on the heatmaps links provided below.</p>
		<div class="heatmapList">
			<ul>
				<li><a href="<?php echo BASE_URL; ?>/pp_risk/heatmap/infosec"> InfoSec Heatmap </a></li>
				<li><a href="<?php echo BASE_URL; ?>/pp_risk/heatmap/technology"> Technology Heatmap </a></li>
				<li><a href="<?php echo BASE_URL; ?>/pp_risk/heatmap/adjacencies"> Adjacencies Heatmap </a></li>
			</ul>
		</div>
	</div>
	<?php include('footer.php'); ?>
</div>