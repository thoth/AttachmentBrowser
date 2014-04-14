<?php


$formUrl = array('controller' => 'attachment_browser', 'action' => 'add');
if (isset($this->request->params['named']['editor'])) {
	$formUrl['editor'] = 1;
}

?>
<div class="row-fluid">
	<div class="span8">


			<?php
			echo $this->Form->input('Attachment.file', array('label' => __d('croogo', 'Upload'), 'type' => 'file'));
			?>

	</div>

	<div class="span4">
	<?php
		$redirect = array('action' => 'index');
		// if ($this->Session->check('Wysiwyg.redirect')) {
		// 	$redirect = $this->Session->read('Wysiwyg.redirect');
		// }
		echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
			$this->Form->button(__d('croogo', 'Upload'), array('button' => 'default', 'id'=>'btn-'.$fieldid)) .

			$this->Form->end() .
			$this->Html->endBox();
		echo $this->Croogo->adminBoxes();
	?>
	</div>

</div>

<script>

 $("#btn-<?php echo $fieldid; ?>").click(function(event) {
 	var data = new FormData();
	data.append('file', $( '#AttachmentFile' )[0].files[0]);

	//form = $("#AttachmentAdminAddForm").serialize();

	 $.ajax({
		type: "POST",
		url: Croogo.AttachmentBrowser.attachmentsAddPath+'/fieldid:<?php echo $fieldid; ?>/editor:1',
		cache: false,
		contentType: false,
		processData: false,
		data: data,

	   success: function(data){
			$('#<?php echo $fieldid; ?> .modal-body').load(Croogo.AttachmentBrowser.attachmentsPath+'/fieldid:<?php echo $fieldid; ?>');
	   }

	 });
	 event.preventDefault();
	 return false;  //stop the actual form post !important!

  });

</script>