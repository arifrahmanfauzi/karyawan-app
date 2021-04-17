<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Cuti') }}
        </h2>
    </x-slot>
    <div class="py-12"
        x-data="{showModalCuti:false, showModalAmbilCuti:false, showModalAmbilCutiLebih:false, showModalSisaCuti:false}">

        <!--Modal Tambah Cuti-->
        <div class="overflow-auto" x-show="showModalCuti"
            :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModalCuti }">
            <!--Dialog-->
            <div class="w-11/12 px-6 py-4 mx-auto text-left bg-white rounded shadow-lg md:max-w-md"
                @click.away="showModalCuti = false" x-transition:enter="ease-out duration-400"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-400" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">

                <!--Title-->
                <div class="flex items-center justify-between pb-3">
                    <p id="modal_tittle" class="text-2xl font-bold">Tambah Cuti Karyawan</p>
                    <div class="z-50 cursor-pointer" @click="showModalCuti = false">
                        <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!-- content -->
                <form action="{{ route('post.cuti') }}" method="POST">
                    @csrf
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="nama" id="nama" autocomplete="given-name" required
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="nomor_induk" class="block text-sm font-medium text-gray-700">Nomor
                                    Induk</label>
                                <input type="text" name="nomor_induk" id="nomor_induk" autocomplete="given-name"
                                    required
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tanggal_cuti" class="block text-sm font-medium text-gray-700">Tanggal
                                    Cuti</label>
                                <input type="date" name="tanggal_cuti" id="tanggal_cuti" autocomplete="given-name"
                                    required
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="lama_cuti" class="block text-sm font-medium text-gray-700">Lama
                                    Cuti</label>
                                <input type="text" name="lama_cuti" id="lama_cuti" autocomplete="given-name" required
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="keterangan"
                                    class="block text-sm font-medium text-gray-700">Keterangan</label>
                                <input type="text" name="keterangan" id="keterangan" autocomplete="given-name" required
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                            <button id="btn_simpan"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!--/Dialog -->
        </div><!-- /Modal Tambah Cuti -->

        <!--Modal Ambil Cuti-->
        <div class="overflow-auto" x-show="showModalAmbilCuti"
            :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModalAmbilCuti }">
            <!--Dialog-->
            <div class="w-full px-6 py-4 mx-auto text-left bg-white rounded shadow-lg md:max-w-md lg:max-w-xl"
                @click.away="showModalAmbilCuti = false" x-transition:enter="ease-out duration-400"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-400" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">

                <!--Title-->
                <div class="flex items-center justify-between pb-3">
                    <p id="modal_tittle" class="text-2xl font-bold">Karyawan yang pernah ambil cuti</p>
                    <div class="z-50 cursor-pointer" @click="showModalAmbilCuti = false">
                        <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!-- content -->
                <div>
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th>nama</th>
                                        <th>nomor_induk</th>
                                        <th>tanggal cuti</th>
                                        <th>keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pernah_cuti as $cuti)
                                        <tr>
                                            <td>{{ $cuti->nama }}</td>
                                            <td>{{ $cuti->nomor_induk }}</td>
                                            <td>{{ date('d-M-y', strtotime($cuti->tanggal_cuti)) }}</td>
                                            <td>{{ $cuti->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/Dialog -->
            </div>
        </div><!-- /Modal Ambil Cuti -->


        <!--Modal Ambil Cuti Lebih-->
        <div class="overflow-auto" x-show="showModalAmbilCutiLebih"
            :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModalAmbilCutiLebih }">
            <!--Dialog-->
            <div class="w-full px-6 py-4 mx-auto text-left bg-white rounded shadow-lg md:max-w-md lg:max-w-xl"
                @click.away="showModalAmbilCutiLebih = false" x-transition:enter="ease-out duration-400"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-400" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">

                <!--Title-->
                <div class="flex items-center justify-between pb-3">
                    <p id="modal_tittle" class="text-2xl font-bold">Karyawan yang pernah ambil cuti lebih sekali</p>
                    <div class="z-50 cursor-pointer" @click="showModalAmbilCutiLebih = false">
                        <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!-- content -->
                <div>
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th>nama</th>
                                        <th>nomor_induk</th>
                                        <th>tanggal cuti</th>
                                        <th>keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pernah_cuti_lebih as $cuti)
                                        <tr>
                                            <td>{{ $cuti->nama }}</td>
                                            <td>{{ $cuti->nomor_induk }}</td>
                                            <td>{{ date('d-M-y', strtotime($cuti->tanggal_cuti)) }}</td>
                                            <td>{{ $cuti->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/Dialog -->
            </div>
        </div><!-- /Modal Ambil Cuti Lebih -->

        <!--Modal Sisa Cuti-->
        <div class="overflow-auto" x-show="showModalSisaCuti"
            :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModalSisaCuti }">
            <!--Dialog-->
            <div class="w-full px-6 py-4 mx-auto text-left bg-white rounded shadow-lg md:max-w-md lg:max-w-xl"
                @click.away="showModalSisaCuti = false" x-transition:enter="ease-out duration-400"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-400" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">

                <!--Title-->
                <div class="flex items-center justify-between pb-3">
                    <p id="modal_tittle" class="text-2xl font-bold">Sisa Cuti</p>
                    <div class="z-50 cursor-pointer" @click="showModalSisaCuti = false">
                        <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!-- content -->
                <div>
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th>nama</th>
                                        <th>nomor induk</th>
                                        <th>sisa cuti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sisa_cuti as $cuti)
                                        <tr>
                                            <td>{{ $cuti->nama }}</td>
                                            <td>{{ $cuti->nomor_induk }}</td>
                                            <td>{{ $cuti->sisa_cuti }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/Dialog -->
            </div>
        </div><!-- /Modal Sisa Cuti-->


        <div class="flex mx-auto my-6 max-w-7 sm:px-6 lg:px-8">
            <div class="flex overflow-hidden shadow-sm sm:rounded-lg gap-x-5">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" @click="showModalAmbilCuti = true"
                        class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg">Lihat
                        Karyawan yang pernah ambil cuti</button>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" @click="showModalAmbilCutiLebih = true"
                        class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg">
                        Lihat karyawan yang pernah ambil cuti yang lebih dari satu kali</button>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" @click="showModalSisaCuti = true"
                        class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg">
                        Lihat sisa cuti karyawan</button>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-x-scroll bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200" id="tabel_cuti">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Nama
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Nomor Induk
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Tanggal &nbsp; &nbsp; durasi &nbsp; &nbsp; keterangan
                                </th>

                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($karyawan as $datakaryawan)

                                <tr class="hover:bg-blue-200">
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <div class="flex items-center text-sm text-gray-900">
                                            {{ $datakaryawan->nama }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <div class="flex items-center text-sm text-gray-900">
                                            {{ $datakaryawan->nomor_induk }}
                                        </div>
                                    </td>
                                    <td>
                                        @foreach ($datakaryawan->cuti as $cuti)
                                            <div class="flex gap-5">
                                                <div>
                                                    {{ date('d-M-y', strtotime($cuti->tanggal_cuti)) }}
                                                </div>
                                                <div class="mx-4">
                                                    {{ $cuti->lama_cuti }}
                                                </div>
                                                <div>
                                                    {{ $cuti->keterangan }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td>
                                        <button @click="showModalCuti = true"
                                            class="focus:outline-none text-white text-sm py-2.5 px-5 tambah rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg">
                                            Tambah Cuti
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.tambah').click(function() {
                var nomor_induk, nama, tanggal_cuti, lama_cuti, keterangan
                nomor_induk = $(this).closest('tr').find('td:eq(1)').text()
                nama = $(this).closest('tr').find('td:eq(0)').text()

                setModalField(nomor_induk, nama)
                // console.log($.trim(nomor_induk), $.trim(nama), tanggal_cuti, lama_cuti, keterangan)
            })
        });

        function setModalField(nomor_induk, nama) {
            var nama = $('#nama').val($.trim(nama))
            var nomor_induk = $('#nomor_induk').val($.trim(nomor_induk))
        }

        var btn_simpan = $('#btn_simpan')

        btn_simpan.click(function(e) {
            e.preventDefault();

            var nama = $('#nama').val()
            var nomor_induk = $('#nomor_induk').val()
            var tanggal_cuti = $('#tanggal_cuti').val()
            var lama_cuti = $('#lama_cuti').val()
            var keterangan = $('#keterangan').val()

            // console.log(nomor_induk, nama, tanggal_cuti, lama_cuti, keterangan)
            var url = "{{ URL('cuti') }}";
            console.log(url)
            $.ajax({
                type: "POST",
                cache: false,
                url: url,
                data: {
                    _token: '{{ csrf_token() }}',
                    nomor_induk: nomor_induk,
                    nama: nama,
                    tanggal_cuti: tanggal_cuti,
                    lama_cuti: lama_cuti,
                    keterangan: keterangan
                },
                dataType: "json",
                success: function(response) {
                    console.log(response)
                    location.reload()
                },
                error: function(response) {
                    console.log(response)
                }
            });
        })

    </script>
</x-app-layout>
