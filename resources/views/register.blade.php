<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="color:white; background-color: rgb(75, 130, 225)">
    <section class="vh-90 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-1 mt-md-4 pb-5">
      
                    <h2 class="fw-bold mb-3 text-uppercase">Register</h2>
                    <p class="text-white-50 mb-5">Please enter your username and password!</p>
      
                    <div class="form-outline form-white mb-4">
                      <input type="email" id="username" name="username" class="form-control form-control-lg" placeholder="Username"/>
                    </div>
      
                    <div class="form-outline form-white mb-4">
                      <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" />
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input type="password" id="password2" name="password2" class="form-control form-control-lg" placeholder="Confirm Password" />
                      </div>
      
                    <button class="btn btn-outline-light btn-lg px-5 mt-3 fw-bold" type="button" onclick="register()" style="background-color:rgb(60, 60, 220)">Submit</button>
      
                  </div>
      
                  <div>
                    <p class="mb-4">Have an account already? <a href="http://127.0.0.1:8000/login" class="text-white-50 fw-bold">Login</a></p>
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <div class="container py-0 h-100">
        <div class="card bg-dark text-white" style="border-radius: 5px;">
            <table class="table table-striped table-dark">
                
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>&nbsp;&nbsp;&nbsp;Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $key => $value)
                        <tr>
                            <td>{{$key + 1}}&nbsp;&nbsp;</td>
                            <td>{{$value->username}}&nbsp;&nbsp;</td>
                            <td>{{$value->password}}&nbsp;&nbsp;</td>
                            <td>
                                &nbsp;&nbsp;<button type="button" onclick="deletehandler(<?=$value->id?>)" style="background-color: rgb(240, 30, 30); color:white; border-radius: 5px" text-white">Delete</button>&nbsp;&nbsp;
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>  
        function register(){
                let username = document.querySelector('input[name="username"]').value
                let password1 = document.querySelector('input[name="password"]').value
                let password2 = document.querySelector('input[name="password2"]').value
                if(username == ''){
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Please enter your username',
                        showConfirmButton: true,
                    })
                    return
                }else if(password1 == password2 && password1 !== ''){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Registation successsfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }else if(password1 == '' && password2 == ''){
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Please enter your password',
                        showConfirmButton: true,
                    }) 
                    return
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Passwords do not match',
                        showConfirmButton: true,
                    }) 
                    return
                     
                }
            
                let data = {
                    username : document.querySelector('input[name="username"]').value,
                    password : document.querySelector('input[name="password"]').value
                }
                
                console.log(document.querySelector('meta[name="csrf-token"]').getAttribute('content'))    
                fetch("/api/register/create", {
                    method : "post",
                    headers : {
                        "Content-Type" : "Application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body : JSON.stringify(data)
                }).then(response => {
                    return response.json();

                }).then(result => {
                    location.reload();
                })
            
        }
        function deletehandler(id){
            console.log(document.querySelector('meta[name="csrf-token"]').getAttribute('content'))    
            fetch("/api/register/"+ id , {
                method : "delete",
                headers : {
                    "Content-Type" : "Application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            }).then(response => {
                return response.json();
            }).then(result => {
                location.reload();
            })
        }


</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>