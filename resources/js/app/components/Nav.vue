<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container">
            <router-link to="/" class="navbar-brand" href="#">Home</router-link>
            <div>
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <template>
                        <li class="nav-item">
                            <router-link to="/ProductOrder" class="nav-link fw-bolder text-info" href="">
                                ثبت سفارش
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/orderTracking" class="nav-link fw-bolder text-info" href="">
                                رهگیری سفارش
                            </router-link>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Nav"
}
</script>

<style scoped>

</style>
