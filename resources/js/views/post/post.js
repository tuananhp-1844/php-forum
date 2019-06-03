export default {
	name: 'post',
	components: {},
	props: [],
	data() {
		return {
			page: 1,
			fields: [
				{ key: 'id', label: '#' },
				{ key: 'title', label: 'Title' },
				{ key: 'user', label: 'Author' },
				{ key: 'created_at', label: 'Created at' },
				{ key: 'status', label: 'status' },
				{ key: 'action', label: 'action' }
			],
		}
	},
	computed: {
		items() {
            return this.$store.getters['Post/getPost']
        },
        total() {
            return this.$store.getters['Post/getTotal']
        },
        last_page() {
            return this.$store.getters['Post/getLastPage']
        }
	},
	mounted() {
		this.$store.dispatch('Post/getPost', {page: this.page}).then(res => {

        }).catch(res => {

        })
	},
	methods: {
		changePage (page) {
            this.page = page
            this.$store.dispatch('Post/getPost', {page: this.page}).then(res => {
                window.scrollTo(0,0)
            }).catch(res => {
    
            })
		},
		changeStatus (status, post_id) {
			this.$store.dispatch('Post/changeStatus', {status, post_id}).then(res => {

            }).catch(res => {
    
            })
		}
	}
}
