
             <form action="{{url('17$es12/contact/editassign')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="modal-body">
                    <input type="hidden" name="content_id" value="{{$contact}}">
                   <select class="form-control" name="customer_id" >
                       @foreach(App\AdminModel\Admin::where('permission', 20)->get()  as $cus)
                         <option value="{{$cus->id}}" @if($customer == $cus->id) selected @endif>{{$cus->name}}</option>
                       @endforeach
                   </select>
                </div>
                <div class="modal-footer">

                    <button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn gredient-btn" type="submit">update</button>
                </div>
            </form>
            
