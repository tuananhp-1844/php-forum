export default {
    name: 'create',
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
        show() {
            this.category = {}
            this.errors = []
            this.$bvModal.show('modalCreate')
        },

        onSubmit(bvModalEvt) {
            this.$store.dispatch('Category/createCategory', {category: this.category}).then(res => {
                this.$bvModal.hide('modalCreate')
                this.$bvToast.toast(`Tạo mới thành công`, {
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
