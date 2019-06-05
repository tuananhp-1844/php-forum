export default {
    name: 'update',
    components: {},
    props: [],
    data() {
        return {
            role: {},
            errors: []
        }
    },
    computed: {

    },
    mounted() {

    },
    methods: {
        show(role) {
            this.role = role
            this.errors = []
            this.$bvModal.show('modalUpdate')
        },
        onSubmit(bvModalEvt) {
            this.$store.dispatch('Role/updateRole', { role: this.role }).then(res => {
                this.$bvModal.hide('modalUpdate')
                this.$bvToast.toast(`Cập nhật thành công`, {
                    title: `Thông báo`,
                    toaster: 'b-toaster-top-right',
                    solid: true,
                    variant: 'success',
                })
            }).catch(errors => {
                if (errors.status === 422) {
                    this.errors = errors.data.errors
                }
            })
            bvModalEvt.preventDefault()
        },
        onReset() {

        }
    }
}
