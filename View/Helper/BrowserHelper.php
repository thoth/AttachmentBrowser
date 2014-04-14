<?php
App::uses('AppHelper', 'View/Helper');

/**
 * Example Helper
 *
 * An example hook helper for demonstrating hook system.
 *
 * @category Helper
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class BrowserHelper extends AppHelper {

/**
 * Other helpers used by this helper
 *
 * @var array
 * @access public
 */
	public $helpers = array(
		'Html',
		'Form',
		'Croogo.Layout',
		'FileManager.FileManager',
	);

	public function input($fieldName, $options = array()){
		//build a unique ID in case we have a number of fields
		$id = md5($fieldName);

		//just need to merge the launcher
		$browser_options = array(
			'div'=>array('class'=>'input text input-append'),
			'type'=>'text',
			'after'=>'<button class="btn btn-default" style="margin:0;" type="button" fieldid="'.$id.'" onclick="Croogo.AttachmentBrowser.browser(\''.$id.'\');"><i class="icon icon-folder-open"></i></button>'
		);
		$options = array_merge($options, $browser_options);
		$input =  $this->Form->input($fieldName, $options);

		// $dom = new DOMDocument;
		// $dom->loadHTML($input);

		// $tag= $dom->getElementsByTagName('input');
		// debug($dom); exit();

		//$id = [0]->getAttribute('id');
		// $input = str_replace("{{ELEMENTID}}", $id, $input);
		//create the container
		$container = '
			<div id="'.$id.'" class="modal hide fade">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Choose File</h3>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<a href="#" class="btn" onclick="$(\'#'.$id.'\').modal(\'hide\');">Close</a>
				</div>
			</div>
		';
		// $container = str_replace("{{ELEMENTID}}", $id, $container);
		echo $input;
		echo $container;
	}

/**
 * Before render callback. Called before the view file is rendered.
 *
 * @return void
 */
	public function beforeRender($viewFile) {
		$this->Html->script('/attachment_browser/js/attachment_browser', array('inline' => false));
	}

/**
 * After render callback. Called after the view file is rendered
 * but before the layout has been rendered.
 *
 * @return void
 */
	public function afterRender($viewFile) {
	}

/**
 * Before layout callback. Called before the layout is rendered.
 *
 * @return void
 */
	public function beforeLayout($layoutFile) {
	}

/**
 * After layout callback. Called after the layout has rendered.
 *
 * @return void
 */
	public function afterLayout($layoutFile) {
	}


}
