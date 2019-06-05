import Create from './create'
import Update from './update'
import swal from 'sweetalert'

export default {
    name: 'role',
    components: { Create, Update },
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
            return this.$store.getters['Role/getRole']
        },
        total() {
            return this.$store.getters['Role/getTotal']
        },
        last_page() {
            return this.$store.getters['Role/getLastPage']
        }
    },
    mounted() {
        this.$store.dispatch('Role/getRole', { page: this.page }).then(res => {

        }).catch(res => {

        })
    },
    methods: {
        changePage(page) {
            this.page = page
            this.$store.dispatch('Role/getRole', { page: this.page }).then(res => {
                window.scrollTo(0, 0)
            }).catch(error => {

            })
        },

        selectRow(item) {
        },

        create() {
            this.$refs.create.show()
        },

        update(role) {
            this.$store.dispatch('Role/showRole', { role }).then(res => {
                this.$refs.update.show(res)
            }).catch(error => {

            })
        },

        destroy(role) {
            swal({
                title: this.$t('notify.delete_comfirm'),
                icon: 'warning',
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    this.$store.dispatch('Role/destroyRole', {
                        role
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
        }
    }
}
