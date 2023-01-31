<template>
    <div :class="toastBg" role="alert" aria-live="polite" aria-atomic="true" data-bs-autohide="true">
      <div class="d-flex">
        <div class="toast-body">
          {{ data_options.message }}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
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
    },

    computed: {
      toastBg() {
        return `toast align-items-center text-bg-${this.data_options.type} fade show`
      }
    }
  }
</script>
