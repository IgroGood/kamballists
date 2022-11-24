<template>
    <div class="canvas-container"></div>
    <div class='popup-3d'>С Новым Годом!</div>
    <bottom-menu/>
</template>

<script>
import BottomMenu from "../items/ui/BottomMenu";


export default {
    name: "Avatar",

    components: {
        BottomMenu
    },

    created() {
        console.log(route('js'));
        var scripts = [
            "three.min.js",
            "OBJLoader.js",
            "OrbitControls.js",
            "CSS3DRenderer.js",
            "anime.min.js",
            "main.js",
        ];
        scripts.forEach(script => {
            let tag = document.createElement("script");
            tag.setAttribute("src", route('js') + "/3d/" + script);
            document.head.appendChild(tag);
        });


    }
}
</script>

<style lang="sass" scoped>
.canvas-container
    width: 100vw
    height: 100vh
</style>
