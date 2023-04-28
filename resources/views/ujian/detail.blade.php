<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SOAL UJIAN') }}
        </h2>
    </x-slot>

    {{-- <a class="btn btn-info" href="javascript:void(0)" id="createNewPost"> Add New Post</a> --}}

    <div class="container">
        <div class="row mt-5">

            <div class="col-md-6">
                <div class="card">
                    <div class="container">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <span class="badge badge-success">02 : 30</span>
                            <div id="info">

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form id="postForm" name="postForm">
                            @foreach ($soal as $item)
                                <h5 class="card-title">
                                    {{ $item->soal }}
                                </h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban" id="jawaban"
                                        value="a">
                                    <label class="form-check-label" for="{{ $item->opsi_a }}">
                                        {{ $item->opsi_a }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban" id="jawaban"
                                        value="b">
                                    <label class="form-check-label" for="{{ $item->opsi_b }}">
                                        {{ $item->opsi_b }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban" id="jawaban"
                                        value="c">
                                    <label class="form-check-label" for="{{ $item->opsi_c }}">
                                        {{ $item->opsi_c }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban" id="jawaban"
                                        value="d">
                                    <label class="form-check-label" for="{{ $item->opsi_d }}">
                                        {{ $item->opsi_d }}
                                    </label>
                                </div>
                            @endforeach

                    </div>

                    <div class="card-footer">
                        {{ $soal->links('vendor.pagination.custom') }}
                    </div>
                    </form>
                </div>
            </div>
        </div>




        <script type="text/javascript">
            $(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('nilai.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'nilai',
                            name: 'nilai'
                        },
                    ]
                });
                $('#savedata').click(function(e) {
                    e.preventDefault();
                    var link = $(this).attr("link");
                    $(this).html('Sending..');

                    $.ajax({
                        data: $('#postForm').serialize(),
                        url: "{{ route('nilai.store') }}",
                        type: "POST",
                        dataType: 'json',
                        success: function(data) {
                            window.location.href = link
                        },
                        error: function(data) {
                            console.log('Error:', data);
                            $('#savedata').html('Save Changes');
                        }
                    });
                });



            });
        </script>
</x-app-layout>
