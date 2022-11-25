<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @inertiaHead
</head>
<body>
    @routes
    @inertia


{{--    Костыль уровень -_---}}
    <script src='https://unpkg.com/three@0.99.0/build/three.min.js'></script>
    <script src='https://unpkg.com/three@0.99.0/examples/js/loaders/OBJLoader.js'></script>
    <script src='https://unpkg.com/three@0.99.0/examples/js/controls/OrbitControls.js'></script>
    <script src='https://unpkg.com/three@0.99.0/examples/js/renderers/CSS3DRenderer.js'></script>
    <script src='https://unpkg.com/animejs@2.2.0/anime.min.js'></script>
</body>
</html>
