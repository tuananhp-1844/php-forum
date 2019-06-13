export default {
    name: 'update',
    components: {},
    props: [],
    data() {
        return {
            tag: {},
            errors: []
        }
    },
    computed: {

    },
    mounted() {

    },
    methods: {
        show(tag) {
            this.tag = tag
            this.errors = []
            this.$bvModal.show('modalUpdate')
        },
        onSubmit(bvModalEvt) {
            this.$store.dispatch('Tag/updateTag', { tag: this.tag }).then(res => {
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
