
                         <table id="data-table-advance" class="table table-lg table-hover">
                             <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name </th>
                                    <th>searcher  address</th>
                                    <th>searcher  phone</th>
                                    <th>searcher  email</th>
                                    <th>name of drugs</th>
                                    <th>state</th>
                                    <th>Governorate</th>
                                    <th>Date Created</th>
                                </tr>
                             </thead>
                             <tbody>
                      
                                @php
                                $i = 1;
                                @endphp
                                @foreach($data as $case)
                                    <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$case->name}}</td>
                                    <td>{{$case->address}}</td>
                                    <td>{{$case->phone}}</td>
                                    <td>{{$case->email}}</td>
                                    <td>{{$case->search}}</td>
                                    <td>{{App\AdminModel\City::find($case->state_id)->name_en}}</td>
                                    <td>{{App\AdminModel\City::find($case->goverid)->name_en}}</td>
                                    <td>{{$case->created_at}}</td>
                                    </tr>
                                @endforeach
                                
                                @php
                                $i++;
                                @endphp
  
<script>
$(document).ready(function() {
     $('#data-table-advance').DataTable( {
                            "paging": true,
                            "pageLength": 10,
                        });
});
</script>