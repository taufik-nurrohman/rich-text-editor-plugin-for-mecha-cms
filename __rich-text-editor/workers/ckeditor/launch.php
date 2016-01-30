<?php

Weapon::add('SHIPMENT_REGION_BOTTOM', function() use($c_rich_text_editor) {
    if(Config::get('html_parser.active') === 'HTML') {
        echo Asset::javascript(__DIR__ . DS . 'assets' . DS . 'ckeditor.js');
        echo O_BEGIN . '<script>!function(e){if(e.composers.length)for(var t=e.composers,s=0,a=t.length;a>s;++s)CKEDITOR.replace(t[s])}(DASHBOARD);</script>' . O_END;
    }
});