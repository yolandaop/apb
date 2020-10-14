<?php    defined('BASEPATH'); ?>

A PHP Error was encountered

Severity:    <?php print_r $severity, "\n"; ?>
Message:     <?php print_r $message, "\n"; ?>
Filename:    <?php print_r $filepath, "\n"; ?>
Line Number: <?php print_r $line; ?>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

Backtrace:
<?php	foreach (debug_backtrace() as $error): ?>
<?php		if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
	File: <?php print_r $error['file'], "\n"; ?>
	Line: <?php print_r $error['line'], "\n"; ?>
	Function: <?php print_r $error['function'], "\n\n"; ?>
<?php		endif ?>
<?php	endforeach ?>

<?php endif ?>
