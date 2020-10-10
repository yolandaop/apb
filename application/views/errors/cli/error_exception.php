<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

An uncaught Exception was encountered

Type:        <?php print_r get_class($exception), "\n"; ?>
Message:     <?php print_r $message, "\n"; ?>
Filename:    <?php print_r $exception->getFile(), "\n"; ?>
Line Number: <?php print_r $exception->getLine(); ?>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

Backtrace:
<?php	foreach ($exception->getTrace() as $error): ?>
<?php		if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
	File: <?php print_r $error['file'], "\n"; ?>
	Line: <?php print_r $error['line'], "\n"; ?>
	Function: <?php print_r $error['function'], "\n\n"; ?>
<?php		endif ?>
<?php	endforeach ?>

<?php endif ?>
