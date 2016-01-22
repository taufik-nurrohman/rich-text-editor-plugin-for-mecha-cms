<?php

Weapon::add('shell_after', function() {
    echo Asset::stylesheet(array(
        __DIR__ . DS . 'assets' . DS . 'shell' . DS . 'trumbowyg.min.css',
        __DIR__ . DS . 'plugins' . DS . 'colors' . DS . 'trumbowyg.colors.min.css',
        __DIR__ . DS . 'plugins' . DS . 'preformatted' . DS . 'trumbowyg.preformatted.min.css'
    ));
});

Weapon::add('SHIPMENT_REGION_BOTTOM', function() {
    echo Asset::javascript(array(
        File::D(__DIR__, 2) . DS . 'assets' . DS . 'sword' . DS . 'jquery.min.js',
        __DIR__ . DS . 'assets' . DS . 'sword' . DS . 'trumbowyg.min.js',
        __DIR__ . DS . 'plugins' . DS . 'base64' . DS . 'trumbowyg.base64.min.js',
        __DIR__ . DS . 'plugins' . DS . 'colors' . DS . 'trumbowyg.colors.min.js',
        __DIR__ . DS . 'plugins' . DS . 'editlink' . DS . 'trumbowyg.editlink.min.js',
        __DIR__ . DS . 'plugins' . DS . 'preformatted' . DS . 'trumbowyg.preformatted.min.js'
    ));
    echo O_BEGIN . '<script>
(function($, base) {
    if (typeof base === "undefined" || base.html_parser.active !== \'HTML\') return;
    $(\'.MTE\').trumbowyg({
        semantic: true,
        resetCss: true,
        removeformatPasted: true,
        tagsToRemove: [\'script\', \'style\', \'textarea\'],
        btnsDef: {
            image: {
                dropdown: [\'insertImage\', \'base64\'],
                ico: \'insertImage\'
            },
            linkImproved: {
                dropdown: [\'createLink\', \'editLink\', \'unlink\'],
                ico: \'link\'
            }
        },
        btns: [\'viewHTML\',
            \'|\', \'formatting\',
            \'|\', \'btnGrp-design\',
            \'|\', \'linkImproved\',
            \'|\', \'image\',
            \'|\', \'btnGrp-justify\',
            \'|\', \'btnGrp-lists\',
            \'|\', \'foreColor\', \'backColor\',
            \'|\', \'preformatted\',
            \'|\', \'horizontalRule\']
        
    });
    $(document.documentElement).addClass(\'plugin-rich-text-editor\');
})(jQuery, DASHBOARD);
</script>' . O_END;
});