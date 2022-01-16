<template>
    <div>
        <Nav/>
        <div>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import Nav from "./components/Nav";

export default {
    name: "App",
    components: {Nav}
}
</script>

<style scoped>

</style>
