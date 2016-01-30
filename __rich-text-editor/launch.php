<?php

$c_rich_text_editor = $config->states->{'plugin_' . md5(File::B(__DIR__))};

Weapon::add('shell_after', function() {
    echo Asset::stylesheet(__DIR__ . DS . 'assets' . DS . 'shell' . DS . 'do.css');
    echo Config::get('html_parser.active') === 'HTML' ? '<script>document.documentElement.className+=\' is-rich-text-editor-active\';</script>' : "";
});

if($launch = File::exist(__DIR__ . DS . 'workers' . DS . $c_rich_text_editor->editor . DS . 'launch.php')) {
    include $launch;
} else if(Route::is($config->manager->slug . '/plugin/' . File::B(__DIR__))) {
    Notify::error(Config::speak('notify_folder_not_exist', '<code>' . __DIR__ . DS . 'workers' . DS . $c_rich_text_editor->editor . '</code>'));
}