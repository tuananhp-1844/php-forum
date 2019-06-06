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
        }
    }
}
