<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="color:white; background-color: rgb(75, 130, 225)">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-1 mt-md-4 pb-5">
      
                    <h2 class="fw-bold mb-3 text-uppercase">Welcome</h2>
                    <p class="text-white-50 mb-5">Please enter your username and password!</p>
      
                    <div class="form-outline form-white mb-4">
                      <input type="email" id="username" name="username" class="form-control form-control-lg" placeholder="Username"/>
                    </div>
      
                    <div class="form-outline form-white mb-4">
                      <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" />
                    </div>
      
                    <button class="btn btn-outline-light btn-lg px-5 mt-3 fw-bold" type="button" onclick="login()" style="background-color:rgb(60, 60, 220)">Login</button>
      
                  </div>
      
                  <div>
                    <p class="mb-4">Don't have an account? <a href="http://127.0.0.1:8000/register" class="text-white-50 fw-bold">Sign Up</a></p>
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var user = [
        {
            username : "test101",
            password : "1234"
        },
        {
            username : "test102",
            password : "4321"
        }
    ]
    function login(){
        let a = document.getElementById('username').value
        let b = document.getElementById('password').value
          if(a == ''){
                  Swal.fire({
                      position: 'center',
                      icon: 'error',
                      title: 'Please enter your username',
                      showConfirmButton: true,
                  })
                  return
          }else if(b == ''){
                  Swal.fire({
                      position: 'center',
                      icon: 'error',
                      title: 'Please enter your password',
                      showConfirmButton: true,
                  })
                  return

          }
    
        for (var i = 0 ; i < user.length ; i++){
            if (a == user[i].username && b == user[i].password){
              Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Registation successsfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href = 'http://127.0.0.1:8000/product'
                return         
            }else if(a !== user[i].username && b == user[i].password){
              Swal.fire({
                      position: 'center',
                      icon: 'error',
                      title: 'Username do not exist',
                      showConfirmButton: true,
                  })
                  
            }else if(a == user[i].username && b !== user[i].password){
              Swal.fire({
                      position: 'center',
                      icon: 'error',
                      title: 'Wrong password',
                      showConfirmButton: true,
                  })
                  return
            }else{
              Swal.fire({
                      position: 'center',
                      icon: 'error',
                      title: 'Username do not exist',
                      showConfirmButton: true,
                  })
                  return
            }
        }
         
    }
    
</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>