/* 
 * Register ACF Blocks
 * Add block's folder name to $block_types
 * The function below will automatically register a script, if one is found in the block folder.
 * 
 * Folder Setup:
 * 
 * blocks/
 * –––sample/
 * –––––block.json
 * –––––sample.asset.php
 * –––––sample.css
 * –––––sample.js
 * –––––sample.php
 * 
 */
function register_acf_blocks()
{
	// List all the block names here
	$block_types = [
		'flex-grid',
		'image-grid',
		'dyad-image',
		'image-set',
		'project-title'
	];

	// Registers each block type using info in block.json
	foreach ($block_types as $block_type) {
		$block_path = __DIR__ . '/template-parts/blocks/' . $block_type;
		register_block_type($block_path);

		// If javascript file exists, then register it:
		if (file_exists($block_path . '.js')) {
			// must follow name format of: block-type.js
			wp_register_script($block_type, $block_path . '/' . $block_type . '.js');
		}
	}
}
add_action('init', 'register_acf_blocks', 5);
