<?php defined('_JEXEC') or die;

// Remove generator tag
$this->setGenerator(null);

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template if applicable
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

// Kijk of er modules zijn in de linker- of rechter sidebar
$left     = ($this->countmodules('position-7') or $this->countmodules('position-8') or $this->countmodules('position-9'));
$right    = ($this->countmodules('position-10') or $this->countmodules('position-11') or $this->countmodules('position-12'));

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<jdoc:include type="head" />
		<?php
			// Add JavaScript Frameworks
			JHtml::_('bootstrap.framework');
			// Add Stylesheets
			// Not needed since we load it in the template less files
			// JHtmlBootstrap::loadCss();

			// Load optional rtl Bootstrap css and Bootstrap bugfixes
			// JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction);

			// Adjusting content width
			if ($left && $right) {
				$span = "span6";
			}
			elseif ($left && !$right) {
				$span = "span9";
			}
			elseif (!$left && $right) {
				$span = "span9";
			}
			else {
				$span = "span12";
			}
		?>
		<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/custom.css" rel="stylesheet" type="text/css" />
		<!--[if lt IE 9]>
			<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
		<![endif]-->
	</head>
	
	<body id="page" class="<?php echo $option
		. ' view-' . $view
		. ($layout ? ' layout-' . $layout : ' no-layout')
		. ($task ? ' task-' . $task : ' no-task')
		. ($itemid ? ' itemid-' . $itemid : '');
		?>">
		
		<!-- Begin Header-->
		<header class="header" role="banner">
			<div class="container">
				<div class="header-inner">
					<?php if ($this->countModules('position-0')): ?>
					<div class="row pos-0">
						<jdoc:include type="modules" name="position-0" style="html5" />
					</div>
					<?php endif; ?>
					
					<?php if ($this->countModules('position-1') or $this->countModules('position-2')): ?>
					<div class="row pos1-2">
						<jdoc:include type="modules" name="position-1" style="html5" />
						<jdoc:include type="modules" name="position-2" style="html5" />
					</div>
					<?php endif; ?>
					
					<?php if ($this->countModules('position-3')): ?>
					<div class="row pos-3">
							<jdoc:include type="modules" name="position-3" style="navResponsive" />
					</div>		
					<?php endif; ?>
					
					<?php if ($this->countModules('position-4')): ?>
					<div class="row pos-4">
						<jdoc:include type="modules" name="position-4" style="html5" />
					</div>
					<?php endif; ?>
					
					<?php if ($this->countModules('position-5')): ?>
					<div class="row">
							<jdoc:include type="modules" name="position-5" style="html5" />
					</div>
					<?php endif; ?>
					
					
				</div><!--End Header-Inner-->
			</div><!--End Container-->
		</header>
			<!-- Begin Container content-->
		<div class="content">
			<div class="container">
				
				<?php if ($this->countModules('position-6')): ?>
				<div class="row">
					<jdoc:include type="modules" name="position-6" />
				</div>
				<?php endif; ?>
				
				<div class="row">
					<?php //if ($this->countModules('position-8')): ?>
					<?php if ($left): ?>
					<div id="sidebarleft" class="span3 sidebar">
						<jdoc:include type="modules" name="position-7" />
						<jdoc:include type="modules" name="position-8" />
						<jdoc:include type="modules" name="position-9" />
					</div><!--End Sidebar Left-->
					<?php endif; ?>
					
					<div id="content" class="<?php echo $span;?>">
						<jdoc:include type="message" />

						<?php if ($this->countModules('position-13')): ?>
							<jdoc:include type="modules" name="position-13" />
						<?php endif; ?>
						
						<jdoc:include type="component" />
						
						<?php if ($this->countModules('position-14')): ?>
							<jdoc:include type="modules" name="position-14" />
						<?php endif; ?>
						

					</div>

					<?php if ($right) : ?>
					<div id="sidebarright" class="span3 sidebar">
						<jdoc:include type="modules" name="position-10" />
						<jdoc:include type="modules" name="position-11" />
						<jdoc:include type="modules" name="position-12" />
					</div><!--End Sidebar Right-->
					<?php endif; ?>
					
				</div><!--End Row-->
			</div><!--End Container-->
		</div><!--Content-->
		
		<!-- Begin Footer -->
		<footer class="footer">
			<div class="container">
				<jdoc:include type="modules" name="footer" />
				<p class="pull-right"><a href="#" id="back-top">&uarr; Top</a></p>
				<p>&copy; <?php echo $sitename; ?> <?php echo date('Y');?></p>
			</div><!--Container-->
		</footer>
		<!--End Footer-->
		<jdoc:include type="modules" name="debug" />
	</body>
</html>
