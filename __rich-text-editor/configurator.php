<form class="form-plugin" action="<?php echo $config->url_current; ?>/update" method="post">
  <?php echo Form::hidden('token', $token); ?>
  <?php

  $rich_text_editor_config = File::open(__DIR__ . DS . 'states' . DS . 'config.txt')->unserialize();

  $options = array();
  foreach(glob(__DIR__ . DS . 'workers' . DS . '*', GLOB_NOSORT | GLOB_ONLYDIR) as $editor) {
      $editor = File::B($editor);
      $options[$editor] = isset($speak->plugin_rich_text_editor->{$editor}) ? $speak->plugin_rich_text_editor->{$editor} : Text::parse($editor, '->title');
  }

  asort($options);

  ?>
  <p><?php echo Form::select('editor', $options, $rich_text_editor_config['editor']) . ' ' . Jot::button('action', $speak->update); ?></p>
</form>