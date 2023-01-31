<template>
    <div>
        <NavBarComponent/>
        <div class="container">
            <div class="row space">
                <router-view/>
            </div>
        </div>
    </div>
</template>

<script>
    import NavBarComponent from '@/components/NavBarComponent.vue'

    export default {
        components: {
            NavBarComponent
        }
    }
</script>

<style scoped>
    .space {
        margin-top: 20px;
    }
</style>
