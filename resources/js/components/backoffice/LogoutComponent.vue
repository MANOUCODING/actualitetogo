<template>

</template>

<script>
    import store from '../../store'
    export default {
        mounted () {
            localStorage.removeItem('token')
            store.commit('logoutUser')
            
            const Toast = this.$swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', this.$swal.stopTimer)
                    toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: "Deconnexion réussie"
            })
            
            this.$router.push({ name: 'login' })
        }
    }
</script>