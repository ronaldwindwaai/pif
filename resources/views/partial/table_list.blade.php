<!-- Checkbox Select table start -->
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>{{ $title }}</h5>
        </div>
        <div class="card-body">
            <div class="row align-items-center m-l-0">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ $page.'/create' }}"><button class="btn btn-success btn-sm btn-round has-ripple"
                            data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i> Add
                            {{ $form }}</button></a>
                    <button type="button" class="btn btn-danger btn-sm btn-round has-ripple" data-toggle="modal"
                        data-target="#exampleModalLive">Delete Project</button>
                </div>
            </div>
            @if (!empty($data))

            <div class="dt-responsive table-responsive">
                <table id="multi-select" class="table table-striped table-bordered nowrap">
                    @if (!empty($columns))
                    <thead>
                        <tr>
                            <th><a href="#" onclick="selectAll();">Select All</a></th>
                            @foreach ($columns as $column)
                            <th>{{ str_replace('_',' ',$column) }}</th>
                            @endforeach
                            <th></th>
                        </tr>
                    </thead>
                    @endif
                    <form action="{{ $form }}" method="POST">
                        <tbody>
                            @foreach ($data as $row)
                            <tr>
                                <td><input type="checkbox" class="checkboxes" name="id[]" value="{{ $row->id }}" /></td>
                                @foreach ($columns as $column)
                                <td>{{ $row->$column }}</td>
                                @endforeach
                                <td>
                                    <a href="{{ route('resources.edit',$row->id) }}" class="btn btn-info btn-sm"><i
                                            class="feather icon-edit"></i>&nbsp;Edit </a>
                                    <form action="{{ route('resources.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="feather icon-trash-2"></i>&nbsp;Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </form>
                    <tfoot>
                        <th><a href="#" onclick="selectAll();" class="">SELECT ALL</a></th>
                        @foreach ($columns as $column)
                        <th>{{ strtoupper (str_replace('_',' ',$column)) }}</th>
                        @endforeach
                        <th></th>
                    </tfoot>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
<script>


</script>
@include('partial.modal.delete.delete-confirmation')
