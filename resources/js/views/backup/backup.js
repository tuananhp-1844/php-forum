import { getToken } from '@/helper/local-storage'
import swal from 'sweetalert'

export default {
    name: 'backup',
    components: {},
    props: [],
    data() {
        return {
            page: 1,
            fields: [
                { key: 'id', label: '#' },
                { key: 'name', label: 'name' },
                { key: 'created_at', label: 'Created at' },
                { key: 'action', label: 'action' }
            ]
        }
    },
    computed: {
        items() {
            return this.$store.getters['Backup/getBackup']
        },
        total() {
            return this.$store.getters['Backup/getTotal']
        },
        last_page() {
            return this.$store.getters['Backup/getLastPage']
        }
    },
    mounted() {
        this.$store.dispatch('Backup/getBackup', {page: this.page}).then(res => {

        }).catch(res => {

        })
    },
    methods: {
        changePage (page) {
            this.page = page
            this.$store.dispatch('Backup/getBackup', {page: this.page}).then(res => {
                window.scrollTo(0,0)
            }).catch(res => {
    
            })
        },
        download(backup) {
            location.href = process.env.MIX_APP_URL + 'backup/' + backup.id + '?token=' + getToken()
        },
        create() {
            swal({
                text: 'Do you comfirm create backup database?',
                button: {
                  text: "Confirm!",
                  closeModal: false,
                },
            }).then((value) => {
                if(value)
                this.$store.dispatch('Backup/createBackup').then(res => {
                    swal.stopLoading();
                    swal.close();
                    this.$bvToast.toast(`Tạo thành công`, {
                        title: `Thông báo`,
                        toaster: 'b-toaster-top-right',
                        solid: true,
                        variant: 'success',
                    })
                }).catch(res => {
                    swal("Oh noes!", "The AJAX request failed!", "error");
                })
            })
        }
    }
}
