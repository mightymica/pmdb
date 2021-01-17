<?php require_once('../private/initialize.php'); ?>

<?php $project_set = find_active_projects(); ?>

<!doctype html>

<html lang="en">
<head>
	<title>PMDB</title>
	<meta charset="utf-8">
	<link rel="stylesheet" media="all" href="stylesheets/general.css">
</head>

<body>
	<header>
		<h1>PMDB - Project New List</h1>
	</header>

<div id="content">
  <div class="projects listing">
    <h1>Projects</h1>

  	<table class="list">
  	  <tr>
        <th>ID</th> 
        <th>Client</th>
        <th>Project Name</th>
        <th>crmID</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	    <th>&nbsp;</th>
  	    <th>Fee Schedule</th>
        <th>Stage</th>
  	  </tr>

      <?php 
      while($project = mysqli_fetch_assoc($project_set)) {
        $client = find_client_by_id($project['clientID']);
        $feeSchedule = find_feeSchedule_by_id($project['feeScheduleID']);
        $stage = find_stage_by_id($project['stageID']); 
      ?>
        <tr>
          <td><?php echo h($project['id']); ?></td>
          <td><?php echo h($client['name']); ?></td>
          <td><?php echo h($project['name']); ?></td>
          <td><?php echo h($project['crmID']); ?></td>
          <td><a class="action" href="<?php echo h($project['crmURL']); 
          ?>">CRM</a></td>
          <td><a class="action" href="<?php echo h($project['repoURL']); 
          ?>">REPO</a></td>
          <td><a class="action" href="<?php echo h($project['sowURL']); 
          ?>">SOW</a></td>
          <td><a class="action" href="<?php echo h($project['loeURL']); 
          ?>">LOE</a></td>
          <td><a class="action" href="<?php echo h($project['psrURL']); 
          ?>">PSR</a></td>
          <td><a class="action" href="<?php echo h($project['mppURL']); 
          ?>">MPP</a></td>
          <td><a class="action" href="<?php echo h($project['kbbURL']); 
          ?>">KBB</a></td>
          <td><?php echo h($feeSchedule['type']); ?></td>
          <td><?php echo h($stage['stage']); ?></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php mysqli_free_result($page_set); ?>

  </div>

</div>


	<footer>
		&copy; <?php echo date('Y'); ?> Mica Project Management Database
	</footer>

</body>
</html>

<?php db_disconnect($db); ?>
