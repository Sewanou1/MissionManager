@extends('component.layout')

@section('css-link')

@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
        <h3 class="card-title mr-auto p-2">{{ $title }}</h3>
        <a href="{{ route('conducteurs.create') }}" class="btn btn-primary p-2">
            <i class="fas fa-plus mr-1"></i>Ajouter
        </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>#</th>
                <th>Libellé</th>
                <th>Conducteur</th>
                <th>Véhicule</th>
                <th>Départ</th>
                <th>Destination</th>
                <th>Date début </th>
                <th>Date Fin</th>
                <th>Actions </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($missions as $key=>$mission)
                    <tr>
                    <td>{{ $key + 1}}</td>
                    <td>{{ $mission->libelle }}</td>
                    <td>{{ $mission->conducteur->nom }}</td>
                    <td>Véhicule</td>
                    <td> {{ $mission->lieuDepart }}</td>
                    <td>{{ $mission->lieuArrivee }}</td>
                    <td>{{ $mission->dateDepart }}</td>
                    <td>{{ $mission->dateArrivee }}</td>
                    <td class="text-center py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                            {{-- <a href="#" class="btn btn-info "><i class="fas fa-eye"></i></a> --}}
                            <a href="{{ route('conducteurs.edit', $mission->idMission)}}" class="btn btn-primary mr-2 ml-2"><i class="fas fa-pen"></i></a>
                            <form method="POST" action="{{ route('conducteurs.destroy', $mission->idMission) }}" class="delete">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger ">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                    </tr>

                    {{ $count++ }}
                @endforeach
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('scripts')


<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('assets/dist/js/demo.js') }}"></script> --}}

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
