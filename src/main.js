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
            {path: '/', component: LihatMahasiswa, name: 'lihat-mahasiswa'},
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
        }
    }, //end methods

    created() {
        this.ambilSemuaMahasiswa()
    }
})