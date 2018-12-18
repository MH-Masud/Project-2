<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>  
<div class="container">
  <div class="row">
      <div class="col-lg-4 col-lg-offset-4">
        <form>
            {{csrf_field()}}
          <div class="form-group">
              <label>Division</label>
              <select class="form-control" id="division">
                <option>Select</option>
                @foreach($divisions as $division)
                
                  <option value="{{$division->id}}">{{$division->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label>District</label>
              <select class="form-control" id="district">
              </select>
          </div>
          <div class="form-group">
              <label>Thana</label>
              <select class="form-control" id="thana">
              </select>
          </div>
          </form>
      </div>
  </div>          
</div>
<script>
$(document).ready(function(){
    $('#division').on('change',function(){
        var id = $(this).val();
           if (id !=null) {
             $.ajax({
                url:"{{ route('division') }}",
                method:'get',
                data:{id:id},
                success:function(html){
                    
                    $('#district').html(html);
                    $('#thana').html('<option value="">Select thana first</option>'); 
                }
            }); 
         }else{
            $('#district').html('<option value="">Select country first</option>');
            $('#thana').html('<option value="">Select state first</option>'); 
         }
    });
    
    $('#district').on('change',function(){
        var id = $(this).val();
            $.ajax({
                url:"{{ route('thana') }}",
                method:'get',
                data:{id:id},
                success:function(html){
                    $('#thana').html(html);
                }
            }); 
    });
});
</script>
</body>
</html>
