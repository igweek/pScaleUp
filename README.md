# pScaleUp | Typecho 轻量级图片灯箱插件

<p align="center">
  <img src="https://img.shields.io/badge/Typecho-1.2+-467b96.svg" alt="Typecho Version">
  <img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License">
  <img src="https://img.shields.io/badge/Version-2.1.1-purple.svg" alt="Version">
</p>

> 一个基于 **GLightbox** 的 Typecho 图片灯箱插件。它极其轻量，零依赖，支持平滑放大、移动端手势切换，为你的博客提供丝滑的看图体验。

## :sparkles: 特性 (Features)

* **🚀 极致轻量**：核心基于 GLightbox，无 jQuery 依赖，通过 jsDelivr CDN 加载，几乎不增加站点负担。
* **📱 移动端友好**：原生支持移动端左右滑动切换图片，双指缩放。
* **🔍 智能识别**：自动为文章内的图片添加灯箱效果，支持分组浏览（Gallery Mode）。
* **🎨 沉浸体验**：默认采用 `rgba(0, 0, 0, 0.85)` 深色半透明遮罩，聚焦图片内容。
* **⚙️ 灵活配置**：支持自定义文章容器 Class，适配各种非官方主题。

## :art: 预览 (Preview)

![image.png](https://pic.myla.eu.org/file/xlZPwhCi.png)

## :wrench: 安装 (Installation)

1.  **下载**：下载本插件源码。
2.  **重命名**：将解压后的文件夹重命名为 `pScaleUp`。
    * ⚠️ **注意**：文件夹名称必须严格为 `pScaleUp` (注意大小写)，否则无法启用。
3.  **上传**：将文件夹上传至网站的 `usr/plugins/` 目录下。
4.  **启用**：登录 Typecho 后台 -> `插件管理` -> 启用 **pScaleUp**。

## :gear: 配置 (Configuration)

插件开箱即用，默认设置适配大多数 Typecho 主题。

如果你的主题使用了特殊的类名，可以在插件设置中修改：

* **文章容器 Class**：默认为 `.post-content`。
    * *如果你使用的是 Joe 主题，可能需要改为 `.joe_detail__content`*
    * *如果你使用的是 Jasmine 主题，可能需要改为 `.entry-content`*

## :clipboard: 技术细节

本插件自动排除带有链接的图片（`a img`），防止与主题自带的跳转逻辑冲突。

**引入资源：**
* CSS: `glightbox.min.css` (via jsDelivr)
* JS: `glightbox.min.js` (via jsDelivr)

## :open_file_folder: 目录结构

```text
pScaleUp/
├── Plugin.php      # 核心逻辑文件
└── README.md       # 说明文档

```

## :scroll: 许可证 (License)

本项目遵循 [MIT License](https://www.google.com/search?q=LICENSE) 开源协议。

---

**Author:** [Gweek](https://btw.pp.ua)
