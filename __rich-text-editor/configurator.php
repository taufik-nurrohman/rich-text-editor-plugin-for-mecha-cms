<?php

$c_rich_text_editor = $config->states->{'plugin_' . md5(File::B(__DIR__))};

$options = array();
foreach(glob(__DIR__ . DS . 'workers' . DS . '*', GLOB_NOSORT | GLOB_ONLYDIR) as $editor) {
    $editor = File::B($editor);
    $options[$editor] = isset($speak->plugin_rich_text_editor->title->editors->{$editor}) ? $speak->plugin_rich_text_editor->title->editors->{$editor} : Text::parse($editor, '->title');
}

asort($options);

?>
<label class="grid-group">
  <span class="grid span-1 form-label"><?php echo $speak->plugin_rich_text_editor->title->editor; ?></span>
  <span class="grid span-5"><?php echo Form::select('editor', $options, $c_rich_text_editor->editor); ?></span>
</label>
<div class="grid-group">
  <span class="grid span-1"></span>
  <div class="grid span-5">
    <?php foreach(array('jquery' => 'jQuery', 'bootstrap' => 'Bootstrap') as $k => $v): ?>
    <div><?php echo Form::checkbox('has[' . $k . ']', 1, isset($c_rich_text_editor->has->{$k}), sprintf($speak->plugin_rich_text_editor->title->has->_, $v)) . ' ' . Jot::info(sprintf($speak->plugin_rich_text_editor->description->has->_, $v)); ?></div>
	<?php endforeach; ?>
  </div>
</div>