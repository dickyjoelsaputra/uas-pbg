<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            background-color: #3690f1;
            /* Warna biru laut */
        }

        .bg-abu {
            background-color: #f8f9fa;
        }
    </style>
    <title>Buku</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Buku</h5>
                        <form class="bg-abu p-5 rounded">
                            <div class="mb-3 row">
                                <label for="judul" class="col-sm-3 col-form-label text-end">Judul Buku :</label>
                                <div class="col-sm"></div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="judul" placeholder="Judul Buku">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <input type="hidden" id="harga_real" name="harga">
                                <label for="harga" class="col-sm-3 col-form-label text-end">Harga Buku :</label>
                                <div class="col-sm"></div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="harga" placeholder="Harga Buku">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="jumlah" class="col-sm-3 col-form-label text-end">Jumlah Buku :</label>
                                <div class="col-sm"></div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="jumlah" placeholder="Jumlah Buku">
                                </div>
                            </div>
                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                        <table class="table table-bordered">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Harga Buku</th>
                                    <th scope="col">Jumlah Buku</th>
                                    <th scope="col">Diskon</th>
                                    <th scope="col">Sub Total</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="3"><b>Total Keseluruhan : </b></th>
                                    <td>-</td>
                                    <td colspan="3">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <b>Ulangan Akhir Semester</b>
                        <hr>
                        <ul>
                            <li>
                                <p>Nama : Dicky Joel Saputra (18201021)</p>
                            </li>
                            <li>
                                <p>Mata Kuliah : Pemrograman Berbasis Web</p>
                            </li>
                            <li>
                                <p>Dosen : Septiana Ningtyas, S.Kom.,M.Kom</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL --}}
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <!-- Form fields for editing the book will go here -->
                            <div class="mb-3 row">
                                <label for="judul" class="col-sm-3 col-form-label text-end">Judul Buku :</label>
                                <div class="col-sm"></div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="judul" placeholder="Judul Buku">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <input type="hidden" id="harga_real" name="harga">
                                <label for="harga" class="col-sm-3 col-form-label text-end">Harga Buku :</label>
                                <div class="col-sm"></div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="harga"
                                        placeholder="Harga Buku">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="jumlah" class="col-sm-3 col-form-label text-end">Jumlah Buku :</label>
                                <div class="col-sm"></div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="jumlah"
                                        placeholder="Jumlah Buku">
                                </div>
                            </div>
                            {{-- <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div> --}}
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- MODAL --}}
    </div>




    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css" rel="stylesheet">

    <script>
        $(document).ready(function() {
            // fetch data buku dan masukan ke table

            function fetchBooks() {
                $.ajax({
                    url: '/books-ajax',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Handle success response
                        console.log(response);



                        var tbody = $('table tbody');
                        tbody.find('tr:not(:last)').remove();
                        var totalJumlah = 0;
                        var totalSubTotal = 0;

                        if (response.length === 0) {
                            var tr = $('<tr>');
                            tr.append('<td colspan="7" class="text-center">No books available</td>');
                            tbody.prepend(tr);
                            // return;
                        } else {
                            $.each(response, function(index, book) {
                                // Create a new table row
                                var tr = $('<tr>');

                                // Add columns to the row
                                tr.append('<th scope="row">' + (index + 1) + '</th>');
                                tr.append('<td>' + book.judul + '</td>');
                                // tr.append('<td>' + book.harga + '</td>');
                                tr.append('<td>' + new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 0
                                }).format(book.harga) + '</td>');
                                tr.append('<td>' + book.jumlah + '</td>');
                                tr.append('<td>' + book.diskon + '% </td>');
                                tr.append('<td>' + new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 0
                                }).format(book.sub_total) + '</td>');
                                tr.append(
                                    '<td><button class="btn btn-primary edit-button" data-id="' +
                                    book.id +
                                    '">Edit</button> <button class="btn btn-danger delete-button" data-id="' +
                                    book.id + '">Delete</button></td>');

                                // Add the row to the table body
                                tbody.find('tr:last').before(tr);

                                totalJumlah += book.jumlah;
                                totalSubTotal += book.sub_total;
                            });
                        }

                        // Iterate over each book in the response


                        tbody.find('tr:last td:nth-child(2)').html('<b>' + totalJumlah + '</b>');
                        tbody.find('tr:last td:nth-child(3)').html('<b>' + new Intl.NumberFormat(
                            'id-ID', {
                                style: 'currency',
                                currency: 'IDR',
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            }).format(totalSubTotal) + '</b>');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle error response
                        console.error(textStatus, errorThrown);
                    }
                });
            }

            fetchBooks();

            function FormatFetch(value) {

                // Remove any previous formatting
                value = String(value).replace(/[^0-9]/g, '');

                if (value === '') {
                    value = 0;
                }
                // Format the value as currency
                var formatted = parseInt(value).toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                });

                return formatted;
                // Update the displayed value
                // this.value = formatted;

                // Update the actual value
                // $('#harga_real').val(value || 0);

            }

            $('#harga').on('input', function(event) {
                // Remove any previous formatting
                var value = this.value.replace(/[^0-9]/g, '');

                if (value === '') {
                    value = 0;
                }
                // Format the value as currency
                var formatted = parseInt(value).toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                });

                // Update the displayed value
                this.value = formatted;

                // Update the actual value
                $('#harga_real').val(value || 0);
            });

            $('#editForm #harga').on('input', function(event) {
                // Remove any previous formatting
                var value = this.value.replace(/[^0-9]/g, '');

                if (value === '') {
                    value = 0;
                }
                // Format the value as currency
                var formatted = parseInt(value).toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                });

                // Update the displayed value
                this.value = formatted;

                // Update the actual value
                $('#editForm #harga_real').val(value || 0);
            });

            $('form').on('submit', function(e) {
                e.preventDefault();

                var form = this;

                $.ajax({
                    url: '/books-ajax',
                    method: 'POST',
                    data: {
                        judul: $('#judul').val(),
                        harga: $('#harga_real').val(),
                        jumlah: $('#jumlah').val(),
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Handle success response
                        // console.log(response);
                        $.toast({
                            heading: 'Success',
                            text: 'Sukses membuat data buku.',
                            icon: 'success',
                            position: 'top-right'
                        })

                        form.reset();
                        fetchBooks();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle error response
                        $.toast({
                            heading: 'Error',
                            text: 'Terjadi kesalahan.',
                            icon: 'error',
                            position: 'top-right'
                        })
                        console.error(textStatus, errorThrown);
                    }
                });
            });

            var currentBookId = null;

            $('table').on('click', '.edit-button', function() {
                // var bookId = $(this).data('id');
                currentBookId = $(this).data('id');
                // console.log(bookId)
                // Fetch the book data
                $.ajax({
                    url: '/books-ajax/' + currentBookId,
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(book) {
                        // Populate the form with the book data
                        $('#editForm #judul').val(book.judul);
                        $('#editForm #harga_real').val(book.harga);
                        $('#editForm #harga').val(FormatFetch(book.harga));
                        $('#editForm #jumlah').val(book.jumlah);
                        // Show the modal
                        $('#editModal').modal('show');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle error response
                        console.error(textStatus, errorThrown);
                    }
                });
            });

            $('#saveChanges').on('click', function() {
                if (currentBookId === null) {
                    // Handle error: no book selected
                    return;
                }

                // Submit the form
                $.ajax({
                    url: '/books-ajax/' + currentBookId,
                    method: 'PUT',
                    data: {
                        judul: $('#editForm #judul').val(),
                        harga: $('#editForm #harga_real').val(),
                        jumlah: $('#editForm #jumlah').val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        // Hide the modal
                        $('#editModal').modal('hide');

                        $.toast({
                            heading: 'Success',
                            text: 'Sukses merubah data buku.',
                            icon: 'success',
                            position: 'top-right'
                        })
                        // Fetch the books again

                        currentBookId = null;

                        $('#editForm').trigger('reset');
                        fetchBooks();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle error response
                        $.toast({
                            heading: 'Error',
                            text: 'Terjadi kesalahan.',
                            icon: 'error',
                            position: 'top-right'
                        })

                        console.error(textStatus, errorThrown);
                    }
                });
            });

            $('table').on('click', '.delete-button', function() {
                var bookId = $(this).data('id');
                $.ajax({
                    url: '/books-ajax/' + bookId,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Handle success response
                        console.log(response);

                        $.toast({
                            heading: 'Success',
                            text: 'Sukses menghapus data buku.',
                            icon: 'success',
                            position: 'top-right'
                        })
                        // Fetch the books again
                        fetchBooks();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle error response
                        $.toast({
                            heading: 'Error',
                            text: 'Terjadi kesalahan.',
                            icon: 'error',
                            position: 'top-right'
                        })
                        console.error(textStatus, errorThrown);

                        fetchBooks();
                    }
                });
            });

        });
    </script>
</body>

</html>
