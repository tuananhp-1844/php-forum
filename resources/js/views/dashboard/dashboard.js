export default {
    name: 'dashboard',
    components: {},
    props: [],
    data() {
        return {

        }
    },
    computed: {
        countMember() {
            return this.$store.getters['Dashboard/getMember']
        },
        countPost() {
            return this.$store.getters['Dashboard/getPost']
        },
        countQuestion() {
            return this.$store.getters['Dashboard/getQuestion']
        },
        countTag() {
            return this.$store.getters['Dashboard/getTag']
        }
    },
    mounted() {
        this.$store.dispatch('Dashboard/getDashboard').then(res => {
            console.log(this.countMember)
        }).catch(err => {

        })
    },
    methods: {

    }
}
