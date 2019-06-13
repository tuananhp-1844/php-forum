export default {
    name: 'update',
    components: {},
    props: [],
    data() {
        return {
            category: {},
            errors: []
        }
    },
    computed: {

    },
    mounted() {

    },
    methods: {
        show(category) {
            this.category = category
            this.errors = []
            this.$bvModal.show('modalUpdate')
        },
        onSubmit(bvModalEvt) {
            this.$store.dispatch('Category/updateCategory', { category: this.category }).then(res => {
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
