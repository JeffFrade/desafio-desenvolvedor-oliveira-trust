<template>
    {{ data_options }}
    <option value="" selected="" disabled="">Selecione 1 Opção</option>
    <option :value="option.id" v-for="option in data_options" :key="option.id">{{ option.name }}</option>
</template>

<script>
    export default {
        props: {
            options: {
                type: Object,
                default: () => ({})
            }
        },

        data() {
            return {
                data_options: this.options
            }
        }
    }
</script>
