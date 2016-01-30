<?php

Weapon::add('shell_after', function() {
    if(Config::get('html_parser.active') === 'HTML') {
        echo Asset::stylesheet(__DIR__ . DS . 'assets' . DS . 'shell' . DS . 'jquery-te.min.css');
    }
});

Weapon::add('SHIPMENT_REGION_BOTTOM', function() use($c_rich_text_editor) {
    if(Config::get('html_parser.active') === 'HTML') {
        echo Asset::javascript(array(
            isset($c_rich_text_editor->has->jquery) ? false : File::D(__DIR__, 2) . DS . 'assets' . DS . 'sword' . DS . 'jquery.min.js',
            __DIR__ . DS . 'assets' . DS . 'sword' . DS . 'jquery-te.min.js'
        ));
        echo O_BEGIN . '<script>!function(e){e(".MTE").jqte()}(jQuery,DASHBOARD);</script>' . O_END;
    }
});