<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <style>
    .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}


@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
  </style>
</head>
<?php
session_start();
?>
<body>
  <!-- Section: Design Block -->
  <main>
    <section class="h-100 gradient-form" style="background-color: #eee;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10">
            <div class="card rounded-3 text-black">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="card-body p-md-5 mx-md-4">
                    <!-- Login Form -->
                    <form action="controllers/LoginController.php" method="post">
                      <div class="text-center">
                        <h1 class="mt-1 mb-5 pb-1">CLUB SPORTIF</h1>
                      </div>
                      <!-- Email Input -->
                      <div class="form-outline mb-4">
                      <label class="form-label" for="email">Email</label>
                        <input name="email" type="email" id="email" class="form-control" required placeholder="Votre email svp">
                        
                      </div>
                      <!-- Password Input -->
                      <div class="form-outline mb-4">
                      <label class="form-label" for="mot_de_passe">Mot de passe</label>
                        <input name="mot_de_passe" type="password" id="mot_de_passe" class="form-control" required placeholder="Votre mot de passe svp">
                      
                      </div>
                      <!-- Submit Button -->
                      <div class="text-center pt-1 mb-5 pb-1">
                        <input class="w-100 btn btn-lg btn-primary" type="submit" name="action" value="Se connecter">
                      </div>
                    </form>
                    <!-- End Login Form -->
                  </div>
                </div>
                <!-- Information Panel -->
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                  <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <h2 class="mb-4">Plateforme de gestion du club sportif</h2>
                    <p class="small mb-0">
                      Un club sportif est une organisation ou une association qui réunit des individus partageant un intérêt commun pour une activité sportive particulière. Ces clubs peuvent être dédiés à une grande variété de sports tels que le football, le basketball, le tennis, la natation, l'athlétisme, le rugby, etc.
                    </p>
                  </div>
                </div>
                <!-- End Information Panel -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
<!-- Section: Design Block -->
</body>
</html>