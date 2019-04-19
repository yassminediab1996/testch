             <form action="{{url('17$es12/monthly/editassign')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="modal-body">
                    <input type="hidden" name="mon_id" value="{{$idmon}}">
                   <select class="form-control" name="parmact" value="{{$phar}}">
                       @foreach(App\AdminModel\Map::all()  as $map)
                         <option value="{{$map->id}}" @if($phar == $map->id) selected @endif>{{$map->name}}</option>
                       @endforeach
                   </select>
                </div>
                <div class="modal-footer">

                    <button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn gredient-btn" type="submit">update</button>
                </div>
            </form>
            
