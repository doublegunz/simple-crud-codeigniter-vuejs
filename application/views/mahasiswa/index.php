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
            <router-link :to="{name: 'tambah-mahasiswa'}" class="btn btn-primary">
                    Add New
            </router-link>

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

                            <button type="button" @click="$parent.hapusUser(row.id)" class="btn btn-xs btn-danger">Hapus</button>
                        </td>

                    </tr>
                </tbody>
            </table>
        </section>
    </template> <!-- /template : lihat mahasiswa -->

</body>
</html>