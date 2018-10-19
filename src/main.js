axios.defaults.baseURL = 'http://localhost/codeigniter/mahasiswa/'

//siapkan route component
// - Route: LihatMahasiswa

const LihatMahasiswa = {
    template: '#lihat-mahasiswa',

    //guard ini dipakai untuk memanggil ambilDataMahasiswa()
    //setiap kali route ini diakses, untuk memastikan data selalu diperbaharui
    beforeRouteEnter(to, from, next) {
        next(vm => {
            vm.$parent.ambilSemuaMahasiswa()
        })
    },
}

// - Route: TambahMahasiswa
const TambahMahasiswa = {
    template: '#tambah-mahasiswa',
}

//mulai vue app
const app = new Vue({
    el: '#app',

    data: {
        mahasiswa: [],
        row: { nim: '', nama: '', alamat: ''},
        message: '',
    },

    router: new VueRouter({
        //routes yang dipakai 
        routes: [
            { path: '/', component: LihatMahasiswa, name: 'lihat-mahasiswa'},
            { path: '/tambah', component: TambahMahasiswa, name: 'tambah-mahasiswa'},
        ]
    }),

    //methods
    methods: {
        //ambil semua data
        ambilSemuaMahasiswa() {
            axios.get('/get')
                .then(response => {
                    this.mahasiswa = response.data
            })
        },

        //tambah mahasiswa ke API server
        tambahMahasiswa() {
            axios.post('/save', this.row)
                .then(response => {
                    //set pesan sesuai respon dari API server
                    this.message = response.data.message

                    //redirect
                    this.$router.push({ name: 'lihat-mahasiswa' })
                })
        }
    }, //end methods

    created() {
        this.ambilSemuaMahasiswa()
    }
})