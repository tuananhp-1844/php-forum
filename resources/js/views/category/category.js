import Create from './create'
import Update from './update'
import swal from 'sweetalert'

export default {
    name: 'category',
    components: {Create, Update},
    props: [],
    data() {
        return {
            page: 1,
            fields: [
                { key: 'id', label: '#' },
                { key: 'name', label: 'name' },
                { key: 'description', label: 'Description' },
                { key: 'created_at', label: 'Created at' },
                { key: 'action', label: 'action' }
            ]
        }
    },
    computed: {
        items() {
            return this.$store.getters['Category/getCategory']
        },
        total() {
            return this.$store.getters['Category/getTotal']
        },
        last_page() {
            return this.$store.getters['Category/getLastPage']
        }
    },
    mounted() {
        this.$store.dispatch('Category/getCategory', {page: this.page}).then(res => {

        }).catch(res => {

        })
    },
    methods: {
        changePage (page) {
            this.page = page
            this.$store.dispatch('Category/getCategory', {page: this.page}).then(res => {
                window.scrollTo(0,0)
            }).catch(res => {
    
            })
        },
        create () {
            this.$refs.create.show()
        },
        destroy (category) {
            swal({
                title: this.$t('notify.delete_comfirm'),
                icon: 'warning',
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    this.$store.dispatch('Category/destroyCategory', {
                        category
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
        update(category) {
            this.$store.dispatch('Category/showCategory', { category }).then(res => {
                this.$refs.update.show(res)
            }).catch(error => {

            })
        },
    }
}
