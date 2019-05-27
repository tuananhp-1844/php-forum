export default {
    name: 'user',
    components: {},
    props: [],
    data() {
        return {
            page: 0,
            fields: [
                { key: 'id', label: '#'},
                { key: 'full_name', label: 'Full name'},
                { key: 'email', label: 'Email'},
                { key: 'provider', label: 'Provider'},
                { key: 'avatar', label: 'Avatar' },
                { key: 'active', label: 'Active' }
            ],
        }
    },
    computed: {
        items() {
            return this.$store.getters['User/getUser']
        }
    },
    mounted() {
        this.$store.dispatch('User/getUser', this.page).then(res => {

        }).catch(res => {
            
        })
    },
    methods: {

    }
}
