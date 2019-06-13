import Create from './create'
import Update from './update'
import swal from 'sweetalert'

export default {
    name: 'tag',
    components: {Create, Update},
    props: [],
    data() {
        return {
            page: 1,
            fields: [
                { key: 'id', label: '#'},
                { key: 'name', label: 'name'},
                { key: 'description', label: 'Description'},
                { key: 'created_at', label: 'Created at'},
                { key: 'action', label: 'action' }
            ]
        }
    },
    computed: {
        items() {
            return this.$store.getters['Tag/getTag']
        },
        total() {
            return this.$store.getters['Tag/getTotal']
        },
        last_page() {
            return this.$store.getters['Tag/getLastPage']
        }
    },
    mounted() {
        this.$store.dispatch('Tag/getTag', {page: this.page}).then(res => {

        }).catch(res => {

        })
    },
    methods: {
        changePage (page) {
            this.page = page
            this.$store.dispatch('Tag/getTag', {page: this.page}).then(res => {
                window.scrollTo(0,0)
            }).catch(res => {
    
            })
        },
        create () {
            this.$refs.create.show()
        },
        destroy (tag) {
            swal({
                title: this.$t('notify.delete_comfirm'),
                icon: 'warning',
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    this.$store.dispatch('Tag/destroyTag', {
                        tag
                    }).then((res) => {
                        this.$bvToast.toast(`Xóa thành công`, {
                            title: `Thông báo`,
                            toaster: 'b-toaster-top-right',
                            solid: true,
                            variant: 'success',
                        })
                    }).catch(errors => {
                        console.log(errors)
                    })
                }
            })
        },

        update(tag) {
            this.$store.dispatch('Tag/showTag', { tag }).then(res => {
                this.$refs.update.show(res)
            }).catch(error => {

            })
        },
    }
}
