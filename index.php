
<!DOCTYPE html>
<html>
<head>
	<title>
		Taxi_Project
	</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="style.css" type="text/css" rel="stylesheet">
    <script>
        function myfun(){
            var cab=document.getElementById('cab-type').value;
            if(cab==='CedMicro'){
                let eleman = document.getElementById('luggage');
                eleman.setAttribute("disabled", true);
            }else{
                let ele = document.getElementById('luggage');
                ele.removeAttribute("disabled");
            }
        }
    </script>
     <script>
        $(document).ready(function() {
            $('#submit').click(function(ev) {
                var pick=document.getElementById('pickup').value;
                var drop=document.getElementById('drop').value;
                var luggage=document.getElementById('luggage').value;
                var cab=document.getElementById('cab-type').value;
                    
                  if (pick == "PickUp") {
                    document.getElementById('exampleModalLongTitle').innerHTML="Pick Up point mandatory!!!";
                    }
                    else if(drop=="Drop"){
                        document.getElementById('exampleModalLongTitle').innerHTML="Drop point mandatory!!!";
                    }else if(cab=="Cab Type"){
                        document.getElementById('exampleModalLongTitle').innerHTML="Cab Type must be choosen!!!";
                    }else if(isNaN(luggage) || luggage ==""){
                       alert("Luggage value must be numeric and not be blank!!!");
                       return;
                    }
                ev.preventDefault();
                $.ajax({
                    url: "process.php",
                    type: "post",
                    dataType:'json',
                    data:{p:pick, d:drop, l:luggage, c:cab},
                    success: function(result) {
                        $('.modal-body').html(result);
                        $('#exampleModalLongTitle').html("Total Fare is:");
                    },
                });
            });
        });
    </script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand bg-" href="#"><span id="ced">Ced</span><span id="cab">Cab</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>   
    </ul>
  </div>
</nav>
    <div id="wrapper" class="container-fluid pb-5">
        <div id="heading" class=" text-center">
            <h1 class="text-light display-5">Book a City Taxi to your destination in town</h1>
            <h5 class="text-light display-6 text-center">Choose from a range of category and prices</h5>
        </div>
        <div id="form" class="bg-light col-md-3 col-sm-3 pb-3">
            <h5 class="display-6 text-secondary text-center pb-4 border-bottom pt-3"><span class=" pl-4 pt-1 pb-1 pr-4 " id="city">City Taxi</span>
            <h5 class="text-dark display-6 text-center">Your everyday travel partner<small class="text-muted">AC cabs for point to point travel</small></h5>
           
            <form class="form-group">
                <select class="form-control bg-muted my-2" id="pickup">
                <option>PickUp</option>
                <option>Charbagh</option>
                <option>Indra Nagar</option>
                <option>BBD</option>
                <option>Barabanki</option>
                <option>Basti</option>
                <option>Faizabad</option>
                <option>Gorakhpur</option>
                </select>
                <select class="form-control  my-2 " id="drop">
                <option>Drop</option>
                <option>Gorakhpur</option>
                <option>Indra Nagar</option>
                <option>BBD</option> 
                <option>Barabanki</option>
                <option>Basti</option>
                <option>Faizabad</option>
                <option>Charbagh</option>
                </select>
                <select class="form-control  my-2" onchange="myfun()" id="cab-type">
                <option>Cab Type</option>
                <option>CedMicro</option>
                <option>CedMini</option>
                <option>CedRoyal</option>
                <option>CedSUV</option>
                </select>
                <input type="text" class="form-control  my-2" placeholder="Enter weight in kg" id="luggage">
                <button class="form-control mt-3 text-dark " id="submit" data-toggle="modal" data-target="#exampleModalCenter">Calculate Fare
    </button>
            </form>
        </div>
        <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </div>
    <footer class="page-footer font-small blue">
        <div class="row align-items-center">
          <div class="col">
            <ion-icon name="logo-facebook" class="icons"></ion-icon>
            <ion-icon name="logo-twitter" class="icons"></ion-icon>
            <ion-icon name="logo-instagram" class="icons"></ion-icon>
          </div>
          <div class="col">
             <span id="ced">Ced</span><span id="cab">Cab</span>
          </div>
          <div class="col">
             <div class="footer-copyright text-center" id="copy">© 2020 Copyright:
              <a href="#" class="text-dark"><span id="taxi">Cedcab.com</span></a>
            </div>
          </div>
        </div>
 </footer>
 <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>
