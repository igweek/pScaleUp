<?php
/**
 * pScaleUp 图片灯箱
 *
 * Gweek修改版：轻量级灯箱插件。点击文章图片平滑放大，支持半透明背景与左右手势切换。
 *
 * @package pScaleUp
 * @author Gweek
 * @version 2.1.1
 * @link https://btw.pp.ua
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

class pScaleUp_Plugin implements Typecho_Plugin_Interface
{
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->footer = array('pScaleUp_Plugin', 'footer');
        return _t('插件启动成功');
    }
    
    // ... 后面保持你原有的代码，不需要变 ...
    // 为了防止出错，我把完整的 deactivate 和 config 也放下面供你复制，逻辑没变
    
    public static function deactivate(){}
    
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        $dummy = new Typecho_Widget_Helper_Form_Element_Hidden('size', NULL, '1.6');
        $form->addInput($dummy);
        $dummyHover = new Typecho_Widget_Helper_Form_Element_Hidden('sHover', NULL, '1');
        $form->addInput($dummyHover);

        $className = new Typecho_Widget_Helper_Form_Element_Text(
            'contentClass', NULL, '.post-content', _t('文章容器Class'), _t('默认为 .post-content'));
        $form->addInput($className);
    }
    
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    public static function footer($archive)
    {
        if (!$archive->is('single')) { return; }

        $options = Typecho_Widget::widget('Widget_Options');
        $val = $options->plugin('pScaleUp');
        $contentClass = isset($val->contentClass) ? $val->contentClass : '.post-content';
        if (empty($contentClass)) $contentClass = '.post-content';

        $targetSelector = $contentClass . ' img:not(a img)';
        $cssUrl = '//cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css';
        $jsUrl = '//cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js';

        echo '<link rel="stylesheet" href="' . $cssUrl . '" />';
        echo '<style>' . 
             $contentClass . ' img { cursor: zoom-in; } ' .
             '.gslide-image img { padding: 0 !important; margin: auto !important; } ' .
             '.glightbox-container .goverlay { background: rgba(0, 0, 0, 0.85) !important; }' .
             '</style>';
        echo '<script src="' . $jsUrl . '"></script>';
        
        echo '<script>';
        echo "document.addEventListener('DOMContentLoaded', function() {";
        echo "    var galleryId = 'post-gallery-' + Math.random().toString(36).substr(2, 9);";
        echo "    var images = document.querySelectorAll('" . $targetSelector . "');";
        echo "    if (images.length === 0) return;";
        echo "    images.forEach(function(img) {";
        echo "        if (img.parentNode.classList.contains('glightbox')) return;";
        echo "        var link = document.createElement('a');";
        echo "        link.href = img.getAttribute('src') || img.currentSrc;";
        echo "        link.className = 'glightbox';";
        echo "        link.setAttribute('data-gallery', galleryId);";
        echo "        if (img.alt) { link.setAttribute('data-title', img.alt); }";
        echo "        img.parentNode.insertBefore(link, img);";
        echo "        link.appendChild(img);";
        echo "    });";
        echo "    var lightbox = GLightbox({";
        echo "        touchNavigation: true,";
        echo "        loop: false,";
        echo "        closeOnOutsideClick: true,";
        echo "        zoomable: true";
        echo "    });";
        echo "});";
        echo '</script>';
    }
}