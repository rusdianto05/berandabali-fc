<a data-id="form{{$id}}" type="button"  class="btn btn-sm btn-danger no-wrap shadow mb-2 btn-delete">
    <i style="font-size: 13px;" class="fas fa-trash me-1"></i>Delete
</a>
<form  id="form{{$id}}" action="{{$action}}" method="post">
@csrf
@method('delete')
</form>
