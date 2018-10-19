<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3 id="demo">Demo</h3>
        <div id="app">
            <router-view></router-view> <!-- End: router-view -->
        </div> <!-- End: app -->
    </div> <!-- End: container -->

    <!-- lihat mahasiswa -->
    <template id="lihat-mahasiswa">
        <section>
            <div class="row">
                <div class="col-md-12" style="margin-bottom:10px;">
                    <router-link :to="{name: 'tambah-mahasiswa'}" class="btn btn-primary">
                        Add New
                    </router-link>

                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th><span class="sr-only">Aksi</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in $parent.mahasiswa">
                                <td>{{ row.nim }}</td>
                                <td>{{ row.nama }}</td>
                                <td>{{ row.alamat }}</td>
                                <td>
                                    <router-link :to="{name: 'ubah-mahasiswa', params:{id: row.id}}" class="btn btn-xs btn-success">Ubah</router-link>

                                    <button type="button" @click="$parent.hapusMahasiswa(row.id)" class="btn btn-xs btn-danger">Hapus</button>
                                </td>

                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>

            

            
        </section>
    </template> <!-- /template : lihat mahasiswa -->

    <template id="tambah-mahasiswa">
        <section>
            <h4>Tambah Mahasiswa</h4>

            <form @submit="$parent.tambahMahasiswa" method="POST">
                <div class="form-group">
                    <label for="tambah-nim">NIM</label>
                    <input type="text" class="form-control" id="tambah-nim" v-model="$parent.row.nim" required>
                </div>

                <div class="form-group">
                    <label for="tambah-nama">Nama</label>
                    <input type="text" class="form-control" id="tambah-nama" v-model="$parent.row.nama" required>
                </div>

                <div class="form-group">
                    <label for="tambah-alamat">alamat</label>
                    <textarea name="tambah-alamat" class="form-control" id="tambah-alamat" cols="30" rows="3" v-model="$parent.row.alamat"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
                <router-link :to="{ name: 'lihat-mahasiswa' }" class="btn btn-default">Batalkan</router-link>
            </form>
        </section>
    </template> <!-- /template : tambah-mahasiswa -->

    <template id="ubah-mahasiswa">
        <section>
            <h4>Ubah Mahasiswa</h4>

            <form @submit="$parent.ubahMahasiswa($parent.row.id)" method="POST">
                <div class="form-group">
                    <label for="ubah-nim">NIM</label>
                    <input type="text" class="form-control" id="ubah-nim" v-model="$parent.row.nim" required>
                </div>

                <div class="form-group">
                    <label for="ubah-nama">Nama</label>
                    <input type="text" class="form-control" id="ubah-nama" v-model="$parent.row.nama" required>
                </div>

                <div class="form-group">
                    <label for="ubah-alamat">alamat</label>
                    <textarea name="ubah-alamat" class="form-control" id="ubah-alamat" cols="30" rows="3" v-model="$parent.row.alamat"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
                <router-link :to="{ name: 'lihat-mahasiswa' }" class="btn btn-default">Batalkan</router-link>
            </form>
        </section>
    </template> <!-- /template : tambah-mahasiswa -->

    <a href="https://github.com/doublegunz/simple-crud-codeigniter-vuejs" class="github-corner" aria-label="View source on GitHub"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#ff79b2; color:#fff; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>

    <script src="https://unpkg.com/vue/dist/vue.js" type="text/javascript"></script>
    <script src="https://unpkg.com/vue-router/dist/vue-router.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>src/main.js"></script>
</body>
</html>