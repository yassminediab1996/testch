<div class="form-group">
     <select name="date" id="date" class="form-control" onchange="getdata(this.value , {{$data[0]['id']}})">
         <option selected disabled >choose date</option>
          @foreach($data[0]['date'] as $date)
            <option value="{{$date}}">{{$date}}</option>
         @endforeach    
     </select>
</div>
<div id="drugname"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script>
     function getdata(data , stateid)
            {
              $.ajax({
                 type: "GET",
                 url: <?php echo '"' . url('17$es12/search/getdrugname') . '"' ?>,
                 dataType: "html",
                    data: {
                        data : data,
                       stateid : stateid
                       },
                         success: function (response) {
                         document.getElementById('drugname').innerHTML = '';
                             $('#drugname').append(response)
                         },
                         error: function (e) {
                        }
              });
            }
     </script>
