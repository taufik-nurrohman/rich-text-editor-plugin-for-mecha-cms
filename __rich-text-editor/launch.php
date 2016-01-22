<?php

$rich_text_editor_config = File::open(__DIR__ . DS . 'states' . DS . 'config.txt')->unserialize(array('editor'=>""));

Weapon::add('shell_after', function() {
    echo Asset::stylesheet(__DIR__ . DS . 'assets' . DS . 'shell' . DS . 'do.css');
});

if($launch = File::exist(__DIR__ . DS . 'workers' . DS . $rich_text_editor_config['editor'] . DS . 'launch.php')) {
    include $launch;
} else if(Route::is($config->manager->slug . '/plugin/' . File::B(__DIR__))) {
    Notify::error(Config::speak('notify_folder_not_exist', '<code>' . __DIR__ . DS . 'workers' . DS . $rich_text_editor_config['editor'] . '</code>'));
}

// Update configuration data
Route::accept($config->manager->slug . '/plugin/' . File::B(__DIR__) . '/update', function() use($config, $speak) {
    if($request = Request::post()) {
        Guardian::checkToken($request['token']);
        unset($request['token']);
        File::serialize($request)->saveTo(__DIR__ . DS . 'states' . DS . 'config.txt', 0600);
        Notify::success(Config::speak('notify_success_updated', $speak->plugin));
        Guardian::kick(File::D($config->url_current));
    }
});