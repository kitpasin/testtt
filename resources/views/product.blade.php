<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
    <body style="color:white; background-color: rgb(75, 130, 225)">
        <nav class="navbar navbar-light bg-dark justify-content-between">
            <a class="navbar-brand" href="#"></a>
            <form class="form-inline"></form>
                <a href="http://127.0.0.1:8000/login">
                    <button class="btn btn-outline-light btn-sg px-2 fw-bold" type="button" onclick="hiddenuserid()" style="background-color:rgb(120, 120, 120); color:white; margin-right:1rem">Logout</button>
                </a>
            </form>
        </nav>        
    <form>
        @csrf
        <section class="gradient-custom">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
          
                      <div class="mb-md-2 mt-md-2 pb-2">
          
                        <h2 class="fw-bold mb-2 text-uppercase">Product</h2>
                        <p class="text-white-50 mb-5">Please enter your product's info'!</p>
                        
                        <input type="hidden" name="hiddenid">

                        <div class="form-outline form-white mb-4">
                            <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Enter Product Name"/>
                        </div>
          
                        <div class="form-outline form-white mb-4">
                            <input type="text" id="price" name="price" class="form-control form-control-lg" placeholder="Enter Product Price" />
                        </div>

                        <div class="form-outline form-white mb-4">
                            <input type="text" id="quantity" name="quantity" class="form-control form-control-lg" placeholder="Enter Product Quantity"/>
                        </div>

                        <div class="form-outline form-white mb-4">
                            <input type="text" id="detail" name="detail" class="form-control form-control-lg" placeholder="Enter Product Detail"/>
                        </div>
                        
                        <div class="form-outline form-white mb-4">
                            <input type="text" id="status" name="status" class="form-control form-control-lg" placeholder="Enter Product Status"/><br>
                        </div>
          
                        <button class="btn btn-outline-light btn-lg px-4 fw-bold" type="button" onclick="createhandler()" style="background-color: rgb(15, 145, 15); color:white; margin-right:23px">Save</button>
                        <button class="btn btn-outline-light btn-lg px-3 fw-bold" type="button" onclick="hiddenuserid()" style="background-color:rgb(60, 60, 220); color:white; margin-right:23px">Update</button>
                        <button class="btn btn-outline-light btn-lg px-4 fw-bold" type="reset" style="background-color:rgb(240, 30, 30); color:white">Reset</button>

                      </div>       
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </form>
    <div class="container py-0 h-100">
        <div class="card bg-dark text-white" style="border-radius: 5px;">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Detail</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $value)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->price}}</td>
                        <td>{{$value->quantity}}</td>
                        <td>{{$value->detail}}</td>
                        <td>{{$value->status}}</td>
                        <td>
                            <button type="button" onclick="edithandler(<?=$value->id?>)" class="btn btn-outline-light btn-sm px-2 fw-bold" style="background-color: rgb(235, 165, 35); color:white; border-radius: 5px; text-white">Edit</button>
                            <button type="button" onclick="deletehandler(<?=$value->id?>)" class="btn btn-outline-light btn-sm px-0 fw-bold" style="background-color: rgb(240, 30, 30); color:white; border-radius: 5px; text-white">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>  
        
        function createhandler(){
            let data = {
                name : document.querySelector('input[name="name"]').value,
                price : document.querySelector('input[name="price"]').value, 
                quantity : document.querySelector('input[name="quantity"]').value,
                detail : document.querySelector('input[name="detail"]').value, 
                status : document.querySelector('input[name="status"]').value
            }
            if(data.name == ''){
                Swal.fire({
                      position: 'center',
                      icon: 'error',
                      title: 'Please enter your username',
                      showConfirmButton: true,
                  })
                  return
            }else if(data.price == ''){
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Please enter your password',
                    showConfirmButton: true,
                })
                return
            }else if(data.quantity == ''){
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Please enter your quantity',
                    showConfirmButton: true,
                })
                return
            }else if(data.detail == ''){
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Please enter your detail',
                    showConfirmButton: true,
                })
                return
            }else if(data.status == ''){
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Please enter your status',
                    showConfirmButton: true,
                })
                return
            }else{
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Your product have been saved successfully',
                    timer: 1500
                })
            }
            
            console.log(document.querySelector('meta[name="csrf-token"]').getAttribute('content'))    
            fetch("/api/product/create", {
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
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(60, 60, 220)',
                cancelButtonColor: 'rgb(240, 30, 30)',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your product has been deleted.',
                    'success'                  
                    )
                    console.log(document.querySelector('meta[name="csrf-token"]').getAttribute('content'))    
                    fetch("/api/product/"+ id , {
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
            })
        }

        function edithandler(id){
            console.log(document.querySelector('meta[name="csrf-token"]').getAttribute('content'))    
            fetch("/api/product/"+ id , {
                method : "get",
                headers : {
                    "Content-Type" : "Application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            }).then(response => {
                return response.json();             

            }).then(result => {
                console.log(result.edit)

                if(result.message === 'success'){
                    document.querySelector('input[name="hiddenid"]').value = result.edit.id
                    document.querySelector('input[name="name"]').value = result.edit.name
                    document.querySelector('input[name="price"]').value = result.edit.price
                    document.querySelector('input[name="quantity"]').value = result.edit.quantity
                    document.querySelector('input[name="detail"]').value = result.edit.detail
                    document.querySelector('input[name="status"]').value = result.edit.status
                }      
            })
        }

        function hiddenuserid(){ //แปลง id เป็น hiddenid และเก็บข้อมูลไว้ใน data
            
            let data = {
                hiddenid : document.querySelector('input[name="hiddenid"]').value,
                name : document.querySelector('input[name="name"]').value,
                price : document.querySelector('input[name="price"]').value,
                quantity : document.querySelector('input[name="quantity"]').value,
                detail : document.querySelector('input[name="detail"]').value,
                status : document.querySelector('input[name="status"]').value
            }
            console.log(data)
            updatehandler(data) // ไปเรียกใช้ฟังก์ชัน updatehandler โดยที่แนบ data ไปด้วย
        }

        function updatehandler(_data){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(60, 60, 220)',
                cancelButtonColor: 'rgb(240, 30, 30)',
                confirmButtonText: 'Yes, update it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Updated!',
                    'Your product has been updated.',
                    'success'                  
                    ) 
            fetch("/api/product/"+ _data.hiddenid , { 
                method : "put",
                headers : {       
                    "Content-Type" : "Application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body:JSON.stringify(_data)
            }).then(response => {
                return response.json();             

            }).then(result => {
                console.log(result.a)    
                location.reload()  
            })
        }
    })
}


       
    </script>   
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>