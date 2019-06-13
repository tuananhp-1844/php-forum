export default {
    name: 'create',
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
        show() {
            this.tag = {}
            this.errors = []
            this.$bvModal.show('modalCreate')
        },

        onSubmit(bvModalEvt) {
            this.$store.dispatch('Tag/createTag', {tag: this.tag}).then(res => {
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
