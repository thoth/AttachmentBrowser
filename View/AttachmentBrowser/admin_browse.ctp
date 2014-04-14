<div class="attachments index">
	<table class="table table-striped">
	<?php
		$tableHeaders = $this->Html->tableHeaders(array(
			$this->Paginator->sort('id', __d('croogo', 'Id')),
			'&nbsp;',
			$this->Paginator->sort('title', __d('croogo', 'Title')),
			'&nbsp;',
			__d('croogo', 'URL'),
		));
		echo $tableHeaders;

		$rows = array();
		foreach ($attachments as $attachment):

			$mimeType = explode('/', $attachment['Attachment']['mime_type']);
			$mimeType = $mimeType['0'];
			if ($mimeType == 'image') {
				$thumbnail = $this->Image->resize($attachment['Attachment']['path'], 100, 200);
			} else {
				$thumbnail = $this->Html->image('/croogo/img/icons/page_white.png') . ' ' . $attachment['Attachment']['mime_type'] . ' (' . $this->Filemanager->filename2ext($attachment['Attachment']['slug']) . ')';
				$thumbnail = $this->Html->link($thumbnail, '#', array(
					'escape' => false,
				));
			}

			$insertCode = $this->Html->link('', '#', array(
				'onclick' => "Croogo.AttachmentBrowser.choose('" . $attachment['Attachment']['slug'] . "', '".$fieldid."');",
				'escapeTitle' => false,
				'icon' => 'paper-clip',
				'tooltip' => __d('croogo', 'Insert')
			));

			$rows[] = array(
				$attachment['Attachment']['id'],
				$thumbnail,
				$attachment['Attachment']['title'],
				$insertCode,
				$this->Html->link(Router::url($attachment['Attachment']['path']), '#', array(
					'onclick' => "Croogo.AttachmentBrowser.choose('" . $attachment['Attachment']['slug'] . "', '".$fieldid."');",
					'escapeTitle' => false,
					'tooltip' => __d('croogo', 'Insert')
				)),
			);
		endforeach;

		echo $this->Html->tableCells($rows);
		echo $tableHeaders;
	?>
	</table>
</div>

<div class="row-fluid">
	<div class="span12">
		<div class="pagination">
		<ul>
			<?php echo $this->Paginator->first('< ' . __d('croogo', 'first')); ?>
			<?php echo $this->Paginator->prev('< ' . __d('croogo', 'prev')); ?>
			<?php echo $this->Paginator->numbers(); ?>
			<?php echo $this->Paginator->next(__d('croogo', 'next') . ' >'); ?>
			<?php echo $this->Paginator->last(__d('croogo', 'last') . ' >'); ?>
		</ul>
		</div>
		<div class="counter"><?php echo $this->Paginator->counter(array('format' => __d('croogo', 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%'))); ?></div>
	</div>
</div>
