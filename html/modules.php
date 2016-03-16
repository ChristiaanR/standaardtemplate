<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  Templates.Base Template Joomla 3
 */

defined('_JEXEC') or die;

function modChrome_well($module, &$params, &$attribs)
{
	if ($module->content)
	{
		echo "<div class=\"well " . htmlspecialchars($params->get('moduleclass_sfx')) . "\">";
		if ($module->showtitle)
		{
			echo "<h3 class=\"page-header\">" . $module->title . "</h3>";
//			echo "<span class=\"page-header\">" . $module->position . "</span>";
		}
		echo $module->content;
		echo "</div>";
	}
}

function modChrome_navResponsive ($module, &$params, &$attribs)
{
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';
	$triggerText    = ($module->showtitle ? $module->title : 'Menu');


	if (!empty ($module->content)) : ?>
	
		<nav class="span-12 nav-responsive moduletable<?php echo htmlspecialchars($params->get('moduleclass_sfx')) . $moduleClass; ?>">
		<label for="<?php echo $module->position; ?>-toggle" class="nav-toggle btn btn-block"><?php echo $triggerText; ?></label>
		<input type="checkbox" id="<?php echo $module->position; ?>-toggle" class="nav-toggle" />
		<?php 

		echo $module->content;
		echo '</nav>'; ?>
		
	<?php endif; 
}
?>