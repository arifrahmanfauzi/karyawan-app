<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{showModal:false, karyawanModal:false}" @keydown.escape="showModal = false">

        @if (session('status'))
            <div class="flex items-center justify-center h-12 p-4 text-sm text-left text-indigo-600 bg-indigo-200 border border-indigo-400 rounded-sm center w-72"
                role="alert">
                {{ session('status') }}
                <button type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                    <span class="right-0 px-3 py-1 text-xl font-bold hover:text-red-900" aria-hidden="true">X</span>
                </button>
            </div>
        @endif


        <div class="flex mx-auto my-6 max-w-7 sm:px-6 lg:px-8">
            <div class="flex overflow-hidden shadow-sm sm:rounded-lg gap-x-5">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" @click="showModal = true"
                        class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg">Tambah
                        Karyawan</button>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" @click="karyawanModal = true"
                        class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-400 hover:bg-blue-600 hover:shadow-lg">
                        Lihat 3 Karyawan pertama</button>
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-x-scroll bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200" id="tabel_karyawan">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    No
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Nomor Induk
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Nama
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Alamat
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Tanggal Lahir
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Tanggal Bergabung
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($karyawan as $datakaryawan)

                                <tr class="hover:bg-blue-200">
                                    <td
                                        class="flex items-center px-6 py-4 text-sm text-gray-500 text-gray-900 whitespace-nowrap">
                                        {{ $datakaryawan->no }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <div class="flex items-center text-sm text-gray-900">
                                            {{ $datakaryawan->nomor_induk }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <div class="flex items-center text-sm text-gray-900">
                                            {{ $datakaryawan->nama }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <div class="flex items-center text-sm text-gray-900">
                                            {{ $datakaryawan->alamat }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <div class="flex items-center text-sm text-gray-900">
                                            {{ date('d-M-y', strtotime($datakaryawan->tanggal_lahir)) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <div class="flex items-center text-sm text-gray-900">
                                            {{ date('d-M-y', strtotime($datakaryawan->tanggal_bergabung)) }}
                                        </div>
                                    </td>
                                    <td hidden>{{ $datakaryawan->tanggal_lahir }}</td>
                                    <td hidden>{{ $datakaryawan->tanggal_bergabung }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <button
                                            class="px-4 py-2 text-white bg-red-500 hover:text-indigo-900 delete rounded-2xl">Delete</button>
                                        <button
                                            class="px-4 py-2 text-white bg-yellow-300 hover:text-indigo-900 edit rounded-2xl"
                                            @click="showModal = true">Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Overlay-->
        <div class="overflow-auto" x-show="showModal"
            :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModal }">
            <!--Dialog-->
            <div class="w-11/12 px-6 py-4 mx-auto text-left bg-white rounded shadow-lg md:max-w-md"
                @click.away="showModal = false" x-transition:enter="ease-out duration-400"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-400" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">

                <!--Title-->
                <div class="flex items-center justify-between pb-3">
                    <p id="modal_tittle" class="text-2xl font-bold">Tambah Karyawan</p>
                    <div class="z-50 cursor-pointer" @click="showModal = false">
                        <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!-- content -->
                <form action="{{ route('post.karyawan') }}" method="POST">
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
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <input type="text" name="alamat" id="alamat" autocomplete="given-name" required
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal
                                    Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" autocomplete="given-name"
                                    required
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tanggal_bergabung" class="block text-sm font-medium text-gray-700">Tanggal
                                    Lahir</label>
                                <input type="date" name="tanggal_bergabung" id="tanggal_bergabung"
                                    autocomplete="given-name" required
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!--/Dialog -->
        </div><!-- /Overlay -->

        {{-- Modal Karyawan --}}
        <div class="flex flex-col items-center justify-center w-full h-screen overflow-auto font-sans bg-teal-lightest"
            x-show="karyawanModal">
            <div v-if="modal.visible" @click.self="modal.visible = false"
                class="absolute inset-0 z-10 flex items-center justify-center">
                <div class="max-w-lg max-h-full p-8 m-4 overflow-y-scroll text-center bg-white rounded shadow">
                    <div class="z-50 cursor-pointer" @click="karyawanModal = false">
                        <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                    <div class="mb-4">
                        <h1>3 Karyawan Pertama Bergabung</h1>
                    </div>

                    <div class="mb-8">
                        @if ($karyawan_bergabung)
                            <div class="flex gap-5">
                                <div>
                                    nama
                                </div>
                                <div>
                                    nomor induk
                                </div>
                                <div>
                                    tanggal bergabung
                                </div>
                            </div>
                            @foreach ($karyawan_bergabung as $karyawan_pertama)
                                <div class="flex gap-5">
                                    <div>
                                        {{ $karyawan_pertama->nama }}
                                    </div>
                                    <div class="mr-7">
                                        {{ $karyawan_pertama->nomor_induk }}
                                    </div>
                                    <div>
                                        {{ $karyawan_pertama->tanggal_bergabung }}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Data Kosong</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.edit').click(function() {
                var nomor_induk, nama, alamat, tanggal_lahir, tanggal_bergabung
                no = $(this).closest('tr').find('td:eq(0)').text()
                nomor_induk = $(this).closest('tr').find('td:eq(1)').text()
                nama = $(this).closest('tr').find('td:eq(2)').text()
                alamat = $(this).closest('tr').find('td:eq(3)').text()
                tanggal_lahir = $(this).closest('tr').find('td:eq(6)').text()
                tanggal_bergabung = $(this).closest('tr').find('td:eq(7)').text()

                setModalEdit(no, nomor_induk, nama, alamat, tanggal_lahir, tanggal_bergabung)
            })

            $('.delete').click(function() {
                var nomor_induk, nama, alamat, tanggal_lahir, tanggal_bergabung
                no = $(this).closest('tr').find('td:eq(0)').text()
                nomor_induk = $(this).closest('tr').find('td:eq(1)').text()
                nama = $(this).closest('tr').find('td:eq(2)').text()
                alamat = $(this).closest('tr').find('td:eq(3)').text()
                tanggal_lahir = $(this).closest('tr').find('td:eq(4)').text()
                tanggal_bergabung = $(this).closest('tr').find('td:eq(5)').text()

                deleteData(no)
            })
        });

        function setModalEdit(no, nomor_induk, nama, alamat, tanggal_lahir, tanggal_bergabung) {
            $('#modal_tittle').text("Ubah data karyawan");
            $('#nomor_induk').val($.trim(nomor_induk));
            $('#nama').val($.trim(nama));
            $('#alamat').val($.trim(alamat));
            $('#tanggal_lahir').val($.trim(tanggal_lahir));
            $('#tanggal_bergabung').val($.trim(tanggal_bergabung));

            var btn_update = $(':submit')


            btn_update.text('Edit')

            btn_update.click(function(e) {
                e.preventDefault();

                // ambil inputan yang telah diperbarui
                var nomor = $('#nomor_induk').val();
                var nama = $('#nama').val();
                var alamat = $('#alamat').val();
                var tanggal_lahir = $('#tanggal_lahir').val();
                var tanggal_bergabung = $('#tanggal_bergabung').val();


                var url = "{{ URL('update/') }}";
                console.log(url)
                console.log(nomor, nama, alamat, tanggal_lahir, tanggal_bergabung)
                $.ajax({
                    type: "PATCH",
                    cache: false,
                    url: url + '/' + no,
                    data: {
                        _token: '{{ csrf_token() }}',
                        nomor_induk: nomor,
                        nama: nama,
                        alamat: alamat,
                        tanggal_lahir: tanggal_lahir,
                        tanggal_bergabung: tanggal_bergabung
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
            });
        }

        function deleteData(no) {
            var url = "{{ URL('delete/') }}";
            console.log(url)
            $.ajax({
                type: "POST",
                url: url + '/' + no,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: "json",
                success: function(response) {
                    console.log(response)
                    location.reload()
                }
            });
        }

    </script>
</x-app-layout>
