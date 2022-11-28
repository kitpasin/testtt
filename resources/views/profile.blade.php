<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>PROFILE</h1>
    <button type="button" onclick="onCreate(this)">Create</button>
    <table>
        <tbody>
            @foreach ($profiles as $key => $value)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->lastname}}</td>
                <td>{{$value->age}}</td>
                <td>{{$value->tel}}</td>
                <td>{{$value->address}}</td>
                <td>
                    <button type="button" onclick="deletehandler(<?=$value->id?>)">Delete {{$value->id}},{{$value->name}}</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>      
        function onCreate(e){
            let data = {
                name : "Aisu", 
                lastname : "test", 
                age : 25, 
                tel : "0123456789" , 
                address : "test", 
                birthday : "13-02-2541"
            }

            console.log(document.querySelector('meta[name="csrf-token"]').getAttribute('content'))    
            fetch("/api/profile/create", {
                method : "post",
                headers : {
                    "Content-Type" : "Application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body : JSON.stringify(data)
            }).then(response => {
                return response.json();

            }).then(result => {
                if(result.message === 'success'){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: result.description,
                        showConfirmButton: false,
                        timer: 1500 
                    }).then(() => {
                        location.reload()
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: result.description,
                        showConfirmButton: true,
                        showCancelButton: true,
                    })  
                }        
            })
        
        }
        
        function deletehandler(id){
            console.log(document.querySelector('meta[name="csrf-token"]').getAttribute('content'))    
            fetch("/api/profile/"+ id , {
                method : "delete",
                headers : {
                    "Content-Type" : "Application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            }).then(response => {
                return response.json();

            }).then(result => {
                if(result.message === 'success'){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: result.description,
                        showConfirmButton: false,
                        timer: 1500 
                    }).then(() => {
                        location.reload()
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: result.description,
                        showConfirmButton: true,
                        showCancelButton: true,
                    })  
                }        
            })
        
        }
    </script>
</body>
</html>