export default {
	name: 'question',
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
				{ key: 'status', label: 'status' }
			],
			questionSelect: {},
			reportFields: [
				{ key: 'title', label: 'Title' },
				{ key: 'comment', label: 'Comment' }
			],
			reportItems: []
		}
	},
	computed: {
		items() {
            return this.$store.getters['Question/getQuestion']
        },
        total() {
            return this.$store.getters['Question/getTotal']
        },
        last_page() {
            return this.$store.getters['Question/getLastPage']
        }
	},
	mounted() {
		this.$store.dispatch('Question/getQuestion', {page: this.page}).then(res => {

        }).catch(res => {

        })
	},
	methods: {
		changePage (page) {
            this.page = page
            this.$store.dispatch('Question/getQuestion', {page: this.page}).then(res => {
                window.scrollTo(0,0)
            }).catch(res => {
    
            })
		},
		rowSelected(item) {
			this.questionSelect = item[0]
			this.reportItems = item[0].reports
			this.$bvModal.show('detail')
		},
		destroy(type) {
			this.$store.dispatch('Question/destroyQuestion', {question_id: this.questionSelect.id, type}).then(res => {
                this.$bvModal.hide('detail')
            }).catch(res => {
    
            })
		}
	}
}
