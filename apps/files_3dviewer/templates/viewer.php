<?php
/** @var array $_ */
/** @var OCP\IURLGenerator $urlGenerator */
$urlGenerator = $_['urlGenerator'];
$version = \OCP\App::getAppVersion('files_3dviewer');
?>
<!--
Copyright 2012 Mozilla Foundation

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

Adobe CMap resources are covered by their own copyright and license:
http://sourceforge.net/adobe/cmap/wiki/License/
-->

<html>

<head>
    <title>xViewer</title>
    <script src="<?php p($urlGenerator->linkTo('files_3dviewer', 'vendor/threed/Libs/gl-matrix.js')) ?>?v=<?php p($version) ?>"></script>
    <script src="<?php p($urlGenerator->linkTo('files_3dviewer', 'vendor/threed/Libs/webgl-utils.js')) ?>?v=<?php p($version) ?>"></script>
    <script src="<?php p($urlGenerator->linkTo('files_3dviewer', 'vendor/threed/Viewer/xbim-product-type.debug.js')) ?>?v=<?php p($version) ?>"></script>
    <script src="<?php p($urlGenerator->linkTo('files_3dviewer', 'vendor/threed/Viewer/xbim-state.debug.js')) ?>?v=<?php p($version) ?>"></script>
    <script src="<?php p($urlGenerator->linkTo('files_3dviewer', 'vendor/threed/Viewer/xbim-shaders.debug.js')) ?>?v=<?php p($version) ?>"></script>
    <script src="<?php p($urlGenerator->linkTo('files_3dviewer', 'vendor/threed/Viewer/xbim-model-geometry.debug.js')) ?>?v=<?php p($version) ?>"></script>
    <script src="<?php p($urlGenerator->linkTo('files_3dviewer', 'vendor/threed/Viewer/xbim-model-handle.debug.js')) ?>?v=<?php p($version) ?>"></script>
    <script src="<?php p($urlGenerator->linkTo('files_3dviewer', 'vendor/threed/Viewer/xbim-binary-reader.debug.js')) ?>?v=<?php p($version) ?>"></script>
    <script src="<?php p($urlGenerator->linkTo('files_3dviewer', 'vendor/threed/Viewer/xbim-triangulated-shape.debug.js')) ?>?v=<?php p($version) ?>"></script>
    <script src="<?php p($urlGenerator->linkTo('files_3dviewer', 'vendor/threed/Viewer/xbim-viewer.debug.js')) ?>?v=<?php p($version) ?>"></script>
    <script src="<?php p($urlGenerator->linkTo('files_3dviewer', 'vendor/threed/Libs/jqueryx.js')) ?>?v=<?php p($version) ?>"></script>
    <script src="<?php p($urlGenerator->linkTo('files_3dviewer', 'vendor/threed/Libs/gl-matrix.js')) ?>?v=<?php p($version) ?>"></script>

    <style>
        html, body {
            height: 100%;
            padding: 0;
            margin: 0;
        }

        canvas {
            display: block;
            border: none;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            height: 100%;
        }

        #info {
            position: absolute;
            left: 20px;
            top: 20px;
            padding: 10px;
            z-index: 2;
            background: white;
        }
    </style>

</head>


<body>

<div id="info">
    <div>
        Selected ID: <span id = "id" ></span>
    </div>
    <div>
        Framerate (FPS): <span id="fps"></span>
    </div>
    <div>
        <input type="file" id="input" accept=".wexbim"/>
    </div>
    <div id="models">

    </div>
    <div id="errLog" style="color: red">

    </div>
</div>
<canvas id="xBIM-viewer"></canvas>
<script src="<?php p($urlGenerator->linkTo('files_3dviewer', 'vendor/threed/Viewer/loadfile.js')) ?>?v=<?php p($version) ?>"></script>
</body>

</html>
