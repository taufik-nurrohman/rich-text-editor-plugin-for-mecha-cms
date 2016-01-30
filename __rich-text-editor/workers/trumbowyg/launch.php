<?php

Weapon::add('shell_after', function() {
    if(Config::get('html_parser.active') === 'HTML') {
        echo Asset::stylesheet(array(
            __DIR__ . DS . 'assets' . DS . 'shell' . DS . 'trumbowyg.min.css',
            __DIR__ . DS . 'assets' . DS . 'object' . DS . 'plugins' . DS . 'colors' . DS . 'trumbowyg.colors.min.css',
            __DIR__ . DS . 'assets' . DS . 'object' . DS . 'plugins' . DS . 'preformatted' . DS . 'trumbowyg.preformatted.min.css'
        ));
    }
});

Weapon::add('SHIPMENT_REGION_BOTTOM', function() use($c_rich_text_editor) {
    if(Config::get('html_parser.active') === 'HTML') {
        echo Asset::javascript(array(
            isset($c_rich_text_editor->has->jquery) ? false : File::D(__DIR__, 2) . DS . 'assets' . DS . 'sword' . DS . 'jquery.min.js',
            __DIR__ . DS . 'assets' . DS . 'sword' . DS . 'trumbowyg.min.js',
            __DIR__ . DS . 'assets' . DS . 'object' . DS . 'plugins' . DS . 'base64' . DS . 'trumbowyg.base64.min.js',
            __DIR__ . DS . 'assets' . DS . 'object' . DS . 'plugins' . DS . 'colors' . DS . 'trumbowyg.colors.min.js',
            __DIR__ . DS . 'assets' . DS . 'object' . DS . 'plugins' . DS . 'editlink' . DS . 'trumbowyg.editlink.min.js',
            __DIR__ . DS . 'assets' . DS . 'object' . DS . 'plugins' . DS . 'preformatted' . DS . 'trumbowyg.preformatted.min.js'
        ));
        echo O_BEGIN . '<script>!function(e){e(".MTE").trumbowyg({semantic:!0,resetCss:!0,removeformatPasted:!0,tagsToRemove:["script","style","textarea"],btnsDef:{image:{dropdown:["insertImage","base64"],ico:"insertImage"},linkImproved:{dropdown:["createLink","editLink","unlink"],ico:"link"}},btns:["viewHTML","|","formatting","|","btnGrp-design","|","linkImproved","|","image","|","btnGrp-justify","|","btnGrp-lists","|","foreColor","backColor","|","preformatted","|","horizontalRule"]})}(jQuery,DASHBOARD);</script>' . O_END;
    }
});