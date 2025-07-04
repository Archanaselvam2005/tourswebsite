<?php include("connection/config.php");


if(isset($_POST['btnAdd']))
  {

     $datas = array_filter($_POST);
	 $datas['date'] = jk_mysql_datetime();
	  $insertRoute = jk_insert_data(MANITRAVEL,$datas);
		  
	 echo "<script>alert(' Record Save Successfully!');window.location.href='index.php';</script>";
  }?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Madurai Mani Travels</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const outstationBtn = document.getElementById("outstationBtn");
    const localBtn = document.getElementById("localBtn");
    const localForm = document.getElementById("localForm");
    const outstationForm = document.getElementById("outstationForm");

    outstationBtn.addEventListener("click", () => {
      localForm.classList.add("d-none");
      outstationForm.classList.remove("d-none");
    });

    localBtn.addEventListener("click", () => {
      outstationForm.classList.add("d-none");
      localForm.classList.remove("d-none");
    });

    const pickupTime = document.getElementById("pickupTime");
        const dropTime = document.getElementById("dropTime");

    const times = [];
    for (let h = 0; h < 24; h++) {
      for (let m = 0; m < 60; m += 15) {
        const hour = h % 12 === 0 ? 12 : h % 12;
        const minute = m.toString().padStart(2, '0');
        const suffix = h < 12 ? 'AM' : 'PM';
        times.push(`${hour}:${minute} ${suffix}`);
      }
    }
    pickupTime.innerHTML = times.map(t => `<option>${t}</option>`).join('');
        dropTime.innerHTML = times.map(t => `<option>${t}</option>`).join('');

  });
</script>


  <!--NavBar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav  ms-auto">
          <a class="nav-link active p-3 " aria-current="page" href="#" style=" color: 	#1d2b53;">Home</a>
          <a class="nav-link p-3 " href="#about" style=" color: 	#1d2b53;">About</a>
          <a class="nav-link p-3 " href="#tariff" style=" color: 	#1d2b53;">Tariff</a>
          <a class="nav-link p-3 " href="#popular" style=" color: 	#1d2b53;">Outstation Routes</a>
 <a href="tel:+916383507464" class="btn " style="border-radius: 30px; background-color:#f7931e; color:#0F1A2C;height: auto ;width: fit-content;">+916383507464</a>

      </div>
    </div>
  </nav>
  <!--Section-->
<section class="pt-2 her" >
  <div class="container-fluid pt-2">
    <div class="row pt-2">
      <div class="col-md-4 col-12 col-lg-6 d-flex align-items-center justify-content-center pt-5">

          <div class="cont1 pt-lg-1 mt-2" >
    <h1 class="fw-bold">MADURAI MANI TRAVELS - Local & Outstation Taxi Services in Madurai</h1>
    <p>Enjoy convenient travel within Madurai and nearby areas. Perfect for sightseeing, temple visits, events, and day trips</p>
    <button class="btn btn-dark p-3" style="border-radius: 30px;">+91  6383 50 7464 <i class="bi bi-arrow-right"></i></button>
  </div>
      </div>
      <div class="col-md-12 col-sm-12 col-lg-5">
  <div class="cont2 d-flex flex-column align-items-center mt-5 mb-3">
    <div class="head d-flex flex-column align-items-center p-3 text-white w-100" style="background-color: #0F1A2C;">
      <h2 style="color: wheat;"><i class="bi bi-car-front" style="color: #f7931e;"></i> Book Your Ride</h2>
      <p style="color: rgb(208, 195, 169);">Choose your journey type below</p>
    </div>

    <div class="but d-flex justify-content-around p-3 w-100" style="background-color: rgb(221, 202, 179);">
      <button class="btn " id="localBtn" style="border-radius: 30px;color: #1d2b53;background-color:#f7931e;"><i class="bi bi-clock"></i> Local/Rental</button>
            <button class="btn " id="outstationBtn" style="border-radius: 30px;color: #1d2b53;background-color: #f7931e;">    <i class="bi bi-geo-alt-fill"></i> Outstation Services</button>

    </div>



    <!-- LOCAL FORM -->
 <div class="local-form" id="localForm">
 
 <form action="" method="post">
      <div class="form-body bg-light   text-white p-4">
        <input type="text" placeholder="Enter Full Name" class="form-control mb-3" name="name" required>
        <input type="text" placeholder="Enter Mobile Number" class="form-control mb-3" name="mno" required>
        <input type="text" placeholder="Pick-Up Location" class="form-control mb-3" name="pickup" required>
        <input type="text" placeholder="Drop-up Location" class="form-control mb-3" name="droploc" required>

        <div class="d-flex justify-content-between mb-3">
          <input type="date" class="form-control me-2" name="pickdate" required>
<select name="droptime" id="time-select" class="form-select" required>
  <!-- 12 AM to 11:45 PM in 15-minute intervals -->
  <!-- Loop in 15-minute increments -->
  <option value="12:00 AM">12:00 A.M.</option>
  <option value="12:15 AM">12:15 A.M.</option>
  <option value="12:30 AM">12:30 A.M.</option>
  <option value="12:45 AM">12:45 A.M.</option>
  <option value="1:00 AM">1:00 A.M.</option>
  <option value="1:15 AM">1:15 A.M.</option>
  <option value="1:30 AM">1:30 A.M.</option>
  <option value="1:45 AM">1:45 A.M.</option>
  <option value="2:00 AM">2:00 A.M.</option>
  <option value="2:15 AM">2:15 A.M.</option>
  <option value="2:30 AM">2:30 A.M.</option>
  <option value="2:45 AM">2:45 A.M.</option>
  <option value="3:00 AM">3:00 A.M.</option>
  <option value="3:15 AM">3:15 A.M.</option>
  <option value="3:30 AM">3:30 A.M.</option>
  <option value="3:45 AM">3:45 A.M.</option>
  <option value="4:00 AM">4:00 A.M.</option>
  <option value="4:15 AM">4:15 A.M.</option>
  <option value="4:30 AM">4:30 A.M.</option>
  <option value="4:45 AM">4:45 A.M.</option>
  <option value="5:00 AM">5:00 A.M.</option>
  <option value="5:15 AM">5:15 A.M.</option>
  <option value="5:30 AM">5:30 A.M.</option>
  <option value="5:45 AM">5:45 A.M.</option>
  <option value="6:00 AM">6:00 A.M.</option>
  <option value="6:15 AM">6:15 A.M.</option>
  <option value="6:30 AM">6:30 A.M.</option>
  <option value="6:45 AM">6:45 A.M.</option>
  <option value="7:00 AM">7:00 A.M.</option>
  <option value="7:15 AM">7:15 A.M.</option>
  <option value="7:30 AM">7:30 A.M.</option>
  <option value="7:45 AM">7:45 A.M.</option>
  <option value="8:00 AM">8:00 A.M.</option>
  <option value="8:15 AM">8:15 A.M.</option>
  <option value="8:30 AM">8:30 A.M.</option>
  <option value="8:45 AM">8:45 A.M.</option>
  <option value="9:00 AM">9:00 A.M.</option>
  <option value="9:15 AM">9:15 A.M.</option>
  <option value="9:30 AM">9:30 A.M.</option>
  <option value="9:45 AM">9:45 A.M.</option>
  <option value="10:00 AM">10:00 A.M.</option>
  <option value="10:15 AM">10:15 A.M.</option>
  <option value="10:30 AM">10:30 A.M.</option>
  <option value="10:45 AM">10:45 A.M.</option>
  <option value="11:00 AM">11:00 A.M.</option>
  <option value="11:15 AM">11:15 A.M.</option>
  <option value="11:30 AM">11:30 A.M.</option>
  <option value="11:45 AM">11:45 A.M.</option>
  <option value="12:00 PM">12:00 P.M.</option>
  <option value="12:15 PM">12:15 P.M.</option>
  <option value="12:30 PM">12:30 P.M.</option>
  <option value="12:45 PM">12:45 P.M.</option>
  <option value="1:00 PM">1:00 P.M.</option>
  <option value="1:15 PM">1:15 P.M.</option>
  <option value="1:30 PM">1:30 P.M.</option>
  <option value="1:45 PM">1:45 P.M.</option>
  <option value="2:00 PM">2:00 P.M.</option>
  <option value="2:15 PM">2:15 P.M.</option>
  <option value="2:30 PM">2:30 P.M.</option>
  <option value="2:45 PM">2:45 P.M.</option>
  <option value="3:00 PM">3:00 P.M.</option>
  <option value="3:15 PM">3:15 P.M.</option>
  <option value="3:30 PM">3:30 P.M.</option>
  <option value="3:45 PM">3:45 P.M.</option>
  <option value="4:00 PM">4:00 P.M.</option>
  <option value="4:15 PM">4:15 P.M.</option>
  <option value="4:30 PM">4:30 P.M.</option>
  <option value="4:45 PM">4:45 P.M.</option>
  <option value="5:00 PM">5:00 P.M.</option>
  <option value="5:15 PM">5:15 P.M.</option>
  <option value="5:30 PM">5:30 P.M.</option>
  <option value="5:45 PM">5:45 P.M.</option>
  <option value="6:00 PM">6:00 P.M.</option>
  <option value="6:15 PM">6:15 P.M.</option>
  <option value="6:30 PM">6:30 P.M.</option>
  <option value="6:45 PM">6:45 P.M.</option>
  <option value="7:00 PM">7:00 P.M.</option>
  <option value="7:15 PM">7:15 P.M.</option>
  <option value="7:30 PM">7:30 P.M.</option>
  <option value="7:45 PM">7:45 P.M.</option>
  <option value="8:00 PM">8:00 P.M.</option>
  <option value="8:15 PM">8:15 P.M.</option>
  <option value="8:30 PM">8:30 P.M.</option>
  <option value="8:45 PM">8:45 P.M.</option>
  <option value="9:00 PM">9:00 P.M.</option>
  <option value="9:15 PM">9:15 P.M.</option>
  <option value="9:30 PM">9:30 P.M.</option>
  <option value="9:45 PM">9:45 P.M.</option>
  <option value="10:00 PM">10:00 P.M.</option>
  <option value="10:15 PM">10:15 P.M.</option>
  <option value="10:30 PM">10:30 P.M.</option>
  <option value="10:45 PM">10:45 P.M.</option>
  <option value="11:00 PM">11:00 P.M.</option>
  <option value="11:15 PM">11:15 P.M.</option>
  <option value="11:30 PM">11:30 P.M.</option>
  <option value="11:45 PM">11:45 P.M.</option>
</select>
        </div>

        <input type="date" class="form-control mb-3" placeholder="Return Date" name="returndate" required>
        <button class="btn  w-100" name="btnAdd" style="background-color: #f7931e;">Submit</button>
</form>
        <p class="mt-2 text-center text-secondary">Best prices guaranteed • 24/7 customer support • Verified drivers</p>
      </div>

</div>



	
  </div>

      </div>
    </div>
  </div>



</section>


<!--section1-->
<div class="container mt-5" >
  <div class="row align-items-center" id="about">
    
    <!-- Image Column -->
    <div class="col-12 col-md-6 mb-4 mb-md-0 text-center">
      
          
      <img src="img/image.png" alt="img" class="img-fluid" style="max-width: 100%; border-radius: 20px;" >

    </div>
    
    <!-- Text Content Column -->
    <div class="col-12 col-md-6 ">
      <h1 style="color: #304275;">Reliable Taxi Booking Service</h1>
      <p>
       MADURAI MANI TRAVELS is your trusted partner for safe, affordable, and timely local and outstation travel. Based in
        Madurai, we’ve served thousands with exceptional taxi services over the past decade.
      </p>
      <p>
        Whether it’s a round-trip outstation ride or a flexible day package in town, we’re committed to making every
        journey seamless and comfortable.
      </p>


      <ul>
        <li><b style="color: #1d2b53; font-size: 20px;"><i class="bi bi-shield-check"></i> Safety First</b><br>Regularly maintained vehicles and trained drivers.</li>
        <li><b style="color: #1d2b53; font-size: 20px;"><i class="bi bi-clock"></i> Punctual Rides</b><br> We respect your time with strict on-time service.</li>
        <li><b style="color: #1d2b53; font-size: 20px;"><i class="bi bi-award"></i> Experienced Drivers</b><br>Our drivers are local, polite, and professional.</li>
        <li><b style="color: #1d2b53; font-size: 20px;"><i class="bi bi-hand-thumbs-up"></i> Customer First</b><br>Your convenience and comfort come above all.</li>
      </ul>
            <a href="tel:+916383507464" class="btn w-50" style="border-radius: 30px; background-color: #1d2b53; color: white;">+916383507464</a>
    </div>

  </div>
</div>



  <!--section 2-->
<div class="container mt-5" id="tariff">
  <div class="row">
              <h2 class="fw-bold text-center" style="color:#1d2b53;">Our Tariffs</h2>
    <div class="mb-4" style="width: 80px; height: 4px; background-color: e56a22; margin: auto;"></div>
        <p style="text-align: center;">       Our standard tariff for rides within the city. Fares consist of a base price plus
      per-kilometer rate. Additional waiting time charged per minute after the first 3 minutes.
.</p>
    </p>

    <!-- SUV -->
    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center mt-5">
      <div class="card" style="width: 25rem; border-radius: 20px;">
        <img src="img/Car1.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title fw-bold" style="color: #1d2b53;">SUV</h5>
          <p class="card-text">Base Fare</p>
          <p class="card-text fw-bold" style="color: #1d2b53;">Round Trip: ₹19/km</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="bi bi-check text-success"></i> Up to 4 passengers</li>
          <li class="list-group-item"><i class="bi bi-check text-success"></i> Air conditioning</li>
          <li class="list-group-item"><i class="bi bi-check text-success"></i> SUV-class vehicles</li>
          <li class="list-group-item"><i class="bi bi-check text-success"></i> Standard luggage space</li>
        </ul>
        <div class="card-body">
<button type="button" class="btn btn-warning fw-bold" style="border-radius: 30px; color: white;background-color: #1d2b53;">Book Now</button>
            <a href="tel:+916383507464" class="btn w-50" style="border-radius: 30px; background-color: #1d2b53; color: white;">+916383507464</a>

        </div>
      </div>
    </div>

    <!-- Sedan -->
    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center mt-5">
      <div class="card" style="width: 25rem; border: #f7931e 1px solid; ">
        <img src="img/car2.png" class="card-img-top" alt="..." >
         <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2 px-3 py-1 rounded-pill fw-semibold">
            Most Popular
          </span>
        <div class="card-body">
          <h5 class="card-title fw-bold" style="color: #1d2b53;">Sedan</h5>
          <p class="card-text">Sedan</p>
          <p class="card-text fw-bold" style="color: #1d2b53;">Round Trip: ₹19/km</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="bi bi-check text-success"></i> Up to 4 passengers</li>
          <li class="list-group-item"><i class="bi bi-check text-success"></i> Air conditioning</li>
          <li class="list-group-item"><i class="bi bi-check text-success"></i> Sedan-class vehicles</li>
          <li class="list-group-item"><i class="bi bi-check text-success"></i> Extra luggage space</li>
        </ul>
        <div class="card-body">
          <button type="button" class="btn btn-warning fw-bold" style="border-radius: 30px; color: #1d2b53;">Book Now</button>
            <a href="tel:+916383507464" class="btn w-50" style="border-radius: 30px; background-color: #1d2b53; color: white;">+916383507464</a>
        </div>
      </div>
    </div>

    <!-- Etios -->
    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center mt-5">
      <div class="card" style="width: 25rem; border-radius: 20px;">
        <img src="img/car3.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title fw-bold" style="color: #1d2b53;">Etios</h5>
          <p class="card-text">Etios</p>
          <p class="card-text fw-bold" style="color: #1d2b53;">Round Trip: ₹13/km</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="bi bi-check text-success"></i> Up to 4 passengers</li>
          <li class="list-group-item"><i class="bi bi-check text-success"></i> Complementary Water</li>
          <li class="list-group-item"><i class="bi bi-check text-success"></i> Etios-class vehicles</li>
          <li class="list-group-item"><i class="bi bi-check text-success"></i> Extra luggage space</li>
        </ul>
        <div class="card-body">
<button type="button" class="btn btn-warning fw-bold" style="border-radius: 30px; color: white;background-color: #1d2b53;">Book Now</button>
            <a href="tel:+916383507464" class="btn w-50" style="border-radius: 30px; background-color: #1d2b53; color: white;">+916383507464</a>
        </div>
      </div>
    </div>

  </div>
</div>



  <!--Section 3-->
  <div class="container mt-5" id="popular">
  <div class="row mt-5">
    <div class="col-12">
              <h2 class="fw-bold text-center" style="color:#1d2b53;">Most Booked Rides from Madurai</h2>
    <div class="mb-4" style="width: 80px; height: 4px; background-color: e56a22; margin: auto;"></div>
        <p style="text-align: center;">  Discover comfortable and reliable taxi services connecting Madurai to popular destinations
        across South India.</p>

    </div>

    <!-- CARD 1: Chennai -->
    <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center mt-4">
      <div class="card shadow rounded-4 overflow-hidden" style="max-width: 22rem; width: 100%;">
        <div class="position-relative">
          <img src="img/chen.jpg" class="card-img-top " alt="Chennai" height="200px">
          <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2 px-3 py-1 rounded-pill fw-semibold">
            ⭐ Popular
          </span>
        </div>
        <div class="card-body">
          <h4 class="card-title fw-bold" style="  color: #304275 !important;
">Chennai</h4>
          <p class="text-muted mb-3" >from Madurai</p>
          <h4 class="fw-bold text-primary" style="  color: #304275 !important;
">₹6782</h4>
          <div class="my-3">
            <div class="d-flex justify-content-between align-items-center">
              <i class="bi bi-car-front text-primary fs-5"></i>
              <span class="flex-grow-1 mx-2 border-top border-2 border-primary"></span>
              <i class="bi bi-dot fs-5 text-primary"></i>
            </div>
          </div>
          <div class="d-flex justify-content-between text-secondary small mb-3">
            <div><i class="bi bi-rulers"></i> 493 km</div>
            <div><i class="bi bi-clock"></i> 7 hr 30 min</div>
          </div>
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-primary w-50">Book Now</a>
            <a href="tel:+916383507464" class="btn btn-primary w-50">Call Now</a>
          </div>
        </div>
      </div>
    </div>

    <!-- CARD 2: Bangalore -->
    <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center mt-4">
      <div class="card shadow rounded-4 overflow-hidden" style="max-width: 22rem; width: 100%;">
        <div class="position-relative">
          <img src="img/WhatsApp Image 2025-06-26 at 22.34.50_301dff9f.jpg" class="card-img-top " alt="Bangalore" height="200px">
        </div>
        <div class="card-body">
          <h4 class="card-title fw-bold" style="  color: #304275 !important;
">Bangalore</h4>
          <p class="text-muted mb-3">from Madurai</p>
          <h4 class="fw-bold text-primary" style="  color: #304275 !important;
">₹6782</h4>
          <div class="my-3">
            <div class="d-flex justify-content-between align-items-center">
              <i class="bi bi-car-front text-primary fs-5"></i>
              <span class="flex-grow-1 mx-2 border-top border-2 border-primary"></span>
              <i class="bi bi-dot fs-5 text-primary"></i>
            </div>
          </div>
          <div class="d-flex justify-content-between text-secondary small mb-3">
            <div><i class="bi bi-rulers"></i> 435 km</div>
            <div><i class="bi bi-clock"></i> 8 hr</div>
          </div>
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-primary w-50">Book Now</a>
            <a href="tel:+916383507464" class="btn btn-primary w-50">Call Now</a>
          </div>
        </div>
      </div>
    </div>

    <!-- CARD 3: Salem -->
    <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center mt-4">
      <div class="card shadow rounded-4 overflow-hidden" style="max-width: 22rem; width: 100%;">
        <div class="position-relative">
          <img src="img/saelam.jpg" class="card-img-top" alt="Salem">
        </div>
        <div class="card-body">
          <h4 class="card-title fw-bold" style="  color: #304275 !important;
">Salem</h4>
          <p class="text-muted mb-3" style="  color: #304275 !important;
">from Madurai</p>
          <h4 class="fw-bold text-primary" style="  color: #304275 !important;
">₹6782</h4>
          <div class="my-3">
            <div class="d-flex justify-content-between align-items-center">
              <i class="bi bi-car-front text-primary fs-5"></i>
              <span class="flex-grow-1 mx-2 border-top border-2 border-primary"></span>
              <i class="bi bi-dot fs-5 text-primary"></i>
            </div>
          </div>
          <div class="d-flex justify-content-between text-secondary small mb-3">
            <div><i class="bi bi-rulers"></i> 229 km</div>
            <div><i class="bi bi-clock"></i> 4 hr 30 min</div>
          </div>
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-primary w-50">Book Now</a>
            <a href="tel:+916383507464" class="btn btn-primary w-50">Call Now</a>
          </div>
        </div>
      </div>
    </div>




  </div>





<div class="row mt-5">

  <!-- Coimbatore -->
  <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center mt-4">
    <div class="card shadow rounded-4 overflow-hidden" style="max-width: 22rem; width: 100%;">
      <div class="position-relative">
        <img src="img/coim.jpg" class="card-img-top" alt="Coimbatore" height="200px">
      </div>
      <div class="card-body">
        <h4 class="card-title fw-bold" style="  color: #304275 !important;
">Coimbatore</h4>
        <p class="text-muted mb-3">from Madurai</p>
        <h4 class="fw-bold text-primary" style="  color: #304275 !important;
">₹6782</h4>
        <div class="my-3">
          <div class="d-flex justify-content-between align-items-center">
            <i class="bi bi-car-front text-primary fs-5"></i>
            <span class="flex-grow-1 mx-2 border-top border-2 border-primary"></span>
            <i class="bi bi-dot fs-5 text-primary"></i>
          </div>
        </div>
        <div class="d-flex justify-content-between text-secondary small mb-3">
          <div><i class="bi bi-rulers"></i> 228 km</div>
          <div><i class="bi bi-clock"></i> 5 hr</div>
        </div>
        <div class="d-flex gap-2">
          <a href="#" class="btn btn-primary w-50">Book Now</a>
          <a href="tel:+916383507464" class="btn btn-primary w-50">Call Now</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Trichy -->
  <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center mt-4">
    <div class="card shadow rounded-4 overflow-hidden" style="max-width: 22rem; width: 100%;">
      <div class="position-relative">
        <img src="img/Trichy.jpg" class="card-img-top" alt="Trichy" height="200px">
      </div>
      <div class="card-body">
        <h4 class="card-title fw-bold" style="  color: #304275 !important;
">Trichy</h4>
        <p class="text-muted mb-3">from Madurai</p>
        <h4 class="fw-bold text-primary" style="  color: #304275 !important;
">₹6782</h4>
        <div class="my-3">
          <div class="d-flex justify-content-between align-items-center">
            <i class="bi bi-car-front text-primary fs-5"></i>
            <span class="flex-grow-1 mx-2 border-top border-2 border-primary"></span>
            <i class="bi bi-dot fs-5 text-primary"></i>
          </div>
        </div>
        <div class="d-flex justify-content-between text-secondary small mb-3">
          <div><i class="bi bi-rulers"></i> 135 km</div>
          <div><i class="bi bi-clock"></i> 2 hr 15min</div>
        </div>
        <div class="d-flex gap-2">
          <a href="#" class="btn btn-primary w-50">Book Now</a>
          <a href="tel:+916383507464" class="btn btn-primary w-50">Call Now</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Pondicherry -->
  <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center mt-4">
    <div class="card shadow rounded-4 overflow-hidden" style="max-width: 22rem; width: 100%;">
      <div class="position-relative">
        <img src="img/Pondi.jpg" class="card-img-top" alt="Pondicherry" height="200px">
      </div>
      <div class="card-body">
        <h4 class="card-title fw-bold" style="  color: #304275 !important;
">Pondicherry</h4>
        <p class="text-muted mb-3">from Madurai</p>
        <h4 class="fw-bold text-primary" style="  color: #304275 !important;
">₹6782</h4>
        <div class="my-3">
          <div class="d-flex justify-content-between align-items-center">
            <i class="bi bi-car-front text-primary fs-5"></i>
            <span class="flex-grow-1 mx-2 border-top border-2 border-primary"></span>
            <i class="bi bi-dot fs-5 text-primary"></i>
          </div>
        </div>
        <div class="d-flex justify-content-between text-secondary small mb-3">
          <div><i class="bi bi-rulers"></i> 330 km</div>
          <div><i class="bi bi-clock"></i> 6 hr 30 min</div>
        </div>
        <div class="d-flex gap-2">
          <a href="#" class="btn btn-primary w-50">Book Now</a>
          <a href="+916383507464" class="btn btn-primary w-50">Call Now</a>
        </div>
      </div>
    </div>
  </div>

</div>


  <div class="row mt-5">

  <!-- Rameshwaram -->
  <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center mt-4">
    <div class="card shadow rounded-4 overflow-hidden" style="max-width: 22rem; width: 100%;">
      <div class="position-relative">
        <img src="img/Rame.jpg" class="card-img-top" alt="Rameshwaram" height="200px">
      </div>
      <div class="card-body">
        <h4 class="card-title fw-bold" style="  color: #304275 !important;
">Rameshwaram</h4>
        <p class="text-muted mb-3">from Madurai</p>
        <h4 class="fw-bold text-primary" style="  color: #304275 !important;
">₹6782</h4>
        <div class="my-3">
          <div class="d-flex justify-content-between align-items-center">
            <i class="bi bi-car-front text-primary fs-5"></i>
            <span class="flex-grow-1 mx-2 border-top border-2 border-primary"></span>
            <i class="bi bi-dot fs-5 text-primary"></i>
          </div>
        </div>
        <div class="d-flex justify-content-between text-secondary small mb-3">
          <div><i class="bi bi-rulers"></i> 173 km</div>
          <div><i class="bi bi-clock"></i> 3 hr 30min</div>
        </div>
        <div class="d-flex gap-2">
          <a href="#" class="btn btn-primary w-50">Book Now</a>
          <a href="+916383507464" class="btn btn-primary w-50">Call Now</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Trivandrum -->
  <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center mt-4">
    <div class="card shadow rounded-4 overflow-hidden" style="max-width: 22rem; width: 100%;">
      <div class="position-relative">
        <img src="img/trirvan.jpg" class="card-img-top" alt="Trivandrum" height="200px">
      </div>
      <div class="card-body">
        <h4 class="card-title fw-bold" style="  color: #304275 !important;
">Trivandrum</h4>
        <p class="text-muted mb-3">from Madurai</p>
        <h4 class="fw-bold " style="  color: #304275 !important;
">₹6782</h4>
        <div class="my-3">
          <div class="d-flex justify-content-between align-items-center">
            <i class="bi bi-car-front text-primary fs-5"></i>
            <span class="flex-grow-1 mx-2 border-top border-2 border-primary"></span>
            <i class="bi bi-dot fs-5 text-primary"></i>
          </div>
        </div>
        <div class="d-flex justify-content-between text-secondary small mb-3">
          <div><i class="bi bi-rulers"></i> 245 km</div>
          <div><i class="bi bi-clock"></i> 5 hr</div>
        </div>
        <div class="d-flex gap-2">
          <a href="#" class="btn btn-primary w-50">Book Now</a>
          <a href="tel:+916383507464" class="btn btn-primary w-50">Call Now</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Kanyakumari -->
  <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center mt-4">
    <div class="card shadow rounded-4 overflow-hidden" style="max-width: 22rem; width: 100%;">
      <div class="position-relative">
        <img src="img/Kany.jpg" class="card-img-top" alt="Kanyakumari" height="200px">
      </div>
      <div class="card-body">
        <h4 class="card-title fw-bold" style="  color: #304275 !important;
">KanyaKumari</h4>
        <p class="text-muted mb-3">from Madurai</p>
        <h4 class="fw-bold text-primary" style="  color: #304275 !important;
">₹6782</h4>
        <div class="my-3">
          <div class="d-flex justify-content-between align-items-center">
            <i class="bi bi-car-front text-primary fs-5"></i>
            <span class="flex-grow-1 mx-2 border-top border-2 border-primary"></span>
            <i class="bi bi-dot fs-5 text-primary"></i>
          </div>
        </div>
        <div class="d-flex justify-content-between text-secondary small mb-3">
          <div><i class="bi bi-rulers"></i>305 km</div>
          <div><i class="bi bi-clock"></i> 6 hr</div>
        </div>
        <div class="d-flex gap-2">
          <a href="#" class="btn btn-primary w-50">Book Now</a>
          <a href="tel:+916383507464" class="btn btn-primary w-50">Call Now</a>
        </div>
      </div>
    </div>
  </div>

</div>

  </div>

  <!--section 4-->


  <div class="container text-center mt-5">
        <h2 class="fw-bold text-center" style="color:#1d2b53;">Why We're Madurai’s #1 Travel Choice</h2>
    <div class="mb-4" style="width: 80px; height: 4px; background-color: orange; margin: auto;"></div>
        <p style="text-align: center;">Discover why thousands of satisfied customers trust Madurai Mani Travels. We're committed to delivering comfort, safety, and reliability with every ride.</p>

    <div class="row g-4 mt-5">
      <!-- Card 1 -->
      <div class="col-md-4">
        <div class="p-4 bg-white rounded shadow-sm text-start">
          <div class="d-flex align-items-start">
            <div class="rounded-circle p-2 me-3" style="background-color: #e4e9f5; color: #1d2b53;">
              <i class="bi bi-person-vcard fs-4"></i>
            </div>
            <div>
              <h5 class="fw-bold" style="color: #1d2b53;">10+ Years of Experience</h5>
              <p class="text-muted mb-0">With over a decade in the taxi industry, we understand your travel needs better than anyone else.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-4">
        <div class="p-4 bg-white rounded shadow-sm text-start">
          <div class="d-flex align-items-start">
            <div class="rounded-circle p-2 me-3" style="background-color: #e4e9f5; color: #1d2b53;">
              <i class="bi bi-person-check fs-4"></i>
            </div>
            <div>
              <h5 class="fw-bold" style="color: #1d2b53;">Professional Drivers</h5>
              <p class="text-muted mb-0">Our courteous, background-verified drivers ensure a safe and pleasant journey every time.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-4">
        <div class="p-4 bg-white rounded shadow-sm text-start">
          <div class="d-flex align-items-start">
            <div class="rounded-circle p-2 me-3" style="background-color: #e4e9f5; color: #1d2b53;">
              <i class="bi bi-thermometer-half fs-4"></i>
            </div>
            <div>
              <h5 class="fw-bold" style="color: #1d2b53;">AC & Non-AC Cabs</h5>
              <p class="text-muted mb-0">Choose from our fleet of clean, comfortable AC and Non-AC vehicles tailored to your preferences.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-md-4">
        <div class="p-4 bg-white rounded shadow-sm text-start">
          <div class="d-flex align-items-start">
            <div class="rounded-circle p-2 me-3" style="background-color: #e4e9f5; color: #1d2b53;">
              <i class="bi bi-cash-coin fs-4"></i>
            </div>
            <div>
              <h5 class="fw-bold" style="color: #1d2b53;">Transparent Pricing</h5>
              <p class="text-muted mb-0">No surprises. Clear, upfront pricing means you only pay what you see—no hidden charges.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col-md-4">
        <div class="p-4 bg-white rounded shadow-sm text-start">
          <div class="d-flex align-items-start">
            <div class="rounded-circle p-2 me-3" style="background-color: #e4e9f5; color: #1d2b53;">
              <i class="bi bi-headset fs-4"></i>
            </div>
            <div>
              <h5 class="fw-bold" style="color: #1d2b53;">24/7 Support</h5>
              <p class="text-muted mb-0">Got questions or issues? Our friendly support team is always ready to help—day or night.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="col-md-4">
        <div class="p-4 bg-white rounded shadow-sm text-start">
          <div class="d-flex align-items-start">
            <div class="rounded-circle p-2 me-3" style="background-color: #e4e9f5; color: #1d2b53;">
              <i class="bi bi-hand-thumbs-up fs-4"></i>
            </div>
            <div>
              <h5 class="fw-bold" style="color: #1d2b53;">Thousands of Happy Travelers</h5>
              <p class="text-muted mb-0">We’re trusted by thousands who count on us for reliable and comfortable rides every day.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


<!--Section 5-->


  
  <div class="container mt-5">
    <h2 class="fw-bold text-center" style="color:#1d2b53;">How To Book Your Ride</h2>
    <div class="mb-4" style="width: 80px; height: 4px; background-color: orange; margin: auto;"></div>
        <p style="text-align: center;">Booking a taxi with Madurai Mani Travels is simple. Follow these easy steps to get started.</p>

    <div class="row">
      <div class="col-md-12 position-relative">
        <!-- Vertical line -->
        <div class="position-absolute top-0 bottom-0 start-0 ms-4" style="border-left: 4px solid orange;"></div>

        <!-- Timeline items -->
        <div class="d-flex mb-4 align-items-start">
          <div class="rounded-circle bg-white shadow-sm p-2" style="color: #1d2b53; border: 3px solid #1d2b53;background-color:1d2b53;z-index: 1;">
            <i class="bi bi-phone fs-5 " ></i>
          </div>
          <div class="ms-5 bg-white p-4 shadow-sm rounded" style="flex-grow: 1;">
            <h5 class="fw-bold" style="color: #1d2b53;">Book Online</h5>
            <p class="mb-0 text-muted">Use our website or mobile app to book your ride in just a few clicks.</p>
          </div>
        </div>

        <div class="d-flex mb-4 align-items-start">
          <div class="rounded-circle bg-white shadow-sm p-2" style="color: #1d2b53; border: 3px solid #1d2b53; z-index: 1">
            <i class="bi bi-telephone fs-5"></i>
          </div>
          <div class="ms-5 bg-white p-4 shadow-sm rounded" style="flex-grow: 1;">
            <h5 class="fw-bold" style="color: #1d2b53;">Call Our Dispatch</h5>
            <p class="mb-0 text-muted">Contact our 24/7 call center at +91 6383507464 to book your taxi.</p>
          </div>
        </div>

        <div class="d-flex mb-4 align-items-start">
          <div class="rounded-circle bg-white shadow-sm p-2" style="color: #1d2b53; border: 3px solid #1d2b53;z-index: 1">
            <i class="bi bi-calendar-check fs-5"></i>
          </div>
          <div class="ms-5 bg-white p-4 shadow-sm rounded" style="flex-grow: 1;">
            <h5 class="fw-bold" style="color: #1d2b53;">Schedule In Advance</h5>
            <p class="mb-0 text-muted">Book your ride ahead of time for important appointments.</p>
          </div>
        </div>

        <div class="d-flex mb-4 align-items-start">
          <div class="rounded-circle bg-white shadow-sm p-2" style="color: #1d2b53; border: 3px solid #1d2b53;z-index: 1">
            <i class="bi bi-clock-history fs-5"></i>
          </div>
          <div class="ms-5 bg-white p-4 shadow-sm rounded" style="flex-grow: 1;">
            <h5 class="fw-bold" style="color: #1d2b53;">Track Your Ride</h5>
            <p class="mb-0 text-muted">Clients can track their rides in real-time, ensuring they stay updated at every turn.</p>
          </div>
        </div>

      </div>
    </div>
  </div>
<!--Review -->

  <div class="container  mt-5">
    <h2 class="fw-bold text-center" style="color:#1d2b53;">Hear It from Our Passengers</h2>
    <div class="mb-4" style="width: 80px; height: 4px; background-color: orange; margin: auto;"></div>

    <div class="row g-4 mt-4">
      <!-- Review 1 -->
      <div class="col-md-6">
        <div class="p-4 bg-white rounded shadow-sm h-100 review-card transition">
          <div class="text-warning mb-2">★★★★★</div>
          <p class="fst-italic text-muted">"Professional and reliable service. We booked a round trip from Madurai to Rameswaram and had a great experience. Clean car, polite driver, and on-time service."</p>
          <p class="fw-bold mb-0" style="color:#1d2b53;">– Sundar Raj, Chennai</p>
        </div>
      </div>

      <!-- Review 2 -->
      <div class="col-md-6">
        <div class="p-4 bg-white rounded shadow-sm h-100 review-card transition">
          <div class="text-warning mb-2">★★★★★</div>
          <p class="fst-italic text-muted">"Excellent taxi service in Madurai! The driver was very knowledgeable about the local attractions and helped us plan our day well."</p>
          <p class="fw-bold mb-0" style="color:#1d2b53;">– Divya Nair, Bangalore</p>
        </div>
      </div>

      <!-- Review 3 -->
      <div class="col-md-6">
        <div class="p-4 bg-white rounded shadow-sm h-100 review-card transition">
          <div class="text-warning mb-2">★★★★★</div>
          <p class="fst-italic text-muted">"Booked a round trip to Coimbatore. Smooth ride, fair pricing, and responsive team. Highly recommended!"</p>
          <p class="fw-bold mb-0" style="color:#1d2b53;">– Anil Kumar, Trichy</p>
        </div>
      </div>

      <!-- Review 4 -->
      <div class="col-md-6">
        <div class="p-4 bg-white rounded shadow-sm h-100 review-card transition">
          <div class="text-warning mb-2">★★★★☆</div>
          <p class="fst-italic text-muted">"Good service and safe driving. Will definitely choose Madurai Mani Travels again for my future trips from Madurai."</p>
          <p class="fw-bold mb-0" style="color:#1d2b53;">– Meena R., Pondicherry</p>
        </div>
      </div>
    </div>
  </div>

<!--footer-->
<footer class=" text-dark pt-5 pb-3 position-relative mt-5" style="background-color: #f7931e;">
  <div class="container-fluid px-5">
    <div class="row g-4">
      <!-- Left Column -->
      <div class="col-md-4">
        <p>
          Providing reliable and comfortable taxi bookings for all your transportation needs. Available 24/7 to serve you better.
        </p>
        <p>
          Enjoy convenient travel within Madurai and nearby areas. Perfect for sightseeing, temple visits, events, and day trips.
        </p>
      </div>

      <!-- Center Column -->
      <div class="col-md-4">
        <h5 class="fw-bold">Quick Links</h5>
        <hr class="border-2 border-dark opacity-100 w-25 mb-2" style="border-color: orange;">
        <ul class="list-unstyled">
          <li><a href="#" class="text-dark text-decoration-none">Home</a></li>
          <li><a href="#" class="text-dark text-decoration-none">About us</a></li>
          <li><a href="#" class="text-dark text-decoration-none">Tariff</a></li>
          <li><a href="#" class="text-dark text-decoration-none">Popular Outstation Routes</a></li>
        </ul>
      </div>

      <!-- Right Column -->
      <div class="col-md-4">
        <h5 class="fw-bold">Contact Information</h5>
        <hr class="border-2 border-dark opacity-100 w-25 mb-2" style="border-color: orange;">
        <ul class="list-unstyled">
          <li><i class="bi bi-geo-alt-fill me-2"></i>127 S R K Nagar 10 Street, opp. side Police station, Avaniyapuram, Madurai, Tamil Nadu 62501.</li>
          <li><i class="bi bi-telephone-fill me-2"></i>+91  6383507464</li>
          <li><i class="bi bi-envelope-fill me-2"></i>manitravels10@gmailcom</li>
          <li><i class="bi bi-clock-fill me-2"></i>24/7 Service <br>Always available for you</li>
        </ul>
      </div>
    </div>

    <!-- Bottom row -->
    <hr class="mt-4" />
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
      <p class="mb-0">© 2025 Madurai Mani Travels. All rights reserved.</p>
      <div>
        <a href="#" class="text-dark me-3 text-decoration-none">Privacy Policy</a>
        <a href="#" class="text-dark me-3 text-decoration-none">Terms and Conditions</a>
        <a href="#" class="text-dark text-decoration-none">Cancellation Fees</a>
      </div>
    </div>
  </div>

  <!-- Floating Buttons -->
  <a href="tel:9567928841" class="btn btn-primary rounded-circle shadow position-fixed" style="bottom: 90px; right: 20px; z-index: 999;">
    <i class="bi bi-telephone-fill fs-4"></i>
  </a>

  <a href="https://wa.me/916383507464" class="btn btn-success rounded-circle shadow position-fixed" style="bottom: 20px; right: 20px; z-index: 999;">
    <i class="bi bi-whatsapp fs-4"></i>
  </a>
</footer>


</body>

</html>