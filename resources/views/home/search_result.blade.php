
<head>
    <style>
       #table{
        border:2px solid blue;
        width: 800px;
        margin: 50px;
       }
       td{
        padding: 15px;
        border:1px solid blue;
       }
       tr{
        border:1px solid blue;
       }

    </style>
</head>


    <div class="container">

                    
                
          <table id="table">
              <tr><h1>user information</h1></tr>
                <th>
                    <tr>
                        <td>number</td>
                        <td>User Id</td>
                        <td>User Name</td>
                        <td>description</td>
                        <td>Pc Brand</td>
                        <td>Serial number:</td>
                        <td>User photo</td>
                    </tr>
                </th>
                      <tr>
                       <td> {{ $user->id }}</td>
                       <td> {{ $user->user_id }}</td>
                       <td> {{ $user->username }}</td>
                       <td>  {{ $user->description }}</td>
                       <td> {{ $user->pc_name }}</td>
                       <td>  {{ $user->serial_number }}</td>

                       <td> @if ($user->photo)
                       <img src="{{ asset($user->photo) }}" alt="Photo">
                        @else
                            <p>No photo available.</p>
                        @endif
                        </td>
                   </tr>
            </table>
                       

                    

                

          

    </div>

