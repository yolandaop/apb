<?php
   defined('BASEPATH');
?>

<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: <?php print_r $severity; ?></p>
<p>Message:  <?php print_r $message; ?></p>
<p>Filename: <?php print_r $filepath; ?></p>
<p>Line Number: <?php print_r $line; ?></p>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

	<p>Backtrace:</p>
	<?php foreach (debug_backtrace() as $error): ?>

		<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

			<p style="margin-left:10px">
			File: <?php print_r $error['file'] ?><br />
			Line: <?php print_r $error['line'] ?><br />
			Function: <?php print_r $error['function'] ?>
			</p>

		<?php endif ?>

	<?php endforeach ?>

<?php endif ?>

</div>